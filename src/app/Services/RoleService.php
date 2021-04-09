<?php

namespace App\Services;

use App\Models\UserRole;
use App\Repositories\RoleRepository;
use Tymon\JWTAuth\Facades\JWTAuth;

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
     * @param $userId
     * @param $roleId
     * @return mixed
     */
    public function create()
    {
    }

    /**
     * @param $userId
     * @param $roleId
     */
    public function edit()
    {

    }

    public function delete()
    {
    }
}
