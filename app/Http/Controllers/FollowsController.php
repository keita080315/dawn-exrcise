<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\User;

class FollowsController extends Controller
{
    //
    public function follow(int $id){
        $user = Auth::User();
        $exists = Follow::create([
            'follow' => $user['id'],
            'follower' => $id,
        ]);
        $params = User::find($id);
        return view('users.detail',compact('params','user','exists'));
    }
    public function lift(int $id){
        $user = Auth::User();
        $user_ids = Follow::where('id', $id)->first();
        Follow::destroy($id);
        $params = User::find($user_ids['follower']);
        return view('users.detail',compact('params','user'));
    }
}
