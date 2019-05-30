<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class earningController extends Controller
{
    public function earnings_view(){
    	$user_id = Auth::user()->id;
    	$get_earnings = DB::table('earnings')
    	->join('users', 'earnings.buyer_id', '=', 'users.id')
    	->join('gig_basics', 'earnings.item_id', '=', 'gig_basics.gig_id')
    	->where('seller_id', $user_id)->get();
    	return view('backend.statement')->with('get_earnings', $get_earnings );
    }

}
