<?php

namespace  App\Services;
use App\Models\Question;
use App\Repositories\QuestionRepository;

class QuestionService
{
    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function getAll()
    {
        return $this->questionRepository->all();
    }

    public function searchAll($str)
    {
        return $this->questionRepository->search($str);
    }

    public function sortData($param)
    {
        return $this->questionRepository->sortData($param);
    }

    public function sortVotes($param)
    {
        return $this->questionRepository->sortVotes($param);
    }
    public function create(array $data)
    {
        return $this->questionRepository->create($data);
    }
}
