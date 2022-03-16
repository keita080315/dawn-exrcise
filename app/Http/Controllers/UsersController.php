<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Follow;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        $if = 0;
        return view('users.profile',compact('user','if'));
    }
    public function update(){
        $user = Auth::user();
        $if = 1;
        return view('users.profile',compact('user','if'));
    }
    public function modify(Request $request){
        $user = Auth::user();
        $attributes =  $request->only(['username', 'bio', 'image']);
        DB::table('users')
            ->where('email', $user['email'])
            ->update(
                [   'username' => $attributes['username'],
                    'bio' => $attributes['bio'],
                    'images' => $attributes['image']
                    ]
            );
        $if = 0;
        $user = Auth::user();
        return view('users.profile',compact('user','if'));
    }
    public function index(){
        $user = Auth::user();
        return view('users.search',compact('user'));
    }
    public function search(Request $request){
        $search = $request->input('search');
        $user = Auth::User();
        $select_users = User::where('username', 'LIKE', "%{$search}%")->where('id','!=',$user->id)->paginate(10);
        return view('users.search',compact('select_users','user'));
    }
    public function detail(int $id){
        $users = User::find($id);
        $params = [
            'id' => $users['id'],
            'username' => $users['username'],
            'bio' => $users['bio'],
            'images' => $users['images'],
        ];
        $user = Auth::User();
        $exists = Follow::where('follow', $user['id'])->where('follower', $params['id'])->first();
        return view('users.detail',compact('params','user','exists'));
    }

}
