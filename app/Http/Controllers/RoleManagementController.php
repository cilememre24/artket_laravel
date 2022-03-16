<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermissionModel;
use DB;

class RoleManagementController extends Controller
{
    public function index(){

        $ids = array("1","2","3","4","7","11","12","13","14");
        $admin_permissions=DB::table('permissions')
           ->whereIn('id', (array) $ids)
           ->get();

        $ids2 = array("1","2","3","4","5","6","7","8","9","11");
        $artist_permissions=DB::table('permissions')
            ->whereIn('id', (array) $ids2)
            ->get();

        $ids3 = array("1","4","5","6","8","9","10");
        $prof_permissions=DB::table('permissions')
            ->whereIn('id', (array) $ids3)
            ->get();


        return view('admin/role_management',['admin_permissions'=>$admin_permissions,'artist_permissions'=>$artist_permissions,'prof_permissions'=>$prof_permissions]);
    }
}
