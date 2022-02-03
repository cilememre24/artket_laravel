<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\RoleModel;

class SignUpController extends Controller
{
    public function index(){
        return view('sign_up');
    }

    public function add_user(Request $request){

        $img_name = $request -> profile_image -> getClientOriginalName();
        $img_path = public_path('images') . $img_name;
        $username = $request -> username;
        $email = $request -> email;
        $first_name = $request -> first_name;
        $last_name = $request -> last_name;
        $password = $request -> password;
        $gender = $request -> gender;

        $upload=$request -> profile_image -> move(public_path('images'),$img_name);

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

        if($request->submit == "Register Artist"){
            RoleModel::create([
                "name" => "Artist",
                "label" => '2',
                "user_id" => $user['id'],
            ]);
        }else if($request->submit == "Register Professional"){
            RoleModel::create([
                "name" => "EndustryProf",
                "label" => '3',
                "user_id" => $user['id'],
            ]);
        }

    }
}
