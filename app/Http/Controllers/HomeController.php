<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
 
    public function index()
    {

        if(!Auth::check()){
            return view('frontend/index');
        }else{
            if(Auth::user()->role_id == '3'){
                return redirect('workplace');
            }
            if(Auth::user()->role_id == '2'){
                return redirect('marketplace');
            }
            return redirect('workplace');
        }
    }
}
