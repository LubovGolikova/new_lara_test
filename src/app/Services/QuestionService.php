<?php

namespace  App\Services;
use App\Models\Question;
use App\Repositories\QuestionRepository;
use Tymon\JWTAuth\Facades\JWTAuth;

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

    public function create(array $data)
    {
        $arrElc = [];
        $user = JWTAuth::parseToken()->authenticate();
        $arrElc['user_id'] = $user->id;
        $arrElc['title'] = $data['title'];
        $arrElc['body'] = $data['body'];
        return $this->questionRepository->create($arrElc);
    }

    public function search($str)
    {
        return $this->questionRepository->search($str);
    }

    public function sortData($str)
    {
        return $this->questionRepository->sortData($str);
    }

    public function createVote($id)
    {
        $arrElc = [];
        $user = JWTAuth::parseToken()->authenticate();
        $arrElc['user_id'] = $user->id;
        $arrElc['question_id'] = $id;
        return $this->questionRepository->createVote($arrElc);
    }
}
