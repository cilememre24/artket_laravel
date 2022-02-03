<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Models\UserModel;

class PostController extends Controller
{
    public function index($id){

        $post=PostModel::find($id);

        $user_id=$post['user_id'];
        
        $user=UserModel::find($user_id);
        
        return view('post',['post' => $post,'user' => $user]);
    }
}
