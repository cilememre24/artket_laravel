<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermissionModel;

class PermissionManagementController extends Controller
{
    public function index(){

        $permissions=PermissionModel::select("*")
        ->get();

        return view('admin/permission_management',['permissions'=>$permissions]);
    }
}
