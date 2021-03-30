<?php

namespace App\Repositories;

use App\Models\Answer;
use Orkhanahmadov\EloquentRepository\EloquentRepository;

class AnswerRepository extends EloquentRepository
{
    protected $entity = Answer::class;

    public function create($data)
    {
        $answer = new Answer;
        $answer->body = $data['body'];


    }


}
