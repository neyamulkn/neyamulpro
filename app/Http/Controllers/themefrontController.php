<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Redirect;
use Exception;
use App\ref_count;
use App\theme;
use App\themeOrder;
use App\theme_review;
use App\ThemeComment;
use App\comment_reply;
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
                ->leftJoin('theme_category', 'themes.category_id', 'theme_category.id')
                ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.id')
                ->where('themes.status', 'active')
                ->select('themes.*', 'theme_category.category_name', 'users.name', 'users.id', 'users.username', 'theme_subcategory.subcategory_name')
                ->groupBy('themes.theme_id')->limit(20)->get();

        return view('frontend.theme.themes')->with($data);
    }

    public function theme_view(Request $request){

        $get_id = DB::table('theme_subcategory')->join('theme_category', 'theme_subcategory.category_id', 'theme_category.id')->where('theme_subcategory.subcategory_url', $request->subcategory)->select('theme_category.id', 'theme_subcategory.id as subcategory_id')->first();

        //dd($get_id);

        $get_subcategories = DB::table('theme_subcategory')
            ->join('theme_category', 'theme_subcategory.category_id', 'theme_category.id')->where('theme_category.category_url', $request->category)->get();

        // get filter tags by search for leftsite bar
        $theme_subchild_category = DB::table('theme_subchild_category')
            ->join('themes', 'theme_subchild_category.id', 'themes.child_category')

            ->where('themes.sub_category', $get_id->subcategory_id)
            ->where('themes.status', 'active')
            ->selectRaw('theme_subchild_category.*, count(themes.child_category) totalTheme')->groupBy('themes.child_category')->get();
                               
        // get filter by search for leftsite bar
        $get_filters = DB::table('theme_filter_categories')
            ->join('theme_filters', 'theme_filter_categories.filter_id', 'theme_filters.filter_id')
            ->join('theme_features', 'theme_filter_categories.filter_id', 'theme_features.feature_id')
            ->where('theme_filter_categories.category_id', $get_id->id)->where('theme_filters.type', 'select')
            ->groupBy('theme_filters.filter_id')->get();




        $get_theme_info = theme::with(['orders', 'theme_review', 'comments'])
            ->leftJoin('users', 'themes.user_id', 'users.id')
            ->leftJoin('userinfos', 'themes.user_id', '=', 'userinfos.user_id')
            ->leftJoin('theme_category', 'themes.category_id', 'theme_category.id')
            ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.id')
            ->leftJoin('theme_filters', 'themes.category_id', 'theme_filters.category_id')
            ->leftJoin('theme_features', 'themes.theme_id', '=', 'theme_features.theme_id')
            ->select('themes.*', 'theme_category.category_name', 'users.name', 'userinfos.user_image', 'users.id', 'users.username', 'theme_subcategory.subcategory_name')
            ->where('theme_category.category_url', $request->category)
            ->where('theme_subcategory.subcategory_url',  $request->subcategory)
            ->where('themes.status', 'active')
            ->groupBy('themes.theme_id');

            if(Input::has('item') && !empty(Input::get('item'))){
                $src = Input::get('item');
              $get_theme_info =  $get_theme_info->where(function($query) use ($src) {
                $query->where('themes.theme_name', 'LIKE', '%'. $src .'%')
                ->orWhere('themes.search_tag', 'LIKE', '%'. $src .'%'); });
            }
            if(isset($request->price) && !empty($request->price)){
                $price = explode(',',  $request->price);

                $get_theme_info = $get_theme_info->whereBetween('themes.price_regular', [$price[0],$price[1]]); 
            }


        if(isset($request->tags) && !empty($request->tags) ){
             if(!is_array($request->tags)){ // direct url tags
                $tags =  explode(',', $request->tags);

            }else{ // filter by ajax
                $tags = $request->tags;
            }

            $get_theme_info = $get_theme_info->whereIn('themes.child_category', $tags);
        }

        if(isset($request->filer_type)){
            if(!is_array($request->filer_type)){ // direct url tags
                $filer_type =  explode(',', $request->filer_type);

            }else{ // filter by ajax
                $filer_type = implode(',', $request->filer_type);

            }

            $get_theme_info = $get_theme_info->whereIn('theme_features.feature_id', [$filer_type]);
        }
     
        $get_theme_info = $get_theme_info->paginate(30);

        if(!isset($_GET['filter'])){
            return view('frontend.theme.theme-categories')->with(compact('get_subcategories','theme_subchild_category', 'get_theme_info', 'get_id', 'get_filters'));
        }else{ // ajax request 
           echo view('frontend.theme.get_filterdata')->with(compact('get_theme_info', 'total_sale'));
        }

    }
    public function theme_search(Request $request){

            $category_id = $sub_category = '';
            $src = Input::get('item');
            $search_keyword = DB::table('themes')->join('theme_category', 'themes.category_id', 'theme_category.id');
                if(Input::has('item')  && !empty(Input::get('item'))){
                  $search_keyword =  $search_keyword->where(function($query) use ($src) {
                    $query->where('themes.theme_name', 'LIKE', '%'. $src .'%')
                    ->orWhere('themes.search_tag', 'LIKE', '%'. $src .'%'); });
                }
                if(Input::has('cat') && !empty(Input::get('cat'))){
                    $search_keyword =  $search_keyword->where('theme_category.category_url', Input::get('cat'));
                }
                $search_keyword = $search_keyword->select("themes.sub_category", "themes.category_id")->first();

                if($search_keyword){
                    $category_id = $search_keyword->category_id;
                    $sub_category = $search_keyword->sub_category;
                }


            $data = array();
            $data['all_category'] = DB::table('theme_category')->get();
            // get filter tags id by search key for leftsite bar
          
            $data['theme_subchild_category'] = DB::table('theme_subchild_category')
            ->join('themes', 'theme_subchild_category.id', 'themes.child_category')
            ->where('themes.sub_category', $sub_category)
            ->where('themes.status', 'active')
            ->selectRaw('theme_subchild_category.*, count(themes.child_category) totalTheme')->groupBy('themes.child_category')->get();

            $data['theme_category'] = DB::table('theme_category')
                    ->join('themes', 'theme_category.id', 'themes.category_id')
                    ->where(function($query) use ($src) {
                    $query->where('themes.theme_name', 'LIKE', '%'. $src .'%')
                    ->orWhere('themes.search_tag', 'LIKE', '%'. $src .'%'); })->groupBy('theme_category.id')->get();

        
            // get filter by search for leftsite bar
            $data['get_filters'] = DB::table('theme_filter_categories')
                ->join('theme_filters', 'theme_filter_categories.filter_id', 'theme_filters.filter_id')
                ->join('theme_features', 'theme_filter_categories.filter_id', 'theme_features.feature_id')
                ->where('theme_filter_categories.category_id', $category_id)->where('theme_filters.type', 'select')
                ->groupBy('theme_filters.filter_id')->get();



        $get_theme_info =  $get_theme_info = theme::with(['orders', 'theme_review', 'comments'])
            ->leftJoin('users', 'themes.user_id', 'users.id')
            ->leftJoin('userinfos', 'themes.user_id', '=', 'userinfos.user_id')
            ->leftJoin('theme_category', 'themes.category_id', 'theme_category.id')
            ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.id')
            ->leftJoin('theme_filters', 'themes.category_id', 'theme_filters.category_id')
            ->leftJoin('theme_features', 'themes.theme_id', '=', 'theme_features.theme_id')
            ->select('themes.*', 'theme_category.category_name', 'users.name', 'userinfos.user_image', 'users.id', 'users.username', 'theme_subcategory.subcategory_name')
          
            ->where('themes.status', 'active')
            ->groupBy('themes.theme_id');

            if(Input::has('item') && !empty(Input::get('item'))){
                $src = Input::get('item');
                $get_theme_info =  $get_theme_info->where(function($query) use ($src) {
                    $query->where('themes.theme_name', 'LIKE', '%'. $src .'%')
                    ->orWhere('themes.search_tag', 'LIKE', '%'. $src .'%');
                });
            }
            if(Input::has('cat') && !empty(Input::get('cat'))){
                $get_theme_info =  $get_theme_info->where('theme_category.category_url', Input::get('cat'));
            }
            if(isset($request->price) && !empty($request->price)){
                $price = explode(',',  $request->price);

                $get_theme_info = $get_theme_info->whereBetween('themes.price_regular', [$price[0],$price[1]]); 
            }


        if(isset($request->tags) && !empty($request->tags) ){
             if(!is_array($request->tags)){ // direct url tags
                $tags =  explode(',', $request->tags);

            }else{ // filter by ajax
                $tags = $request->tags;
            }

            $get_theme_info = $get_theme_info->whereIn('themes.child_category', $tags);
        }

        if(isset($request->filer_type)){
            if(!is_array($request->filer_type)){ // direct url tags
                $filer_type =  explode(',', $request->filer_type);

            }else{ // filter by ajax
                $filer_type = implode(',', $request->filer_type);

            }
            $get_theme_info = $get_theme_info->whereIn('theme_features.feature_id', [$filer_type]);
        }
     
        $data['get_theme_info'] = $get_theme_info->paginate(2);

        if(!isset($_GET['filter'])){
            return view('frontend.theme.search')->with($data);
        }else{ // ajax request 
           echo view('frontend.theme.get_filterdata')->with($data);
        }

    }

    public function suggest_keyword(Request $request){
       $get_keyord = DB::table('key_keyword')->select('keyword_name')->where('key_keyword.keyword_name', 'LIKE', '%'. $request->src_key .'%')->get();
       if(count($get_keyord)>0){
            foreach ($get_keyord as $key) { // if search from index page
               echo '<li><a href="'.(isset($request->page) ? route('theme_search') : '').'?item='.$key->keyword_name.'" >'.$key->keyword_name.'</a></li>';
            }
       }
    }

    public function theme_details($theme_url, $comments=null){

        $get_theme_detail = DB::table('themes')
                ->join('users', 'themes.user_id', 'users.id')
                ->leftJoin('userinfos', 'users.id', 'userinfos.user_id')
                ->leftJoin('theme_category', 'themes.category_id', 'theme_category.id')
                ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.id')
                ->where('themes.theme_url', $theme_url)
                ->select('themes.*', 'users.username',  'theme_category.category_name','theme_subcategory.subcategory_name', 'userinfos.user_image', 'userinfos.user_title')->first();

        if($get_theme_detail){

            $get_theme_comment = DB::table('theme_comments')
                ->join('users', 'theme_comments.user_id', 'users.id')
                ->leftJoin('userinfos', 'theme_comments.user_id', 'userinfos.user_id')
                ->where('theme_comments.theme_id', $get_theme_detail->theme_id)
                ->select('theme_comments.*', 'users.username','userinfos.user_image')
                ->orderBy('theme_comments.com_id', 'DESC');
                // all comment for comment page
                $all_comments = $get_theme_comment->get();
                $get_theme_comment = $get_theme_comment->paginate(5);

            theme::where('theme_url', $theme_url)->increment('view_counts');

            $get_another_theme = DB::table('themes')
            ->join('users', 'themes.user_id', 'users.id')
            ->leftJoin('userinfos', 'themes.user_id', 'userinfos.user_id')
            ->select('themes.theme_name', 'themes.theme_id', 'themes.main_image', 'themes.theme_url', 'themes.theme_name', 'themes.search_tag','themes.price_regular', 'users.username', 'userinfos.user_image')
            ->where('themes.user_id', $get_theme_detail->user_id)->where('theme_id', '!=', $get_theme_detail->theme_id)->limit(6)->get();
        
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

            $get_theme_features = DB::table('theme_features')->leftJoin('theme_filters', 'theme_features.feature_id', 'theme_filters.filter_id')
            ->where('theme_id', $get_theme_detail->theme_id)->groupBy('feature_id')->orderBy('feature_type', 'ASC')->get();

             $total_sale = themeOrder::where('theme_id',  $get_theme_detail->theme_id)
            ->select(DB::raw('count(*) as total_sale'))
            ->first();

            // view only comment page redirect
            if(isset($comments)){
                return view('frontend.theme.comments')->with(compact('get_theme_detail', 'all_comments','total_sale', 'get_theme_features', 'get_another_theme'));
            }

            $theme_additiona_images = DB::table('theme_additiona_img')
            ->where('theme_id',  $get_theme_detail->theme_id)->get()->toArray();

            $get_theme_reviews = DB::table('theme_reviews')
            ->join('users', 'theme_reviews.buyer_id', 'users.id')
            ->leftJoin('userinfos', 'theme_reviews.buyer_id', 'userinfos.user_id')
            ->where('theme_reviews.theme_id',  $get_theme_detail->theme_id)
            ->groupBy('review_id')->select('theme_reviews.*', 'users.username')->get();
          
            return view('frontend.theme.theme-details')->with(compact('get_theme_features', 'get_theme_detail', 'theme_additiona_images', 'get_theme_reviews','total_sale', 'get_theme_comment', 'get_another_theme'));
        }else{
            return redirect('/');
        }
    }

    public function comment_insert(Request $request){
       $data = array_merge($request->all(), ['user_id' => Auth::user()->id]);
       $insert = ThemeComment::create($data);
       $get_comment = DB::table('theme_comments')
                ->join('users', 'theme_comments.user_id', 'users.id')
                ->leftJoin('userinfos', 'theme_comments.user_id', 'userinfos.user_id')
                ->where('theme_comments.com_id', $insert->id)
                ->select('theme_comments.*', 'users.username','userinfos.user_image')->first();

       echo view('frontend.theme.show_insert_comment')->with(compact('get_comment'));
    }

    public function comment_reply(Request $request, $id){

        $data = [
            'com_id' => $id,
            'reply_msg' => $request->reply_msg,
            'user_id' => Auth::user()->id
        ];
        comment_reply::create($data);
        Toastr::success('Comment reply successfull.');
        return back();
    }

    // show data home page category section
    public function theme_show_category(Request $request){

        $get_theme_info = DB::table('themes')
                ->leftJoin('users', 'themes.user_id', 'users.id')
                ->leftJoin('theme_category', 'themes.category_id', 'theme_category.id')
                ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.id')
                ->select('themes.*', 'theme_category.category_name', 'users.name', 'users.id', 'users.username', 'theme_subcategory.subcategory_name');
                if($request->category_id != 'all'){
                   $get_theme_info = $get_theme_info->where('themes.category_id', $request->category_id);
                }

                $get_theme_info = $get_theme_info->groupBy('themes.theme_id')->limit(20)->get();

        $output = '';
        if(count($get_theme_info)>0){
            echo view('frontend.theme.tooltipstheme')->with(compact('get_theme_info'));
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
           
            ->leftJoin('themes', 'theme_orders.theme_id', 'themes.theme_id')
            ->join('users', 'themes.user_id', 'users.id')
            ->leftJoin('theme_reviews', 'theme_orders.order_id', '=', 'theme_reviews.order_id')
            // ->leftJoin('theme_reviews', function($join){
            //     $join->on('theme_orders.order_id', '=', 'theme_reviews.order_id');
            //     $join->on('theme_orders.buyer_id', '=', 'theme_reviews.buyer_id');
            // })
            ->where('theme_orders.buyer_id', $buyer_id)
            ->groupBy('theme_orders.order_id')
            ->orderBy('theme_orders.id', 'DESC')
            ->select('theme_orders.*', 'users.username', 'themes.theme_name', 'themes.theme_url', 'themes.main_file',  'themes.main_image', 'theme_reviews.ratting_star')
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
