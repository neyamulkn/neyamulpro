<?php

namespace App\Http\Controllers;

use App\Following;
use Illuminate\Http\Request;
use Auth;
class FollowingController extends Controller
{

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $find = Following::where('follower_id', $user_id)->where('following_id', $request->following_id)->first();

        if(!$find){
            $data = ['follower_id' => $user_id, 'following_id' => $request->following_id];

            Following::create($data);
            echo "Following success";
        }else{
            $find->delete();
            echo "Unfollow success";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Following  $following
     * @return \Illuminate\Http\Response
     */
    public function show(Following $following)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Following  $following
     * @return \Illuminate\Http\Response
     */
    public function edit(Following $following)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Following  $following
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Following $following)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Following  $following
     * @return \Illuminate\Http\Response
     */
    public function destroy(Following $following)
    {
        //
    }
}
