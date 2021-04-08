<?php

namespace App\Repositories;

use App\Models\Answer;
use App\Models\UserAnswerVote;

class AnswerRepository
{

    /**
     * @return Answer[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Answer::all();
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
