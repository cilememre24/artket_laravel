<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\PostModel;
use App\Models\TextPostModel;
use App\Models\ImagePostModel;
use App\Models\VideoPostModel;
use App\Models\AudioPostModel;

class ProfileController extends Controller
{
    public function index(){
        $current_user_id = session('current_user_id');

        $user=UserModel::find($current_user_id);

        return view('profile',['user' => $user]);
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
}
