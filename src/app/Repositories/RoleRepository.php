<?php


namespace App\Repositories;

use App\Models\UserRole;
class RoleRepository
{
    public function create()
    {
        return UserRole::create([
            'user_id' => 1,
            'role_id' => 1
        ]);
    }
}
