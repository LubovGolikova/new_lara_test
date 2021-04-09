<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleDeleteRequest;
class RoleController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $userId = $request->input('user_id');
        $roleId = $request->input('role_id');
        $roles = app()->make('RoleService')->create($userId, $roleId);
        return response()->json($roles);
    }

    public function delete(RoleDeleteRequest $request)
    {
        $validated = $request->validated();
        dd($validated);
        $deleteData = app()->make('RoleService')->delete($validated);
        return response()->json($deleteData);
    }
}
