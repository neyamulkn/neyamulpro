<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class earningController extends Controller
{
    public function earnings_view(){
    	return view('backend.statement');
    }
}
