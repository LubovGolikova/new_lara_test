<?php

namespace App\Repositories;

use App\Models\Answer;


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
        if (isset($searchData['has_voted']) && !$searchData['has_voted']) {
            $answers = $answers->whereDoesntHave('votes_answers');

        } else if (isset($searchData['has_voted']) && $searchData['has_voted']) {
            $answers = $answers->whereHas('votes_answers');

        }

        //TODO check
        if (isset($searchData['order_by_votes']) && !$searchData['order_by_votes']) {
            $answers = $answers->with('new_count');

        } else if (isset($searchData['order_by_votes']) && $searchData['order_by_votes']) {
            dd('answer_not _is');
        }

///        $answers = $answers->with('votes_answers')->withCount('votes_answers');

        $answers = $answers->orderBy($searchData['order_by'], $searchData['order_direction']);
        $answers = $answers->get();

        return $answers;
    }

}
