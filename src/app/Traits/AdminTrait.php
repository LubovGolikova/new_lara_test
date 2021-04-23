<?php

namespace App\Traits;
use App\Models\User;

trait AdminTrait
{
    /**
     * @return mixed
     */
    public function receiveAdmin()
    {
        $admins = User::whereHas('roles', function ($query) {
            $query->where('id',2);
        })->get();

        foreach($admins as $admin) {
            return $admin;
        }

    }

}
