<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use DB;
use Auth;
use App\theme;
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
	    	
	    	if($get_category_id){
	    		$get_subcategory = DB::table('theme_subcategory')->where('category_id', $get_category_id->id)->get();
	    	
	    		$get_filters = DB::table('theme_filters')->where('category_id', $get_category_id->id)->orderBy('type', 'ASC')->get();
	    		
	    		return view('backend.theme.theme-upload')->with(compact('get_category_id', 'get_subcategory', 'get_filters'));
	    	}else{
	    		return back();
	    	}
    	}else{
    		return back();
    	}
    	
        
    }

    public function insert_theme(Request $request){
		$user_id = Auth::user()->id;
    	
    	// theme source file
		$main_file = $request->file('main_file');
        $main_file_newname =rand('123456', '999999').'.'. $main_file->getClientOriginalExtension();
        $main_file->move(public_path('theme/zipfile/'), $main_file_newname);

        // theme main image
		$main_image = $request->file('main_image');
		$main_image_newname = 'theme-mainimage-'.rand('123456', '999999').'.'. $main_image->getClientOriginalName();
		$main_image->move(public_path('theme/images/'), $main_image_newname);

        $search_tag = implode(',', $request->search_tag);
		$data = [

		    'user_id' => $user_id,
		    'theme_name' => $request->theme_name,
		    'theme_url' => str_slug($request->theme_name),
		    'summary' => $request->summary,
		    'description' => $request->description,
		    'category_id' => $request->category_id,
		    'sub_category' => $request->sub_category,
		    'demo_url' => $request->demo_url,
		    'screenshort_url' => $request->screenshort_url,
		    'search_tag' => strtolower($search_tag),
		    'price_regular' => $request->price_regular,
		    'price_extented' => $request->price_extented,
		    'main_file' => $main_file_newname,
		    'main_image' => $main_image_newname,
		  	'status'  => 'active'
	  	];
	  	$insert_id = theme::insertGetId($data);
	  	if($insert_id)
	  	{
	  		if(isset($request->radio)){
	            foreach($request->radio as $feature_id => $feature_name){
	            	$data = [
				    'theme_id' => $insert_id,
				    'feature_type' => 'radio',
				    'feature_id' => $feature_id,
				    'feature_name' => $feature_name
				];
				DB::table('theme_features')->insert($data);
		        }
		    }

		    if(isset($request->select)){
	            foreach($request->select as $feature_id => $feature_name){
	            	$data = [
				    'theme_id' => $insert_id,
				    'feature_type' => 'select',
				    'feature_id' => $feature_id,
				    'feature_name' => $feature_name
				];
				DB::table('theme_features')->insert($data);
				 
		        } 
		    }

		    if(isset($request->dropdown)){
	            foreach($request->dropdown as $feature_id => $feature_name){
	            	$data = [
				    'theme_id' => $insert_id,
				    'feature_type' => 'dropdown',
				    'feature_id' => $feature_id,
				    'feature_name' => $feature_name
				];
				DB::table('theme_features')->insert($data);
				 
		        } 
		    }

		    if($request->file('additonal_image')){
	            foreach($request->additonal_image as $additonal_image){
	            
   				$additional_image_newname = 'theme-image-'.rand('123456', '999999').'.'. $additonal_image->getClientOriginalExtension();
  				$additonal_image->move(public_path('theme/images/'), $additional_image_newname);

				DB::table('theme_additiona_img')->insert(['theme_id' => $insert_id, 'theme_additiona_img' => $additional_image_newname]);
		        }
		    }

	  		return back()->with('msg', 'Theme Inserted Successfully');
	  	}else{
	  		return back()->with('msg', 'Sorry Theme Inserted not Successfully');
	  	}
    	
    }
}
