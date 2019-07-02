<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gig_home_category;
use App\gig_subcategory;
use App\gig_metadata;
use DB;
class superAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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


    // workplace category 

    public function workplace_category(){
         $get_category = DB::table('workplace_category')->get();
        return view('backend.workplace.category')->with(compact('get_category'));
    }

    public function create_workplace_category(Request $request){
        $insertOrupdate = DB::table('workplace_category')->where('id', $request->id)->first();
        
        $data = [
            'category_name' => $request->category_name,
            'category_url' => str_slug($request->category_name),
            'sorting' => '',
            'status' =>  $request->status
         ];

        if($insertOrupdate){
            $success = DB::table('workplace_category')->where('id', $request->id)->update($data);
        }
        else{
            $success = DB::table('workplace_category')->insert($data);
        }

        if($success){
             return back()->with('msg', 'category inserted successfully');
         }else{
             return back()->with('msg', 'sorry category not inserted.');
         }
    }

     public function workplace_category_edit($id){
        
            $get_category = DB::table('workplace_category')->where('id', $id)->first();
                          
            $output = '';      
            $output .= '
                <input type="hidden" name="id" value="'.$get_category->id.'">
                <div class="input-container">
                <div class="input-container">
                    <label class="rl-label">Category Name</label>
                    <input name="category_name" value="'.$get_category->category_name.'" type="text" id="" placeholder="Enter category here...">
                </div>
            </div>

            <div class="input-container">
                <label for="status" class="rl-label required">Status</label>
                <label for="status" class="select-block">
                    <select name="status" id="status">
                        <option '. ($get_category->id == 1 ? "selected": " ") .' value="1">Active</option>
                        <option '. ($get_category->id == 2 ? "selected": " ") .' value="2">Unactive</option>
                        
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
            </div>
        ';
       
      echo $output;
    }

    public function workplace_category_delete($id)
    {
         $get_data = DB::table('workplace_category')->where('id', $id)->delete();

        if($get_data){
            echo "Data successfully deleted.";
        }else{
            echo "Sorry Data not deleted.";
        }
    }


    public function workplace_subcategory(){
        $get_subcategory = DB::table('workplace_subcategory')
                ->join('workplace_category', 'workplace_subcategory.category_id', '=', 'workplace_category.id')
                ->select('workplace_subcategory.*', 'workplace_category.category_name')
                ->get();
       
        return view('backend.workplace.subcategory')->with(compact('get_subcategory'));
    }

    public function create_workplace_subcategory(Request $request){

        $data = [
            'subcategory_name' => $request->subcategory_name,
            'subcategory_url' => str_slug($request->subcategory_name),
            'category_id' => $request->category_id,
            'status' =>  $request->status
        ];

        $insert = DB::table('workplace_subcategory')->insert($data);
         if($insert){
             return back()->with('msg', 'subcategory inserted successfully');
         }else{
             return back()->with('msg', 'sorry category not inserted.');
         }
    }


    public function workplace_subcategory_edit($id){
        $get_data = DB::table('workplace_subcategory')
                    ->join('workplace_category', 'workplace_subcategory.category_id', '=', 'workplace_category.id')
                    ->select('workplace_subcategory.*', 'workplace_category.category_name')
                    ->where('workplace_subcategory.id', $id)
                    ->first();

            $get_category = DB::table('workplace_category')->get();
                          
            $output = '';      
            $output .= '
                <div class="input-container">
                <div class="input-container">
                    <label class="rl-label">Category Name</label>
                    <input name="subcategory_name" value="'.$get_data->subcategory_name.'" type="text" id="" placeholder="Enter category here...">
                </div>
            </div>

            <div class="input-container">
                <label for="Category" class="rl-label required">Category</label>
                <label for="Category" class="select-block">
                    <select name="category_id" id="Category">';

                    foreach($get_category as $category){ 
                         $output .=  '<option '. ( $get_data->category_id==$category->id ? "selected" : " " ) .' value="'.$category->id.'">'.$category->category_name.'</option>';
                        
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
                <label for="status" class="rl-label required">Status</label>
                <label for="status" class="select-block">
                    <select name="status" id="status">
                        <option value="1">Active</option>
                        <option value="2">Unactive</option>
                        
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
            </div>
        ';
       
      echo $output;
    }


    
}
