<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;

class RoleCtrl extends Controller
{
    public function ListRoles(){
        $ListRoles = Role::where('role','user')->get();
        return response()->json(['data' => $ListRoles],200);
    }
}
