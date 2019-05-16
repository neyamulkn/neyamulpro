<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class affiliateController extends Controller
{
    public function affiliate_program(){
    	return view('backend/affiliate');
    }
}
