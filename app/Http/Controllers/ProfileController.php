<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\PostModel;
use App\Models\TextPostModel;
use App\Models\ImagePostModel;
use App\Models\VideoPostModel;
use App\Models\AudioPostModel;
use App\Models\RelationshipModel;

class ProfileController extends Controller
{
    public function index($id){
        $current_user_id = session('current_user_id');

        $user=UserModel::find($id);

        //total number of posts
        $num_of_posts=PostModel::where("user_id",$id)->count();

        //number of followers
        $num_of_followers= RelationshipModel::where("following_id",$id)->count();

        //number of following
        $num_of_following = RelationshipModel::where("follower_id", $id)->count();

        $relationship = RelationshipModel::where('follower_id', $current_user_id)->where('following_id',$id)->get();

        if($relationship->isEmpty()){
            $is_follower=0;    
        }else{
            $is_follower=1;
        }

        return view('profile',['user' => $user ,'current_user_id'=>$current_user_id, 'num_of_posts' =>  $num_of_posts , 'num_of_followers'=> $num_of_followers , 'num_of_following'=> $num_of_following ,'is_follower'=>$is_follower] );
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
            ]);
        }else{
            AudioPostModel::create([
                "post_id" => $post['id'],
            ]);
        }



        return back();
        
    }

    public function view_profile_post(){

        return view('profile_post');
    }

    public function follow($id){
        $current_user_id = session('current_user_id');
        $new_relationship= RelationshipModel::create([
            "follower_id" => $current_user_id,
            "following_id" => $id
        ]);

        return back();
    }

    public function unfollow($id){
        $current_user_id = session('current_user_id');
        RelationshipModel::where('follower_id', $current_user_id)->where('following_id',$id)-> delete();

        return back();
    }
}
