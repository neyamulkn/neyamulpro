<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gig_home_category;
use App\gig_subcategory;
use App\gig_metadata;
use App\PaymentMethod;
use App\User;
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
      $get_category = DB::table('gig_home_category')->orderBy('id', 'DESC')->get();
     	return view('admin.marketplace.gig-category')->with(compact('get_category'));
    }

    public function create_gig_category(Request $request){
      $request->validate([
          'category_name' => 'required',
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
      
      echo view('admin.editpages.category-edit')->with(compact('get_category'));
    }

    public function marketplace_category_delete($id){
        $delete = DB::table('gig_home_category')->where('id', $id)->delete();

        if($delete){
            echo "Data successfully deleted.";
        }else{
            echo "Sorry data not deleted.";
        }
    }

    public function gig_subcategory(){
      $get_subcategory = DB::table('gig_subcategories')
        ->join('gig_home_category', 'gig_subcategories.category_id', '=', 'gig_home_category.id')
        ->select('gig_subcategories.*', 'gig_home_category.category_name')
        ->orderBy('id', 'DESC')->get();
       return view('admin.marketplace.gig-subcategory')->with(compact('get_subcategory'));
    }


  public function marketplace_subcategory(Request $request){
        $request->validate(['subcategory_name' => 'required',]);

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
          
        }
        else{
            $success = gig_subcategory::create($data);
            if($success){

              Toastr::success('Sub category inserted successfully');
           }else{
              Toastr::error('Sorry sub category not insert.'); 
           }
         
        } 	
    return back();	
  }

  public function marketplace_subcategory_edit($id){
    $data = [];
    $data['get_data'] = DB::table('gig_subcategories')
        ->join('gig_home_category', 'gig_subcategories.category_id', '=', 'gig_home_category.id')
        ->select('gig_subcategories.*', 'gig_home_category.category_name')
        ->where('gig_subcategories.id', $id)
        ->first();
        // get category
    $data['get_category'] = DB::table('gig_home_category')->get();
 
    echo view('admin.editpages.subcategory-edit')->with($data);
  }   

  public function marketplace_subcategory_delete($id) {
     $delete = DB::table('gig_subcategories')->where('id', $id)->delete();

      if($delete){
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
      return back();
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
      $delete = gig_metadata::where('sub_filter_id', $id)->delete();

        if($delete){
            echo "Data successfully deleted.";
        }else{
            echo "Sorry Data not deleted.";
        }
    }


    //theme option

    public function theme_category(){
        $get_category = DB::table('theme_category')->orderBy('id', 'DESC')->get();
        return view('admin.themeplace.category')->with(compact('get_category'));
    }

    public function create_theme_category(Request $request){
      
      $request->validate([
          'category_name' => 'required',
      ]);

      $insertOrupdate = DB::table('theme_category')->where('id', $request->id)->first();
        
      $data = [
        'category_name' => $request->category_name,
        'category_url' => str_slug($request->category_name),
        'sorting' => '',
        'status' =>  $request->status
      ];
      
      if($insertOrupdate){
            $success = DB::table('theme_category')->where('id', $request->id)->update($data);
            if($success){
              Toastr::success('update successfully', 'Category');
              echo "update";
           }else{ Toastr::error('Sorry category not updated.'); }
        }
        else{
            $success = DB::table('theme_category')->insert($data);
            if($success){ Toastr::success('Inserted successfully', 'Category');
            }else{ Toastr::error('Sorry category not insert.');} 
        }
      return back();
        
    }

    public function theme_category_edit($id){
        
      $get_category = DB::table('theme_category')->where('id', $id)->first();
      
      echo view('admin.editpages.category-edit')->with(compact('get_category'));
    }

    public function theme_category_delete($id){
        $delete = DB::table('theme_category')->where('id', $id)->delete();

        if($delete){
            echo "Data successfully deleted.";
        }else{
            echo "Sorry data not deleted.";
        }
    }



  public function theme_subcategory(){
    $get_category = DB::table('theme_category')->get();
    $get_subcategory = DB::table('theme_subcategory')
      ->join('theme_category', 'theme_subcategory.category_id', '=', 'theme_category.id')
      ->select('theme_subcategory.*', 'theme_category.category_name')
      ->orderBy('id', 'DESC')->get();
    return view('admin.themeplace.subcategory')->with(compact('get_category', 'get_subcategory'));
  }

  public function create_theme_subcategory(Request $request){
        $request->validate(['subcategory_name' => 'required', 'unique:theme_subcategory']);

        $insertOrupdate = DB::table('theme_subcategory')->where('id', $request->id)->first();
       
        $data = [
          'subcategory_name' => $request->subcategory_name,
          'subcategory_url' => str_slug($request->subcategory_name),
          'category_id' => $request->category_id,
          'status' =>  $request->status
        ];

        if($insertOrupdate){
            $success = DB::table('theme_subcategory')->where('id', $request->id)->update($data);
            if($success){
              Toastr::success('Sub category update successfully');
           }else{
              Toastr::error('Sorry Sub category not updated.'); 
           }
          
        }
        else{
            $success = DB::table('theme_subcategory')->insert($data);
            if($success){

              Toastr::success('Sub category inserted successfully');
           }else{
              Toastr::error('Sorry sub category not insert.'); 
           }
         
        }   
    return back();  
  }

  public function theme_subcategory_edit($id){
    $data = [];
    $data['get_data'] = DB::table('theme_subcategory')
        ->join('gig_home_category', 'theme_subcategory.category_id', '=', 'gig_home_category.id')
        ->select('theme_subcategory.*', 'gig_home_category.category_name')
        ->where('theme_subcategory.id', $id)
        ->first();
        // get category
    $data['get_category'] = DB::table('theme_category')->get();
 
    echo view('admin.editpages.subcategory-edit')->with($data);
  }   

  public function theme_subcategory_delete($id) {
     $delete = DB::table('theme_subcategory')->where('id', $id)->delete();

      if($delete){
          echo "Data successfully deleted.";
      }else{
          echo "Sorry Data not deleted.";
      }
  }
  

    public function theme_subchildcategory(){
      $subchild_categories = DB::table('theme_subchild_category')
       ->join('theme_subcategory', 'theme_subchild_category.subcategory_id', '=', 'theme_subcategory.id')->orderBy('theme_subchild_category.id', 'DESC')
       ->select('theme_subchild_category.*', 'theme_subcategory.subcategory_name')->get();
      return view('admin.themeplace.subchild_category')->with(compact('subchild_categories'));
    }

    public function create_theme_subchildcategory(Request $request){

        $request->validate([
            'subchild_category_name' => ['required', 'unique:theme_subchild_category,subchild_category_name,'. $request->id],
        ]);
        $data = [
            'subchild_category_name' => $request->subchild_category_name,
            'subcategory_id' => $request->subcategory_id,
            'status' =>  $request->status
        ];

        $find = DB::table('theme_subchild_category')->where('id', $request->id)->first();

        if($find){

          $update = DB::table('theme_subchild_category')->where('id', $request->id)->update($data);
          if($update){
            Toastr::success('Sub childcategory update successfully');
          }else{
            Toastr::error('Sorry sub childcategory not updated.');
          }
        }else{
          $data = array_merge(['subchild_category_url' => str_slug($request->subchild_category_name)], $data);
         
          $insert = DB::table('theme_subchild_category')->insert($data);
          if($insert){
            Toastr::success('Sub childcategory inserted successfully');
          }else{
            Toastr::error('Sorry sub childcategory not inserted.');
          }
       }
      return back();
    }

    public function theme_subchildcategory_edit($id){

        $data = [];
        $data['get_data'] = DB::table('theme_subchild_category')
            ->join('theme_subcategory', 'theme_subchild_category.subcategory_id', '=', 'theme_subcategory.id')->orderBy('theme_subchild_category.id', 'DESC')
            ->where('theme_subchild_category.id', $id)
            ->select('theme_subchild_category.*', 'theme_subcategory.subcategory_name')->first();
            // get category
        $data['get_category'] = DB::table('theme_subcategory')->get();
     
      echo view('admin.editpages.subChildCategory')->with($data);
    }

    public function theme_subchildcategory_delete($id) {
     $delete = DB::table('theme_subchild_category')->where('id', $id)->delete();

      if($delete){
          echo "Data successfully deleted.";
      }else{
          echo "Sorry Data not deleted.";
      }
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
              Toastr::success('update successfully', 'Category');
           }else{
              Toastr::error('Sorry category not updated.'); 
           }
        }
        else{
            $success = DB::table('workplace_category')->insert($data);
            if($success){
              Toastr::success('Inserted successfully', 'Category');
           }else{
              Toastr::error('Sorry category not inserted.'); 
           }
        }
        return back();
    }

    public function workplace_category_edit($id){
        
      $get_category = DB::table('workplace_category')->where('id', $id)->first();
      echo view('admin.editpages.category-edit')->with(compact('get_category'));                 
           
    }

    public function workplace_category_delete($id) {
         $delete = DB::table('workplace_category')->where('id', $id)->delete();

        if($delete){
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

        $insertOrupdate = DB::table('workplace_subcategory')->where('id', $request->id)->first();
        
        if($insertOrupdate){
            $success = DB::table('workplace_subcategory')->where('id', $request->id)->update($data);
            
          if($success){
              Toastr::success('update successfully', 'subcategory');
          }else{
              Toastr::error('Sorry subcategory not updated.'); 
          }
        }
        else{
            $success = DB::table('workplace_subcategory')->insert($data);
            if($success){
              Toastr::success('Inserted successfully', 'subcategory');
           }else{
              Toastr::error('Sorry category not inserted.'); 
           }
        }
        return back();
    }

    public function workplace_subcategory_edit($id){
      $data = [];
      $data['get_data'] = DB::table('workplace_subcategory')
        ->join('workplace_category', 'workplace_subcategory.category_id', '=', 'workplace_category.id')
        ->select('workplace_subcategory.*', 'workplace_category.category_name')
        ->where('workplace_subcategory.id', $id)
        ->first();

      $data['get_category'] = DB::table('workplace_category')->get();
      echo view('admin.editpages.subcategory-edit')->with($data);
    
    }

    public function workplace_subcategory_delete($id) {
         $delete = DB::table('workplace_subcategory')->where('id', $id)->delete();

        if($delete){
            echo "Data successfully deleted.";
        }else{
            echo "Sorry Data not deleted.";
        }
    }


    public function paymentMethod(){
      $get_method = PaymentMethod::all();
      $country = User::select('country')->groupBy('country')->get();
      return view('admin.paymentMethod')->with(compact('get_method','country'));
    }

    public function paymentMethodStore(Request $request){

      $insert = PaymentMethod::create($request->all());
      if($insert){
        Toastr::success('Payment method added successfully');
       }else{
        Toastr::error('Payment method can\'t added');
       }
     
      return back();
    }

    public function paymentMethodEdit($id){
      $get_method = PaymentMethod::find($id);
      $country = User::select('country')->groupBy('country')->get();
      echo view('admin.paymentMethodEdit')->with(compact('get_method','country'));
    }

    public function paymentMethodUpdate(Request $request){
        $get_method = PaymentMethod::find($request->id);
        $data = $request->except(['_token']);
        if($get_method){
            $update = PaymentMethod::where('id', $request->id)->update($data);
            Toastr::success('Update successfull.');
        }else{
          Toastr::error('Sorry update faild.');
        }
        return back();
        
    }

    
    public function paymentMethodDelete($id){
        PaymentMethod::where('id', $id)->delete();
        echo "delete successfully";
    }


    
}
