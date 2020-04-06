<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\userinfo;
use Session;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'account_type' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $username = str_slug($data['name']);
        $check_duplicate = User::where('username', $username)->first();
        if($check_duplicate){
            Session::flash('error', 'sorry username allready taken.');
            return redirect('register');
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
            // $country = file_get_contents('https://ipapi.co/'.$ip.'/country_name/');
            $user = new user;
            $user->name = $data['name'];
            $user->username = $username;
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->role_id = $data['account_type'];
            $user->country = 'Bangldesh'; //$country
            $user->save();
           
            $getlastId = [
            'user_id' =>$user->id,
            'user_image' => 'defualt.png'
            ];
        
            Userinfo::create($getlastId);
 
            return $user;
        }
    }
}
