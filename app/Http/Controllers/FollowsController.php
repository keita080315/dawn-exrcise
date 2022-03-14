<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(){
        $follow = FollowUser::create([
            'following_user_id' => \Auth::user()->id,
            'followed_user_id' => $user->id,
        ]);
        $followCount = count(FollowUser::where('followed_user_id', $user->id)->get());
        return response()->json(['followCount' => $followCount]);
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
}
