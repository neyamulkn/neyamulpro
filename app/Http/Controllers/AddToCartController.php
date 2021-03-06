<?php

namespace App\Http\Controllers;

use App\add_to_cart;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use Toastr;
class AddToCartController extends Controller
{
    public function theme_cart(Request $request)
    {
        if($request->session()->has('session_id')) {
            Session::get('session_id');
        }else{
            Session::put('session_id', Session::getId());
        }

        $session_id = Session::get('session_id');

        $user_id = 0;
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }

       // check own theme
        $check = DB::table('themes')->where('theme_id', $request->theme_id)->first();

        if($check->user_id != $user_id){
            $data = [
                'theme_id' => $request->theme_id,
                'lichance_name' => 'regular',
                'price' => $request->price,
                'user_id' => $user_id,
                'session_id' => $session_id,
                'created_at' => now(),
            ];

            DB::table('theme_add_to_cart')->insert($data);
            $output = array(
             'status' => 'success',
             'msg'  => 'Item added to your cart'
            );
      
        }else{
            $output = array(
             'status' => 'error',
             'msg'  => 'Sorry can\'t added your own theme'
            );
        }

        return response()->json($output);
    }

    
    public function view_cart()
    {
        $session_id = 0;
        $session_id =  Session::get('session_id');
        $user_id = null;
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        Session::forget('buy_theme_cart_id');

        // $getCards = DB::table('theme_add_to_cart')
        // ->join('themes', 'theme_add_to_cart.theme_id', 'themes.theme_id')
        // ->where(function($query) use ($user_id, $session_id) {
        //     $query->where('theme_add_to_cart.user_id', $user_id)
        //     ->orWhere('session_id', $session_id);
        // })->get();

        // foreach ($getCards as $getCard) {
        //    if($getCard->user_id == $user_id){
        //         DB::table('theme_add_to_cart')->where('cart_id', $getCard->cart_id)->delete();
        //    }
        // }

        $get_themecart_info = DB::table('theme_add_to_cart')
        ->where('user_id', $user_id)
        ->orWhere('session_id', $session_id)
        ->orderBy('cart_id', 'DESC')
        ->get();

       
        return view('frontend/theme/theme-addto-card')->with(compact('get_themecart_info'));

        
        
    }
    // delete theme from cart table
    public function theme_delete_cart($cart_id)
    {
        $session_id = 0;
        $session_id =  Session::get('session_id');
        $user_id = null;
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }

        $delete_cart = DB::table('theme_add_to_cart')
        ->where('cart_id',  $cart_id)
        ->where(function($query) use ($user_id, $session_id) {
            $query->where('user_id', $user_id)
            ->orWhere('session_id', $session_id);
        })
        ->delete();
        
        if($delete_cart){
           Toastr::success('Cart item removed.');
        }else{
           Toastr::success('Cart item can\'t removed.');
        }
        return back();
    }

    
   
}
