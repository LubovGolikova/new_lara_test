<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create()
    {
        $roles = app()->make('RoleService')->create();
        return response()->json($roles);
    }
}
