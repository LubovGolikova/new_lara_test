<?php

namespace App\Traits;

use App\Models\UserRole;
use App\Models\Role;
use Tymon\JWTAuth\Facades\JWTAuth;

trait HasRolesPermissions
{
    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {

        $userId= \Auth::user()->id;
        $roleUsers = UserRole::query()
            ->where('user_id', '=', $userId)
            ->get();

        foreach ($roleUsers as $roleUser) {
            $rolenames = Role::query()
                ->where('id', '=', $roleUser['role_id'])
                ->get();

            foreach ($rolenames as $rolename) {
                if ($rolename['name'] == $role) {
                    return true;

                } else {
                    return false;

                }
            }
        }
    }
}
