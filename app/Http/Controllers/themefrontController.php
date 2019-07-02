<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Redirect;
use App\ref_count;
use App\themeOrder;
use App\theme_review;
class themefrontController extends Controller
{
    public function themeplace(){
    	return view('frontend.theme.themes');
    }

     public function theme_view($category, $subcatery){

		$get_category_id = DB::table('theme_category')->where('category_url', $category)->first();
		$get_subcategory_id = DB::table('theme_subcategory')->where('subcategory_url', $subcatery)->first();
		if($get_subcategory_id){

			// get filter id for leftsite bar
			$theme_subchild_category = DB::table('theme_subchild_category')->where('subcategory_id', $get_subcategory_id->id)->get();
			$theme_filters = DB::table('theme_filters')->where('category_id', $get_category_id->id)->where('type', 'select')->get();

			$get_theme_info = DB::table('themes')
				->join('users', 'themes.user_id', 'users.id')
	            ->where('themes.category_id', $category)
	            ->where('themes.sub_category',  $subcatery)->get();
				return view('frontend.theme.theme-categories')->with(compact('theme_subchild_category', 'get_theme_info', 'theme_filters'));

		}
    }

    public function theme_details($theme_url, $theme_id){

        $get_theme_detail = DB::table('themes')
                ->join('users', 'themes.user_id', 'users.id')
                ->leftJoin('userinfos', 'users.id', 'userinfos.user_id')
                ->where('themes.theme_url', $theme_url)
                ->where('themes.theme_id',  $theme_id)
                ->select('themes.*', 'users.username', 'userinfos.user_image', 'userinfos.user_title')
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

    public function theme_checkout(Request $request){
    	if(!Auth::check()){
    		return Redirect::route('login');
    	}
    	$session_id = 0;
        $session_id =  Session::get('session_id');
        $user_id = null;
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }

        $get_themecart_info = DB::table('theme_add_to_cart')
        ->where('user_id', $user_id)
        ->orWhere('session_id', $session_id)
        ->get();

        return view('frontend/theme/theme-payment')->with(compact('get_themecart_info'));
    }


    public function payment_success()
    {
    	if(isset($_GET['tx'])){
	        $buyer_id = Auth::user()->id;
	        $username = Auth::user()->username;
	        
	        $session_id = 0;
	        $session_id =  Session::get('session_id');
	       
	        // check refferel_user_name
	        if(Session::has('refferel_user_name')){
	            if(Session::get('refferel_user_name') != $username){
	             $ref_user = Session::get('refferel_user_name');
	            }
	        }else{ $ref_user = null; }

      		//get all cart item 
        	$get_themecart_info = DB::table('theme_add_to_cart')
        	->join('themes', 'theme_add_to_cart.theme_id', 'themes.theme_id')
	        ->where('theme_add_to_cart.user_id', $buyer_id)
	        ->orWhere('session_id', $session_id)
	        ->get();

	        // all cart item buyer purchas 
	        foreach ($get_themecart_info  as $show_themecart_info) {
	        	$order_id =strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), -8)); 
	        	$data = [
	                'order_id' => $order_id,
	                'theme_id' => $show_themecart_info->theme_id,
	                'lichance_name' => $show_themecart_info->lichance_name,
	                'seller_id' => $show_themecart_info->user_id,
	                'buyer_id' =>  $buyer_id,
	                'ref_user' => $ref_user,
	                'total_price' => $show_themecart_info->price,
	                'payment_method' => 'paypal',
	                'transection_id' => $_GET['tx'],
	               
	            ];

	            $insert = themeOrder::create($data);

	            if($insert){
	                DB::table('theme_add_to_cart')
			        ->where('cart_id',  $show_themecart_info->cart_id)
			        ->where(function($query) use ($buyer_id, $session_id) {
			            $query->where('user_id', $buyer_id)
			            ->orWhere('session_id', $session_id);
	        		})->delete();
	        	}
		    }

         	if($insert){
                    return redirect('/themeplace/downloads/');
                }else{
                    return redirect('/themeplace/cart/');
                }
        }else{
            return redirect('/themeplace/cart/');
        }
      
    }

    public function payment_cancel(){
         return redirect('/themeplace/cart/');
    }

    public function theme_download(){
    	if(!Auth::check()){
    		return Redirect::route('login');
    	}

    	$buyer_id = Auth::user()->id;

    	$get_theme = DB::table('theme_orders')
			->join('themes', 'theme_orders.theme_id', 'themes.theme_id')
			->join('users', 'themes.user_id', 'users.id')
            ->leftJoin('theme_reviews', function($join){
                $join->on('theme_orders.theme_id', '=', 'theme_reviews.theme_id');
                $join->on('theme_orders.buyer_id', '=', 'theme_reviews.buyer_id');
            })
			->where('theme_orders.buyer_id', $buyer_id)
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

                'theme_id' => $check_order->theme_id,
                'buyer_id' => $check_order->buyer_id,
                'ratting_reason' => $request->ratting_reason,
                'ratting_star' => $request->rating,
                'ratting_comment' => $request->ratting_comment,
            ];
            $updateOrCreate = theme_review::where(['theme_id' => $check_order->theme_id, 'buyer_id' => $check_order->buyer_id])->first();
            
            // check update or insert review
            if(!$updateOrCreate){
                theme_review::insert($data);
            }else{
                theme_review::where(['theme_id' => $check_order->theme_id, 'buyer_id' => $check_order->buyer_id])->update($data);
            }

            return back()->with('msg', 'Review successfully save.');
        }else{
            return back()->with('msg', 'Sorry something is wrong.!');
        }

    }

}
