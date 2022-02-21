<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\RoleModel;
use DB;

class UserManagementController extends Controller
{
    public function index(){

        $admin_count=RoleModel::where("label",1)->count();
        $artist_count=RoleModel::where("label",2)->count();
        $prof_count=RoleModel::where("label",3)->count();
        return view('admin/user_management',['artist_count' => $artist_count,'admin_count' => $admin_count,'prof_count' => $prof_count]);
    }

    public function list_users($label){

        $users = DB::table('users')
            ->join('roles', 'users.id', '=', 'roles.user_id')
            ->select('users.*')
            ->where('roles.label', '=', $label) 
            ->get();

        return view('admin/users_list',['users' => $users, 'label' => $label]);
    }

    public function get_create_form($label){
        return view('admin/create_new_user', ['label' => $label]);
    }

    public function create_user(Request $request, $label){


        $username = $request -> username;
        $email = $request -> email;
        $first_name = $request -> first_name;
        $last_name = $request -> last_name;
        $password = $request -> password;
        $gender = $request -> gender;

        $img_name = $request -> profile_image -> getClientOriginalName();
        $img_path = 'images/' . $img_name;

        $upload=$request -> profile_image -> move(public_path('images/'),$img_name);

        $user=UserModel::create([
            "username" => $username,
            "email" => $email,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "password" => $password,
            "gender" => $gender,
            "profile_picture" => $img_name,
            "imgfile_path" => $img_path,
        ]);

        if($label=="1"){
            RoleModel::create([
                "name" => "Admin",
                "label" => $label,
                "user_id" => $user['id'],
            ]);
        }
        else if($label=="2"){
            RoleModel::create([
                "name" => "Artist",
                "label" => $label,
                "user_id" => $user['id'],
            ]);
        }else{
            RoleModel::create([
                "name" => "EndustryProf",
                "label" => $label,
                "user_id" => $user['id'],
            ]);
        }

        return back();
    }

}
