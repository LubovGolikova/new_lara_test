<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{

    public function index()
    {
        dd("index F!!! route get");
    }

    /**
     * @param RoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(RoleRequest $request)
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
    public function store(RoleRequest $request)
    {
        $validated = $request->validated();
        $roles = app()->make('RoleService')->create($validated);
        return response()->json($roles);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        dd("edit  F!!!");
    }


    /**
     * @param RoleRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(RoleRequest $request, $id)
    {
        $validated = $request->validated();
        $roles = app()->make('RoleService')->update($id, $validated);
        return response()->json($roles);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy($id)
    {
        $deleteData = app()->make('RoleService')->destroy($id);
        return response()->json($deleteData);
    }
}
