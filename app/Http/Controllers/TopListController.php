<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;

class TopListController extends Controller
{
    public function index(){

        $data=PostModel::select("*")
        ->inRandomOrder()
        ->get();

        return view('top_list',['posts' => $data]);
    }
}
