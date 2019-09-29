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
        echo json_encode($keyword_name);
    }

    public function theme_upload_title(Request $request){
    	$user_id = Auth::user()->id;
    	$url = $this->createSlug($request->theme_name);
    	$data = [
			    'user_id' => $user_id,
			    'theme_name' => $request->theme_name,
			    'theme_url' => $url,
			    'category_id' => $request->category_id
			];

			$insert_id = DB::table('themes')->insert($data);

			if($insert_id){
				Toastr::success('Theme upload first step successfully completed.');
				return redirect('dashboard/themeplace/upload/'.$url);
			}else{
				Toastr::error('Sorry something is wrong theme insert failed');
				return back();
			}
		}

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

    public function theme_upload_form($url){
        $user_id = Auth::user()->id;
    	$get_theme = theme::where('theme_url', $url)->where('user_id', $user_id)->first();

      	if($get_theme)
      	{
    		$get_subcategory = DB::table('theme_subcategory')->where('category_id', $get_theme->category_id)->get();
    	
    		$get_filters = DB::table('theme_filters')->where('category_id', $get_theme->category_id)->orderBy('type', 'ASC')->get();
    		
    		return view('backend.theme.theme-upload')->with(compact('get_theme','get_subcategory', 'get_filters'));
    	    	
    	}else{
    		return back();
    	}     
    }

    public function file_upload(Request $request)
        {
         $rules = array(
          'uploadFile'  => 'required|max:2048'
         );

         $error = Validator::make($request->all(), $rules);

         if($error->fails())
         {
            return response()->json(['errors' => $error->errors()->all()]);
         }
         $uploadFile = $request->file('uploadFile');

         $new_name = rand() . '.' . $uploadFile->getClientOriginalExtension();
         $uploadFile->move(public_path('theme/zipfile'), $new_name);

        $theme_url = $request->theme_url;
     	$data = ['main_file' => $new_name ];
    	$insert_id = theme::where('theme_url',  $theme_url)->update($data);
         $output = array(
             'success' => '<span  onclick="remove_item('.$new_name.')" class="button dark-light square">
                    <img src="'.asset('/allscript/images/dashboard/close-icon-small.png').'" alt="close-icon">
                  </span>',
             'image'  => '<input type="hidden" form="main_form" name="main_file" value="'.$new_name.'"><a href="'.$new_name.'"/><i class="fa fa-paperclip" aria-hidden="true"></i> '.$new_name.' </a>'
            );

          return response()->json($output);
    }

    function image_upload(Request $request)
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

    	$new_name = rand() . '.' . $uploadImage->getClientOriginalExtension();
    	$uploadImage->move(public_path('theme/images'), $new_name);
    	$theme_url = $request->theme_url;
     	$data = ['main_image' => $new_name ];
    	$insert_id = theme::where('theme_url',  $theme_url)->update($data);

         $output = array(
             'success' => '<a href="#" onclick="remove_file('.$new_name.')" class="button dark-light square">
                    <img src="'.asset('/allscript/images/dashboard/close-icon-small.png').'" alt="close-icon">
                  </a>',
             'image'  => '<input type="hidden" form="main_form" name="main_image" value="'.$new_name.'"> 
             <img src="'.asset('/theme/images/'.$new_name).'" width="90" height="50"/>'
            );

          return response()->json($output);
    }

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
			    'demo_url' => $request->demo_url,
			    'screenshort_url' => $request->screenshort_url,
			    'search_tag' => strtolower($search_tag),
			    'price_regular' => $request->price_regular,
			    'price_extented' => $request->price_extented,
			  	'status'  => '1'
		  	];
		  	$insert_id = theme::where('theme_url',  $theme_url)->update($data);
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

            	Toastr::success('Thanks your theme insert successfully completed.');
            	return redirect(route('manage_theme'));
        
		  	}else{

		  		Toastr::error('Sorry something is wrong theme insert failed');
            	return back();
		  	}
		}catch(\Exception $e){
	    	Toastr::error($e->getMessage());
            return back();
	    }
	}

	public function manage_theme(){
		$user_id = Auth::user()->id;
		 $data['get_theme_info'] = DB::table('themes')
                ->leftJoin('theme_orders', 'themes.theme_id', 'theme_orders.theme_id')
                ->leftJoin('theme_category', 'themes.category_id', 'theme_category.category_url')
                ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.subcategory_url')
                ->selectRaw('themes.*, count(theme_orders.theme_id) total_sell, sum(theme_orders.total_price) total_earn, theme_category.category_name, theme_subcategory.subcategory_name')
                ->where('themes.user_id', $user_id)
                ->groupBy('themes.theme_id')->paginate(3);
        
         	return view('backend.theme.manage')->with($data); 
	}

	public function delete_theme(Request $request)
    {
        $user_id = Auth::user()->id;
        
        try{
            $get_path = DB::table('themes')->where('theme_id', $request->theme_id)->first(); 
            
            $image_path = public_path('theme/images/'.$get_path->main_image );
            if(file_exists($image_path)){
                @unlink($image_path);
            }

            $file_path = public_path('theme/zipfile/'.$get_path->main_file );
            if(file_exists($file_path)){
                @unlink($file_path);
            }

            DB::table('themes')->where('user_id', $user_id)->where('theme_id', $request->theme_id)->delete();
            
            echo 'Theme deleted successfully.';  
        }catch(\Exception $e){
            return $e->getMessage();
        }
           
    }



}
