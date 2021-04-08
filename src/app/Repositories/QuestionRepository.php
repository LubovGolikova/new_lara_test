<?php

namespace App\Repositories;

use App\Models\Question;
use App\Models\User;
use App\Models\UserQuestionVote;


class QuestionRepository
{



    public function get(array $searchData)
    {

        $questions = Question::query();

        if (isset($searchData['search'])) {
            $questions = $questions->where('title', 'LIKE', '%' . $searchData['search'] . '%');

        }
        if (!$searchData['has_answer']) {
            $questions = $questions->whereDoesntHave('answers');

        } else if ($searchData['has_answer']) {
            $questions = $questions->has('answers');

        }

        if (!$searchData['has_voted_answer']) {
            dd('has voted answer!!');

        } else if ($searchData['has_voted_answer']) {

            $questions = $questions
                ->getRelation('answers')
                ->withCount('votes_answers');
//                ->where('votes_answers_count','!=',0);

//            $questions = $questions
//                ->getRelation('answers')
//                ->withCount(['votes_answers' => function($query) {
//                    $query->where('votes_answers_count','=',0)->get();
//                }]);
        }
//        $questions = $questions->with(['answers', 'votes_questions'])->withCount('votes_questions');
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
    public function createVote($arrElc)
    {
        return UserQuestionVote::create([
            'user_id' => (int)$arrElc['user_id'],
            'question_id' => (int)$arrElc['question_id']
        ]);
    }
}
