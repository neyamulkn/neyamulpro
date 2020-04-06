<?php

namespace App\Http\Controllers;

use App\job_proposal;
use Illuminate\Http\Request;
use Auth;
use DB;
use Toastr;
class JobProposalController extends Controller
{

    public function __construct(){
         $this->middleware('auth');
    }
     public function submit_proposal($job_url){

        $user_id = Auth::user()->id;
        $get_job = DB::table('jobs')
        ->join('users', 'jobs.user_id', '=', 'users.id')
        ->where('jobs.job_title_slug', $job_url)
        ->first();

        if($get_job){
            $exist_proposal = DB::table('job_proposals')
            ->where('job_id', $get_job->job_id)
            ->where('freelancer_id', $user_id)
            ->first();
            
        return view('frontend.workplace.job-proposal')->with(compact('get_job', 'exist_proposal'));
        }else{
            return back();
        }

        
    } 

    public function insert_proposal(Request $request){

       
        $request->validate([
            'proposal_budget' => 'required:number',
            'work_duration' => 'required',
            'proposal_dsc' => 'required|min:120|max:1000',
        ]);
        $user_id = Auth::user()->id;
        
        $data = [
        'job_id' => $request->job_id,
        'buyer_id' => $request->buyer_id,
        'freelancer_id' => $user_id,
        'proposal_budget' => $request->proposal_budget,
        'work_duration' => $request->work_duration,
        'proposal_dsc' => $request->proposal_dsc,
        'proposal_file' => $request->proposal_file,
        ];

        $success = job_proposal::updateOrCreate(['proposal_id' => $request->proposal_id, 'freelancer_id' => $user_id], $data);
        
        if($success){
            Toastr::success('Thanks your job proposal successfully submited.');
           
        }else{
            Toastr::error('Sorry something is wrong your job proposal not successfully submited');
        }

        return back();
        
    }

    public function proposals_list($job_title_slug){
        $buyer_id = Auth::user()->id;
        $get_proposals = job_proposal::with('user')
                    ->join('jobs', 'job_proposals.job_id', 'jobs.job_id')
                    ->leftjoin('userinfos', 'job_proposals.freelancer_id', 'userinfos.user_id')
                    ->select('job_proposals.*', 'jobs.job_title', 'jobs.job_title_slug', 'userinfos.user_title', 'userinfos.user_image')
                    ->where('jobs.job_title_slug', '=', $job_title_slug)
                    ->where('job_proposals.buyer_id', '=', $buyer_id)
                    ->paginate(15);
                  
                return view('backend.workplace.proposal-list')->with(compact('get_proposals'));
    }

    public function applicant_hire($job_title_slug, $applicant_username){
        $user_id = Auth::user()->id;
        $get_applicant = DB::table('job_proposals')
            ->join('jobs', 'job_proposals.job_id', 'jobs.job_id')
            ->join('users', 'job_proposals.freelancer_id', 'users.id')
            ->join('userinfos', 'job_proposals.freelancer_id', 'userinfos.user_id')
            ->select('job_proposals.*', 'jobs.job_title', 'jobs.job_title_slug', 'users.username', 'userinfos.user_title', 'userinfos.user_image')
            ->where('jobs.job_title_slug', '=', $job_title_slug)
            ->where('users.username', '=', $applicant_username)
            ->first();
        if(!$get_applicant){
            return back();
        }
        return view('backend.workplace.applicant-hire')->with(compact('get_applicant'));
    }



}
