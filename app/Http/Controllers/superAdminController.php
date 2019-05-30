<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gig_home_category;
use App\gig_subcategory;
use App\gig_metadata;
use DB;
class superAdminController extends Controller
{
    public function gig_category(){
     		return view('backend.gig-category');
    }

    public function create_gig_category(Request $request){

    		 $data = [
                'category_name' => $request->gig_category,
    			'category_url' => str_slug($request->gig_category),
    			'sorting' => '',
    			'status' =>  $request->status
    		 ];
    		 gig_home_category::create($data);
    		 return back();
    }


    public function gig_subcategory(){
    	 return view('backend.gig-subcategory');
    }

    public function create_gig_subcategory(Request $request){

     		$data = [
                'subcategory_name' => $request->subcategory_name,
     			'subcategory_url' => str_slug($request->subcategory_name),
     			'category_id' => $request->category_id,
     			'status' =>  $request->status
     		];
     		gig_subcategory::create($data);
     		return back();
    }

    public function gig_metadata(){
       return view('backend.gig-metadata');
    }

     public function insert_metadata(Request $request){

        $data = [
          'sub_filter_name' => $request->sub_filter_name,
          'filter_id' => $request->filter_id,
          'filter_type' => isset($request->filter_type) ? 'Yes' : 'No'
        ];

        gig_metadata::create($data);
        return back();
    }

     public function gig_pricescope(){
       return view('backend.price-scope');
    }

     public function insert_pricescope(Request $request){

        $data = [
          'gig_metadata' => $request->gig_pricescope,
          'category_id' => $request->category_id,
          'filter_type' => $request->filter_type,
          'status' =>  $request->status
        ];
        gig_metadata::create($data);
        return back();
    }


    //theme option

    public function theme_category(){
        return view('backend.theme.category');
    }

    public function create_theme_category(Request $request){

        $data = [
            'category_name' => $request->category_name,
            'category_url' => str_slug($request->category_name),
            'sorting' => '',
            'status' =>  $request->status
         ];

         $insert = DB::table('theme_category')->insert($data);
         if($insert){
             return back()->with('msg', 'category inserted successfully');
         }else{
             return back()->with('msg', 'sorry category not inserted.');
         }
        
    }


     public function theme_subcategory(){
         return view('backend.theme.subcategory');
    }

    public function create_theme_subcategory(Request $request){

        $data = [
            'subcategory_name' => $request->subcategory_name,
            'subcategory_url' => str_slug($request->subcategory_name),
            'category_id' => $request->category_id,
            'status' =>  $request->status
        ];
        $insert = DB::table('theme_subcategory')->insert($data);
         if($insert){
             return back()->with('msg', 'category inserted successfully');
         }else{
             return back()->with('msg', 'sorry category not inserted.');
         }
    } 

    public function theme_subchildcategory(){
         return view('backend.theme.subchild_category');
    }

    public function create_theme_subchildcategory(Request $request){

        // $get_subcategory = DB::table('theme_subchild_category')->where('subchild_category_url', str_slug($request->subchild_category_url))->get();

        // if($get_subcategory){
        //   $subchild_category_url = str_slug($request->subchild_category_url).rand(4,4);
        // }

        $data = [
            'subchild_category_name' => $request->subchild_category_name,
            'subchild_category_url' => str_slug($request->subchild_category_name),
            'subcategory_id' => $request->subcategory_id,
            'status' =>  $request->status
        ];
        $insert = DB::table('theme_subchild_category')->insert($data);
         if($insert){
             return back()->with('msg', 'category inserted successfully');
         }else{
             return back()->with('msg', 'sorry category not inserted.');
         }
    }




    
}
