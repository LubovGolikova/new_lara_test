<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Facades\PayloadFactory;

class UserService
{

    protected $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse
     */
    public function get()
    {
        try {
            return $this->userRepository->get();

        } catch(Exception $e) {

            return response()->json(['error' => 'Could not receive data'], 500);
        }
    }

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

            return $this->userRepository->create($createData);

        } catch(Exception $e) {

            return response()->json(['error' => 'Could not create data'], 500);
        }
    }

    /**
     * @param array $createRoledata
     * @return \Illuminate\Http\JsonResponse
     */
    public function assign(array $createRoledata)
    {
        try {
            $user = User::find($createRoledata['user_id']);
             return $user->roles()->attach($createRoledata['role_id']);

        } catch(Exception $e) {

            return response()->json(['error' => 'Could not assign user'], 500);
        }
    }

    /**
     * @param array $createRoledata
     * @return \Illuminate\Http\JsonResponse
     */
    public function newAssign(array $createRoledata)
    {
        try {
            $user = User::find($createRoledata['user_id']);
            return $user->roles()->sync($createRoledata['role_id']);

        } catch(Exception $e) {

            return response()->json(['error' => 'Could not create new assign data'], 500);
        }
    }

    /**
     * @param array $createRoledata
     * @return \Illuminate\Http\JsonResponse
     */
    public function discharge(array $createRoledata)
    {
        try {
            $user = User::find($createRoledata['user_id']);
            return $user->roles()->detach($createRoledata['role_id']);

        } catch(Exception $e) {

            return response()->json(['error' => 'Could not discharge data'], 500);
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

            return response()->json(['error' => 'Could not destroy user'], 500);
        }
    }
}
