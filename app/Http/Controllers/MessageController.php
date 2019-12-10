<?php

namespace App\Http\Controllers;

use App\message;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Image;
class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function inbox($username = null)
    {
        $user_id = Auth::user()->id;
        $conversation_list= DB::table('conversation')
        ->where('conversation.from_user', $user_id)
        ->orWhere('conversation.to_user', $user_id)
        ->orderBy('con_id', 'DESC')
        ->get();
//dd($conversation_list);
        // $get_message = DB::table('users')
        //     ->join('users', 'conversation.to_user', 'users.id')
        //     ->where('username', $username)
        //     ->first();


        $conversations_data = 
            [
                'conversation_list' => $conversation_list
            ];
       return view('backend.inbox')->with($conversations_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getuser($id)
    {
        $user_id = Auth::user()->id;
        $get_conversation = DB::table('conversation')
            ->join('users', 'conversation.to_user', '=', 'users.id')
            ->where('conversation.from_user', $user_id)
            ->where('users.username', $id)
            ->first();
       
       $get_messages = DB::table('messages')
            ->join('users', 'messages.to_user', '=', 'users.id')
            ->leftJoin('userinfos', 'messages.to_user', '=', 'userinfos.user_id')
            ->where('conversion_id', $get_conversation->con_id)
            ->orderBy('msg_id', 'ASC')
            ->get();

            foreach ($get_messages  as $get_message) {

                if( $get_message->from_user == $user_id){
                echo '
                    <div class="d-flex justify-content-start mb-4">
                        <div class="msg_cotainer">
                           '.$get_message->msg.count($get_messages).'
                            <span class="msg_time">8:40 AM, Today</span>
                        </div>
                    </div>';
                }else{
                    echo '<div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                   '.$get_message->msg.'
                                    <span class="msg_time_send">8:55 AM, Today</span>
                                </div>
                            </div>';
                }
            }
    }

    public function message_send(Request $request){
        $user_id = Auth::user()->id;
        $to_user = $request->to_user;

        $request_data = $request->except(['image', 'file', '_token']);

        $image_name = null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().$user_id.rand('123456', '999999').".".$image->getClientOriginalExtension();
            $image_path = public_path('images/message/thumb_img/'.$image_name );
            $image_resize = Image::make($image);
            $image_resize->resize(300, 300);
            $image_resize->save($image_path);

            $image_path = public_path('images/message/'.$image_name );
            Image::make($image)->save($image_path);
        }

        $file_name = null;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $file_name = time().$user_id.rand('123456', '999999').".".$image->getClientOriginalExtension();
            $file_path = public_path('images/message/'.$file_name );
            Image::make($file)->save($file_path);
        }

        // check wheather allready conversation 
        $get_conversation = DB::table('conversation')
             ->where(function ($query) use ($user_id, $to_user) {
                    $query->where('from_user', $user_id)
                            ->where('to_user', $to_user);
                })
                ->orWhere(function ($query) use ($user_id, $to_user) {
                    $query->where('from_user', $to_user)
                            ->where('to_user', $user_id);
                })->first();

        if($get_conversation){
            $conversation_id = $get_conversation->con_id; 
        }else{
            $conversation_id = DB::table('conversation')->insertGetId(['to_user' => $user_id, 'from_user' => $to_user]);
           
        }

        $data = [
            'from_user' => $user_id,
            'to_user' => $to_user,
            'conversion_id' =>  $conversation_id, //not mandotary
            'msg' => $request->message,
            'image' => $image_name,
            'file' => $file_name
        ];

        message::create($data);

        return back();

    }

    public function getmessages($username=null)
    {
        $user_id = Auth::user()->id;
        $userinfo = DB::table('users')
            ->leftJoin('userinfos', 'users.id', '=', 'userinfos.user_id')
            ->where('users.username', $username)
            ->select('users.username', 'users.id', 'userinfos.user_image')
            ->first();
       

        if($userinfo){
            $to_user = $userinfo->id;
            $get_messages = DB::table('messages')
                
                ->where(function ($query) use ($user_id, $to_user) {
                    $query->where('from_user', $user_id)
                            ->where('to_user', $to_user);
                })
                ->orWhere(function ($query) use ($user_id, $to_user) {
                    $query->where('from_user', $to_user)
                            ->where('to_user', $user_id);
                })->orderBy('msg_id', 'ASC')->get();

//                 echo $to_user;
// //dd($get_messages);
            echo view('backend.message')->with(compact('get_messages','userinfo'));
        }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(message $message)
    {
        //
    }
}
