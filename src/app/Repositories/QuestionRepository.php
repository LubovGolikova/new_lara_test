<?php
namespace  App\Repositories;

use App\Models\Answer;
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
        return Question::query()->where('user_id'.$user->id)->get();
    }
    public function getById($id)
    {
        return Question::query()->findOrFail($id);
    }
}
