<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use DB;
use Auth;
use Validator;
use App\theme;
use Exception;
use Toastr;
use Redirect;
class themeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$get_categories = DB::table('theme_category')->get();
    	return view('backend.theme.index')->with(compact('get_categories'));
    }
 
    public function search_tags(){
       $keyword_name = DB::table('key_keyword')->select('keyword_name')->get();
       $tags = array(); 
       foreach ($keyword_name as $value) {
           array_push($tags, $value->keyword_name);
       }
        echo json_encode($tags);
    }
    // insert title theme upload first step
    public function theme_upload_title(Request $request){
    	$user_id = Auth::user()->id;
    	$url = $this->createSlug($request->theme_name);
    	$data = [
			    'user_id' => $user_id,
			    'theme_name' => $request->theme_name,
			    'theme_url' => $url,
			    'category_id' => $request->category_id,
          'status' => 'draft'
			];

			$insert_id = theme::create($data);

			if($insert_id){
				Toastr::success('Theme upload first step successfully completed.');
				return redirect('dashboard/themeplace/upload/'.$url);
			}else{
				Toastr::error('Sorry something is wrong theme insert failed');
				//return back();
			}
		}
    // create theme unique slug 
    public function createSlug($slug)
    {
      $slug = str_slug($slug);
      $check_slug = theme::select('theme_url')->where('theme_url', 'like', $slug.'%')->get();

      if (count($check_slug)>0){
        //find slug until find not used.
        for ($i = 1; $i <= count($check_slug); $i++) {
            $newSlug = $slug.'-'.$i;
            if (!$check_slug->contains('theme_url', $newSlug)) {
              return $newSlug;
            }
        }
      }else{ return $slug; }   
    }
    // theme upload second step 
    public function theme_upload_form($url){

      $data = [];
      $user_id = Auth::user()->id;
    	$get_theme = theme::where('theme_url', $url);
      if(Auth::user()->role_id != env('ADMIN')){
        $get_theme = $get_theme->where('user_id', $user_id);
      }
      $data['get_theme'] = $get_theme->first();

      if($data['get_theme'])
      {
    		$data['get_subcategory'] = DB::table('theme_subcategory')->where('category_id', $data['get_theme']->category_id)->get();

        $data['get_childcategory'] = DB::table('theme_subchild_category')->where('subcategory_id', $data['get_theme']->sub_category)->get();
    	//dd($data['get_childcategory']);
    		$data['get_filters'] = DB::table('theme_filter_categories')
        ->join('theme_filters', 'theme_filter_categories.filter_id','theme_filters.filter_id')
        ->where('theme_filter_categories.category_id', $data['get_theme']->category_id)->orderBy('type', 'ASC')->get();

        if(Auth::user()->role_id == env('ADMIN')){
          return view('admin.themeplace.review-theme')->with($data);
        }
    		return view('backend.theme.theme-upload')->with($data);
    	    	
    	}else{
        Toastr::error('Sorry invalid theme url.');
    		return back();
    	}     
    }
    // get child category by sub category
    public function getChild(Request $request){

      $get_childcategory = DB::table('theme_subchild_category')->where('subcategory_id', $request->subcategory_id)->get();

      if(count($get_childcategory)>0){

          $childcategory_id = theme::where('theme_id',  $request->theme_id)->first();

          $output = '
              <label class="ttinput-groupt" for="name">Subchild category </label>
              <div class="inputs">
                <label for="sv" class="select-block va">
                  <select required="required" name="child_category" >
                    <option value="">Select child category</option>';
                    foreach($get_childcategory as $childcategory){
                      $output .= '<option '. ( $childcategory->id == $childcategory_id->child_category ? 'selected' : '' ).' value="'.$childcategory->id.'">'. $childcategory->subchild_category_name.'</option>';
                    }
              $output .= '</select>
                  <svg class="svg-arrow"><use xlink:href="#svg-arrow"></use> </svg>
              </label>
              <small class="ttinput-group">Does this layout stretch when resized horizontally (liquid)? Or does it stay the same (fixed)?</small>
            </div>';
        echo $output;
      }       
    }
    //main file upload theme by ajax
    public function file_upload(Request $request)
        {
         $rules = array(
          'uploadFile'  => 'required|max:307200'
         );

         $error = Validator::make($request->all(), $rules);

         if($error->fails())
         {
            return response()->json(['errors' => $error->errors()->all()]);
         }
         $uploadFile = $request->file('uploadFile');

         $new_name = rand() . '.' . $uploadFile->getClientOriginalExtension();
         $uploadFile->move(public_path('theme/zipfile'), $new_name);

        $theme_id = $request->theme_id;
     	  $data = ['main_file' => $new_name ];
        $insert_id = theme::where('theme_id',  $theme_id)->update($data);
        $output = array(
             'success' => '<span  onclick="remove_item('.$theme_id.', \'file\')" class="button dark-light square">
                    <img src="'.asset('/allscript/images/dashboard/close-icon-small.png').'" alt="close-icon">
                  </span>',
             'image'  => '<input type="hidden" form="main_form" name="main_file" value="'.$new_name.'"><a href="'.$new_name.'"/><i class="fa fa-paperclip" aria-hidden="true"></i> '.$new_name.' </a>'
            );

      return response()->json($output);
    }
    //main image upload by ajax
    public function image_upload(Request $request)
    {
       $rules = array(
        'uploadImage'  => 'required|max:2048'
       );

       $error = Validator::make($request->all(), $rules);

       if($error->fails())
       {
          return response()->json(['errors' => $error->errors()->all()]);
         }
        $uploadImage = $request->file('uploadImage');

        $new_name = rand().Auth::user()->id . '.' . $uploadImage->getClientOriginalExtension();

        $image_path = public_path('theme/images/thumb/'.$new_name );
        $image_resize = Image::make($uploadImage);
        $image_resize->resize(330, 195);
        $image_resize->save($image_path);

      	$uploadImage->move(public_path('theme/images'), $new_name);
      	$theme_id = $request->theme_id;
       	$data = ['main_image' => $new_name ];
      	$insert_id = theme::where('theme_id',  $theme_id)->update($data);

         $output = array(
             'success' => '<span onclick="remove_item('.$theme_id.', \'image\')" class="button dark-light square">
                    <img src="'.asset('allscript/images/dashboard/close-icon-small.png').'" alt="close-icon">
                  </span>',
             'image'  => '<input type="hidden" form="main_form" name="main_image" value="'.$new_name.'"> 
             <img src="'.asset('theme/images/'.$new_name).'" width="90" height="50"/>'
            );

        return response()->json($output);
    }

  // insert theme 
  public function insert_theme(Request $request){

		  $user_id = Auth::user()->id;
   
    	try{
	    	// theme source file
			 $main_file = $request->file('main_file');
			 $main_image = $request->file('main_image');
			 $theme_url = $request->theme_url;
	     $search_tag = $request->search_tag;
			 $data = [
			    'theme_name' => $request->theme_name,
			    'summary' => $request->summary,
			    'description' => $request->description,
			    'sub_category' => $request->sub_category,
          'child_category' => $request->child_category,
			    'demo_url' => $request->demo_url,
			    'screenshort_url' => $request->screenshort_url,
			    'search_tag' => strtolower($search_tag),
			    'price_regular' => $request->price_regular,
			    'price_extented' => $request->price_extented,
			  	'status'  => 'pending'
		  	];
          
		  	$insert_id = theme::where('theme_id',  $request->theme_id)->update($data);
        
		  	if($insert_id)
		  	{
          DB::table('theme_features')->where('theme_id', $request->theme_id)->delete();
		  		if(isset($request->radio)){
		      foreach($request->radio as $feature_id => $feature_name){
	            	$data = [
    					    'theme_id' => $request->theme_id,
    					    'feature_type' => 'radio',
    					    'feature_id' => $feature_id,
    					    'feature_name' => $feature_name
      					];
      					DB::table('theme_features')->insert($data);
			        }
			    }

			    if(isset($request->selectbox)){
            foreach($request->selectbox as $feature_id => $array_name){
              if(is_array($request->$array_name)){
                foreach($request->$array_name as $key => $feature_name){
                  $data = [
                    'theme_id' => $request->theme_id,
                    'feature_type' => 'select',
                    'feature_id' => $feature_id,
                    'feature_name' => $feature_name
                ];
      					DB::table('theme_features')->insert($data);
      					 
			        }
            } 
          }
			 }

			    if(isset($request->dropdown)){
		            foreach($request->dropdown as $feature_id => $feature_name){
		            	$data = [
      					    'theme_id' => $request->theme_id,
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

      					 DB::table('theme_additiona_img')->insert(['theme_id' => $request->theme_id, 'theme_additiona_img' => $additional_image_newname]);
      			   }
			    }

        	Toastr::success('Thanks your theme insert successfully completed.');
        	return redirect(route('manage_theme', 'pending'));
        
		  	}else{
		  		Toastr::error('Sorry something is wrong theme insert failed');
		  	}
		}catch(\Exception $e){
	    	Toastr::error($e->getMessage());
	    }
    return back();
	}

  // manage theme by status
	public function manage_theme($status='active'){

		$user_id = Auth::user()->id;
        //count theme status  (active, pending etc)
        $get_status = DB::table('themes');
        if(Auth::user()->role_id != env('ADMIN')){
            $get_status = $get_status->where('themes.user_id' , '=', $user_id);
        }
        $get_status = $get_status->get();

        // show theme by status
        $get_theme_info = DB::table('themes')
            ->join('users', 'themes.user_id', 'users.id')
            ->leftJoin('theme_orders', 'themes.theme_id', 'theme_orders.theme_id')
            ->leftJoin('theme_category', 'themes.category_id', 'theme_category.category_url')
            ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.subcategory_url')
            ->selectRaw('themes.*, users.username, count(theme_orders.theme_id) total_sell, sum(theme_orders.total_price) total_earn');

            if(Auth::user()->role_id != env('ADMIN')){
              $get_theme_info = $get_theme_info->where('themes.user_id', $user_id);
            }

            if($status != 'all'){
                $get_theme_info = $get_theme_info->where('themes.status', $status)->where('themes.status', '!=', 'delete');
            }
           
            $get_theme_info = $get_theme_info->groupBy('themes.theme_id')->orderBy('themes.theme_id', 'DESC')->paginate(4);

        //check request ajax or direact url $_get for pagination ajax call
        if(!isset($_GET['type'])){
            if(Auth::user()->role_id == env('ADMIN')){
                return view('admin.themeplace.manage')->with(compact('get_theme_info', 'get_status')); 
            }
            return view('backend.theme.manage')->with(compact('get_theme_info', 'get_status')); 
        }else{
            // view page data by status 
            if(count($get_theme_info)>0){
              echo view('backend.theme/include/manage-themeview')->with(compact('get_theme_info'));
           
            }else{
                echo 'No '.$status. ' theme found.';
            }
        } 
  }

  public function themeStatusCng(Request $request){ 
        $user_id = Auth::user()->id;
        $find_theme = theme::where('theme_id', $request->theme_id);
        if(Auth::user()->role_id != env('ADMIN')){
            $find_theme = $find_theme->where('user_id' , $user_id);
        }
        $find_theme =$find_theme->first();

        if($request->status == 'paused' || $request->status == 'active'){
            if($find_theme->update(['status' => $request->status])){
                echo 'Job update '. $request->status;
            }else{
                return false;
            }
        }
        
    }

  // delete theme 
	public function delete_theme(Request $request)
    {
        $user_id = Auth::user()->id;
        
        try{
            $get_path = DB::table('themes')->where('theme_id', $request->theme_id);
              if(Auth::user()->role_id != env('ADMIN')){
                $get_path = $get_path->where('user_id', $user_id);
              }
             $get_path = $get_path->first(); 
            
            $image_path = public_path('theme/images/'.$get_path->main_image );
            if(file_exists($image_path)){
                @unlink($image_path);
            }

            $file_path = public_path('theme/zipfile/'.$get_path->main_file );
            if(file_exists($file_path)){
                @unlink($file_path);
            }

            $delete = DB::table('themes')->where('theme_id', $request->theme_id);
            if(Auth::user()->role_id != env('ADMIN')){
                $delete = $delete->where('user_id', $user_id);
            }
            $delete = $delete->delete();
            echo 'Theme deleted successfully.';  
        }catch(\Exception $e){
            return $e->getMessage();
        }
           
    }


    public function delete_folder_item(Request $request){
      $user_id = Auth::user()->id;
        
      $theme = theme::where('theme_id', $request->theme_id)->where('user_id', $user_id)->first();

      if($request->type == 'file'){
        $file_path = public_path('theme/zipfile/'.$theme->main_file );
        theme::where('theme_id', $request->theme_id)->where('user_id', $user_id)->update(['main_file' => null]);
      }else{
        $file_path = public_path('theme/images/'.$theme->main_image );
        $thumb_path = public_path('theme/images/thumb/'.$theme->main_image );
        if(file_exists($thumb_path)){
           @unlink($thumb_path);
        }
        theme::where('theme_id', $request->theme_id)->where('user_id', $user_id)->update(['main_image' => null]);
      }
      
      if(file_exists($file_path)){
        @unlink($file_path);
        echo $request->type .' successfully deleted.'; 
      }else{
        echo $request->type .' deleted field.'; 
      }
     
    }



}
