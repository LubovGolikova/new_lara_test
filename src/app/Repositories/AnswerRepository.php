<?php

namespace App\Repositories;

use App\Models\Answer;
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
            $answers = $answers->whereHas('votes_answers');

        } else if (isset($searchData['has_voted']) && $searchData['has_voted']) {
            $answers = $answers->whereDoesntHave('votes_answers');

        }

        if (isset($searchData['order_by_votes']) && !$searchData['order_by_votes']) {
            $answers= Answer::selectRaw('answers.id, answers.body, count(*) as count')
                    ->join('user_answer_votes', 'answers.id', '=', 'user_answer_votes.answer_id')
                    ->groupBy('answers.id')
                    ->orderBy('count', $searchData['order_direction']);
        }

        $answers = $answers->orderBy($searchData['order_by'], $searchData['order_direction']);
        $answers = $answers->get();

        return $answers;
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAnswerByIdQuestion(int $id)
    {
        return Answer::query()
            ->where('question_id','=', $id)
            ->get();
    }

    /**
     * @param int $id
     * @return int
     */
    public function getAnswerCountByIdQuestion(int $id)
    {
        return Answer::query()
            ->where('question_id','=', $id)
            ->count();
    }

}
