<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
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

    public function suggest_keyword(Request $request){
       $get_keyord = DB::table('key_keyword')->select('keyword_name')->where('key_keyword.keyword_name', 'LIKE', '%'. $request->src_key .'%')->get();
       if(count($get_keyord)>0){
            foreach ($get_keyord as $key) { // if search from index page
               echo '<li><a href="'.(isset($request->route) ? route($request->route) : '').'?item='.$key->keyword_name.'" >'.$key->keyword_name.'</a></li>';
            }
       }
    }


    public function search_keyword(Request $request){
        $get_keyord = DB::table('key_keyword')->select('keyword_name')->where('key_keyword.keyword_name', 'LIKE', '%'. $request->q .'%')->get();
            $tags = array(); 
           foreach ($get_keyord as $value) {
               array_push($tags, $value->keyword_name);
           }
        echo json_encode($tags);
    }



}
