<?php

namespace App\Services;

use App\Models\Role;
use App\Repositories\RoleRepository;

class RoleService
{
    protected $roleRepository;

    /**
     * RoleService constructor.
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @param array $createData
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(array $createData)
    {
        try {
            return Role::create($createData);

        } catch(Exception $e) {

            return response()->json(['error' => 'Could not create data'], 500);
        }
    }

    /**
     * @param int $id
     * @param array $editData
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id, array $editData)
    {
        try {
            return Role::updateOrCreate(
                [
                    'id' => $id
                ],
                [
                    'name' => $editData['name']
                ]);

        } catch(Exception $e) {

            return response()->json(['error' => 'Could not update data'], 500);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function destroy(int $id)
    {
        try {
            return Role::destroy($id);

        } catch(Exception $e) {

            return response()->json(['error' => 'Could not destroy user'], 500);
        }
    }
}
