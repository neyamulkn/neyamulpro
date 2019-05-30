<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class themeController extends Controller
{
    public function index(){
    	$get_categories = DB::table('theme_category')->get();
    	return view('backend.theme.index')->with(compact('get_categories'));
    }

    // public function check_category(Request $request){
    // 	$get_category_id = DB::table('theme_category')->where('category_url', $request->theme_category)->first();
    // 	if($get_category_id){
    // 		return view('backend.theme.theme-upload')->with(compact('get_category_id'));
    // 	}else{
    // 		return back();
    // 	}
    // }
    public function theme_upload(){
    	if(isset($_GET['theme_category'])){
    		$get_category_id = DB::table('theme_category')->where('category_url', $_GET['theme_category'])->first();
	    	
	    	$get_subcategory = DB::table('theme_subcategory')->where('category_id', $get_category_id->id)->get();
	    	
	    	$get_filters = DB::table('theme_filters')->where('category_id', $get_category_id->id)->get();

	    	if($get_category_id){
	    		return view('backend.theme.theme-upload')->with(compact('get_category_id', 'get_subcategory', 'get_filters'));
	    	}else{
	    		return back();
	    	}
    	}else{
    		return back();
    	}
    	
        // return view('backend.theme.theme-upload');
    }
}
