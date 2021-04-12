<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserRole;
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
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        try {
            return $this->userRepository->get();

        } catch(Exception $e) {

        }
    }

    /**
     * @param array $data
     * @return mixed
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

        }
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function assign(array $data)
    {
        try {
            return UserRole::create([
                'user_id' => $data['user_id'],
                'role_id' => $data['role_id']
            ]);

        } catch(Exception $e) {

        }
    }

    /**
     * @param array $id
     * @return int
     */
    public function destroy(array $id)
    {
        try {
            return User::destroy($id['id']);

        } catch(Exception $e) {

        }
    }
}
