<?php

namespace App\Services;

use App\Models\Question;
use App\Models\UserQuestionVote;
use App\Repositories\QuestionRepository;
use Exception;
use App\Traits\LogTrait;
class QuestionService
{
    use LogTrait;
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
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Http\JsonResponse
     */
    public function get(array $searchData)
    {
        try {
            $searchData['order_by'] = $searchData['order_by'] ?? 'created_at';
            $searchData['order_direction'] = $searchData['order_direction'] ?? 'asc';
            return $this->questionRepository->get($searchData);

        } catch(Exception $e) {
            $message = 'Could not receive data';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }

    /**
     * @param array $createData
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(array $createData)
    {
        try {
            $createData['user_id'] = \Auth::user()->id;
            return Question::create($createData);

        } catch(Exception $e) {
            $message = 'Could not create data';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }

    /**
     * @param array $createVoteData
     * @return \Illuminate\Http\JsonResponse
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
            $message = 'Could not create data';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }

    /**
     * @param array $id
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function destroy(array $id)
    {
        try {
            return Question::destroy($id['id']);

        } catch(Exception $e) {
            $message = 'Could not destroy user';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }
}
