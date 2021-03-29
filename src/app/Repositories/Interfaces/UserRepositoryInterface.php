<?php
namespace App\Repositories\Interfaces;
use App\Models\User;
use App\Http\Requests\UserRequest;
interface UserRepositoryInterface
{
    public function all();
    public function create(UserRequest $data);
}
