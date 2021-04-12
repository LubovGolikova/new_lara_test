<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\UserAnswerVote;
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
    public function get(array $searchData)
    {
        try {
            $searchData['order_by'] = $searchData['order_by'] ?? 'created_at';
            $searchData['order_direction'] = $searchData['order_direction'] ?? 'asc';
            return $this->answerRepository->get($searchData);

        } catch(Exception $e) {

        }
    }


    /**
     * @param array $createData
     * @return mixed
     */
    public function create(array $createData)
    {
        try {
            $createData['user_id'] = \Auth::user()->id;
            return Answer::create($createData);

        } catch(Exception $e) {

        }
    }

    /**
     * @param array $createVoteData
     * @return mixed
     */
    public function createVote(array $createVoteData)
    {
        try {
            $createVoteData['user_id'] = \Auth::user()->id;

            return UserAnswerVote::create([
                'user_id' => (int)$createVoteData['user_id'],
                'answer_id' => (int)$createVoteData['id']
            ]);

        } catch(Exception $e) {

        };
    }

    /**
     * @param array $id
     * @return int
     */
    public function destroy(array $id)
    {
        try {
            return Answer::destroy($id['id']);

        } catch(Exception $e) {

        }
    }
}
