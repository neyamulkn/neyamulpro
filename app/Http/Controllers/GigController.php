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
            'gig_status' => 'draft'
        ];

        $insertOrupdate = gig_basic::where('gig_url', $gig_url)->where('gig_user_id', $get_id)->first();

        if($insertOrupdate){

           $insert_id = gig_basic::where('gig_url', $gig_url)->update($alldata);

            if(isset($request->gig_metadata))
            {
                foreach ($request->gig_metadata as $gig_metadata)
                {
                    $data = [
                        'gig_id' => $insertOrupdate->gig_id,
                        'metadata_id' => $gig_metadata
                    ];

                   $succcess = gig_metadata_filter::where('gig_id', $insertOrupdate->gig_id)->update($data);
                }
            }
            if($insert_id){Toastr::success('Gig update successfully');}else{ Toastr::error('Sorry gig did not update successfully'); }
        }else{

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
            if($insert_id){Toastr::success('Gig inserted successfully');}else{ Toastr::error('Sorry gig did not insert successfully'); }

        }


        $link = asset('/dashboard/create-gig/2nd').'/'.$gig_url;
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


    public function upload_images(Request $request)
    {

    $gig_url = $request->gig_url;
    	$allowedfileExtension=['jpg','png'];

        if($request->hasFile('file')){
            $images = $request->file('file');
            foreach ($images as $image) {

				$extension = $image->getClientOriginalExtension();
				$check = in_array($extension,$allowedfileExtension);
				if($check)
				{
	                $image_name = rand('123456', '999999').$image->getClientOriginalName();

	                $image_path = public_path('gigimages/'.$image_name );
	                Image::make($image)->save($image_path);

	                $data = [
	                    'gig_id' => $request->gig_id,
	                    'image_path' => $image_name
	                ];
	               $succcess = gig_image::create($data);
	            }else{
	            	$output = array('message' => 'Sorry Only Upload png, jpg', 'type' => 'error');
	            	return json_encode($output);
	            }
            }
            $output = array('message' => 'Image upload successfully', 'type' => 'success', 'url' => asset('/dashboard/create-gig/6th').'/'.$gig_url);
        }else{
            $output = array('message' => 'Please choose any image', 'type' => 'error');
        }

     return json_encode($output);
    }
    public function insert_gig_step_five(Request $request)
    {
        $gig_url = $request->gig_url;
        $get_user_id = Auth::user()->id;
        // check whice step form submit
        if($request->form_step == 'form_5th_step'){

            // foreach ($request->gig_image as $image) {

            //     $image_name = rand('123456', '999999').$image->getClientOriginalName();

            //     $image_path = public_path('gigimages/'.$image_name );
            //     Image::make($image)->save($image_path);

            //     $data = [
            //         'gig_id' => $request->gig_id,
            //         'user_id' => $get_user_id,
            //         'image_path' => $image_name
            //     ];

            //    $succcess = gig_image::create($data);
            // }


            $link =  asset('/dashboard/create-gig/6th').'/'.$gig_url;
            return redirect($link);
        }else{
            return back();
        }
    }

    public function insert_gig_step_finish(Request $request)
    {

        $gig_id = $request->gig_id;
        $gig_url = $request->gig_url;

        $insert_id = gig_basic::where('gig_url', $gig_url)->update(['gig_status' => 'active']);
            if($insert_id){
                DB::table('gigs_view')->insert(['gig_id' => $gig_id, 'gig_impress' => 1] );
                Toastr::success('Gig successfully completed');}else{ Toastr::error('Sorry gig did not complete successfully'); }
        return redirect('dashboard/manage-gigs/active');
    }

    //manage gigs
    public function manage_gigs($status='active')
    {
        $user_id = Auth::user()->id;
        $get_gigs = DB::table('gig_basics')
            ->leftJoin('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
            ->leftJoin('gigs_view', 'gig_basics.gig_id', '=', 'gigs_view.gig_id')
            ->select('gig_basics.gig_title', 'gig_basics.gig_id', 'gig_basics.gig_url', 'gig_images.image_path', 'gigs_view.gig_impress','gigs_view.gig_click','gigs_view.gig_view')
            ->where('gig_user_id' , '=', $user_id);
            if($status != 'all'){ $get_gigs = $get_gigs->where('gig_status' , '=', $status); }
            $get_gigs = $get_gigs->groupBy('gig_basics.gig_id')->paginate(1);


        if(!isset($_GET['type'])){
            return view('backend.gig-view')->with(compact('get_gigs'));
        }else{
            $output = '';
            if(count($get_gigs)>0){
                $output .= '
                <table class="responsive-table-input-matrix">
                    <thead>
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

                        $output .='
                            <tr class="tbgig" id="item'.$show_gig->gig_id.'">
                                <td><input type="checkbox"></td>
                                <td class="gig-pict-45">
                                    <span class="gig-pict-45">
                                        <a href="#"><img src="'.asset('gigimages/'.$show_gig->image_path).'" alt="" ></a>
                                    </span>
                                </td>
                                <td class="title js-toggle-gig-stats ">
                                    <div class="ellipsis1">
                                        <a class="ellipsis" target="_blank" href="'.url('marketplace/'.$show_gig->gig_url).'">'.$show_gig->gig_title .'</a>
                                    </div>
                                </td>
                                <td>'.$show_gig->gig_impress .' <i class="fa fa-long-arrow-up green"></i></td>
                                <td>'.$show_gig->gig_click .' <i class="fa fa-long-arrow-up green"></i></td>
                                <td>'.$show_gig->gig_view .' <i class="fa fa-long-arrow-up green"></i></td>
                                <td>'.$show_gig->gig_impress .' <i class="fa fa-long-arrow-up green"></i></td>
                                <td>'.$show_gig->gig_impress .' <i class="fa fa-long-arrow-down red"></i></td>
                                <td>
                                    <label for="sv" class="select-block v3">
                                        <select onchange="action_type(this.value,'.$show_gig->gig_id.' )" name="sv" id="sv">
                                            <option value="0">select action</option>
                                            <option value="1">Edit</option>
                                            <option value="2">Delete</option>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </td>
                            </tr>';
                        }
                    $output .='
                    </tbody>
                </table>
                <div class="page primary paginations">
                    '.$get_gigs->links().'
                </div>';
                echo $output;
            }else{ echo 'No '.$status. ' gigs found.'; }
        }
    }

    public function gig_delete($id)
    {
        $user_id = Auth::user()->id;
        $delete = gig_basic::where('gig_id', $id)->where('gig_user_id', $user_id)->delete();
        if($delete){
            try{
                $get_image_path = gig_image::where('gig_id', $id)->get();
                foreach ($get_image_path as $image_name) {
                    $image_path = public_path('gigimages/'.$image_name->image_path );
                    if(file_exists($image_path)){
                        @unlink($image_path);
                    }
                }
                gig_image::where('gig_id', $id)->delete();
                gig_requirement::where('gig_id', $id)->delete();
                gig_metadata_filter::where('gig_id', $id)->delete();
                gig_feature::where('gig_id', $id)->delete();
                question_answer::where('gig_id', $id)->delete();
                DB::table('gigs_view')->where('gig_id', $id)->delete();

                echo 'Gig deleted successfully.';
            }catch(\Exception $e){
                return $e->getMessage();
            }
        }else{
            echo 'Sorry gig not deleted.';
        }

    }

    public function question_answer_delete(Request $request)
    {

        question_answer::where('id', $request->ques_ans_id)->delete();

    }


}
