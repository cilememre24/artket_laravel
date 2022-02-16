<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Models\TextPostModel;
use App\Models\ImagePostModel;
use App\Models\VideoPostModel;
use App\Models\AudioPostModel;

class PostManagementController extends Controller
{
    public function index(){

        $text_count=TextPostModel::count();
        $image_count=ImagePostModel::count();
        $video_count=VideoPostModel::count();
        $audio_count=AudioPostModel::count();

        return view('admin/post_management',['text_count'=>$text_count,'image_count'=>$image_count,'video_count'=>$video_count,'audio_count'=>$audio_count]);
    }

    public function list_posts($type){

        $posts=PostModel::where('type',$type)->get();
        return view('admin/posts_list',['posts' => $posts]);
    }
}
