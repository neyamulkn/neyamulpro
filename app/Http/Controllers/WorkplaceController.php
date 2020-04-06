<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Redirect;
use App\job;
use App\job_proposal;
use App\job_order;
use Auth;
use Session;
use Toastr;
use Image;
class WorkplaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function job_post($slug=null){
        $user_id = Auth::user()->id;
        $get_job = DB::table('jobs')
        ->join('workplace_category', 'jobs.category_id', '=', 'workplace_category.id')
        ->join('workplace_subcategory', 'jobs.subcategory_id', '=', 'workplace_subcategory.id')
        ->where('job_title_slug', $slug)->where('user_id', $user_id)
        ->select('jobs.*', 'workplace_category.id', 'workplace_category.category_name', 'workplace_subcategory.subcategory_name')->first();
        
    	$get_category = DB::table('workplace_category')->get();

    	return view('backend.workplace.job1')->with(compact('get_category', 'get_job'));  
    }

    public function get_subcategory($id)
    {
        $get_category = DB::table('workplace_subcategory')->where('id', $id)->get();
        if(count($get_category)>0){
                echo '<option value="">select sub category</option>';
            foreach ($get_category as $category) {
                echo '
                 <option value="'.$category->id.'">'.$category->subcategory_name.'</option>';
            }
        }else{
            echo '<option value="">Category not available</option>';
        }
    }

    public function insert_job_post(Request $request){

        $request->validate([
            'job_title' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $slug = $this->createSlug($request->job_title);
        $data = [
            'job_title' => $request->job_title,
            'job_title_slug' => ($request->slug) ? $request->slug : $slug,
            'category_id' => $request->category_id,
            'user_id' => $user_id,
            'subcategory_id' => $request->subcategory_id,
        ];

       $check_job = job::where('job_title_slug', $request->slug)->where('user_id', $user_id)->first();
      
       if($check_job){
            job::where('job_title_slug', $request->slug)->where('user_id', $user_id)->update($data);
            Toastr::success('Job update successfully.');
            return redirect('dashboard/workplace/job-post/'.$request->slug.'/step/2')->with('get_job', $check_job);
       }else{
            // add status 
            $data = array_merge($data, ['status' => 'draft']);
            $insert = job::create($data);
            if($insert){ Toastr::success('First Step Completed.'); }else{ Toastr::error('Sorry job insert failed.'); }
           
            return redirect('dashboard/workplace/job-post/'.$slug.'/step/2')->with('get_job', $insert);
        }  
    }


    public function job_post_second($slug){
        $user_id = Auth::user()->id;
        $get_job = job::where('job_title_slug', $slug)->where('user_id', $user_id)->first();
       
        if($get_job){
            return view('backend.workplace.job2')->with(compact('get_job'));
        }else{
            return back();
        }
    }

    public function insert_job_step_second(Request $request){

        $request->validate([
            'job_dsc' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $image_name = null;
        if($request->hasFile('file')){
            $image = $request->file('file');
            $image_name = time().rand('123456', '999999').".".$image->getClientOriginalExtension();
            $image->move(public_path('images/workplace/'), $image_name);

            $data = [
            'job_dsc' => $request->job_dsc,
            'file' => $image_name,
            ];
        }else{
            $data = [ 'job_dsc' => $request->job_dsc];
        }
       
        $check_job = job::where('job_title_slug', $request->slug)->where('user_id', $user_id)->first();

        if($check_job){
            $update = job::where('job_title_slug', $request->slug)->where('user_id', $user_id)->update($data);
            $source_image = public_path('images/workplace/'.$check_job->file);

            if($request->hasFile('file') && file_exists($source_image)){ //If it exits, delete it from folder
                @unlink($source_image);
            }
            
            return redirect('dashboard/workplace/job-post/'.$request->slug.'/step/3')->with('get_job', $check_job);
        }else{
            return back();
        }
    }



    public function job_post_third($slug){
        $user_id = Auth::user()->id;
        $get_job = job::where('job_title_slug', $slug)->where('user_id', $user_id)->first();

    	return view('backend.workplace.job3')->with(compact('get_job'));
    }


    public function insert_job_step_third(Request $request){
        $request->validate([
            'project_type' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $data = [
            'project_type' => $request->project_type,
        ];

        $check_job = DB::table('jobs')->where('job_title_slug', $request->slug)->where('user_id', $user_id)->first();

       if($check_job){
            job::where('job_title_slug', $request->slug)->where('user_id', $user_id)->update($data);
            return redirect('dashboard/workplace/job-post/'.$request->slug.'/step/4')->with('get_job', $check_job);
       }else{
            return back();
       }
    }

    public function job_post_four($slug){
    	$user_id = Auth::user()->id;
        $get_job = job::where('job_title_slug', $slug)->where('user_id', $user_id)->first();

        $get_filters = DB::table('workplace_filters')->where('subcategory_id', $get_job->subcategory_id)->get();

        return view('backend.workplace.job4')->with(compact('get_job','get_filters'))->with('get_job', $get_job);
    }


    public function insert_job_step_four(Request $request){
        $user_id = Auth::user()->id;
        $check_job = job::where('job_title_slug', $request->slug)->where('user_id', $user_id)->first();
        if($check_job && $request->filter_id){
            foreach ($request->filter_id as $key => $value) {
                $subfilter_id = implode(',', $request->subfilter_id);
                $data = [
                    'job_id' => $check_job->job_id,
                    'filter_id' => $value,
                    'subfilter_id' => $subfilter_id,
                ];
                $get_expertise = DB::table('job_expertise')->where('job_id', $check_job->job_id)->first();
                if($get_expertise){
                   $success =  DB::table('job_expertise')->where('job_id', $check_job->job_id)->update($data);  
                }else{
                    $success = DB::table('job_expertise')->insert($data);
                }
            }

            job::where('job_title_slug', $request->slug)->where('user_id', $user_id)->where('user_id', $user_id)->update(['search_tag' => $request->search_tag]);
        }

        return redirect('dashboard/workplace/job-post/'.$request->slug.'/step/5')->with('get_job', $check_job);
       
    }

    public function job_post_five($slug){

        $user_id = Auth::user()->id;
        $get_job = job::where('job_title_slug', $slug)->where('user_id', $user_id)->first();

        return view('backend.workplace.job5')->with(compact('get_job'));
    	
    }


    public function insert_job_step_five(Request $request){
        $user_id = Auth::user()->id;

        if($request->number_type == 1){
            $number_freelancer = 1;
        }
        if($request->number_type == 2){
            $number_freelancer = $request->number_freelancer;
        }

        $data = [
            'number_freelancer' => $number_freelancer,
            
        ];

        $check_job = DB::table('jobs')->where('job_title_slug', $request->slug)->where('user_id', $user_id)->first();

       if($check_job){
            job::where('job_title_slug', $request->slug)->where('user_id', $user_id)->update($data);
            return redirect('dashboard/workplace/job-post/'.$request->slug.'/step/6');
       }else{
            return back();
       }
    }   

    public function job_post_six($slug){

        $user_id = Auth::user()->id;
        $get_job = job::where('job_title_slug', $slug)->where('user_id', $user_id)->first();

        return view('backend.workplace.job6')->with(compact('get_job'));
        
    }


    public function insert_job_step_six(Request $request){
        $user_id = Auth::user()->id;

        if($request->price_type == "monthly" ){
           $day_hours = $request->hours;
        }
        if($request->price_type == "fixed" ){
            $day_hours = $request->days;
        }

        $data = [
            'price_type' => $request->price_type,
            'budget' => $request->budget,
            'experience' => $request->experience,
            'day_hours' => $day_hours,
            'status' => 'pending' 
        ];

        $check_job = DB::table('jobs')->where('job_title_slug', $request->slug)->where('user_id', $user_id)->first();

       if($check_job){
            job::where('job_title_slug', $request->slug)->where('user_id', $user_id)->update($data);
            return redirect('dashboard/workplace/job-post/'.$request->slug.'/step/7');
       }else{
            return back();
       }
    } 

    public function job_post_seven($slug){

        $user_id = Auth::user()->id;
        
        $get_job = DB::table('jobs')
        ->join('workplace_category', 'jobs.category_id', '=' , 'workplace_category.id')
        ->join('workplace_subcategory', 'jobs.category_id', '=' , 'workplace_subcategory.id')
        ->select('jobs.*', 'workplace_category.category_name', 'workplace_subcategory.subcategory_name')
        ->where('job_title_slug', $slug)->where('user_id', $user_id)->first();

        $get_filters = DB::table('job_expertise')
        ->join('workplace_filters', 'job_expertise.filter_id', 'workplace_filters.filter_id')
        ->where('job_expertise.job_id', $get_job->job_id)->get();

        return view('backend.workplace.job7')->with(compact('get_job','get_filters'));
        
    }


    public function insert_job_step_seven(Request $request){
      $user_id = Auth::user()->id;
       if($user_id){
         
            Toastr::success('Your job successfully inserted!');
            return redirect('dashboard/workplace/job-list');
       }else{
            Toastr::error('Your job con\'t  inserte!');
            return back();
       }
    }

   
    public function job_list($status='active'){
        $user_id = Auth::user()->id;
        $get_jobs = job::with(['jobOrder', 'job_proposals']);
        // check Whether admin 
        if(Auth::user()->role_id != env('ADMIN')){
            $get_jobs = $get_jobs->where('user_id' , '=', $user_id)->with('user');
        }
        // check status Whether  all
        if($status != 'all'){ $get_jobs = $get_jobs->where('status' , '=', $status); }

        $get_jobs = $get_jobs->where('status', '!=', 'delete')->orderBy('job_id', 'DESC')->paginate(10);

        //check ajax request  
        if(isset($_GET['ajaxRequest'])){
            if(count($get_jobs)>0){
                echo view('backend.workplace.jobByStatus')->with(compact('get_jobs'));
            }else{ echo '<h3>No '.$status. ' job found.</h3>'; }
            
        }else{ //if isset type then 
            if(Auth::user()->role_id == env('ADMIN')){
                return view('admin.workplace.job-list')->with(compact('get_jobs')); 
            }
            return view('backend.workplace.job-list')->with(compact('get_jobs'));
        }
       
    }

    public function job_status(Request $request){ 
        $user_id = Auth::user()->id;
        $find_job = job::where('job_id', $request->job_id);
        if(Auth::user()->role_id != env('ADMIN')){
            $find_job = $find_job->where('user_id' , $user_id);
        }
        $find_job =$find_job->first();

        if($find_job->update(['status' => $request->status])){
            echo 'Job' .$request->status.' successfully ';
        }else{
            return false;
        }
        
        
    }

    
    public function payment_stripe(Request $request)
    {   

        $buyer_id = Auth::user()->id;
        $get_proposal = DB::table('job_proposals')
            ->join('jobs', 'job_proposals.job_title_slug', 'jobs.job_title_slug')
            ->join('users', 'job_proposals.buyer_id', 'users.id')
            ->select('job_proposals.*', 'users.username', 'jobs.job_title')
            ->where('job_proposals.proposal_id', '=', $request->proposal_id)
            ->where('job_proposals.buyer_id', '=', $buyer_id)
            ->first();

        if($get_proposal){


           \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $payment_success = \Stripe\Charge::create ([
                    "amount" => $get_proposal->proposal_budget,
                    "currency" => "USD",
                    "source" => $request->stripeToken,
                    "description" => $get_proposal->job_title,
                    'statement_descriptor' => $get_proposal->username,
            ]);
            if($payment_success){

                $order_number = 'ID'. date('ymd'). $get_proposal->buyer_id ; //make order id buyer wise
                // get last order id
                $get_last_order = DB::table('job_orders')->orderBy('order_id',"desc")->where('buyer_id', $get_proposal->buyer_id)->limit(1)->first();

                if ($get_last_order) {
                    $number = substr($get_last_order->order_id, -4) + 1;
                    $order_id = ($order_number  . $number);
                } else {
                    $order_id = $order_number  . '1001';
                }

                $ref_user = null;
                if(Session::has('refferel_user_name')){
                    if(Session::get('refferel_user_name') != $username){
                     $ref_user = Session::get('refferel_user_name');
                    }
                }


                $data = [
                    'order_id' => $order_id,
                    'job_id' => session::get('hire_job_id'),
                    'ref_user' => $ref_user,
                    'proposal_id' => $get_proposal->proposal_id,
                    'freelancer_id' => $get_proposal->freelancer_id,
                    'buyer_id' =>  $get_proposal->buyer_id,
                    'proposal_budget' => $get_proposal->proposal_budget,
                    'payment_method' => 'card',
                    'transection_id' =>  $request->stripeToken,
                    'status' => 'active',
                ];
                
                job_order::create($data);
                Toastr::success('Payment successful.');
                return redirect('dashboard/workplace/work-description/'.$order_id);
            }
            
        }else{
            Toastr::error('Sorry something is wrong try again.!');
            return back();
        }    
           
    }

    public function work_description($order_id){
        $buyer_id = Auth::user()->id;

        $get_order = DB::table('job_orders')
        ->where('order_id', $order_id)
        ->where('buyer_id', $buyer_id)->limit(1)->first();
        if($get_order){
            Toastr::success('Your work description successful done!');
            return view('backend.workplace.work-description')->with(compact('get_order'));
        }else{
           
            Toastr::error('Sorry something is wrong try again.!');
            return back();
        } 
    }

    public function insert_workdsc(Request $request){
        $buyer_id = Auth::user()->id;
        $data = [
            'work_description' => $request->work_description
        ];

        $success = job_order::where('buyer_id', $buyer_id)->where('order_id', $request->order_id)->update($data);
        if($success){
            Toastr::success('Thanks for your order successful done.!');
            return redirect('dashboard/workplace/order-details/'. $request->order_id);
        }else{
            Toastr::error('Sorry something is wrong try again.!');
            return back();
        } 
    }


    // create job unique slug 
    public function createSlug($slug)
    {
      $slug = str_slug($slug);
      $check_slug = job::select('job_title_slug')->where('job_title_slug', 'like', $slug.'%')->get();

      if (count($check_slug)>0){
        //find slug until find not used.
        for ($i = 1; $i <= count($check_slug); $i++) {
            $newSlug = $slug.$i;
            if (!$check_slug->contains('job_title_slug', $newSlug)) {
              return $newSlug;
            }
        }
      }else{ return $slug; }   
    }


}
