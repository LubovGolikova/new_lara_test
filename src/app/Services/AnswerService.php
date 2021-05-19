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
    use LogTrait, AnswerMailTrait;
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
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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

        }
    }

    /**
     * @param array $createData
     * @return Answer
     */
    public function create(array $createData): ?Answer
    {
        try {
            $user = \Auth::user();
            $createData['user_id'] = $user->id;
            return Answer::create($createData);

        } catch (Exception $e) {
            $message = 'Could not create data';
            $this->customLog($message, $e);
        }
    }

    /**
     * @param array $createVoteData
     * @return UserAnswerVote
     */
    public function createVote(array $createVoteData): ?UserAnswerVote
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
        }
    }

    /**
     * @param array $id
     * @return int
     */
    public function destroy(array $id): int
    {
        try {
            return Answer::destroy($id['id']);

        } catch (Exception $e) {
            $message = 'Could not destroy user';
            $this->customLog($message, $e);
        }
    }

    /**
     * @param int $answerId
     * @return array
     */
    public function preparedDataToSendEmail(int  $answerId): array
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
        }

    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAnswerByIdQuestion(int $id)
    {
        try {
            return $this->answerRepository->getAnswerByIdQuestion($id);

        } catch(Exception $e) {
            $message = 'Could not receive answers';
            $this->customLog($message, $e);
        }
    }

    /**
     * @return int
     */
    public function getAnswerCountByIdQuestion(int $id): int
    {
        try {
            return $this->answerRepository->getAnswerCountByIdQuestion($id);

        } catch(Exception $e) {
            $message = 'Could not receive a count answers';
            $this->customLog($message, $e);
        }
    }
}
