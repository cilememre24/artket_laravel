<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionManagementController extends Controller
{
    public function index(){


        return view('admin/permission_management');
    }
}
