<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\filter;
use App\filter_subcategory;
use App\gig_subcategory;
use App\Workplace_filter_category;
use DB;
use App\gig_metadata;
use App\Theme_filter_category;
use Toastr;
class filterController extends Controller
{

	public function __construct()
  {
    $this->middleware('auth');
  }
  public function show_filer_page(){
    	$get_filter_data = filter::get();

    	return view('admin.marketplace.filter')->with(compact('get_filter_data'));
  }

	public function insert_filter(Request $request){
		$insertOrupdate = filter::where('filter_id', $request->id)->first();

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

		if($insertOrupdate){
	        $success = filter::where('filter_id', $request->id)->update($data);

            filter_subcategory::where('filter_id', $request->id)->delete($data); 
            // at first delete this all filter data then insert bcz update problem

            if($success){
                foreach ($request->sub_category_id as $sub_category) {
                $filter_data = [
                  'filter_id' => $request->id,
                  'subcategory_id' => $sub_category
                ];

                filter_subcategory::create($filter_data);
              }
            }

	         if($success){
	              Toastr::success('Filter update successfully');
	           }else{
	              Toastr::error('Sorry filter not updated.'); 
	           }
	        }
	        else{
	            $insertId = filter::insertGetId($data);
    		    	if($insertId){
    				    foreach ($request->sub_category_id as $sub_category) {
    						$filter_data = [
    							'filter_id' => $insertId,
    							'subcategory_id' => $sub_category
    						];

    						filter_subcategory::create($filter_data);
    					 }
		    	   }
	            if($insertId){
	              Toastr::success('Filter inserted successfully');
	           }else{
	              Toastr::error('Sorry filter not insert.'); 
	           }
	        } 
	      return back();
	  	
    }

   // edit gig sub filter data
  public function marketplace_filter_edit($id){

      	$get_filters = DB::table('filters')->where('filter_id', $id)->first();

    		$create_array = explode(',', $get_filters->sub_category_id); //convert array for check 
      		$get_subcategory = gig_subcategory::get();
     	 $output = '';      
      	$output .= '
      				<input type="hidden" name="id" value="'.$get_filters->filter_id.'">
      				<div class="input-container">
						<div class="input-container">
							<label class="rl-label">Filter Name</label>
							<input name="filter_name" value="'.$get_filters->filter_name.'" type="text" id="" placeholder="Enter category here...">
						</div>
		        	</div>

		        	<div class="input-container">
						<label for="Category" class="rl-label required">Category </label>
						<label for="Category" class="select-block">
							<select name="sub_category_id[]" id="Category" multiple="multiple" style="width:100%" class="select2">';

								foreach($get_subcategory as $show_subcategory){
				                	$selected = 0;
					               	for($i=0; $i<count($create_array); $i++){
										if($show_subcategory->id == $create_array[$i]){
											$output .= '<option selected  value="'.$show_subcategory->id.'">'.$show_subcategory->subcategory_name.'</option>';
										$selected = 1;
										}
									}
									if($selected == 0){
										$output .= '<option  value="'.$show_subcategory->id.'">'.$show_subcategory->subcategory_name.'</option>';	
									}

								}
				            
							$output .= '</select>
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</label>
					</div>

					<div class="input-container">
						<label for="Category" class="rl-label required">Meta tag </label>
						<div class="col-md-4">
                 <input type="checkbox" '.($get_filters->mete_tag == "Yes" ? "checked" : " ").' id="price" name="mete_tag" value="'.$get_filters->mete_tag.'">
                  <label for="price">
                      <span class="checkbox primary primary"></span>
                      Yes/No
                  </label>

              </div>
					</div>
					<div class="input-container">
						<div class="input-container">
							<label class="rl-label">Filter Message</label>
							<input name="filter_msg" value="'.$get_filters->filter_msg.'" type="text" id="" placeholder="Enter Filter Message.">
						</div>
		        	</div>
					';
        	echo $output;
  }

  // delete gig sub filter data
  public function marketplace_filter_delete($id) {
     $get_data = filter::where('filter_id', $id)->delete();

        if($get_data){
            echo "Data successfully deleted.";
        }else{
            echo "Sorry Data not deleted.";
        }
  }


    // view gig sub filter data
  public function gig_metadata(){
      $get_data = DB::table('gig_metadatas')
                ->join('filters', 'gig_metadatas.filter_id', '=', 'filters.filter_id')
                ->select('gig_metadatas.*', 'filters.filter_name')
                ->where('gig_metadatas.filter_type', '!=', 'price')
                ->get();
      return view('admin.marketplace.gig-metadata')->with(compact('get_data'));
  }

  // insert or update gig sub filter data
  public function insert_metadata(Request $request){
      $insertOrupdate = gig_metadata::where('sub_filter_id', $request->id)->first();
        $data = [
          'sub_filter_name' => $request->sub_filter_name,
          'filter_id' => $request->filter_id,
          'filter_type' => isset($request->filter_type) ? 'Yes' : 'No'
        ];
        if($insertOrupdate){
            $success = gig_metadata::where('sub_filter_id', $request->id)->update($data);
            if($success){
              Toastr::success('Sub filter update successfully');
           }else{
              Toastr::error('Sorry sub filter not updated.'); 
           }
        }
        else{
            $success = gig_metadata::create($data);
            if($success){

              Toastr::success('Sub filter inserted successfully');
           }else{
              Toastr::error('Sorry sub filter not insert.'); 
           }
        } 
      return back();
  }

