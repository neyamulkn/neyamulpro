<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\theme;
use App\gig_basic;
use App\User;
use DB;
use Auth;
class AdminController extends Controller
{

    //manage user
    public function manage_user($status='active')
    {
        $get_users = User::with(['userinfo', 'jobs', 'gigs', 'themes']);
        
        // check status Whether  all
        if($status != 'all'){ 
            $get_users = $get_users->where('status', '=', $status); 
        }
        $get_users = $get_users->groupBy('id')->paginate(10);

        //check ajax request  
        if(isset($_GET['ajaxRequest'])){
            if(count($get_users)>0){
                echo view('admin.user.userStatus')->with(compact('get_users'));
            }else{ echo 'No '.$status. ' user found.'; }
        }else{ //if isset type then 
            return view('admin.user.users')->with(compact('get_users'));
        }
    }

    // users approve or reject
    public function userApproveOrReject(Request $request){
        $user_id = Auth::user()->id;
    	$user = User::where('id', $request->id)->first();
    	
    	if($user){
            $user->update(['status' => $request->status]);
            Notification::create([
                'platform' => 'all',
                'type' => 'userStatus',
                'forUser' => $user->id, // user ID
                'entityID' => $user_id,
            ]);

    		$output = array( 'status' => 'success',  'message'  => 'User '.$request->status. ' successfull');
    	}else{
    		$output = array( 'status' => 'error',  'message'  => 'User '.$request->status. ' failed.');
    	}
        
    	return response()->json($output);
    }     

    public function user_delete(Request $request){
        $user = User::where('id', $request->id)->delete();
        if($user){
            echo 'User deleted successfully';
        }else{
            echo 'User can\'t deleted successfully';
        }
        
    }

    // theme approve or reject
    public function themeAproveOrReject(Request $request){
        $user_id = Auth::user()->id;
        $theme = theme::where('theme_id', $request->theme_id)->first();
        
        if($theme){
            theme::where('theme_id', $request->theme_id)->update(['status' => $request->status]);
            Notification::create([
                'platform' => 'themeplace',
                'type' => 'status',
                'item_id' => $request->theme_id,
                'forUser' => $theme->user_id, // user ID
                'entityID' => $user_id,
            ]);

            $output = array( 'status' => 'success',  'message'  => 'Theme '.$request->status. ' successfull');
        }else{
            $output = array( 'status' => 'error',  'message'  => 'Theme '.$request->status. ' failed.');
        }
        
        return response()->json($output);
    } 

    // gig approve or reject
    public function gigApproveOrReject(Request $request){

        
        $user_id = Auth::user()->id;
        $gig = gig_basic::find($request->gig_id);
        
        if($gig){
            gig_basic::where('gig_id', $request->gig_id)->update(['gig_status' => $request->status]);
            Notification::create([
                'platform' => 'marketplace',
                'type' => 'status',
                'item_id' => $gig->gig_id,
                'forUser' => $gig->gig_user_id, // user ID
                'entityID' => $user_id,
            ]);

            $output = array( 'status' => 'success',  'message'  => 'Theme '.$request->status. ' successfull');
        }else{
            $output = array( 'status' => 'error',  'message'  => 'Theme '.$request->status. ' failed.');
        }
        
        return response()->json($output);
    }
}
 