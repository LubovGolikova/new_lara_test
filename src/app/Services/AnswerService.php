<?php

namespace  App\Services;
use App\Models\Answer;
use App\Repositories\AnswerRepository;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        $arrElc = [];
        $user = JWTAuth::parseToken()->authenticate();
        $arrElc['user_id'] = $user->id;
        $arrElc['question_id'] = $data['question_id'];
        $arrElc['body'] = $data['body'];
        return $this->answerRepository->create($arrElc);
    }

    public function createVote($id)
    {
        $arrElc = [];
        $user = JWTAuth::parseToken()->authenticate();
        $arrElc['user_id'] = $user->id;
        $arrElc['answer_id'] = $id;
        return $this->answerRepository->createVote($arrElc);
    }
}
