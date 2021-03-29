<?php

namespace  App\Services;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->all();
    }

    public function create(UserRequest $data)
    {
        return $this->userRepository->create($data);
    }
}
