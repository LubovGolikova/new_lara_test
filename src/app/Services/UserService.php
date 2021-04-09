<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserRole;
use App\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
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
        return $this->userRepository->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $createData = [];
        $createData['username'] = $data['username'];
        $createData['email'] = $data['email'];
        $createData['avatar_path'] = isset($data['avatar_path']) ? $data['avatar_path'] : null;
        $createData['password'] = Hash::make($data['password']);

        $factory = JWTFactory::customClaims([
            'sub' => env('JWT_SECRET'),
        ]);
        $payload = $factory->make();

        $createData['remember_token'] = JWTAuth::encode($payload);

        return $this->userRepository->create($createData);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function assign(array $data)
    {
        return UserRole::create([
            'user_id' => $data['user_id'],
            'role_id' => $data['role_id']
        ]);
    }
}
