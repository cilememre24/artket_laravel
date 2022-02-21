<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Models\VoteModel;
use DB;

class TopListController extends Controller
{
    public function index(){

        $ordered_posts = DB::table('votes')
        ->join('posts', 'votes.post_id', '=', 'posts.id')
        ->select('posts.*','votes.value')
        ->orderBy('votes.value', 'DESC')
        ->get();

        return view('top_list',['ordered_posts' => $ordered_posts]);
    }
}
