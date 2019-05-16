<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use DB;
use Auth;
class profileController extends Controller
{
    public function profile_view($username){
    	
        $user = user::where('username', $username)->first();
 
    	if($user){
    		$alldata = [
    			'userinfo' => $user
    		];
    		
    		return view('frontend.profile')->with($alldata);
    	}else{
    		return Redirect('/');
    	}
    }
}
