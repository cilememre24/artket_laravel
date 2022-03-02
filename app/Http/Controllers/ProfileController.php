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
use DB;

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

        //for timeline
        $timeline_post=PostModel::where("user_id",$id)->orderBy('created_at', 'DESC')->get();

        return view('profile',['user' => $user ,'current_user_id'=>$current_user_id, 'num_of_posts' =>  $num_of_posts , 'num_of_followers'=> $num_of_followers , 'num_of_following'=> $num_of_following ,'is_follower'=>$is_follower,'timeline_post'=>$timeline_post] );
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

    public function view_profile_post($id){

        $user=UserModel::find($id);

        $posts=PostModel::where("user_id",$id)->orderBy('created_at', 'DESC')->get();

        return view('profile_post',['posts'=>$posts,'user'=>$user]);
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

    
    public function view_followers_list($id){

        $current_user_id = session('current_user_id');
        $user=UserModel::find($id);
        //ziyaret edilen profil
        $visiting_id = $user->id;
        
        //profilinde olduğum kişiyi takip edenler 50
        $followers = DB::select("select users.id, users.username, users.imgfile_path, users.first_name,users.last_name
        from users JOIN  relationship ON users.id = relationship.follower_id 
        where relationship.following_id =" . $visiting_id . " ");
        //profilinde olduğum kişinin takip ettikleri 50
        $followings = DB::select("select users.id, users.username, users.imgfile_path, users.first_name,users.last_name
        from users left JOIN  relationship ON users.id = relationship.following_id 
        where relationship.follower_id =" . $visiting_id . " ");

        //follower list
        $follower_list =collect();
        foreach($followers as $follower){
            $follower_list->push($follower->id);
        }
        //following list
        $following_list =collect();
        foreach($followings as $following){
            $following_list->push($following->id);
        }

        //benim takip ettiklerim 53
        $visiter_followings = DB::select("select users.id, users.username, users.imgfile_path, users.first_name,users.last_name
        from users left JOIN  relationship ON users.id = relationship.following_id 
        where relationship.follower_id =" . $current_user_id . " ");

        $visiter_followings_list = collect();
        foreach($visiter_followings as $following){
            $visiter_followings_list->push($following->id);
        }


        return view('followers_list' , ['followers'=>$followers, 'current_user_id'=>$current_user_id , 'user'=>$user, 'visiter_followings_list'=> $visiter_followings_list,'following_list'=> $following_list,'follower_list'=> $follower_list] );
    }

    public function view_followings_list($id){

        $current_user_id = session('current_user_id');
        $user=UserModel::find($id);
        $visiter_id = $user->id;

        //giriş yapan kişinin takip  ettikleri 50
        $followings = DB::select("select users.id, users.username, users.imgfile_path, users.first_name,users.last_name
        from users left JOIN  relationship ON users.id = relationship.following_id 
        where relationship.follower_id =" . $visiter_id  . " ");
 
        //following list
        $following_list =collect();
        foreach($followings as $following){
            $following_list->push($following->id);
        }

        //ziyaret eden kişinin takip ettikleri 53
        $visiter_followings = DB::select("select users.id, users.username, users.imgfile_path, users.first_name,users.last_name
        from users left JOIN  relationship ON users.id = relationship.following_id 
        where relationship.follower_id =" . $current_user_id . " ");

        $visiter_followings_list =collect();
        foreach($visiter_followings as $following){
            $visiter_followings_list->push($following->id);
        }

        return view('following_list', [ 'followings'=> $followings,'current_user_id'=>$current_user_id , 'user'=>$user, 
         'visiter_followings_list'=> $visiter_followings_list,'following_list'=> $following_list]);
    }
}
