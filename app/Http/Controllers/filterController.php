<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\filter;
use App\filter_subcategory;
class filterController extends Controller
{
    public function show_filer_page(){
    	return view('backend.filter');
    }

	public function insert_filter(Request $request){
			if($request->sub_category_id>0){
				$sub_category_id = implode(',',  $request->sub_category_id);
			}else{
				$sub_category_id =$request->sub_category_id;
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

}
