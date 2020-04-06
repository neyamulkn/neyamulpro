<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\user;
use Auth;
use Toastr;
use Redirect;
class userController extends Controller
{

    public function dashboard(){
        if(Auth::user()->role_id == env('ADMIN')){
            return Redirect::route('admin_dashboard');
        }elseif(Auth::user()->role_id == env('BUYER')){
            return view('backend.dashboard');
        }
        elseif(Auth::user()->role_id == env('FRELANCER')){
            return view('backend.dashboard');
        }else{
            return Redirect::route('404');
        }   
    }

    public function user_register(Request $data)
    {
       $this->validation($data);
        $ip = $_SERVER['REMOTE_ADDR'];
        $country = file_get_contents('https://ipapi.co/'.$ip.'/country_name/');
        $user = new user;
            $user->name = $data->name;
            $user->username = str_slug($data->name);
            $user->email = $data->email;
            $user->password = Hash::make($data->password);
            $user->account_type = $data->account_type;
            $user->country = 'Bangldesh'; //$country
            $get = $user->save();
        
    }

    public function validation($data)
    {
        return $this->validate($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'account_type' => ['required'],
        ]);
    }

    public function switchUser(){
        $user = User::find(Auth::user()->id);

        if($user->role_id == env('BUYER')){
            $user->update(['role_id' => env('FRELANCER')]);
            Toastr::success('Switch To Seller');
        }else{
            $user->update(['role_id' => env('BUYER')]);
            Toastr::success('Switch To Buyer');
        }
        return back();
    }
}
