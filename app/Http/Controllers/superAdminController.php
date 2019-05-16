<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gig_home_category;
use App\gig_subcategory;
use App\gig_metadata;
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
}
