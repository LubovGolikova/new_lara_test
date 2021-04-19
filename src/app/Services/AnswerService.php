<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\UserAnswerVote;
use App\Repositories\AnswerRepository;
use App\Traits\AnswerMailTrait;
use Exception;
use App\Traits\LogTrait;

class AnswerService
{
    use LogTrait;
    use AnswerMailTrait;
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
     * @param array $searchData
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse
     */
    public function get(array $searchData)
    {
        try {
            $searchData['order_by'] = $searchData['order_by'] ?? 'created_at';
            $searchData['order_direction'] = $searchData['order_direction'] ?? 'asc';
            return $this->answerRepository->get($searchData);

        } catch (Exception $e) {
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
            $user = \Auth::user();
            $createData['user_id'] = $user->id;
            return Answer::create($createData);

        } catch (Exception $e) {
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

            return UserAnswerVote::create([
                'user_id' => (int)$createVoteData['user_id'],
                'answer_id' => (int)$createVoteData['id']
            ]);

        } catch (Exception $e) {
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
            return Answer::destroy($id['id']);

        } catch (Exception $e) {
            $message = 'Could not destroy user';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }

    /**
     * @param int $answerId
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function createData(int  $answerId)
    {
        try {
            $answer = Answer::find($answerId);
            $receiveTextQuestion = $this->receiveTextQuestion($answer);
            $data = array(
                'questionTitleText' => $receiveTextQuestion['title'],
                'questionBodyText' => $receiveTextQuestion['body'],
                'answerBodyText' => $answer->body
            );

            return $data;

        } catch (Exception $e) {
            $message = 'Could not create data for email';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }

    }
}
