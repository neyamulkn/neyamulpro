<?php

namespace App\Http\Controllers;

use App\themeOrder;
use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use Redirect;
class ThemeOrderController extends Controller
{
    
    public function theme_checkout(Request $request){
        if(!Auth::check()){
            return Redirect::route('login');
        }
         $user_id = null;
        if(Auth::check()){  $user_id = Auth::user()->id; }

        //if direct purchase buy now button
        if(isset($request->purchase)){
            $data = [
                'theme_id' => $request->theme_id,
                'price' => $request->price,
                'user_id' => $user_id
            ];
            $insertId = DB::table('theme_add_to_cart')->insertGetId($data);

            $get_theme_info = DB::table('theme_add_to_cart')
            ->join('themes', 'theme_add_to_cart.theme_id', 'themes.theme_id')
            ->where('theme_add_to_cart.cart_id', $insertId)
            ->get();
            Session::put('buy_theme_cart_id', $insertId);
           
        }else{
            $session_id = 0;
            $session_id =  Session::get('session_id');
           
            $get_theme_info = DB::table('theme_add_to_cart')
            ->join('themes', 'theme_add_to_cart.theme_id', 'themes.theme_id')
            ->where('theme_add_to_cart.user_id', $user_id)
            ->orWhere('session_id', $session_id)
            ->get();
        }
       return view('frontend/theme/theme-payment')->with(compact('get_theme_info'));
    }


    public function payment_success()
    {
        if(isset($_GET['tx'])){
            $buyer_id = Auth::user()->id;
            $username = Auth::user()->username;
            
            $session_id = 0;
            $session_id =  Session::get('session_id'); // for guest user add to cart
           
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
                    return redirect('/themeplace/downloads/theme/'.Auth::user()->username);
                }else{
                    return redirect('/themeplace/cart/view'.Auth::user()->username);
                }
        }else{
            return redirect('/themeplace/cart/view'.Auth::user()->username);
        }
      
    }

    public function stripe_payment(Request $request)
    {

        $buyer_id = Auth::user()->id;
        $username = Auth::user()->username;
        
        $session_id = 0;
        $session_id =  Session::get('session_id'); // for guest user add to cart
       
        \Stripe\Stripe::setApiKey("sk_test_USX32J7O4Oxh4gsTMwlAY5zr00t9yNdFxr");
    if(isset($request->stripeToken)){
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
                    'payment_method' => 'card',
                    'transection_id' => $request->stripeToken,
                   
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
                return redirect('/themeplace/downloads/theme/'.Auth::user()->username);
            }
        }
         return redirect('/themeplace/cart/view'.Auth::user()->username);
    }

    public function payment_cancel(){
        return redirect('/themeplace/cart/view/'.Auth::user()->username);
    }
}
