<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\theme;
use DB;
use Auth;
class AdminController extends Controller
{
    public function approveOrReject(Request $request){
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
                'read' => 0
            ]);

    		$output = array( 'status' => 'success',  'message'  => 'Theme '.$request->status. ' successfull');
    	}else{
    		$output = array( 'status' => 'error',  'message'  => 'Theme '.$request->status. ' failed.');
    	}
        
    	return response()->json($output);
    }
}
 