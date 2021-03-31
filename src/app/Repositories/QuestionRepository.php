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
        return Question::query()->findOrFail($id)->get();
    }

    public function search($str)
    {
        return Question::query()->where('title','LIKE', '%'.$str.'%')->get();
    }

    public function sortData($param)
    {
        if($param==1)
            return Question::query()->orderBy('created_at','DESC')->get();
        else if($param==0)
            return Question::query()->orderBy('created_at','ASC')->get();
    }

    public function sortVotes($param)
    {
        if($param==1)
            return Question::query()->orderBy('votes','DESC')->get();
        else if($param==0)
            return Question::query()->orderBy('votes','ASC')->get();
    }

}
