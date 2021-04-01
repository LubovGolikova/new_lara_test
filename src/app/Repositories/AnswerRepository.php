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
        $answer = new Answer;
        $user = JWTAuth::parseToken()->authenticate();
        $answer->user_id = $user->id;
        $answer->question_id = $data['question_id'];
        $answer->body = $data['body'];
        $answer->votes = $data['votes'];
        $answer->save();
        return $answer;
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
