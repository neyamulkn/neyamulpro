<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $data['get_jobs'] = DB::table('jobs')->join('users', 'jobs.user_id', '=', 'users.id')->orderBy('job_id', 'DESC')->limit(3)->get();

    	return view('frontend.workplace.index')->with($data);
    }

    public function workplace_category($category, $subcategory_url){
      
        $category = DB::table('workplace_category')->where('category_url', $category)->first();

        $subcategory = DB::table('workplace_subcategory')->where('subcategory_url', $subcategory_url)->first();

        $get_subcategory = DB::table('workplace_subcategory')->leftJoin('workplace_category', 'workplace_category.id', '=', 'workplace_subcategory.category_id')->where('category_id', $category->id)->get();
        
        $get_jobs = DB::table('jobs')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->where('jobs.category_id', $category->id )
            ->where('jobs.subcategory_id', $subcategory->id )
            ->orderBy('jobs.job_id', 'DESC')->paginate(3);
        return view('frontend.workplace.jobs-list')->with(compact('get_jobs',  'get_subcategory'));
    }

    public function job_search(){
        echo 'fasld';
    }

    public function job_details($job_id){

    	$get_job = DB::table('jobs')
    	->join('users', 'jobs.user_id', '=', 'users.id')
    	->where('jobs.job_title_slug', $job_id)
    	->first();

    	return view('frontend.workplace.job-details')->with(compact('get_job'));
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
