<?php

namespace App\Repositories;

use App\Answer;
use Orkhanahmadov\EloquentRepository\EloquentRepository;

class AnswerRepository extends EloquentRepository
{
    protected $entity = Answer::class;

}
