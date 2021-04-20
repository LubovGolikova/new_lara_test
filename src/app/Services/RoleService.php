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
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(array $createData): string
    {
        try {
            return Role::create($createData);

        } catch(Exception $e) {
            $message = 'Could not create data';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }

    /**
     * @param int $id
     * @param array $editData
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id, array $editData): string
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
            return response()->json(['error' => $message], 500);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function destroy(int $id): int
    {
        try {
            return Role::destroy($id);

        } catch(Exception $e) {

            $message = 'Could not destroy role';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }
}
