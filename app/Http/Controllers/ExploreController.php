<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;

class ExploreController extends Controller
{
    public function index(){

        $data=PostModel::select("*")
        ->inRandomOrder()
        ->get();

        return view('explore',['posts' => $data]);
    }

    public function show_with_category($cat_id){
        if($cat_id==1){
            $data = PostModel::select("*")
            ->where('type','text')
            ->inRandomOrder()
            ->get();
        }elseif($cat_id==2){
            $data = PostModel::select("*")
            ->where('type','image')
            ->inRandomOrder()
            ->get();
        }elseif($cat_id==3){
            $data = PostModel::select("*")
            ->where('type','video')
            ->inRandomOrder()
            ->get();
        }elseif($cat_id==4){
            $data = PostModel::select("*")
            ->where('type','audio')
            ->inRandomOrder()
            ->get();
        }else{
            $data=PostModel::select("*")
            ->inRandomOrder()
            ->get();
        }

    return view('partials.explore_body',['posts' => $data]);
    }
}
