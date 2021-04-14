<?php

namespace App\Services;

use App\Models\User;
use App\Traits\LogTrait;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Exception;

class UserService
{
    use LogTrait;
    /**
     * @param array $createData
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function create(array $createData)
    {
        try {
            $createData['avatar_path'] = isset($createData['avatar_path']) ? $createData['avatar_path'] : null;
            $createData['password'] = Hash::make($createData['password']);

            $factory = JWTFactory::customClaims([
                'sub' => env('JWT_SECRET'),
            ]);

            $payload = $factory->make();

            $createData['remember_token'] = JWTAuth::encode($payload);

            return User::create($createData);

        } catch(Exception $e) {
            $message = 'Could not create data';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }

    /**
     * @param array $createRoleData
     * @return \Illuminate\Http\JsonResponse
     */
    public function assign(array $createRoleData)
    {
        try {
            $user = User::find($createRoleData['user_id']);
             return $user->roles()->attach($createRoleData['role_id']);

        } catch(Exception $e) {
            $message = 'Could not assign user';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }

    /**
     * @param array $createRoleData
     * @return \Illuminate\Http\JsonResponse
     */
    public function newAssign(array $createRoleData)
    {
        try {
            $user = User::find($createRoleData['user_id']);
            return $user->roles()->sync($createRoleData['role_id']);

        } catch(Exception $e) {
            $message = 'Could not create new assign data';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }

    /**
     * @param array $createRoleData
     * @return \Illuminate\Http\JsonResponse
     */
    public function detach(array $createRoleData)
    {
        try {
            $user = User::find($createRoleData['user_id']);
            return $user->roles()->detach($createRoleData['role_id']);

        } catch(Exception $e) {
            $message = 'Could not detach data';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }

    /**
     * @param array $id
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function destroy(array $id)
    {
        try {
            return User::destroy($id['id']);

        } catch(Exception $e) {
            $message = 'Could not destroy user';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }
}
