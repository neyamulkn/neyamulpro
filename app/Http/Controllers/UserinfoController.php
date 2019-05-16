<?php

namespace App\Http\Controllers;

use App\userinfo;
use Illuminate\Http\Request;
use Auth;
use App\user;
use DB;
class UserinfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile_setting(){
        $user = Auth::user();
        $userinfo = Auth::user()->userinfo; // join userinfo table 
        $get_timezone = DB::table('timezones')->get();
        $get_key_skills  = DB::table('key_skills')->get();
        $get_key_keyword = DB::table('key_keyword')->get();
        $get_language = DB::table('languages')->get();

        $user_data = [
            'user' => $user,
            'userinfo' => $userinfo,
            'get_timezone' => $get_timezone,
            'get_key_skills' => $get_key_skills,
            'get_key_keyword' => $get_key_keyword,
            'get_language' => $get_language
        ];
        return view('backend.profile-setting')->with($user_data);
    }

    public function check_email(Request $request){
        $email = $request->email;
        $get_email = Auth::user()->email;
        if($get_email != $email){
            $checkemail = user::where('email', $email)->first();
            if($checkemail){
                echo "Sorry email allready taken!.";
            }
        }
    }

    public function user_image(Request $request){
        $get_id = Auth::user()->id;

        $this->validate($request, [
            'user_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $image = $request->file('user_image');
        $new_image_name = rand() .'.'. $image->getClientOriginalExtension();

        $image->move(public_path('image'), $new_image_name);

        $user_image = [
            'user_image' => $new_image_name,
        ];

        userinfo::where('user_id', $get_id)->update($user_image);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function location_update(Request $request)
    {
        $get_id = Auth::user()->id;

        $userlocation = [
            'language' => $request->language,
            'lang_level' => $request->lang_level,
            'user_timezone' => $request->user_timezone,
            'user_state' => $request->user_state,
            'zip_code' => $request->zip_code,
            'user_phone' => $request->user_phone,
            'user_address' => $request->user_address,
        ];

        userinfo::where('user_id', $get_id)->update($userlocation);
        return back();
    }

    public function experience_update(Request $request)
    {
        $get_id = Auth::user()->id;
        userinfo::where('user_id', $get_id)->update(['skill_level' => $request->experience_level]);
        return back();
    }


    public function skillTags_update(Request $request)
    {  
        
        $get_id = Auth::user()->id;
        $user_skills = $request->user_skills;
        $user_tags = $request->user_tags;

        if(!empty($user_skills)){
            $user_skills = implode(',', $user_skills);
        }
        if(!empty($user_tags)){
            $user_tags = implode(',', $user_tags);
        }  
        $alldata = [
        'user_skills'=> $user_skills,
        'user_tags' => $user_tags
        ];
        userinfo::where('user_id', $get_id)->update($alldata );
        return back();
    }

    public function update(Request $request)
    {
        $get_id = Auth::user()->id;

        $userdata = [
            'name' => $request->name,
            'email' => $request->email,
            'hourly_rate' =>$request->hourly_rate
        ];
        $user = user::where('id', $get_id)->update($userdata);
        
        $userinfodata = [
            'user_title' => $request->user_title,
            'user_description' => $request->user_description,
            'user_additional_info' => $request->additional_info,
        ];

        $userinfo = userinfo::where('user_id', $get_id)->update($userinfodata);
        if(!empty($user) && !empty($userinfo)){
            echo "succcess";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\userinfo  $userinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(userinfo $userinfo)
    {
        //
    }
}
