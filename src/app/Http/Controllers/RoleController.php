<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create(Request $request)
    {
        $userId = $request->input('user_id');
        $roleId = $request->input('role_id');
        $roles = app()->make('RoleService')->create($userId, $roleId);
        return response()->json($roles);
    }
}
