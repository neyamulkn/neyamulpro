<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\filter;
use App\filter_subcategory;
use DB;
class filterController extends Controller
{
    public function show_filer_page(){
    	return view('backend.filter');
    }

	public function insert_filter(Request $request){
			if($request->sub_category_id>0){
				$sub_category_id = implode(',',  $request->sub_category_id);
			}else{
				$sub_category_id = $request->sub_category_id;
			}

			$data = [
				'filter_name' => $request->filter_name,
				'sub_category_id' => $sub_category_id,
				'mete_tag' => isset($request->mete_tag) ? 'Yes' : 'No',
				'filter_msg' => $request->filter_msg
			];

			$insertId = filter::insertGetId($data);
	    	if($insertId){
			    foreach ($request->sub_category_id as $sub_category) {
					$filter_data = [
						'filter_id' => $insertId,
						'subcategory_id' => $sub_category
					];

					filter_subcategory::create($filter_data);
				}
				
	    		return back();
	    	}else{
	    		return back();
	    	}
    }



    //theme filter

    public function theme_filter(){
    	return view('backend.theme.filter');
    }


    public function insert_theme_filter(Request $request){
		if($request->category_id){
			$category_id = implode(',',  $request->category_id);
		}else{
			$category_id = $request->category_id;
		}

		$data = [
			'filter_name' => $request->filter_name,
			'category_id' => $category_id,
			'type' =>  $request->type,
			'filter_msg' => $request->filter_msg
			];

		$insert = DB::table('theme_filters')->insert($data);
         if($insert){
             return back()->with('msg', 'Filter inserted successfully');
         }else{
             return back()->with('msg', 'Sorry Filter not inserted.');
         }

    }

    //theme filter

    public function theme_subfilter(){
    	return view('backend.theme.subfilter');
    }


    public function insert_theme_subfilter(Request $request){
	
		$data = [
			'sub_filtername' => $request->sub_filtername,
			'filter_id' => $request->filter_id,
			];

		$insert = DB::table('theme_subfilters')->insert($data);
         if($insert){
             return back()->with('msg', 'Filter inserted successfully');
         }else{
             return back()->with('msg', 'Sorry Filter not inserted.');
         }

    }


    // workplace filter

     public function workplace_filter(){
    	return view('backend.workplace.filter');
    }


    public function insert_workplace_filter(Request $request){
		if($request->category_id){
			$category_id = implode(',',  $request->category_id);
		}else{
			$category_id = $request->category_id;
		}

		$data = [
			'filter_name' => $request->filter_name,
			'subcategory_id' => $category_id,
			'type' =>  $request->type,
			'filter_msg' => $request->filter_msg,
			];

		$insert = DB::table('workplace_filters')->insert($data);
         if($insert){
             return back()->with('msg', 'Filter inserted successfully');
         }else{
             return back()->with('msg', 'Sorry Filter not inserted.');
         }

    }

    //theme filter

    public function workplace_subfilter(){
    	return view('backend.workplace.subfilter');
    }


    public function insert_workplace_subfilter(Request $request){
	
		$data = [
			'sub_filtername' => $request->sub_filtername,
			'filter_id' => $request->filter_id,
			];

		$insert = DB::table('workplace_subfilters')->insert($data);
         if($insert){
             return back()->with('msg', 'Filter inserted successfully');
         }else{
             return back()->with('msg', 'Sorry Filter not inserted.');
         }

    }

}
