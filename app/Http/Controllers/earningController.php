<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentMethod;
use App\Withdraw;
use App\User;
use Auth;
use DB;
use Toastr;
class earningController extends Controller
{
    public function earnings_view(){
    	$user_id = Auth::user()->id;
    	$get_earnings = DB::table('earnings')
    	->join('users', 'earnings.buyer_id', '=', 'users.id')
    	->where('seller_id', $user_id)->get();
    	return view('backend.statement')->with('get_earnings', $get_earnings );
    }

   

}
