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
        return Role::create($createData);
    }

    /**
     * @return mixed
     */
    public function update($id,$editData)
    {
        return Role::updateOrCreate(
            [
            'id' => $id
            ],
            [
            'name' => $editData['name']
            ]);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return Role::destroy($id);
    }
}