  // edit gig sub filter data
  public function marketplace_subfilter_edit($id){
      $get_subfilter = DB::table('gig_metadatas')
                ->join('filters', 'gig_metadatas.filter_id', '=', 'filters.filter_id')
                ->select('gig_metadatas.*', 'filters.filter_name')
                ->where('gig_metadatas.sub_filter_id', $id)
                ->where('gig_metadatas.filter_type', '!=', 'price')
                ->first();
        $get_filters = DB::table('filters')->get();

      $output = '';      
      $output .= '
        <input type="hidden" name="id" value="'.$get_subfilter->sub_filter_id.'">
        <div class="input-container">
          <div class="input-container">
            <label class="rl-label">Sub Filter Name</label>
            <input name="sub_filter_name" value="'.$get_subfilter->sub_filter_name.'" type="text" id="" placeholder="Enter sub filter name here...">
          </div>
            </div>

            <div class="input-container">
          <label for="Category" class="rl-label required">Filter type</label>
          <label for="Category" class="select-block">
            <select name="filter_id" id="Category">';

              foreach($get_filters as $show_filter){
                $output .= '<option '. ($get_subfilter->filter_id == $show_filter->filter_id ? "selected" : " " ) . ' value="'.$show_filter->filter_id.'">'.$show_filter->filter_name.'</option>';
              }
              
            $output .= '</select>
            <!-- SVG ARROW -->
            <svg class="svg-arrow">
              <use xlink:href="#svg-arrow"></use>
            </svg>
            <!-- /SVG ARROW -->
          </label>
        </div>

        <div class="input-container">
          <label for="Category" class="rl-label required">Show price table </label>
          <div class="col-md-4">
                      <input type="checkbox" '.($get_subfilter->filter_type == "Yes" ? "checked" : " " ) .' id="price" name="filter_type" value="'.$get_subfilter->filter_type.'">
                      <label for="price">
                          <span class="checkbox primary primary"></span>
                          Yes/No
                      </label>
                  </div>
        </div>';
        echo $output;
  }

  // delete gig sub filter data
  public function marketplace_subfilter_delete($id) {
     $get_data = gig_metadata::where('sub_filter_id', $id)->delete();

        if($get_data){
            echo "Data successfully deleted.";
        }else{
            echo "Sorry Data not deleted.";
        }
  }

    //theme filter

    public function theme_filter(){
      $get_filter_data =DB::table('theme_filters')->get();
      //dd($get_filter_data);
      return view('admin.themeplace.filter')->with(compact('get_filter_data'));
    
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

  		$insertId = DB::table('theme_filters')->insertGetId($data);
           
      if($insertId){
          foreach ($request->category_id as $category_id) {
            $filter_data = [
              'filter_id' => $insertId,
              'category_id' => $category_id
            ];
            Theme_filter_category::create($filter_data);
         }
         Toastr::success('Filter inserted successfully');
         
      }else{
         Toastr::error('Sorry filter not inserted.');
      }

       return back();

    }

    //theme filter

    public function theme_subfilter(){
    	return view('admin.themeplace.subfilter');
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
      $get_filter_data =DB::table('workplace_filters')->get();

      return view('admin.workplace.filter')->with(compact('get_filter_data'));
    	
    }


  public function workplace_filter_store(Request $request){
  	
    // dd($request->all());

  		$data = [
  			'filter_name' => $request->filter_name,
  			'subcategory_id' => implode(',',  $request->subcategory_id),
  			'type' =>  $request->type, 
  			'filter_msg' => $request->filter_msg,
  		];

     
      $insertOrupdate = DB::table('workplace_filters')->where('filter_id', $request->id)->first();

      if($insertOrupdate){
          $success = DB::table('workplace_filters')->where('filter_id', $request->id)->update($data);

            Workplace_filter_category::where('filter_id', $request->id)->delete(); 
            // at first delete this all filter data then insert bcz update problem

            if($success){
                foreach($request->subcategory_id as $sub_category) {
                $filter_data = [
                  'filter_id' => $request->id,
                  'category_id' => $sub_category
                ];

                Workplace_filter_category::create($filter_data);
              }
            }

            if($success){
              Toastr::success('Filter update successfully');
            }else{
              Toastr::error('Sorry filter not updated.'); 
            }

          }else{
              $insertId = DB::table('workplace_filters')->insertGetId($data);
              if($insertId){
                foreach ($request->subcategory_id as $sub_category) {
                $filter_data = [
                  'filter_id' => $insertId,
                  'category_id' => $sub_category
                ];

                Workplace_filter_category::create($filter_data);
               }
             }
              if($insertId){
                Toastr::success('Filter inserted successfully');
             }else{
                Toastr::error('Sorry filter not insert.'); 
             }
          } 
        return back();
    }

    public function workplace_filter_edit($id){
      $data = [];
      $data['get_data'] = DB::table('workplace_filters')->where('filter_id', $id)->first();
      $data['get_category'] = DB::table('workplace_subcategory')->get(); 
      echo view('admin.editpages.workplace-filter')->with($data);  
    }


  public function workplace_filter_delete($id) {
         $delete = DB::table('workplace_filters')->where('filter_id', $id)->delete();

        if($delete){
           Workplace_filter_category::where('filter_id', $id)->delete(); 
            echo "Data successfully deleted.";
        }else{
            echo "Sorry Data not deleted.";
        }
    }
    //workplace sub filter

    public function workplace_subfilter(){
    	return view('admin.workplace.subfilter');
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
