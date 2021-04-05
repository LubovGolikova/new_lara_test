<?php

namespace App\Repositories;

use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AnswerRepository
{

    public function all()
    {
        return Answer::all();
    }

    public function create($data)
    {
        return Answer::create($data);
    }

    public function addVote($id)
    {
        $answers = Answer::query()->where('id' ,'=', $id)->get();
        foreach($answers as $answer)
        {
            $answer->setVotes($answer->getVotes()+1);
            $answer->save();
            return $answer;
        }
    }

}
