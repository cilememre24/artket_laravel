<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\CommentModel;


class PostController extends Controller
{
    public function index($id){

        $post=PostModel::find($id);

        $user_id=$post['user_id'];
        
        $user=UserModel::find($user_id);

        $comments=CommentModel::where("posts_id",$id)->orderBy('created_at', 'DESC')->get();
        
        return view('post',['post' => $post,'user' => $user,'comments' => $comments]);
    }

    public function make_comment(Request $request,$id){
        $current_user_id = session('current_user_id');

        $content = $request -> comment;

        $comment=CommentModel::create([
            "content" => $content,
            "users_id" => $current_user_id,
            "posts_id" => $id,
        ]);
        return back();
        
    }

    public function next($id){
        return view('post_next');
    }
}
