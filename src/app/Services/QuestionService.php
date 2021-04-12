<?php

namespace App\Services;

use App\Models\Question;
use App\Models\UserQuestionVote;
use App\Repositories\QuestionRepository;

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
     * @param array $searchData
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(array $searchData)
    {
        try {
            $searchData['order_by'] = $searchData['order_by'] ?? 'created_at';
            $searchData['order_direction'] = $searchData['order_direction'] ?? 'asc';
            return $this->questionRepository->get($searchData);

        } catch(Exception $e) {
        }
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $createData)
    {
        try {
            $createData['user_id'] = \Auth::user()->id;
            return Question::create($createData);

        } catch(Exception $e) {

        };
    }

    /**
     * @param array $createVoteData
     * @return mixed
     */
    public function createVote(array $createVoteData)
    {
        try {
            $createVoteData['user_id'] = \Auth::user()->id;

            return UserQuestionVote::create([
                'user_id' => (int)$createVoteData['user_id'],
                'question_id' => (int)$createVoteData['id']
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
            return Question::destroy($id['id']);

        } catch(Exception $e) {

        }
    }
}
