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
}
