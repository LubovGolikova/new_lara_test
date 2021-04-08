<?php


namespace App\Repositories;

use App\Models\UserRole;
class RoleRepository
{
    public function create($arrElc)
    {
        return UserRole::create([
            'user_id' => $arrElc['user_id'],
            'role_id' => $arrElc['role_id']
        ]);
    }

    public function edit($arrElc)
    {

//        return null;
    }
}
