<?php
namespace  App\Repositories;

use App\Models\Question;
use App\Models\User;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
class QuestionRepository implements QuestionRepositoryInterface
{
    public function all()
    {
        return Question::all();
    }

    public function getByUser(User $user)
    {
        return Question::where('user_id'.$user->id)->get();
//        return Question::query()
    }
}
