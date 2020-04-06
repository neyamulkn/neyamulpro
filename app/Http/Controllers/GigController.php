<?php

namespace App\Http\Controllers;

use App\gig;
use Illuminate\Http\Request;
use App\gig_subcategory;
use App\gig_basic;
use App\gig_metadata;
use App\question_answer;
use App\gig_price;
use App\gig_feature;
use App\gig_requirement;
use App\gig_image;
use App\filter;
use App\gig_metadata_filter;
use App\filter_subcategory;
use Image;
use Redirect;
use Toastr;
use DB;
use Auth;
class GigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create_gig()
    {
        return view('backend/gigs');
    }

    //get subcategory by category
    public function get_subcategory(Request $request)
    {
        $category_id = $request->category_id;
        $get_category = gig_subcategory::where('category_id', $category_id)->get();
        if($get_category){
                echo '<option value="">select sub category</option>';
            foreach ($get_category as $category) {
                echo '
                 <option value="'.$category->id.'">'.$category->subcategory_name.'</option>';
            }
        }
    }

    // get filter by sub category and get meta data by filter id
    public function get_medata(Request $request){
        $get_filter_data = filter_subcategory::with('metadata')
        ->where('subcategory_id', $request->subcategory_id)
        ->join('filters', function ($join) {
            $join->on('filter_subcategories.filter_id', '=', 'filters.filter_id');
        })
        ->where('filters.mete_tag', 'Yes')->get(); // get all data for filter table
       
        $metadata_array = gig_metadata_filter::where('gig_id', $request->gig_id)->pluck('metadata_id')->toArray();
      
        if(count($get_filter_data)>0){
            echo view('backend.marketplace.filter-subfilter')->with(compact('get_filter_data', 'metadata_array'));
        }
    }


    // git edit form 1st step
    public function gig_step($url)
    {

        $get_user_id = Auth::user()->id;
        $get_data = gig_basic::where('gig_url', $url)->where('gig_user_id', $get_user_id)->first();

        if($get_data){
            return view('backend/marketplace/gig-step')->with(compact('get_data'));
        }else{
            return redirect('/hotlancer/error');
        }
    }

    // gig insert or update 1st step
    public function insert_gig(Request $request)
    {

        $request->validate([
            'gig_title' => 'required',
            'category_id' => 'required',
            'gig_payment_type' => 'required'
        ]);
        $get_id = Auth::user()->id;
        $update =  $insert = $filter_id = '';

        $gig_url = ($request->slug) ? $request->slug : $this->createSlug($request->gig_title);

        if(isset($request->filter_id)){
            $filter_id = implode(',', $request->filter_id);
        }

        $alldata = [
            'gig_title'=> $request->gig_title,
            'gig_url'=> $gig_url,
            'category_name'=> $request->category_id,
            'gig_subcategory'=> $request->subcategory,
            'gig_metadata'=> $filter_id,
            'gig_payment_type'=> $request->gig_payment_type,
            'gig_search_tag'=> strtolower($request->gig_search_tag),
            'gig_user_id'=> $get_id,
        ];

        $insertOrupdate = gig_basic::where('gig_url', $gig_url)->where('gig_user_id', $get_id)->first();

        if($insertOrupdate){

           $update = gig_basic::where('gig_url', $gig_url)->update($alldata);

            if(isset($request->gig_metadata) && $update)
            {
                //detele all metadata then again insert
                gig_metadata_filter::where('gig_id', $insertOrupdate->gig_id)->delete();

                foreach ($request->gig_metadata as $gig_metadata)
                {
                    $data = [
                        'gig_id' => $insertOrupdate->gig_id,
                        'metadata_id' => $gig_metadata
                    ];

                    gig_metadata_filter::create($data);
                }
            }
            if($update){Toastr::success('Gig update successfully');}else{ Toastr::error('Sorry gig did not update successfully'); }
           
        }else{
            $alldata = array_merge($alldata, ['gig_status' => 'draft']);
            $insert = gig_basic::create($alldata);

            if(isset($request->gig_metadata)){
                foreach ($request->gig_metadata as $gig_metadata) {
                    $data = [
                        'gig_id' => $insert->gig_id,
                        'metadata_id' => $gig_metadata
                    ];

                   $succcess = gig_metadata_filter::create($data);

                }
            }
            if($insert){Toastr::success('Gig inserted successfully');}else{ Toastr::error('Sorry gig did not insert successfully'); }
            
        }
        if($update != null || $insert != null){
            return redirect::route('gig_step_second', $gig_url);
        }else{
            Toastr::success('Sorry something is wrong.');
            return back();
        }
       
    }

    // get 2nd step form with get data
    public function gig_step_second($gig_url){
        $user_id = Auth::user()->id;
        $get_data = gig_basic::leftJoin('gig_prices', function($join){
            $join->on('gig_basics.gig_id', '=', 'gig_prices.gig_id');
        })
        ->where('gig_basics.gig_url', $gig_url)
        ->where('gig_basics.gig_user_id', $user_id)
        ->first();

        if($get_data){
            $gig_id = $get_data->gig_id;
            $filters = gig_metadata::with(['gig_feature' => function($query) use ($gig_id){
                        $query->where('gig_id',  $gig_id); }])
                        ->join('filter_subcategories', function($join){
                            $join->on('gig_metadatas.filter_id', '=', 'filter_subcategories.filter_id');
                        })
                        ->where('filter_subcategories.subcategory_id', $get_data->gig_subcategory)
                        ->where('gig_metadatas.filter_type', 'Yes')->get();
                         
            return view('backend.marketplace.gig-step2')->with(compact('get_data','filters'));
        }else{
            return back();
        }
    }
    // insert or update 2nd step
    public function insert_gig_step_second(Request $request, $gig_url)
    {

        $request->validate([
            'basic_title' => 'required',
            'basic_dsc' => 'required',
            'delivery_time_b' => 'required',
            'rivision_b' => 'required',
            'basic_p' => 'required'
        ]);
        
        $get_user_id = Auth::user()->id;
        

        $check = gig_basic::where('gig_url', $gig_url)->where('gig_user_id', $get_user_id)->first();
        $gig_id = $check->gig_id;

        $data = [
            'basic_title' => $request->basic_title,
            'plus_title' => $request->plus_title,
            'super_title' => $request->super_title,
            'platinum_title' => $request->platinum_title,
            'basic_dsc' => $request->basic_dsc,
            "plus_dsc" =>  $request->plus_dsc,
            "super_dsc" =>  $request->super_dsc,
            "platinum_dsc" =>  $request->platinum_dsc,
            "delivery_time_b" =>  $request->delivery_time_b,
            "delivery_time_p" =>  $request->delivery_time_p,
            "delivery_time_s" =>  $request->delivery_time_s,
            "delivery_time_pm" =>  $request->delivery_time_pm,
            "rivision_b" =>  $request->rivision_b,
            "rivision_p" =>  $request->rivision_p,
            "rivision_s" =>  $request->rivision_s,
            "rivision_pm" =>  $request->rivision_pm,
            "daily_work_b" =>  $request->daily_work_b,
            "daily_work_p" =>  $request->daily_work_p,
            "daily_work_s" =>  $request->daily_work_s,
            "daily_work_pm" =>  $request->daily_work_pm,
            "basic_p" => $request->basic_p,
            "plus_p" => $request->plus_p,
            "super_p" =>$request->super_p,
            "platinum_p" => $request->platinum_p,
            'user_id' => $get_user_id, 
            "gig_id" => $gig_id,
              
        ];

      
        $match = ['user_id' => $get_user_id, "gig_id" => $gig_id];

        $updateOrCreate = gig_price::updateOrCreate($match, $data); // updateOrCreate all data

        if($updateOrCreate){
            if(isset($request->feature_id)){
                gig_feature::where('gig_id', $updateOrCreate->gig_id)->delete();
                for($i=0; $i<count($request->feature_id); $i++){

                    $feature_data = [
                        'gig_id' => $gig_id,
                        'user_id' => $get_user_id,
                        'feature_id' => $request->feature_id[$i],
                        'feature_name' => $request->feature_name[$i],
                        'feature_basic' => isset($request->feature_basic[$i]) ? 'Yes' : 'No',
                        'feature_plus' => isset($request->feature_plus[$i]) ? 'Yes' : 'No',
                        'feature_super' => isset($request->feature_super[$i]) ? 'Yes' : 'No',
                        'feature_platinum' => isset($request->feature_platinum[$i]) ? 'Yes' : 'No',
                    ];

                    gig_feature::create($feature_data);
                }
            }
           return redirect::route('gig_step_third', $gig_url);

        }else{
            return back();
        }
    
    }

    //insert or edit form 3rd step
    public function gig_step_third($url)
    {
        
        $user_id = Auth::user()->id;
        $get_data = gig_basic::with('questionAnswer')->where('gig_url', $url)->where('gig_user_id', $user_id)->first();

        if($get_data){
            return view('backend.marketplace.gig-step3')->with(compact('get_data'));
        }else{
            return redirect('/hotlancer/error');
        }
    }


    public function insert_gig_step_third(Request $request, $gig_url)
    {
        $get_user_id = Auth::user()->id;
        $gig_id = $request->gig_id;
      
       
            $gig_dsc = $request->gig_dsc;
            //update gig description
            $succcess = gig_basic::where('gig_id', $gig_id)->where('gig_user_id', $get_user_id)->update(['gig_dsc' => $gig_dsc]);
            if($succcess){

                if($request->question){ // if question set Remains
                   for($i=0; $i<count($request->question); $i++){
                        $alldata = [
                            'gig_id' => $gig_id,
                            'user_id' => $get_user_id,
                            'question' => $request->question[$i],
                            'answer' => $request->answer[$i]
                        ];

                        question_answer::create($alldata);
                    }
                }

                if($request->update_ques_ans){ // if question update
                   for($j=0; $j<count($request->update_ques_ans); $j++){
                        $update_ques_ans = $request->update_ques_ans[$j];
                        $alldata = [
                            'question' => $request->update_question[$j],
                            'answer' => $request->update_answer[$j]
                        ];

                        question_answer::where('id', $update_ques_ans)->update($alldata );
                    }
                }

               return redirect::route('gig_step_fourth', $gig_url);
            }else{
                return back();
            }
        
    }

    //insert or edit form 4th step
    public function gig_step_fourth($url)
    {
     
        $user_id = Auth::user()->id;
        $get_data = gig_basic::with('gig_requirement')->where('gig_url', $url)->where('gig_user_id', $user_id)->first();

        if($get_data){
            return view('backend.marketplace.gig-step4')->with(compact('get_data'));
        }else{
            return redirect('/hotlancer/error');
        }
    }

    public function insert_gig_step_fourth(Request $request, $gig_url)
    {
        $user_id = Auth::user()->id;
        $gig_id = $request->gig_id;

        $match = ['gig_id' => $gig_id];
      
        $succcess = gig_requirement::updateOrCreate($match, ['requirement' => $request->requirement]);
        if($succcess){
            return redirect::route('gig_step_five', $gig_url);
        }else{
            return back();
        }

    }


        //insert or edit form 4th step
    public function gig_step_five($url)
    {
     
        $user_id = Auth::user()->id;
        $get_data = gig_basic::with('get_allImage')->where('gig_url', $url)->where('gig_user_id', $user_id)->first();
        
        if($get_data){
            return view('backend.marketplace.gig-step5')->with(compact('get_data'));
        }else{
            return redirect('/hotlancer/error');
        }
    }



    public function insert_gig_step_five(Request $request,  $gig_url)
    {
        // $request->validate([
        //     'file' => 'image|mimes:jpeg,png,jpg,gif'
        // ]);

        $user_id = Auth::user()->id;
    	$allowedfileExtension=['jpg', 'jpeg', 'png', 'gif'];
        $check = gig_basic::where('gig_user_id', $user_id)->where('gig_url', $gig_url)->first();
        if($check || $request->hasFile('file')){
            if($request->hasFile('file')){
                $images = $request->file('file');
                foreach ($images as $image) {

    				$extension = $image->getClientOriginalExtension();
    				$check = in_array($extension, $allowedfileExtension);
    				if($check)
    				{
    	                $image_name = rand('123456', '999999').$image->getClientOriginalName();
    	                $image_path = public_path('gigimages/'.$image_name );
    	                Image::make($image)->save($image_path);

    	                $data = [
    	                    'gig_id' => $request->gig_id,
                            'user_id' => $user_id,
    	                    'image_path' => $image_name
    	                ];
    	               $succcess = gig_image::create($data);
    	            }else{
    	            	Toastr::error('Sorry Only Upload png, jpg, jpeg, gif');
                        return back();
    	            }
                }
           }
            return redirect::route('gig_step_finish', $gig_url);
        }else{
            Toastr::error('Please choose any image');
            return back();
        }
     
    }

    public function gig_step_finish($url){
        //dd($url);

        $user_id = Auth::user()->id;
        $get_data = gig_basic::with('get_allImage')->where('gig_url', $url)->where('gig_user_id', $user_id)->first();
        
        if($get_data){
            return view('backend.marketplace.gig-step6')->with(compact('get_data'));
        }else{
            return redirect('/hotlancer/error');
        }
    }
    public function gigimage_delete(Request $request){
        $user_id  = Auth::user()->id;
        $delete_image = gig_image::where('gig_id', $request->gig_id)->where('user_id', $user_id)->where('image_path', $request->image_path)->delete();
        $image_path = public_path('gigimages/'.$request->image_path );

        if(file_exists($image_path) && $delete_image){
            @unlink($image_path);
          
        }
        echo 'Image deleted successful.';
       
    }

    public function insert_gig_step_finish(Request $request, $gig_url)
    {

        $gig_id = $request->gig_id;
        $user_id = Auth::user()->id;

        $check = gig_basic::join('gig_prices', function($join){
            $join->on('gig_basics.gig_id', '=', 'gig_prices.gig_id');
        })
        ->join('gig_images', function($join){
            $join->on('gig_basics.gig_id', '=', 'gig_images.gig_id');
        })
        ->where('gig_basics.gig_url', $gig_url)
        ->where('gig_basics.gig_user_id', $user_id)
        ->first();


        $update = gig_basic::where('gig_url', $gig_url)->where('gig_user_id', $user_id)->update(['gig_status' => 'active']);
        if($update){
            Toastr::success('Gig successfully completed');
        }else{ Toastr::error('Sorry gig did not complete successfully'); }
        return redirect('dashboard/manage-gigs');
    }

    //manage gigs
    public function manage_gigs($status='active')
    {

        $user_id = Auth::user()->id;
        $get_gigs = gig_basic::with(['get_image', 'gigOrder']);
        
        // check Whether admin 
        if(Auth::user()->role_id != env('ADMIN')){
            $get_gigs = $get_gigs->where('gig_user_id' , '=', $user_id);
        }

        // check status Whether  all
        if($status != 'all'){ 
            $get_gigs = $get_gigs->where('gig_status' , '=', $status); 
        }
        $get_gigs = $get_gigs->where('gig_status', '!=', 'delete')->orderBy('gig_id', 'DESC')->groupBy('gig_id')->paginate(10);

        //check ajax request  
        if(!isset($_GET['ajaxRequest'])){
            if(Auth::user()->role_id == env('ADMIN')){
                return view('admin.marketplace.manage')->with(compact('get_gigs')); 
            }
            return view('backend.gig-view')->with(compact('get_gigs'));
        }else{ //if isset ajaxRequest then 
            if(count($get_gigs)>0){
                echo view('backend.marketplace.gigByStatus')->with(compact('get_gigs'));
            }else{ echo 'No '.$status. ' gigs found.'; }
        }
    }

    public function gigStatusCng(Request $request){ 
        $user_id = Auth::user()->id;
        $find_gig = gig_basic::where('gig_id', $request->gig_id);
        if(Auth::user()->role_id != env('ADMIN')){
            $find_gig = $find_gig->where('gig_user_id' , $user_id);
        }
        $find_gig = $find_gig->update(['gig_status' => $request->status]);

        if($find_gig){
            echo 'Gig ' .$request->status.' successfully ';
        }else{
            return false;
        }
        
        
    }

    public function gig_delete(Request $request)
    {
        $user_id = Auth::user()->id;
        $delete = gig_basic::where('gig_id', $request->gig_id)->where('gig_user_id', $user_id)->update(['gig_status' => 'delete']);
        if($delete){
            echo 'Gig deleted successfully.';
           
        }else{
            echo 'Sorry gig not deleted.';
        }

    }

    public function question_answer_delete(Request $request)
    {

        question_answer::where('id', $request->ques_ans_id)->delete();

    }


        // create theme unique slug 
    public function createSlug($slug)
    {
      $slug = str_slug($slug);
      $check_slug = gig_basic::select('gig_url')->where('gig_url', 'like', $slug.'%')->get();

      if (count($check_slug)>0){
        //find slug until find not used.
        for ($i = 1; $i <= count($check_slug); $i++) {
            $newSlug = $slug.$i;
            if (!$check_slug->contains('gig_url', $newSlug)) {
              return $newSlug;
            }
        }
      }else{ return $slug; }   
    }



}
