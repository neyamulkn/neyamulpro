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
use Image;
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

    public function get_medata(Request $request)
    {
        $subcategory_id = $request->subcategory_id; // 

        $get_filter_data = filter::where('mete_tag', 'Yes')->get(); // get all data for filter table
        $f=0;
        if($f == 0){echo  '<div class="tab">'; }
        foreach($get_filter_data as $filter_data){
            $create_array = explode(',', $filter_data->sub_category_id); //convert array for check 
           
            for($i=0; $i<count($create_array); $i++){
                if($create_array[$i] == $subcategory_id){ // check sub_id in row then loop check next row
                    $filter_id =  $filter_data->filter_id;
                    echo '<p class="tablinks" onclick="openCity(event, '."'".$filter_data->filter_id."'".')" id="defaultOpen"><input type="hidden" name="filter_id[]" value="'.$filter_id.'">'. $filter_data->filter_name.'</p>';
                }
            }
        }
        if($f == 0){ echo '</div>';  $f++; }
       

        foreach($get_filter_data as $filter_data){
            $create_array = explode(',', $filter_data->sub_category_id); //convert array for check 
          
            for($i=0; $i<count($create_array); $i++){
                if($create_array[$i] == $subcategory_id){ // check sub_id in row then loop check next row
                 echo '<div id="'.$filter_data->filter_id.'" style="display:none;" class="tabcontent">
                 <p>'.$filter_data->filter_msg.'</p>
                 ' ;
                    $filter_id =  $filter_data->filter_id;
                    $get_medata = gig_metadata::where('filter_id', $filter_id)->where('filter_type', 'No')->get(); 
                    
                   foreach ($get_medata as $metada) {
                       echo '<li>
                             <input type="checkbox" id="id'.$metada->sub_filter_id.'"name="gig_metadata[]" value="'.$metada->sub_filter_id.'"><label for="id'.$metada->sub_filter_id.'"><span class="checkbox primary primary"></span>'.$metada->sub_filter_name.'</label>
                             </li>';
                   }
                    
                 echo '</div>';
                }
            }
           
        }
        
        //$get_category = filter::where('sub_category_id', $subcategory_id)->where('mete_tag', 'Yes')->get();

        // if($get_category){
        //     foreach ($get_category as $category) {
              
        //        echo '
        //         <div class="col-md-4">
        //             <input type="checkbox" id="gig_metadata'.$category->metadata_id.'" name="gig_metadata[]" value="'.$category->gig_metadata.'">
        //             <label for="gig_metadata'.$category->metadata_id.'">
        //                 <span class="checkbox primary primary"></span>
        //                '.$category->gig_metadata.'
        //             </label>
        //         </div>
        //        ';
               
        //     }
        // }
    }
    
    public function insert_gig(Request $request)
    {
        
        $get_id = Auth::user()->id;
        $filter_id = '';

        $gig_url = str_slug($request->gig_title);

        if(isset($request->filter_id)){
            $filter_id = implode(',', $request->filter_id);
        }else{
             $filter_id = ' ';
        }
        
        $gig_search_tag = $request->gig_search_tag;

        if(!empty($gig_search_tag)){
            $gig_search_tag = implode(',', $gig_search_tag);
        } 

        
        $alldata = [
        'gig_title'=> $request->gig_title,
        'gig_url'=> $gig_url,
        'gig_dsc'=> '',
        'category_name'=> $request->category_id,
        'gig_subcategory'=> $request->subcategory,
        'gig_metadata'=> $filter_id,
        'gig_payment_type'=> $request->gig_payment_type,
        'gig_search_tag'=> $gig_search_tag,
        'gig_user_id'=> $get_id,
        'gig_status' => 'unactive'
        ];

       
       $insert_id = gig_basic::insertGetId($alldata);
        
        if(isset($request->gig_metadata)){
            foreach ($request->gig_metadata as $gig_metadata) {
                $data = [
                    'gig_id' => $insert_id,
                    'metadata_id' => $gig_metadata
                ];

               $succcess = gig_metadata_filter::create($data);

            }
        }
        $link =  asset('/dashboard/create-gig/2nd').'/'.$gig_url;
        return redirect($link);
      
    }

    public function gig_step($step, $url)
    {
        
        $get_user_id = Auth::user()->id;
        $gig_basic = gig_basic::where('gig_url', $url)->where('gig_user_id', $get_user_id)->first();

        if($gig_basic){
            $gig_id = $gig_basic->gig_id;

            $question_answer = question_answer::where('gig_id', $gig_id)->get(); // get data question table  
            $gig_requirement = gig_requirement::where('gig_id', $gig_id)->get(); // get data gig_requirement table
           
                $alldata = [
                    'gig_basic' => $gig_basic,
                    'question_answer' => $question_answer,
                    'gig_requirement' => $gig_requirement
                ];

                return view('backend/gig-step')->with($alldata);
            
        }else{
             return redirect('/hotlancer/error');
         }
        
    }

    public function insert_gig_step_second(Request $request)
    {
        $get_user_id = Auth::user()->id;
        $gig_id = $request->gig_id;
        $gig_url = $request->gig_url;

        // check whice step form submit
        if($request->form_step == 'form_step_second'){


            $data = array_merge($request->all(), ['user_id' => $get_user_id]);
            $insert = gig_price::create($data); // insert all data 
            if($insert ){
                if(isset($request->feature_id)){
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
                    $link =  asset('/dashboard/create-gig/3rd').'/'.$gig_url;
                    return redirect($link);

                }else{
                    return back();
                }

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
            
        }else{
            return back();
        }
    }

    public function insert_gig_step_third(Request $request)
    {
        $get_user_id = Auth::user()->id;
        $gig_id = $request->gig_id;
        $gig_url = $request->gig_url;

        // check whice step form submit
        if($request->form_step == 'form_3rd_step'){

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

               $link =  asset('/dashboard/create-gig/4th').'/'.$gig_url;
                return redirect($link); 
            }else{
                return back();
            }
        }else{
            return back();
        }
    }

    public function insert_gig_step_fourth(Request $request)
    {
        $get_user_id = Auth::user()->id;
        $gig_id = $request->gig_id;
        $gig_url = $request->gig_url;

        // check whice step form submit
        if($request->form_step == 'form_4th_step'){

           $succcess = gig_requirement::create($request->all());
           if($succcess){
                $link =  asset('/dashboard/create-gig/5th').'/'.$gig_url;
                return redirect($link); 
           }
        }else{
            return back();
        }

    }
    public function insert_gig_step_five(Request $request)
    {
        $gig_url = $request->gig_url;
        $get_user_id = Auth::user()->id;
        // check whice step form submit
        if($request->form_step == 'form_5th_step'){

            foreach ($request->gig_image as $image) {

                $image_name = rand('123456', '999999').$image->getClientOriginalName();

                $image_path = public_path('gigimages/'.$image_name );
                Image::make($image)->save($image_path);
                
                $data = [
                    'gig_id' => $request->gig_id,
                    'user_id' => $get_user_id,
                    'image_path' => $image_name
                ];

               $succcess = gig_image::create($data);
            }
           
           if($succcess){
                $link =  asset('/dashboard/create-gig/6th').'/'.$gig_url;
                return redirect($link); 
           }

        }else{
            return back();
        }
    }

    public function insert_gig_step_finish()
    {
        return redirect('/dashboard/create-gig/');
    }

    //manage gigs
    public function manage_gigs()
    {
        return view('backend.gig-view');
    }

    public function get_gigs_by_status($status='active')
    {
         $user_id = Auth::user()->id;

        if($status == 'all'){
            $get_gigs = DB::table('gig_basics')
            ->join('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
            ->where('gig_basics.gig_user_id' , '=', $user_id)->get();
        }else{
            $get_gigs = DB::table('gig_basics')
            ->join('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
            ->where('gig_basics.gig_user_id' , '=', $user_id)
            ->where( 'gig_basics.gig_status' , '=', $status)->get();
        }

          
          if(count($get_gigs) > 0){
                $output = '
                <table class="responsive-table-input-matrix">
                    <thead>
                    <tr class="header-filter">
                    <td colspan="12" class="js-filter-title">'.$status.' gigs</td>
                    
                    </tr>
                    <tr>
                        <th></th>
                        <th>IMG</th>
                        <th>GIG Title </th>
                        <th>IMPRESSIONS</th>
                        <th>CLICKS</th>
                        <th>VIEWS</th>
                        <th>ORDERS</th>
                        <th>CANCELLATIONS</th>
                        <th>Action</th>
                        
                    </tr>
                    </thead>
                <tbody>';
                foreach($get_gigs as $show_gig){

                            $gig_img = DB::table('gig_images')->where('gig_id', $show_gig->gig_id)->first(); 
                          
                           $output .='
                        
                            <tr class="tbgig">
                                <td><input type="checkbox"></td>
                                <td class="gig-pict-45">
                                    <span class="gig-pict-45">
                                        <img src="'.asset('gigimages/').'/'.$gig_img->image_path.'" alt="gig_image" >
                                    </span>
                                </td>
                                <td class="title js-toggle-gig-stats ">
                                    <div class="ellipsis1">
                                        <a class="ellipsis" target="_blank" href="'.asset('/order/review/'.$show_gig->order_id).'">'.$show_gig->gig_title.'</a>
                                    </div>
                                </td>
                                <td>'.\Carbon\Carbon::parse($show_gig->created_at)->format('M d, Y').'</td>
                                <td>'.\Carbon\Carbon::parse($show_gig->created_at)->format('M d, Y').'</td>
                                <td>'.$show_gig->total.'</td>
                                
                                <td>
                                    <label for="sv" class="select-block v3">
                                        <span style="text-transform:uppercase;" class="alert alert-success">'.$show_gig->status.'
                                    </label>
                                </td>
                            </tr> 
                        ';
                 }
                 $output .='</tbody>
                </tbody>
            </table>';
                echo $output;
        }else{

            echo 'No '.$status.' orders to show.';
        }
    }



    public function question_answer_delete(Request $request)
    {

            question_answer::where('id', $request->ques_ans_id)->delete();
            
    }

   
}
