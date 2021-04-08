<?php

namespace  App\Services;
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
    public function getAll()
    {
        return $this->answerRepository->all();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $arrElc = [];
        $user = JWTAuth::parseToken()->authenticate();
        $arrElc['user_id'] = $user->id;
        $arrElc['question_id'] = $data['question_id'];
        $arrElc['body'] = $data['body'];
        return $this->answerRepository->create($arrElc);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function createVote($id)
    {
        $arrElc = [];
        $user = JWTAuth::parseToken()->authenticate();
        $arrElc['user_id'] = $user->id;
        $arrElc['answer_id'] = $id;
        return $this->answerRepository->createVote($arrElc);
    }
}
