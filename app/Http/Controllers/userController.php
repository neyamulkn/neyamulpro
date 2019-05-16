<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\user;
use Auth;
class userController extends Controller
{
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
}
