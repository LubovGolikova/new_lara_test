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
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(array $searchData = [])
    {
        try {
            $searchData['order_by'] = $searchData['order_by'] ?? 'created_at';
            $searchData['order_direction'] = $searchData['order_direction'] ?? 'asc';
            return $this->questionRepository->get($searchData);

        } catch(Exception $e) {
            $message = 'Could not receive data';
            $this->customLog($message, $e);
        }
    }

    /**
     * @param array $createData
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(array $createData): ?Question
    {
        try {
            $createData['user_id'] = \Auth::user()->id;
            return Question::create($createData);

        } catch(Exception $e) {
            $message = 'Could not create data';
            $this->customLog($message, $e);
        }
    }

    /**
     * @param array $createVoteData
     * @return UserQuestionVote
     */
    public function createVote(array $createVoteData): ?UserQuestionVote
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
        }
    }

    /**
     * @param array $id
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function destroy(array $id): int
    {
        try {
            return Question::destroy($id['id']);

        } catch(Exception $e) {
            $message = 'Could not destroy question';
            $this->customLog($message, $e);
        }
    }

    /**
     * @param int $id
     * @return Question
     */
    public function receiveQuestion(int $id): Question
    {
        try {
            return Question::find($id);

        } catch(Exception $e) {
            $message = 'Could not receive question';
            $this->customLog($message, $e);
        }
    }

    /**
     * @return int
     */
    public function getcountQuestion(): int
    {
        try {
            return Question::query()->count();

        } catch(Exception $e) {
            $message = 'Could not receive a count questions';
            $this->customLog($message, $e);
        }
    }

    /**
     * @return int
     */
    public function getCountAnswers()
    {
        try {
            return Question::query()->with('answers')
                ->count();

        } catch(Exception $e) {
            $message = 'Could not receive count answers';
            $this->customLog($message, $e);
        }

    }

    /**
     * @return int
     */
    public function getVotesCountByIdQuestion(int $id)
    {
        try {
            return UserQuestionVote::query()
                ->where('question_id','=', $id)
                ->count();

        } catch(Exception $e) {
            $message = 'Could not receive count votes questions';
            $this->customLog($message, $e);
        }

    }
}
