<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Models\TextPostModel;
use App\Models\ImagePostModel;
use App\Models\VideoPostModel;
use App\Models\AudioPostModel;
use App\Models\UserModel;
use App\Models\CommentModel;
use App\Models\VoteModel;
use Illuminate\Support\Facades\Crypt;

class PostController extends Controller
{
    public function index($id){
        //current user info
        $current_user_id = session('current_user_id');

        $id =  Crypt::decrypt($id);
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

        //video or audio post
        $video_posts=VideoPostModel::select("*")->get();
        $audio_posts=AudioPostModel::select("*")->get();

        return view('post',['post' => $post,'user' => $user,'comments' => $comments,'vote' => $vote,'is_voted' => $is_voted, 'text_post' => $text_post, 'video_posts' => $video_posts,'audio_posts'=>$audio_posts]);
    }

    
    public function next($id){
        //current user info
        $current_user_id = session('current_user_id');

        $id =  Crypt::decrypt($id);
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

    public function view_create_post($type){
        if($type == 'text'){
            return view('partials.create_text_post');
        }elseif($type == 'image'){
            return view('partials.create_image_post');
        }if($type == 'video'){
            return view('partials.create_video_post');
        }else{
            return view('partials.create_audio_post');
        }
    }


    public function create_post(Request $request,$type){
        $current_user_id = session('current_user_id');

        $title = $request -> title;
        $description = $request -> description;
        $is_spam = 0;

        $img_name = $request -> fileToUpload -> getClientOriginalName();
        $img_path = 'upload/images/' . $img_name;

        $img_size = $_FILES["fileToUpload"]['size'];

        $upload=$request -> fileToUpload -> move(public_path('upload/images/'),$img_name);

        if($type=='video'){
            $video_name = $request -> videoToUpload -> getClientOriginalName();
            $video_path = 'upload/videos/' . $video_name;
    
            $video_size = $_FILES["videoToUpload"]['size'];
            $upload=$request -> videoToUpload -> move(public_path('upload/videos/'),$video_name);
        }

        if($type=='audio'){
            $audio_name = $request -> audioToUpload -> getClientOriginalName();
            $audio_path = 'upload/audios/' . $audio_name;
    
            $audio_size = $_FILES["audioToUpload"]['size'];
            $upload=$request -> audioToUpload -> move(public_path('upload/audios/'),$audio_name);
        }
        $post=PostModel::create([
            "title" => $title,
            "description" => $description,
            "is_spam" => $is_spam,
            "user_id" => $current_user_id,
            "image_path" => $img_path,
            "image_size" => $img_size,
            "type" => $type,

        ]);

        $context = $request -> context;

        if($type=='text'){
            TextPostModel::create([
                "post_id" => $post['id'],
                "context" => $context,
            ]);
        }else if($type=='image'){
            ImagePostModel::create([
                "post_id" => $post['id'],
            ]);
        }else if($type=='video'){
            VideoPostModel::create([
                "post_id" => $post['id'],
                "video_target" => $video_path,
                "video_size" => $video_size,
            ]);
        }else{
            AudioPostModel::create([
                "post_id" => $post['id'],
                "audio_target" => $audio_path,
                "audio_size" => $audio_size,
            ]);
        }

        $current_user_id = session('current_user_id');

        return (new ProfileController)->index(Crypt::encrypt($current_user_id));
        
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
