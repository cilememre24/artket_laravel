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
use Illuminate\Support\Facades\Crypt;
use DB;

class ProfileController extends Controller
{
    public function index($id){

        $current_user_id = session('current_user_id');
        
        $id =  Crypt::decrypt($id);
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
        $video_posts=VideoPostModel::select("*")->get();
        $audio_posts=AudioPostModel::select("*")->get();
        return view('profile',['user' => $user ,'current_user_id'=>$current_user_id, 'num_of_posts' =>  $num_of_posts , 'num_of_followers'=> $num_of_followers , 'num_of_following'=> $num_of_following ,'is_follower'=>$is_follower,'timeline_post'=>$timeline_post,'video_posts'=>$video_posts,'audio_posts'=>$audio_posts] );
    }

    public function view_profile_post($id){

        $id =  Crypt::decrypt($id);
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
        $id =  Crypt::decrypt($id);
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
        $id =  Crypt::decrypt($id);
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

    public function autoCompleteAjax(Request $request)
    {
        $search=  $request->term;
        
        $users = UserModel::where('username','LIKE',"%{$search}%")
                       ->limit(5)->get();

        if(!$users->isEmpty())
        {
            foreach($users as $user)
            {
                
                $new_row['title']= $user->username;
	            $new_row['image']= Helper::catch_first_image($user->profile_picture);
                $new_row['url']= url('profile/'.Crypt::encrypt($user->id));
                
                $row_set[] = $new_row; //build an array
            }
        }
        
        echo json_encode($row_set); 
    }
}
