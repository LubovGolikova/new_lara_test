<?php

namespace App\Services;

use App\Models\User;
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
    public function getAll()
    {
        return $this->userRepository->all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $arrElc = [];
        $arrElc['username'] = $data['username'];
        $arrElc['email'] = $data['email'];
        $arrElc['avatar_path'] = isset($data['avatar_path']) ? $data['avatar_path'] : null;
        $arrElc['password'] = Hash::make($data['password']);

        $factory = JWTFactory::customClaims([
            'sub' => env('JWT_SECRET'),
        ]);
        $payload = $factory->make();

        $arrElc['remember_token'] = JWTAuth::encode($payload);

        return $this->userRepository->create($arrElc);
    }
}
