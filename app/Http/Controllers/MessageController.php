<?php

namespace App\Http\Controllers;

use App\message;
use App\conversation;
use Illuminate\Http\Request;
use Auth;
use DB;
class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function inbox($username="")
    {
        $user_id = Auth::user()->id;
        $conversation_list= DB::table('conversation')
        ->join('users', 'conversation.to_user', '=', 'users.id')
        ->leftJoin('userinfos', 'conversation.to_user', '=', 'userinfos.user_id')
        ->leftJoin('messages', 'conversation.to_user', '=', 'messages.conversion_id')
        ->where('conversation.from_user', $user_id)
        ->select('conversation.*', 'userinfos.user_image', 'users.*', 'messages.*')
        ->get();



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
    public function getmessages($id)
    {
        $user_id = Auth::user()->id;
        $get_conversation = DB::table('conversation')
            ->where('from_user', $user_id)
            ->where('to_user', $id)
            ->first();
       
       $get_messages = DB::table('messages')
            ->join('users', 'messages.to_user', '=', 'users.id')
            ->join('userinfos', 'messages.to_user', '=', 'userinfos.user_id')
            ->where('conversion_id', $get_conversation->con_id)
            ->get();

            foreach ($get_messages  as $get_message) {
                $image_path =  asset('/image/'.$get_message->user_image);

                if( $get_message->from_user == $user_id){
                echo '
                      <!-- MESSAGE PREVIEW -->
                        <div class="getmessages" style="margin:4px;">

                        <div class="row">
                            <figure class="user-avatar col-md-1 col-sm-1" >
                                <img src="'.$image_path.'" alt="user-avatar">
                            </figure>
                            <p class="text-header col-md-6 col-sm-6">' .$get_message->name.' <br>
                            <span class="timestamp"> May 19th, 2014 - 3:47PM </span></p>
                            
                        </div>
                            <p style="margin-top:-20px; padding-left: 47px; line-height: 20px;">'.$get_message->msg.'
                            </p>
                        </div><hr class="line-separator">
                ';
                }else{
                    echo '<div class="getmessages" style=" margin:4px;">

                        <div class="row">
                            <figure class="user-avatar col-md-1 col-sm-1" >
                                <img src="'.$image_path.'" alt="user-avatar">
                            </figure>
                            <p class="text-header col-md-6 col-sm-6">' .$get_message->name.' <br>
                            <span class="timestamp"> May 19th, 2014 - 3:47PM </span></p>
                            
                        </div>
                            <p style="margin-top:-20px; padding-left: 47px; line-height: 20px;">'.$get_message->msg.'
                            </p>
                        </div><hr class="line-separator">';
                }
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
