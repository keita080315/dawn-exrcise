<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
        $user = Auth::User();
        $query = User::query();
        $search = $request->input('search');
        $query ->where('username','like','%'.$search.'%');

        $select_users = $query -> paginate(10);

        return view('users.search',compact('select_users','user'));
    }
    public function detail(int $id){
        $user = User::find($id);
        $params = [
            'user' => $user,
        ];
        return view('users.detail',compact('params'));
    }

}
