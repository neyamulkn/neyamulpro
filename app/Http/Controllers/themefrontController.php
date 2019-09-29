<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Redirect;
use Exception;
use App\ref_count;
use App\themeOrder;
use App\theme_review;
use Toastr;
use Illuminate\Support\Facades\Input;
class themefrontController extends Controller
{
    public function themeplace(){
        $data = array();
        $data['theme_category'] = DB::table('theme_category')->get();
        $data['new_arrival_author'] = DB::table('users')->leftJoin('userinfos', 'users.id', 'userinfos.user_id')->limit(20)->get();
        $data['top_seller'] = DB::table('theme_orders')
            ->leftJoin('themes', 'theme_orders.theme_id', 'themes.theme_id')
            ->leftJoin('users', 'theme_orders.seller_id', 'users.id')
            ->leftJoin('theme_category', 'themes.category_id', 'theme_category.category_url')
            ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.subcategory_url')
            ->selectRaw('theme_orders.*, theme_category.category_name, users.username, themes.theme_name, themes.theme_url, themes.price_regular, themes.main_image, theme_subcategory.subcategory_name, count(theme_orders.theme_id) total_sale' )
            ->groupBy('theme_orders.theme_id')->orderBy('total_sale', 'desc')->limit(20)->get();

        $data['get_theme_info'] = DB::table('themes')
                ->leftJoin('users', 'themes.user_id', 'users.id')
                ->leftJoin('theme_category', 'themes.category_id', 'theme_category.category_url')
                ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.subcategory_url')
                ->select('themes.*', 'theme_category.category_name', 'users.name', 'users.id', 'users.username', 'theme_subcategory.subcategory_name')
                ->groupBy('themes.theme_id')->limit(20)->get();

    	return view('frontend.theme.themes')->with($data);
    }

