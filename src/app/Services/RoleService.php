<?php

namespace App\Services;

use App\Models\Role;
use Exception;
use App\Traits\LogTrait;

class RoleService
{
    use LogTrait;

    /**
     * @param array $createData
     * @return Role
     */
    public function create(array $createData): Role
    {
        try {
            return Role::create($createData);

        } catch(Exception $e) {
            $message = 'Could not create data';
            $this->customLog($message, $e);
        }
    }

    /**
     * @param int $id
     * @param array $editData
     * @return Role
     */
    public function update(int $id, array $editData): Role
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
            $message = 'Could not update data';
            $this->customLog($message, $e);
        }
    }

    /**
     * @param int $id
     * @return int
     */
    public function destroy(int $id): int
    {
        try {
            return Role::destroy($id);

        } catch(Exception $e) {

            $message = 'Could not destroy role';
            $this->customLog($message, $e);
        }
    }
}
