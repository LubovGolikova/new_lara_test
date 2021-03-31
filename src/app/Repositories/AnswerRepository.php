<?php

namespace App\Repositories;

use App\Models\Answer;
use Orkhanahmadov\EloquentRepository\EloquentRepository;
use Illuminate\Support\Facades\Auth;
class AnswerRepository extends EloquentRepository
{
    protected $entity = Answer::class;

    public function create($data)
    {
        $answer = new Answer;
//        $answer->user_id = Auth::user()->getAuthIdentifier();
        $answer->user_id = $data['user_id'];
        $answer->question_id = $data['question_id'];
        $answer->body = $data['body'];
        $answer->votes = $data['votes'];
        $answer->save();
        return $answer;
    }


}
