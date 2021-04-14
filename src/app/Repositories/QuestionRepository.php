<?php

namespace App\Repositories;

use App\Models\Question;
use App\Models\User;
use App\Models\UserQuestionVote;


class QuestionRepository
{
    /**
     * @param array $searchData
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(array $searchData)
    {

        $questions = Question::query();

        if (isset($searchData['search'])) {
            $questions = $questions->where('title', 'LIKE', '%' . $searchData['search'] . '%');

        }

        if (isset($searchData['has_answer'])  && $searchData['has_answer']) {
            $questions = $questions->whereDoesntHave('answers');

        } else if (isset($searchData['has_answer'])  &&  !$searchData['has_answer']) {
            $questions = $questions->has('answers');

        }

        if (isset($searchData['has_voted_answer']) && $searchData['has_voted_answer']) {
            $questions = $questions->whereDoesntHave('voted_answers');

        } else if (isset($searchData['has_voted_answer']) && !$searchData['has_voted_answer']) {
            $questions = $questions->whereHas('voted_answers');

        }

        //TODO check
        if (isset($searchData['order_by_votes']) && !$searchData['order_by_votes']) {
            $questions = $questions->with('having_answers');

        } else if (isset($searchData['order_by_votes']) && $searchData['order_by_votes']) {
            dd('$questions_not _is');
        }

//        $questions = $questions->with('votes_questions')->withCount('votes_questions');
//        $questions = $questions->with('answers', function($query) {
//            $query->withCount('votes_answers');
//        });
        $questions = $questions->orderBy($searchData['order_by'], $searchData['order_direction']);
        $questions = $questions->get();

        return $questions;
    }

    /**
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getByUser(User $user)
    {
        return Question::query()->where('user_id' . $user->id)->get();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Builder[][]|\Illuminate\Database\
     * Eloquent\Collection|\Illuminate\Database\Eloquent\Collection[]|\Illuminate\Database\Eloquent\Model[]|mixed
     */
    public function getById(int $id)
    {
        return Question::query()->findOrFail($id)->get();
    }

}
