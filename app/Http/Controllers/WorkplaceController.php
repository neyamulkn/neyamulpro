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
        ->where('job_title_slug', $slug)->where('user_id', $user_id)->first();

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
        $user_id = Auth::user()->id;
        $slug = $this->createSlug($request->post_title);
        $data = [
            'job_title' => $request->post_title,
            'job_title_slug' => $slug,
            'category_id' => $request->category_id,
            'user_id' => $user_id,
            'subcategory_id' => $request->subcategory,
        ];

       $check_job = job::where('job_title_slug', $request->slug)->where('user_id', $user_id)->first();
      
       if($check_job){
            job::where('job_title_slug', $request->slug)->where('user_id', $user_id)->update($data);
            Toastr::success('Job update successfully.');
            return redirect('dashboard/workplace/job-post/'.$check_job->job_title_slug.'/step/2')->with('get_job', $check_job);
       }else{
            $insert = job::create($data);
            if($insert){ Toastr::success('First Step Completed.'); }else{ Toastr::error('Sorry job insert failed.'); }
           
            return redirect('dashboard/workplace/job-post/'.$slug.'/step/2')->with('get_job', $insert);
        }  
    }


    public function job_post_second($slug){
        $user_id = Auth::user()->id;
        $get_job = job::where('job_title_slug', $slug)->where('user_id', $user_id)->first();

        return view('backend.workplace.job2')->with(compact('get_job'));
    }

    public function insert_job_step_second(Request $request){
        $user_id = Auth::user()->id;
        $image_name = null;
        if($request->hasFile('file')){
            $image = $request->file('file');
            $image_name = time().rand('123456', '999999').".".$image->getClientOriginalExtension();
            $image_path = public_path('images/workplace/'.$image_name );
            Image::make($image)->save($image_path);
        }
        $data = [
            'job_dsc' => $request->job_dsc,
            'file' => $image_name,
            
        ];

        $check_job = job::where('job_title_slug', $request->slug)->where( 'user_id', $user_id)->first();

       if($check_job){
            job::where('job_title_slug', $request->slug)->where('user_id', $user_id)->where('user_id', $user_id)->update($data);
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
        if($check_job){
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
            'project_time' => $request->project_time,
            'day_hours' => $day_hours,
           
            
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

    public function submit_proposal($job_url){
        $user_id = Auth::user()->id;
        $get_job = DB::table('jobs')
        ->join('users', 'jobs.user_id', '=', 'users.id')
        ->where('jobs.job_title_slug', $job_url)
        ->first();

        $exist_proposal = DB::table('job_proposals')
        ->where('job_title_slug', $get_job->job_title_slug)
        ->where('freelancer_id', $user_id)
        ->first();


        return view('backend.workplace.job-proposal')->with(compact('get_job', 'exist_proposal'));
    } 

    public function insert_proposal(Request $request){
        $user_id = Auth::user()->id;
       
        $data = [

        'job_title_slug' => $request->job_title_slug,
        'buyer_id' => $request->buyer_id,
        'freelancer_id' => $user_id,
        'proposal_budget' => $request->proposal_budget,
        'work_duration' => $request->work_duration,
        'proposal_dsc' => $request->proposal_dsc,
        'proposal_file' => $request->proposal_file,
        ];

        $exist_proposal = DB::table('job_proposals')
        ->where('proposal_id', $request->proposal_id)
        ->where('freelancer_id', $user_id)
        ->first();

        if($exist_proposal){
             $success = job_proposal::where('proposal_id', $request->proposal_id)
                        ->where('freelancer_id', $user_id)->update($data);
        }else{
            $success = job_proposal::create($data);
        }
        if($success){
            Toastr::success('Thanks your job proposal successfully submited.');
            return back();
        }else{
            Toastr::error('Sorry something is wrong your job proposal not successfully submited');
            return back();
        }
        
    }

    public function job_list(){
        $user_id = Auth::user()->id;
        $get_jobs = DB::table('jobs')->where('user_id', '=', $user_id)->get();

        return view('backend.workplace.job-list')->with(compact('get_jobs'));
    }

    public function proposals_list($job_title_slug){
        $buyer_id = Auth::user()->id;
        $get_proposals = DB::table('job_proposals')
                    ->join('jobs', 'job_proposals.job_title_slug', 'jobs.job_title_slug')
                    ->join('users', 'job_proposals.freelancer_id', 'users.id')
                    ->leftjoin('userinfos', 'job_proposals.freelancer_id', 'userinfos.user_id')
                    ->select('job_proposals.*', 'jobs.job_title', 'jobs.job_title_slug', 'users.username','users.country', 'userinfos.user_title', 'userinfos.user_image')
                    ->where('job_proposals.job_title_slug', '=', $job_title_slug)
                    ->where('job_proposals.buyer_id', '=', $buyer_id)
                    ->get();
                return view('backend.workplace.proposal-list')->with(compact('get_proposals'));
    }

    public function applicant_hire($job_title_slug, $applicant_id){
        $user_id = Auth::user()->id;
        $get_applicant = DB::table('job_proposals')
                    ->join('jobs', 'job_proposals.job_title_slug', 'jobs.job_title_slug')
                    ->join('users', 'job_proposals.freelancer_id', 'users.id')
                    ->join('userinfos', 'job_proposals.freelancer_id', 'userinfos.user_id')
                    ->select('job_proposals.*', 'jobs.job_title', 'jobs.job_title_slug', 'users.username', 'userinfos.user_title', 'userinfos.user_image')
                    ->where('job_proposals.job_title_slug', '=', $job_title_slug)
                    ->where('job_proposals.freelancer_id', '=', $applicant_id)
                    ->first();
        return view('backend.workplace.applicant-hire')->with(compact('get_applicant'));
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

                    $data = [
                        'order_id' => $order_id,
                        'job_title_slug' => $get_proposal->job_title_slug,
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


    // create theme unique slug 
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
