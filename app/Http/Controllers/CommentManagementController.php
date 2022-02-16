<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentManagementController extends Controller
{
    public function index(){


        return view('admin/comment_management');
    }
}
