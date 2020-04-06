<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\job;
use DB;
use App\job_proposal;
use Auth;
class WorkplaceHomeController extends Controller
{

    public function index(){
        $data = array();
        $data['get_category'] = DB::table('workplace_category')->get();
       
    	$data['top_hire_users'] = DB::table('job_orders')
            ->join('users', 'job_orders.freelancer_id', '=', 'users.id')
            ->leftJoin('userinfos', 'job_orders.freelancer_id', '=', 'userinfos.user_id')
            ->selectRaw('users.*, userinfos.user_image, count(job_orders.freelancer_id) top_users' )
            ->groupBy('job_orders.freelancer_id')
            ->orderBy('top_users', 'ASC')->limit(5)->get();

        $data['get_jobs'] = DB::table('jobs')->join('users', 'jobs.user_id', '=', 'users.id')->orderBy('job_id', 'DESC')->limit(4)->select('jobs.*', 'users.username', 'users.country')->get();

    	return view('frontend.workplace.index')->with($data);
    }

    public function workplace_category(Request $request){
        $category = $request->category;
        $subcategory = $request->subcategory;

        $get_subcategory = DB::table('workplace_subcategory')
                        ->join('workplace_category', 'workplace_subcategory.category_id', '=', 'workplace_category.id')
                        ->where('workplace_category.category_url', $category)->get();
        
        $get_job = DB::table('jobs')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->leftJoin('workplace_category', 'jobs.category_id', '=', 'workplace_category.id')
            ->leftJoin('workplace_subcategory', 'jobs.subcategory_id', '=', 'workplace_subcategory.id')
            ->where('workplace_category.category_url', $category );
           
            
            if(Input::has('item') && !empty(Input::get('item'))){
                $src = Input::get('item');
                $get_job =  $get_job->where('jobs.job_title', 'LIKE', '%'. $src .'%');
            }
            if(isset($request->price) && !empty($request->price)){
                $price = explode(',',  $request->price);
                $get_job = $get_job->whereBetween('jobs.budget', [$price[0],$price[1]]);
            }

            if(isset($request->payment)){
                $get_job = $get_job->where('jobs.price_type', $request->payment);  
            }

            
            $get_jobs = $get_job->where('workplace_subcategory.subcategory_url', $subcategory)->selectRaw('jobs.*, users.username, users.country')->orderBy('jobs.job_id', 'DESC')->paginate(3);
  
            if(!isset($_GET['filter'])){
               return view('frontend.workplace.jobs-list')->with(compact('get_jobs',  'get_subcategory'));
            }else{
                echo view('frontend.workplace.filter_data')->with(compact('get_jobs'));
            }
        
    }

    public function job_search(Request $request){

        $get_category = DB::table('workplace_category')->get();
       
         $get_job = DB::table('jobs')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->leftJoin('workplace_category', 'jobs.category_id', '=', 'workplace_category.id')
            ->leftJoin('workplace_subcategory', 'jobs.subcategory_id', '=', 'workplace_subcategory.id');
           
            
            if(Input::has('item') && !empty(Input::get('item'))){
                $src = Input::get('item');
                $get_job = $get_job->where(function($query) use ($src) {
                    $query->where('jobs.job_title', 'LIKE', '%'. $src .'%')
                    ->orWhere('jobs.job_title', 'LIKE', '%'. $src .'%');
                });
            }
            if(isset($request->price) && !empty($request->price)){
                $price = explode(',',  $request->price);
                $get_job = $get_job->whereBetween('jobs.budget', [$price[0],$price[1]]);
            }

            if(isset($request->payment)){
                $get_job = $get_job->where('jobs.price_type', $request->payment);  
            }

            $get_jobs = $get_job->selectRaw('jobs.*, users.username, users.country')->orderBy('jobs.job_id', 'DESC')->paginate(10);
 
            if(!isset($_GET['filter'])){
               return view('frontend.workplace.search')->with(compact('get_jobs', 'get_category'));
            }else{
                echo view('frontend.workplace.filter_data')->with(compact('get_jobs'));
            }
    }

    public function job_details($job_id){

    	$get_job = job::with(['user', 'category', 'subcategory'])
    	->where('job_title_slug', $job_id)
    	->first();
        if($get_job){
            return view('frontend.workplace.job-details')->with(compact('get_job'));
        }else{
            return redirect::route('404');
        }
    	
    }


    public function get_filter_data(Request $request)
    {
     echo 'fasdfl';
        // $get_jobs = DB::table('jobs')
        //     ->join('users', 'jobs.user_id', '=', 'users.id')
        //     ->leftJoin('workplace_category', 'jobs.category_id', '=', 'workplace_category.id')
        //     ->leftJoin('workplace_subcategory', 'jobs.subcategory_id', '=', 'workplace_subcategory.id')
        //     ->where('workplace_category.category_url', $request->category )
        //     ->where('workplace_subcategory.subcategory_url', $request->subcategory )
        //     ->orderBy('jobs.job_id', 'DESC')
        //     ->groupby('jobs.id');

        // if(isset($request->payment)){
        //     $get_jobs->where('jobs.price_type',  $request->payment);  
        // }
        // $get_jobs = $get_jobs->paginate(3);

      //   if($get_jobs){
      //       echo '<!-- PRODUCT SHOWCASE -->
      //               <div class="product-showcase">
      //                   <!-- PRODUCT LIST -->
      //                   <div class="product-list grid column3-4-wrap">';
      // }
           
    }



}


