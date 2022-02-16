<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Models\TextPostModel;
use App\Models\UserModel;
use App\Models\CommentModel;
use App\Models\VoteModel;

class PostController extends Controller
{
    public function index($id){
        //current user info
        $current_user_id = session('current_user_id');

        $post=PostModel::find($id);

        $text_post=TextPostModel::where("post_id",$id)->get();

        //user that share the post
        $user_id=$post['user_id'];
        $user=UserModel::find($user_id);

        //post comments
        $comments=CommentModel::where("posts_id",$id)->orderBy('created_at', 'DESC')->get();

        //post votes
        $total_vote=VoteModel::where("post_id",$id)->sum('value');
        $num_of_users=VoteModel::where("post_id",$id)->count();

        if($num_of_users!=0){
            $vote=$total_vote/$num_of_users;
        }else{
            $vote=0;
        }

        $vote_person=VoteModel::where("post_id",$id)->where("user_id",$current_user_id)->get();

        if($vote_person->isEmpty()){
            $is_voted=false;
        }else{
            $is_voted=true;
        }

        return view('post',['post' => $post,'user' => $user,'comments' => $comments,'vote' => $vote,'is_voted' => $is_voted, 'text_post' => $text_post]);
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
                //current user info
                $current_user_id = session('current_user_id');

                $post=PostModel::find($id);
        
                $text_post=TextPostModel::where("post_id",$id)->get();

                //user that share the post
                $user_id=$post['user_id'];
                $user=UserModel::find($user_id);
        
                //post comments
                $comments=CommentModel::where("posts_id",$id)->orderBy('created_at', 'DESC')->get();
        
                //post votes
                $total_vote=VoteModel::where("post_id",$id)->sum('value');
                $num_of_users=VoteModel::where("post_id",$id)->count();
        
                if($num_of_users!=0){
                    $vote=$total_vote/$num_of_users;
                }else{
                    $vote=0;
                }

                $vote_person=VoteModel::where("post_id",$id)->where("user_id",$current_user_id)->get();

                if($vote_person->isEmpty()){
                    $is_voted=false;
                }else{
                    $is_voted=true;
                }

                return view('post_next',['post' => $post,'user' => $user,'comments' => $comments,'vote' => $vote,'is_voted' => $is_voted,'text_post'=>$text_post]);
    }

    public function vote(Request $request,$id){
        $current_user_id = session('current_user_id');

        $value = $request -> vote_num;

        $vote=VoteModel::create([
            "user_id" => $current_user_id,
            "post_id" => $id,
            "value" => $value,
        ]);
        return back();
        
    }

}
