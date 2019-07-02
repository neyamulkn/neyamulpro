<?php

namespace App\Http\Controllers;

use App\add_to_cart;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
class AddToCartController extends Controller
{
    
    public function theme_cart(Request $request)
    {

        if ($request->session()->has('session_id')) {
            Session::get('session_id');
        }else{
           Session::put('session_id', Session::getId());
        }

       $session_id = Session::get('session_id');

        $user_id = 0;
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }

        $data = [
            'theme_id' => $request->theme_id,
            'price' => $request->price,
            'user_id' => $user_id,
            'session_id' => $session_id
        ];
        $insert = DB::table('theme_add_to_cart')->insert($data);
        if($insert){
            echo "Item added to your cart successfully";
        }else{
             echo "Sorry item not added to cart successfully";
        }
    }

    
    public function view_cart()
    {
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

        if(count($get_themecart_info)>0){

            return view('frontend/theme/theme-addto-card')->with(compact('get_themecart_info'));

        }else{
            return redirect('/themeplace');
        }
        
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
            return back();
        }else{
            return back();
        }
    }

    
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\add_to_cart  $add_to_cart
     * @return \Illuminate\Http\Response
     */
    public function show(add_to_cart $add_to_cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\add_to_cart  $add_to_cart
     * @return \Illuminate\Http\Response
     */
    public function edit(add_to_cart $add_to_cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\add_to_cart  $add_to_cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, add_to_cart $add_to_cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\add_to_cart  $add_to_cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(add_to_cart $add_to_cart)
    {
        //
    }
}
