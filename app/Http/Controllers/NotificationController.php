<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;
class NotificationController extends Controller
{
    public function notifications(){
    	$get_notify = Notification::where('forUser', Auth::user()->id)
					->orderBy('id',  'DESC')
					->get();
		if(Auth::user()->role_id == env('ADMIN')){
			return view('admin.notifications')->with(compact('get_notify'));
		}else{
			return view('backend.notifications')->with(compact('get_notify'));
		}
		
	}

	public function readNotify($id)
    {
        $user_id = Auth::user()->id;
        Notification::where('forUser', $user_id)->where('id', $id)->update(['read' => 1]);
    }
}
