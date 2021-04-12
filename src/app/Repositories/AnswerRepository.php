<?php

namespace App\Repositories;

use App\Models\Answer;
use App\Models\UserAnswerVote;

class AnswerRepository
{

    /**
     * @param array $searchData
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get(array $searchData)
    {
        $answers = Answer::query();

        if (isset($searchData['search'])) {
            $answers = $answers->where('body', 'LIKE', '%' . $searchData['search'] . '%');

        }
        if (isset($searchData['has_voted']) && ($searchData['has_voted'] === "false")) {
            $answers = $answers->whereDoesntHave('votes_answers');

        } else if (isset($searchData['has_voted']) && ($searchData['has_voted'] === "true")) {
            $answers = $answers->whereHas('votes_answers');

        }
        $answers = $answers->with('votes_answers')->withCount('votes_answers');
        $answers = $answers->orderBy($searchData['order_by'], $searchData['order_direction']);
        $answers = $answers->get();

        return $answers;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return Answer::create($data);
    }

    /**
     * @param $arrElc
     * @return mixed
     */
    public function createVote($createVoteData)
    {
        return UserAnswerVote::create([
            'user_id' => (int)$createVoteData['user_id'],
            'answer_id' => (int)$createVoteData['answer_id']
        ]);
    }

}
