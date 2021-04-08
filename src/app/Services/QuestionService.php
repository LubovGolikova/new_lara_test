<?php

namespace  App\Services;
use App\Models\Question;
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
    public function getAll()
    {
        return $this->questionRepository->all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $arrElc = [];
        $user = JWTAuth::parseToken()->authenticate();
        $arrElc['user_id'] = $user->id;
        $arrElc['title'] = $data['title'];
        $arrElc['body'] = $data['body'];
        return $this->questionRepository->create($arrElc);
    }

    /**
     * @param $str
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function search($str)
    {
        return $this->questionRepository->search($str);
    }

    /**
     * @param $str
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function sortData($str)
    {
        return $this->questionRepository->sortData($str);
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
        $arrElc['question_id'] = $id;
        return $this->questionRepository->createVote($arrElc);
    }
}
