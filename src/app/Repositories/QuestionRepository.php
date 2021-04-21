<?php

namespace App\Repositories;

use App\Models\Question;
use App\Models\User;
use DB;
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

        if (isset($searchData['has_answer'])  && !$searchData['has_answer']) {
            $questions = $questions->has('answers');

        } else if (isset($searchData['has_answer'])  &&  $searchData['has_answer']) {
            $questions = $questions->whereDoesntHave('answers');

        }

        if (isset($searchData['has_voted_answer']) && !$searchData['has_voted_answer']) {
            $questions = $questions->whereHas('voted_answers');

        } else if (isset($searchData['has_voted_answer']) && !$searchData['has_voted_answer']) {
            $questions = $questions->whereDoesntHave('voted_answers');

        }

        if (isset($searchData['order_by_votes']) && !$searchData['order_by_votes']) {
            $questions = Question::selectRaw('questions.id, count(*) as count')
                ->join('user_question_votes', 'questions.id', '=', 'user_question_votes.question_id')
                ->groupBy('questions.id')
                ->orderBy('count', $searchData['order_direction']);

        }

        $questions = $questions->with('votes_questions')->withCount('votes_questions');
        $questions = $questions->with('answers', function($query) {
            $query->withCount('votes_answers');
        });
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
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Builder[][]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Collection[]|\Illuminate\Database\Eloquent\Model[]|mixed
     */
    public function getById(int $id)
    {
        return Question::query()->findOrFail($id)->get();
    }

}
