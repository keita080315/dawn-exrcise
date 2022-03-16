<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{

    //



    public function index(){

        $user = Auth::user();
        $list = DB::table('posts')->get();
        return view('posts.index',compact('user','list'));

    }

    public function post(Request $request){
        $user = Auth::user();
        $posts = $request->input('post-content');
        $username = $request->input('username');
        DB::table('posts')->insert([
            'username' =>$username,
            'posts' => $posts
        ]);
        $list = DB::table('posts')->get();
        return view('posts.index',compact('list','user'));

    }




}
