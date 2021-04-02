<?php

namespace  App\Services;
use App\Models\Answer;
use App\Repositories\AnswerRepository;

class AnswerService
{
    protected $answerRepository;

    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function getAll()
    {
        return $this->answerRepository->all();
    }

    public function create($data)
    {
        return $this->answerRepository->create($data);
    }

    public function addVote($id)
    {
        return $this->answerRepository->addVote($id);
    }
}
