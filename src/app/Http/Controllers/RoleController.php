<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * @param RoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(RoleRequest $request): string
    {
        $validated = $request->validated();
        $roles = app()->make('RoleService')->create($validated);
        return response()->json($roles);
    }

    /**
     * @param RoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(RoleRequest $request): string
    {
        $validated = $request->validated();
        $roles = app()->make('RoleService')->create($validated);
        return response()->json($roles);
    }

    /**
     * @param RoleRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(RoleRequest $request, int $id): string
    {
        $validated = $request->validated();
        $roles = app()->make('RoleService')->update($id, $validated);
        return response()->json($roles);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $id): string
    {
        $deleteData = app()->make('RoleService')->destroy($id);
        return response()->json($deleteData);
    }
}
