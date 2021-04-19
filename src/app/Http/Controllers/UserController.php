<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserIdRequest;
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
     * @param UserRoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function detach(UserRoleRequest $request)
    {
        $validated = $request->validated();
        $usersDischarge = app()->make('UserService')->detach($validated);
        return response()->json($usersDischarge);
    }

    /**
     * @param UserRoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function reassign(UserRoleRequest $request)
    {
        $validated = $request->validated();
        $usersDischarge = app()->make('UserService')->reassign($validated);
        return response()->json($usersDischarge);
    }

    /**
     * @param UserIdRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(UserIdRequest $request)
    {
        $validated = $request->validated();
        $deleteData = app()->make('UserService')->destroy($validated);
        return response()->json($deleteData);
    }
}
