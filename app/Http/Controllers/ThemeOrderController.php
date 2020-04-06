<?php

namespace App\Http\Controllers;

use App\themeOrder;
use App\earning;
use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use Redirect;
use Toastr;
class ThemeOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function theme_checkout(Request $request){
       
        $user_id = Auth::user()->id;
        $session_id =  Session::get('session_id');
      
        //if direct buy now button
        if(isset($request->purchase) || Session::get('buy_theme_cart_id') ){

            if(!Session::get('buy_theme_cart_id')){
                // check own theme
                $check = DB::table('themes')->where('theme_id', $request->theme_id)->first();
                // if try to buy own theme redirect prev page
                if($check->user_id == $user_id){
                    Toastr::error("Sorry can\'t buy your own theme");
                    return back();
                }

                $data = [
                    'theme_id' => $request->theme_id,
                    'price' => ($request->license == 'extented') ?  $check->price_extented :  $check->price_regular,
                    'user_id' => $user_id,
                    'lichance_name' => $request->license,
                    'created_at' => now(),
                ];
                $insertId = DB::table('theme_add_to_cart')->insertGetId($data);
                //put cart_id in session for payment 
                Session::put('buy_theme_cart_id', $insertId);
            }

            $get_theme_info = DB::table('theme_add_to_cart')
            ->join('themes', 'theme_add_to_cart.theme_id', 'themes.theme_id')
            ->where('theme_add_to_cart.cart_id', Session::get('buy_theme_cart_id'))
            ->get();
           
          
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

        $buyer_id = Auth::user()->id;
        $username = Auth::user()->username;
        
        $session_id = 0;
        $session_id =  Session::get('session_id'); // for guest user add to cart
       
        //get all cart item 

        if(Session::get('buy_theme_cart_id')){
            $get_themecart_info = DB::table('theme_add_to_cart')
            ->join('themes', 'theme_add_to_cart.theme_id', 'themes.theme_id')
            ->where('cart_id', Session::get('buy_theme_cart_id'))
            ->select('theme_add_to_cart.*', 'themes.user_id as seller_id')->limit(1)->get();
          
        }else{
            $get_themecart_info = DB::table('theme_add_to_cart')
            ->join('themes', 'theme_add_to_cart.theme_id', 'themes.theme_id')
            ->where('theme_add_to_cart.user_id', $buyer_id)
            ->orWhere('session_id', $session_id)
            ->select('theme_add_to_cart.*', 'themes.user_id as seller_id')
            ->get();
        }

        $trnx_id = Session::get('paypal_payment_id');
        
        // all cart item buyer purchas 
        foreach ($get_themecart_info  as $show_themecart_info) {


            $order_id = $buyer_id. strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), -8)); 
            $data = [
                'order_id' => $order_id,
                'theme_id' => $show_themecart_info->theme_id,
                'lichance_name' => $show_themecart_info->lichance_name,
                'seller_id' => $show_themecart_info->seller_id,
                'buyer_id' =>  $buyer_id,
                'ref_user' => $ref_user,
                'total_price' => $show_themecart_info->price,
                'payment_method' => 'paypal',
                'transection_id' => $trnx_id,
            ];

            $insert = themeOrder::create($data);

            if($insert){
                DB::table('theme_add_to_cart')
                ->where('cart_id',  $show_themecart_info->cart_id)->delete();

                $earning = $show_themecart_info->price;
                $type = 'direct';
                $ref_earning = 0;
                $ref_user = null;
                // check refferel_user_name
                if(Session::has('refferel_user_name')){
                    if(Session::get('refferel_user_name') != $username && Session::get('refferel_user_name') != $show_themecart_info->theme_id){
                    $ref_user = Session::get('refferel_user_name');
                    $ref_earning = ($price*5)/100;
                    $type = 'refferel';
                    $earning = $earning-$ref_earning;
                    }
                }
                $data = [
                    'seller_id' => $get_order_info->seller_id,
                    'buyer_id' => $get_order_info->buyer_id,
                    'item_id' => $get_order_info->gig_id,
                    'order_id' => $order_id,
                    'price' => $price,
                    'earning' => $earning,
                    'type' => $type,
                    'ref_username' => $ref_user,
                    'ref_earning' => $ref_earning,
                    'status' => 'income',
                    'platform' => 'themeplace'
                    
                ];
                $success = earning::create($data);

                // if refferel user exist
                if($success && Session::has('refferel_user_name')){
                    ref_count::create([
                        'ref_username' => $get_order_info->ref_user,
                        'total_view' => 0,
                        'total_item' => 1,
                        'ref_earning' => $ref_earning,
                    ]);
                }
            }
        }

        if($insert){
            //forget paypal payment session id
            Session::forget('paypal_payment_id');
            //forget theme direct buy session id
            Session::forget('buy_theme_cart_id');
            Toastr::success('Thanks theme buy successfully completed.');
            return Redirect::route('theme_downloads');
        }else{
            return Redirect::route('theme_checkout');
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
       
        //get all cart item 
        $get_themecart_info = DB::table('theme_add_to_cart')
        ->join('themes', 'theme_add_to_cart.theme_id', 'themes.theme_id')
        ->where('theme_add_to_cart.user_id', $buyer_id)
        ->orWhere('session_id', $session_id)
        ->get();

        // all cart item buyer purchas 
        foreach ($get_themecart_info  as $show_themecart_info) {
                // check refferel_user_name
                if(Session::has('refferel_user_name')){
                    if(Session::get('refferel_user_name') != $username && Session::get('refferel_user_name') != $show_themecart_info->theme_id){
                     $ref_user = Session::get('refferel_user_name');
                    }
                }else{ $ref_user = null; }

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
                return Redirect::route('theme_downloads');
            }
        }
         return redirect('/themeplace/cart/view'.Auth::user()->username);
    }

    public function payment_cancel(){
        return redirect('/themeplace/cart/view/'.Auth::user()->username);
    }
}
