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
        if (isset($searchData['has_answer'])  && ($searchData['has_answer'] === "false")) {
            $questions = $questions->whereDoesntHave('answers');

        } else if (isset($searchData['has_answer'])  && ($searchData['has_answer'] === "true")) {
            $questions = $questions->has('answers');

        }

        if (isset($searchData['has_voted_answer']) && ($searchData['has_voted_answer'] === "false")) {
            $questions = $questions->whereDoesntHave('voted_answers');

        } else if (isset($searchData['has_voted_answer']) && ($searchData['has_voted_answer'] === "true")) {
            $questions = $questions->whereHas('voted_answers');

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
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Builder[][]|\Illuminate\Database\
     * Eloquent\Collection|\Illuminate\Database\Eloquent\Collection[]|\Illuminate\Database\Eloquent\Model[]|mixed
     */
    public function getById($id)
    {
        return Question::query()->findOrFail($id)->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return Question::create($data);
    }

    /**
     * @param $arrElc
     * @return mixed
     */
    public function createVote(array $createVoteData)
    {
        return UserQuestionVote::create([
            'user_id' => (int)$createVoteData['user_id'],
            'question_id' => (int)$createVoteData['question_id']
        ]);
    }
}
