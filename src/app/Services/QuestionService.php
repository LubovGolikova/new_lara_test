<?php

namespace App\Services;

use App\Repositories\QuestionRepository;
use Tymon\JWTAuth\Facades\JWTAuth;

class QuestionService
{
    protected $questionRepository;

    /**
     * QuestionService constructor.
     * @param QuestionRepository $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get(array $searchData)
    {
        $searchData['order_by'] = $searchData['order_by'] ?? 'created_at';
        $searchData['order_direction'] = $searchData['order_direction'] ?? 'asc';
        return $this->questionRepository->get($searchData);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $createData = [];
        $user = JWTAuth::parseToken()->authenticate();
        $createData['user_id'] = $user->id;
        $createData['title'] = $data['title'];
        $createData['body'] = $data['body'];
        return $this->questionRepository->create($createData);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function createVote($id)
    {
        $createVoteData= [];
        $user = JWTAuth::parseToken()->authenticate();
        $createVoteData['user_id'] = $user->id;
        $createVoteData['question_id'] = $id;
        return $this->questionRepository->createVote($createVoteData);
    }
}
