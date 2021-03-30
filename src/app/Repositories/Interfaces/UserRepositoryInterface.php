<?php
namespace App\Repositories\Interfaces;
use App\Models\User;
use App\Http\Requests\UserRequest;
interface UserRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function login($email, $password);
}
