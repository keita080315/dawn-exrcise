<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;



class PostsController extends Controller
{

    //



    public function index(){
        $user = Auth::user();
////        $lists = DB::table('posts')->get();
//
//        $follows = Follow::where('follow', '=', $user->id)->get();
//        $follow_ids = [];
//        foreach ($follows as $follow) {
//            $follow_ids[] = $follow->follower;
//        }
//
//        $follow_post = Post::whereIn('user_id', $follow_ids)->get();
        $follow_post = Post::whereIn('user_id',Auth::user()->follows()->pluck('follower'))->orWhere('user_id',$user->id)->latest()->get();

        return view('posts.index',compact('user','follow_post'));

    }

    public function post(Request $request){
        $user = Auth::user();
        $posts = $request->input('post-content');
        $username = $request->input('username');
        DB::table('posts')->insert([
            'user_id' =>$user->id,
            'username' =>$username,
            'posts' => $posts
        ]);
//        $list = DB::table('posts')->get();
//        return view('posts.index',compact('list','user'));
        return redirect('/top');

    }




}
//class PostsController extends Controller
//{
//
//    //
//
//
//
//    public function index(){
//        $user = Auth::user();
////        $lists = DB::table('posts')->get();
//        $follow_list = Follow::where('follow','=',$user->id)->get();
//        $follow_post = Post::where('user_id','=',$follow_list->follow)->get();
//        return view('posts.index',compact('user','follow_post'));
//
//    }
//
//    public function post(Request $request){
//        $user = Auth::user();
//        $posts = $request->input('post-content');
//        $username = $request->input('username');
//        DB::table('posts')->insert([
//            'user_id' =>$user->id,
//            'username' =>$username,
//            'posts' => $posts
//        ]);
////        $list = DB::table('posts')->get();
////        return view('posts.index',compact('list','user'));
//        return redirect('/top');
//
//    }
//
//
//
//
//}
