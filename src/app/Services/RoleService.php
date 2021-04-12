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
     * @return mixed
     */
    public function create(array $createData)
    {
        try {
            return Role::create($createData);

        } catch(Exception $e) {

        }
    }

    /**
     * @param int $id
     * @param array $editData
     * @return mixed
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

        }
    }

    /**
     * @param int $id
     * @return int
     */
    public function destroy(int $id)
    {
        try {
            return Role::destroy($id);

        } catch(Exception $e) {

        }
    }
}
