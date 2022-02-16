<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopListManagementController extends Controller
{
    public function index(){


        return view('admin/top_list_management');
    }
}
