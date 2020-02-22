<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\theme;
use App\gig_basic;
use DB;
use Auth;
class AdminController extends Controller
{
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
    public function gigAproveOrReject(Request $request){
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
 