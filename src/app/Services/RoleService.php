<?php

namespace  App\Services;
use App\Repositories\RoleRepository;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function create()
    {
        return $this->roleRepository->create();
    }

}
