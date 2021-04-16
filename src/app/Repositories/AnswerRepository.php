<?php

namespace App\Repositories;

use App\Models\Answer;

use App\Models\Question;
use App\Models\UserAnswerVote;
use App\Models\User;
use DB;
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
            //$answersNew = $answers->with('votesCount');
//            $answers =Answer::query()->find(1);
//            dd($answers->answers);


            $answers= Answer::selectRaw('answers.id, answers.body, count(*) as count')
                    ->join('user_answer_votes', 'answers.id', '=', 'user_answer_votes.answer_id')
                    ->groupBy('answers.id')
                    ->orderBy('count', 'desc')
                    ->limit(5)
                    ->get();

            return $answers;

        } else if (isset($searchData['order_by_votes']) && $searchData['order_by_votes']) {
            dd('answer_not _is');
        }

///        $answers = $answers->with('votes_answers')->withCount('votes_answers');

        $answers = $answers->orderBy($searchData['order_by'], $searchData['order_direction']);
        $answers = $answers->get();

        return $answers;
    }


}
