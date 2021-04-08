<?php

namespace App\Repositories;

use App\Models\Answer;
use App\Models\UserAnswerVote;

class AnswerRepository
{



    public function all()
    {
        return Answer::query()
            ->withCount('votes_answers')
            ->get();
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
    public function createVote($arrElc)
    {
        return UserAnswerVote::create([
            'user_id' => (int)$arrElc['user_id'],
            'answer_id' => (int)$arrElc['answer_id']
        ]);
    }

}