    public function theme_view($category, $subcatery){

		$get_category_id = DB::table('theme_category')->where('category_url', $category)->first();
		$get_subcategory_id = DB::table('theme_subcategory')->where('subcategory_url', $subcatery)->first();
		if($get_subcategory_id){
			// get filter tags by search for leftsite bar 
			$theme_subchild_category = DB::table('theme_subchild_category')->where('subcategory_id', $get_subcategory_id->id)->get();
            // get filter by search for leftsite bar 
			$theme_filters = DB::table('theme_filters')->where('category_id', $get_category_id->id)->where('type', 'select')->get();

            $src = Input::get('item');
			$get_theme_info = DB::table('themes')
				->leftJoin('users', 'themes.user_id', 'users.id')
                ->leftJoin('theme_category', 'themes.category_id', 'theme_category.id')
                ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.id')
                ->select('themes.*', 'theme_category.category_name', 'users.name', 'users.id', 'users.username', 'theme_subcategory.subcategory_name')
	            ->where('theme_category.category_url', $category)
                ->where('theme_subcategory.subcategory_url',  $subcatery)
                ->groupBy('themes.theme_id');
                if(Input::has('item') && !empty(Input::get('item'))){
                  $get_theme_info =  $get_theme_info->where('themes.theme_name', 'LIKE', '%'. $src .'%');
                }
                
            $get_theme_info = $get_theme_info->paginate(3);

			return view('frontend.theme.theme-categories')->with(compact('theme_subchild_category', 'get_theme_info', 'get_category_id','get_subcategory_id', 'theme_filters'));
		}else{
            return back();
        }
    }
    public function theme_search(){
        try{
            $src = Input::get('keyword');
            $search_keyword = DB::table('themes')->leftJoin('theme_category', 'themes.category_id', 'theme_category.id');
                if(Input::has('keyword')  && !empty(Input::get('keyword'))){
                  $search_keyword =  $search_keyword->where('themes.theme_name', 'LIKE', '%'. $src .'%');
                }
                if(Input::has('cat') && !empty(Input::get('cat'))){
                  $search_keyword =  $search_keyword->where('theme_category.category_url', Input::get('cat'));
                }
                $search_keyword = $search_keyword->select("themes.sub_category", "themes.category_id")->first();

            $data = array();
             $data['theme_category'] = DB::table('theme_category')->get();
            // get filter tags id by search key for leftsite bar 
            $theme_subchild_category = DB::table('theme_subchild_category');
            if($search_keyword){
               $theme_subchild_category = $theme_subchild_category->where('subcategory_id', $search_keyword->sub_category);
            }
            $data['theme_subchild_category'] = $theme_subchild_category->get();

            // get filter by search key for leftsite bar
            $theme_filters = DB::table('theme_filters');
            if($search_keyword){
               $theme_filters = $theme_filters->where('category_id', $search_keyword->category_id)->where('type', 'select');
            }
            $data['theme_filters'] = $theme_filters->get();
            
            $get_theme_info = DB::table('themes')
                ->leftJoin('users', 'themes.user_id', 'users.id')
                ->leftJoin('theme_category', 'themes.category_id', 'theme_category.id')
                ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.id')
                ->select('themes.*', 'theme_category.category_name', 'users.name', 'users.id', 'users.username', 'theme_subcategory.subcategory_name')
                ->groupBy('themes.theme_id');
                if(Input::has('keyword')){
                  $get_theme_info =  $get_theme_info->where('themes.theme_name', 'LIKE', '%'. $src .'%');
                }
                if(Input::has('cat') && !empty(Input::get('cat'))){
                  $get_theme_info =  $get_theme_info->where('theme_category.category_url', Input::get('cat'));
                }
                $data['get_theme_info'] = $get_theme_info->paginate(1);
                return view('frontend.theme.theme-categories')->with($data);
        }catch(\Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function suggest_keyword(Request $request){
       $get_keyord = DB::table('themes')->where('themes.theme_name', 'LIKE', '%'. $request->src_key .'%')->get();
       if(count($get_keyord)>0){
            foreach ($get_keyord as $key) {
               echo '<li><a href="">'.$key->theme_name.'</a></li>';
            }

       }
    }

    public function theme_details($theme_url){

        $get_theme_detail = DB::table('themes')
                ->join('users', 'themes.user_id', 'users.id')
                ->leftJoin('theme_category', 'themes.category_id', 'theme_category.id')
                ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.id')
                ->leftJoin('userinfos', 'users.id', 'userinfos.user_id')
                ->where('themes.theme_url', $theme_url)
               
                ->select('themes.*', 'users.username',  'theme_category.category_name','theme_subcategory.subcategory_name', 'userinfos.user_image', 'userinfos.user_title')
                ->first();

        if($get_theme_detail){
    	   // refferel_user_name
            if(isset($_GET['ref'])){
                Session::put('refferel_user_name', $_GET['ref']);

                ref_count::create([
                    'ref_username' => $_GET['ref'],
                    'platform_type' => 'themeplace',
                    'total_view' => 1,
                    'total_item' => 0,
                    'ref_earning' => 0,
                ]);
            }

                $get_theme_features = DB::table('theme_features')
                ->where('theme_id',  $get_theme_detail->theme_id)->get()->toArray();

                $theme_additiona_images = DB::table('theme_additiona_img')
                ->where('theme_id',  $get_theme_detail->theme_id)->get()->toArray();

                $total_sale = themeOrder::where('theme_id',  $get_theme_detail->theme_id)
                ->select(DB::raw('count(*) as total_sale'))
                ->first();

                $get_theme_reviews = DB::table('theme_reviews')
                ->join('users', 'theme_reviews.buyer_id', 'users.id')
                ->leftJoin('userinfos', 'theme_reviews.buyer_id', 'userinfos.user_id')
                ->where('theme_id',  $get_theme_detail->theme_id)
                //->select(DB::raw('count(*) as total_review'), DB::raw('sum(ratting_star) as total_ratting'))
                ->get();
            
                return view('frontend.theme.theme-details')->with(compact('get_theme_features', 'get_theme_detail', 'theme_additiona_images', 'get_theme_reviews','total_sale'));
        }else{
            return redirect('/');
        }
    }

    // show data home page category section
    public function theme_show_category(Request $request){

        $get_theme_info = DB::table('themes')
                ->leftJoin('users', 'themes.user_id', 'users.id')
                ->leftJoin('theme_category', 'themes.category_id', 'theme_category.category_url')
                ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.subcategory_url')
                ->select('themes.*', 'theme_category.category_name', 'users.name', 'users.id', 'users.username', 'theme_subcategory.subcategory_name');
                if($request->category_id != 'all'){
                   $get_theme_info = $get_theme_info->where('themes.category_id', $request->category_id);
                }
                
                $get_theme_info = $get_theme_info->groupBy('themes.theme_id')->limit(20)->get();

        $output = '';
        if(count($get_theme_info)>0){
            foreach($get_theme_info as $show_theme_info) {
                $output .=' <a class="hideDisplay">
                        <img class="user-avatar medium" src="'.asset('theme/images/'.$show_theme_info->main_image).'" alt="">
                      <span class="showDisplayOnHover">
                        <div class="magnifier" style="width: 477px;overflow: hidden; position: absolute;z-index: 99999">
                            <div class="size-limiter"><img alt="" src="'.asset('theme/images/'.$show_theme_info->main_image).'"></div><strong>  {{$show_theme_info->theme_name}}</strong>
                            <div class="info">
                                <div class="author-category">by <span class="author">'.$show_theme_info->username.'</span></div>
                                <div class="price"><span class="cost"><sup>$</sup>'.$show_theme_info->price_regular.'</span></div>
                            </div>
                            <div class="footer"><span class="category">'.$show_theme_info->category_name.' /'.$show_theme_info->subcategory_name.'</span><span class="gst-notice">All prices are in USD</span></div>
                        </div>
                      </span>
                    </a>';
            }
            echo $output; 
        }else{
            echo "Sorry no data available."; 
        } 
    }


    public function theme_download(){
    	if(!Auth::check()){
    		return Redirect::route('login');
    	}

    	$buyer_id = Auth::user()->id;

    	$get_theme = DB::table('theme_orders')
            ->select('theme_orders.*', 'users.*', 'themes.*', 'theme_reviews.ratting_star')
			->leftJoin('themes', 'theme_orders.theme_id', 'themes.theme_id')
			->join('users', 'themes.user_id', 'users.id')
            ->leftJoin('theme_reviews', 'theme_orders.order_id', '=', 'theme_reviews.order_id')
            // ->leftJoin('theme_reviews', function($join){
            //     $join->on('theme_orders.order_id', '=', 'theme_reviews.order_id');
            //     $join->on('theme_orders.buyer_id', '=', 'theme_reviews.buyer_id');
            // })
			->where('theme_orders.buyer_id', $buyer_id)
            ->groupBy('theme_orders.order_id')
			->get();
    	return view('frontend/theme/theme-download')->with(compact('get_theme'));
    }

    public function review(Request $request){
        if(!Auth::check()){
            return Redirect::route('login');
        }
        $buyer_id = Auth::user()->id;

        $check_order = themeOrder::where('order_id', $request->order_id)->where('buyer_id', $buyer_id)->first();
         if($check_order){

            $data = [
                'order_id' => $check_order->order_id,
                'theme_id' => $check_order->theme_id,
                'buyer_id' => $check_order->buyer_id,
                'ratting_reason' => $request->ratting_reason,
                'ratting_star' => $request->rating,
                'ratting_comment' => $request->ratting_comment,
            ];
            $updateOrCreate = theme_review::where(['order_id' => $check_order->order_id, 'theme_id' => $check_order->theme_id, 'buyer_id' => $check_order->buyer_id])->first();
            
            // check update or insert review
            if(!$updateOrCreate){
                theme_review::insert($data);
            }else{
                theme_review::where([ 'order_id' => $check_order->order_id, 'theme_id' => $check_order->theme_id, 'buyer_id' => $check_order->buyer_id])->update($data);
            }

            return back()->with('msg', 'Review successfully save.');
        }else{
            return back()->with('msg', 'Sorry something is wrong.!');
        }

    }

}
