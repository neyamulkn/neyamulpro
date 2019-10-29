<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gig_home_category;
use App\gig_subcategory;
use App\gig_metadata;
use DB;
use Redirect;
use Toastr;
class superAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
      return view('admin.index');
    }

    public function gig_category(){
      $get_category = DB::table('gig_home_category')->get();
     	return view('admin.marketplace.gig-category')->with(compact('get_category'));
    }

    public function create_gig_category(Request $request){
      $request->validate([
          'category_name' => 'required|unique:gig_home_category',
      ]);

      $insertOrupdate = DB::table('gig_home_category')->where('id', $request->id)->first();
        
  		$data = [
        'category_name' => $request->category_name,
  			'category_url' => str_slug($request->category_name),
  			'sorting' => '',
  			'status' =>  $request->status
  		];
  		
  		if($insertOrupdate){
            $success = DB::table('gig_home_category')->where('id', $request->id)->update($data);
            if($success){
              Toastr::success('update successfully', 'Category');
              echo "update";
           }else{ Toastr::error('Sorry category not updated.'); }
        }
        else{
            $success = gig_home_category::create($data);
            if($success){ Toastr::success('Inserted successfully', 'Category');
            }else{ Toastr::error('Sorry category not insert.');} 
        }
      return back();
    }

    public function marketplace_category_edit($id){
        
            $get_category = DB::table('gig_home_category')->where('id', $id)->first();
                          
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
                        <option '. ($get_category->status == 1 ? "selected": " ") .' value="1">Active</option>
                        <option '. ($get_category->status == 2 ? "selected": " ") .' value="2">Unactive</option>
                        
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

    public function marketplace_category_delete($id){
        $get_data = DB::table('gig_home_category')->where('id', $id)->delete();

        if($get_data){
            echo "Data successfully deleted.";
        }else{
            echo "Sorry Data not deleted.";
        }
    }

    public function gig_subcategory(){
      $get_subcategory = DB::table('gig_subcategories')
                ->join('gig_home_category', 'gig_subcategories.category_id', '=', 'gig_home_category.id')
                ->select('gig_subcategories.*', 'gig_home_category.category_name')
                ->get();
       return view('admin.marketplace.gig-subcategory')->with(compact('get_subcategory'));
    }


  public function create_gig_subcategory(Request $request){
        $request->validate(['subcategory_name' => 'required:unique:gig_subcategories',]);

        $insertOrupdate = DB::table('gig_subcategories')->where('id', $request->id)->first();
       
     		$data = [
          'subcategory_name' => $request->subcategory_name,
     			'subcategory_url' => str_slug($request->subcategory_name),
     			'category_id' => $request->category_id,
     			'status' =>  $request->status
     		];

        if($insertOrupdate){
            $success = DB::table('gig_subcategories')->where('id', $request->id)->update($data);
            if($success){
              Toastr::success('Sub category update successfully');
           }else{
              Toastr::error('Sorry Sub category not updated.'); 
           }
            return redirect('admin/marketplace/gig-subcategory');
        }
        else{
            $success = gig_subcategory::create($data);
            if($success){

              Toastr::success('Sub category inserted successfully');
           }else{
              Toastr::error('Sorry sub category not insert.'); 
           }
          return redirect('admin/marketplace/gig-subcategory');
        } 		
  }

  public function marketplace_subcategory_edit($id){
        $get_data = DB::table('gig_subcategories')
                    ->join('gig_home_category', 'gig_subcategories.category_id', '=', 'gig_home_category.id')
                     ->select('gig_subcategories.*', 'gig_home_category.category_name')
                    ->where('gig_subcategories.id', $id)
                    ->first();
            // get category
            $get_category = DB::table('gig_home_category')->get();
                          
            $output = '';      
            $output .= '
              <input type="hidden" name="id" value="'.$get_data->id.'">
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

  public function marketplace_subcategory_delete($id) {
     $get_data = DB::table('gig_subcategories')->where('id', $id)->delete();

      if($get_data){
          echo "Data successfully deleted.";
      }else{
          echo "Sorry Data not deleted.";
      }
  }
  

  public function gig_pricescope(){
    $get_data = DB::table('gig_metadatas')
                ->join('gig_subcategories', 'gig_metadatas.filter_id', '=', 'gig_subcategories.id')
                ->select('gig_metadatas.*', 'gig_subcategories.subcategory_name')
                ->where('gig_metadatas.filter_type', 'price')
                ->get();

    return view('admin.marketplace.price-scope')->with(compact('get_data'));
  }

    public function insert_pricescope(Request $request){
      $insertOrupdate = gig_metadata::where('sub_filter_id', $request->id)->first();
        $data = [
          'sub_filter_name' => $request->gig_pricescope,
          'filter_id' => $request->category_id,
          'filter_type' => $request->filter_type,
          
        ];

        if($insertOrupdate){
            $success = gig_metadata::where('sub_filter_id', $request->id)->update($data);
            if($success){
              Toastr::success('Price scope update successfully');
           }else{
              Toastr::error('Sorry price scope not updated.'); 
           }
        }
        else{
            $success = gig_metadata::create($data);
            if($success){

              Toastr::success('Price scope inserted successfully');
           }else{
              Toastr::error('Sorry price scope not insert.'); 
           }
        } 
      return redirect('admin/marketplace/gig-pricescope');
    }

      // edit gig_pricescope data
  public function marketplace_pricescope_edit($id){
      $get_subfilter = DB::table('gig_metadatas')
                ->join('gig_subcategories', 'gig_metadatas.filter_id', '=', 'gig_subcategories.id')
                ->select('gig_metadatas.*', 'gig_subcategories.id')
                ->where('gig_metadatas.sub_filter_id', $id)
                ->where('gig_metadatas.filter_type', 'price')
                ->first();

               $get_subcategory = DB::table('gig_subcategories')->get();

              $output = '';      
              $output .= '
                <input type="hidden" name="id" value="'.$get_subfilter->sub_filter_id.'">
                <div class="input-container">
                  <div class="input-container">
                    <label class="rl-label">Sub Filter Name</label>
                    <input name="gig_pricescope" value="'.$get_subfilter->sub_filter_name.'" type="text" id="" placeholder="Enter sub filter name here...">
                    <input name="filter_type" value="price" type="hidden">
                  </div>
                    </div>

                    <div class="input-container">
                  <label for="Category" class="rl-label required">Filter type</label>
                  <label for="Category" class="select-block">
                    <select name="category_id" id="Category">';

                      foreach($get_subcategory as $show_subcategory){
                        $output .= '<option '. ($show_subcategory->id == $get_subfilter->filter_id ? "selected" : " " ) . ' value="'.$show_subcategory->id.'">'.$show_subcategory->subcategory_name.'</option>';
                      }
                      
                    $output .= '</select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                      <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                  </label>
                </div>';
     echo $output;
  }
  public function marketplace_pricescope_delete($id) {
      $get_data = gig_metadata::where('sub_filter_id', $id)->delete();

        if($get_data){
            echo "Data successfully deleted.";
        }else{
            echo "Sorry Data not deleted.";
        }
    }
    //theme option

    public function theme_category(){
        $get_category = DB::table('theme_category')->paginate(2);
        return view('admin.themeplace.category')->with(compact('get_category'));
    }

    public function create_theme_category(Request $request){
        $request->validate([
            'category_name' => 'required|unique:theme_category',
        ]);
        $data = [
            'category_name' => $request->category_name,
            'category_url' => str_slug($request->category_name),
            'sorting' => '',
            'status' =>  $request->status
         ];

         $insert = DB::table('theme_category')->insert($data);
         if($insert){
              Toastr::success('Category intert successfully');
           }else{
              Toastr::error('Sorry category not interted.'); 
           }
          return back();
        
    }


    public function theme_subcategory(){
      $get_category = DB::table('theme_category')->get();
      return view('admin.themeplace.subcategory')->with(compact('get_category'));
    }

    public function create_theme_subcategory(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:theme_subcategory',
        ]);
        $data = [
            'subcategory_name' => $request->subcategory_name,
            'subcategory_url' => str_slug($request->subcategory_name),
            'category_id' => $request->category_id,
            'status' =>  $request->status
        ];
        $insert = DB::table('theme_subcategory')->insert($data);
         if($insert){
            Toastr::success('Subcategory inserted successfully');
         }else{
            Toastr::error('Sorry subcategory not inserted.');
         }
         return back();
    } 

    public function theme_subchildcategory(){
         return view('admin.themeplace.subchild_category');
    }

    public function create_theme_subchildcategory(Request $request){
        $request->validate([
            'subchild_category_name' => 'required|unique:theme_subchild_category',
        ]);
        $data = [
            'subchild_category_name' => $request->subchild_category_name,
            'subchild_category_url' => str_slug($request->subchild_category_name),
            'subcategory_id' => $request->subcategory_id,
            'status' =>  $request->status
        ];
        $insert = DB::table('theme_subchild_category')->insert($data);
         if($insert){
            Toastr::success('sub childcategory inserted successfully');
         }else{
            Toastr::error('sorry sub childcategory not inserted.');
         }
      return back();
    }


    // workplace category 

    public function workplace_category(){
        $get_category = DB::table('workplace_category')->get();
        return view('admin.workplace.category')->with(compact('get_category'));
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
            if($success){
              Toastr::success('Inserted successfully', 'Category');
           }else{
              Toastr::error('Sorry category not inserted.'); 
           }
        }
        else{
            $success = DB::table('workplace_category')->insert($data);
            if($success){
              Toastr::success('update successfully', 'Category');
           }else{
              Toastr::error('Sorry category not updated.'); 
           }
        }
        return back();
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
                        <option '. ($get_category->status == 1 ? "selected": " ") .' value="1">Active</option>
                        <option '. ($get_category->status == 2 ? "selected": " ") .' value="2">Unactive</option>
                        
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

    public function workplace_category_delete($id) {
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
       
        return view('admin.workplace.subcategory')->with(compact('get_subcategory'));
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
