<?php
namespace App\Repositories\Interfaces;
use App\Models\User;
interface QuestionRepositoryInterface
{
    public function all();
    public function getByUser(User $user);
    public function getById($id);
}
