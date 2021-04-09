<?php
namespace App\Repositories\Interfaces;
use App\Models\User;
use App\Http\Requests\UserRequest;
interface UserRepositoryInterface
{
    public function get();
    public function create(array $data);
}
