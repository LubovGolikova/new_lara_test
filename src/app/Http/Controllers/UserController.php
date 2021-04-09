<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRoleRequest;
class UserController extends Controller
{
    /**
     * @param UserRoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function assign(UserRoleRequest $request)
    {
        $validated = $request->validated();
        $usersAssigns = app()->make('UserService')->assign($validated);
        return response()->json($usersAssigns);

    }
}
