<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class affiliateController extends Controller
{
 

    public function affiliate_program(){
    	$ref_username = Auth::user()->username;
    	$get_ref_info = DB::table('ref_counts')
    	 ->select(
    	 	'created_at',
    	 	DB::raw("SUM(total_view) as total_view"),
    	 	DB::raw("SUM(total_item) as total_item"),
    	 	DB::raw("SUM(ref_earning ) as ref_earning")
    	 )
    	->where('ref_username', $ref_username)

    	->groupBy(DB::raw("MONTH(created_at)"))
    	->get();
		return view('backend/affiliate')->with('get_ref_info', $get_ref_info );
    }
}
