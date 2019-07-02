<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\job;
use DB;
use App\job_proposal;
use Auth;
class WorkplaceHomeController extends Controller
{

    

    public function workplace(){

    	$get_jobs = DB::table('jobs')->join('users', 'jobs.user_id', '=', 'users.id')->get();

    	return view('frontend.workplace.index')->with(compact('get_jobs'));
    }

    public function job_details($job_id){

    	$get_job = DB::table('jobs')
    	->join('users', 'jobs.user_id', '=', 'users.id')
    	->where('jobs.job_title_slug', $job_id)
    	->first();

    	return view('frontend.workplace.job-details')->with(compact('get_job'));
    }



}
