<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDeleteRequest;
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

    /**
     * @param UserDeleteRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(UserDeleteRequest $request)
    {
        $validated = $request->validated();
        dd($validated);
        $deleteData = app()->make('UserService')->destroy($validated);
        return response()->json($deleteData);
    }
}
