<?php

namespace App\Services;

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
    public function create($userId, $roleId)
    {
        $arrElc = [];
        $arrElc['user_id'] = $userId;
        $arrElc['role_id'] = $roleId;
        return $this->roleRepository->create($arrElc);
    }

    /**
     * @param $userId
     * @param $roleId
     */
    public function edit($userId, $roleId)
    {
        $arrElc = [];
        $arrElc['user_id'] = $userId;
        $arrElc['role_id'] = $roleId;
        return $this->roleRepository->edit($arrElc);
    }
}
