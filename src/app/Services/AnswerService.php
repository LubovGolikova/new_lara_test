<?php

namespace App\Services;

use App\Models\Answer;
use App\Repositories\AnswerRepository;
use Tymon\JWTAuth\Facades\JWTAuth;

class AnswerService
{
    protected $answerRepository;

    /**
     * AnswerService constructor.
     * @param AnswerRepository $answerRepository
     */
    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    /**
     * @return Answer[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        return $this->answerRepository->get();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $createData= [];
        $user = JWTAuth::parseToken()->authenticate();
        $createData['user_id'] = $user->id;
        $createData['question_id'] = $data['question_id'];
        $createData['body'] = $data['body'];
        return $this->answerRepository->create($createData);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function createVote($id)
    {
        $createVoteData = [];
        $user = JWTAuth::parseToken()->authenticate();
        $createVoteData['user_id'] = $user->id;
        $createVoteData['answer_id'] = $id;
        return $this->answerRepository->createVote($createVoteData);
    }
}
