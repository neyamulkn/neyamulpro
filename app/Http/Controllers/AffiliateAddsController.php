<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AffiliateAddsController extends Controller
{
    public function index(Request $request)
    {

    	if ($request->hotlancer_type == "product") {
    		if ($request->hotlancer_column == 2) {
    			$column_1 = 6;
    		}
    		if ($request->hotlancer_column == 3) {
    			$column_1 = 3;
    		}
    		if ($request->hotlancer_column == 4) {
    			$column_1 = 3;
    		}
    		if ($request->hotlancer_column == 1) {
    			$column_1 = 12;
    		}
    		$ref_name = $request->hotlancer_ref;
    		
    		return view('product',compact('column_1','ref_name'));
    	}
    	if ($request->hotlancer_type == "marketplace") {
    		if ($request->hotlancer_column == 1) {
    			$column_1 = 1;
    		}
    		if ($request->hotlancer_column == 2) {
    			$column_1 = 2;
    		}
    		if ($request->hotlancer_column == 3) {
    			$column_1 = 3;
    		}
    		if ($request->hotlancer_column == 4) {
    			$column_1 = 4;
    		}
    		if ($request->hotlancer_column == 5) {
    			$column_1 = 5;
    		}
    		if ($request->hotlancer_column == 6) {
    			$column_1 = 6;
    		}
    		if ($request->hotlancer_column == 7) {
    			$column_1 = 7;
    		}
    		if ($request->hotlancer_column == 8) {
    			$column_1 = 8;
    		}
    		if ($request->hotlancer_column == 9) {
    			$column_1 = 9;
    		}
    		if ($request->hotlancer_column == 10) {
    			$column_1 = 10;
    		}
    		if ($request->hotlancer_column == 11) {
    			$column_1 = 11;
    		}
    		if ($request->hotlancer_column == 12) {
    			$column_1 = 12;
    		}
    		$ref_name = $request->hotlancer_ref;
    	    $products = DB::table('gig_basics')
                ->leftJoin('gig_prices', 'gig_basics.gig_id', '=', 'gig_prices.gig_id')
                ->leftJoin('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
                ->leftJoin('users', 'gig_basics.gig_user_id', '=', 'users.id')
                ->leftJoin('userinfos', 'gig_basics.gig_user_id', '=', 'userinfos.user_id')
                ->select('gig_basics.*', 'gig_prices.basic_p', 'gig_images.image_path', 'users.username', 'users.name', 'userinfos.user_image')
                ->limit($column_1)
                ->inRandomOrder()
                ->get();
    		return view('marketplace',compact('products','column_1','ref_name'));
    
    	}
    	if ($request->hotlancer_type == "workplace") {
    		if ($request->hotlancer_column == 1) {
    			$column_1 = 1;
    		}
    		if ($request->hotlancer_column == 2) {
    			$column_1 = 2;
    		}
    		if ($request->hotlancer_column == 3) {
    			$column_1 = 3;
    		}
    		if ($request->hotlancer_column == 4) {
    			$column_1 = 4;
    		}
    		if ($request->hotlancer_column == 5) {
    			$column_1 = 5;
    		}
    		if ($request->hotlancer_column == 6) {
    			$column_1 = 6;
    		}
    		if ($request->hotlancer_column == 7) {
    			$column_1 = 7;
    		}
    		if ($request->hotlancer_column == 8) {
    			$column_1 = 8;
    		}
    		if ($request->hotlancer_column == 9) {
    			$column_1 = 9;
    		}
    		if ($request->hotlancer_column == 10) {
    			$column_1 = 10;
    		}
    		if ($request->hotlancer_column == 11) {
    			$column_1 = 11;
    		}
    		if ($request->hotlancer_column == 12) {
    			$column_1 = 12;
    		}
    		$ref_name = $request->hotlancer_ref;
    		$products = DB::table('gig_basics')
                ->leftJoin('gig_prices', 'gig_basics.gig_id', '=', 'gig_prices.gig_id')
                ->leftJoin('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
                ->leftJoin('users', 'gig_basics.gig_user_id', '=', 'users.id')
                ->leftJoin('userinfos', 'gig_basics.gig_user_id', '=', 'userinfos.user_id')
                ->select('gig_basics.*', 'gig_prices.basic_p', 'gig_images.image_path', 'users.username', 'users.name', 'userinfos.user_image')
                ->limit($column_1)
                ->inRandomOrder()
                ->get();
    		return view('workplace',compact('products','column_1','ref_name'));
    	}
    	$products = DB::table('gig_basics')
                ->leftJoin('gig_prices', 'gig_basics.gig_id', '=', 'gig_prices.gig_id')
                ->leftJoin('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
                ->leftJoin('users', 'gig_basics.gig_user_id', '=', 'users.id')
                ->leftJoin('userinfos', 'gig_basics.gig_user_id', '=', 'userinfos.user_id')
                ->select('gig_basics.*', 'gig_prices.basic_p', 'gig_images.image_path', 'users.username', 'users.name', 'userinfos.user_image')
                ->limit($column_1)
                ->inRandomOrder()
                ->get();
                
               echo 'fasdf';
    	 
    }
    
    
}
