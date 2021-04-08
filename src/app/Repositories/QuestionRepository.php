<?php

namespace App\Repositories;

use App\Models\Question;
use App\Models\User;
use App\Models\UserQuestionVote;
use App\Repositories\Interfaces\QuestionRepositoryInterface;


class QuestionRepository implements QuestionRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Question::query()->with('answers')->get();
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

    /**
     * @param $str
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function search($str)
    {
        if ($str['s'] == 'all') {
            if ($str['sortOrder'] == 'votes_count') {
                return Question::withCount('users')
                    ->orderBy('users_count', $str['sortDir'])
                    ->get();
            } else {
                return Question::query()
                    ->orderBy($str['sortOrder'], $str['sortDir'])
                    ->get();
            }

        } else {
            $searchStr = $str['s'];
            if ($str['sortOrder'] == 'votes_count') {
                return Question::withCount('users')
                    ->where('title', 'LIKE', '%' . $searchStr . '%')
                    ->orderBy('users_count', $str['sortDir'])
                    ->get();
            } else {
                return Question::query()->where('title', 'LIKE', '%' . $searchStr . '%')
                    ->orderBy($str['sortOrder'], $str['sortDir'])
                    ->get();
            }

        }
    }

    /**
     * @param $str
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function sortData($str)
    {
        if ($str['sortBy'] == 'isAnswer') {

            if ($str['sortOrder'] == 'votes_count') {
                return Question::withCount('users')
                    ->has('answers')
                    ->orderBy('users_count', $str['sortDir'])
                    ->get();

            } else {
                return Question::has('answers')
                    ->orderBy($str['sortOrder'], $str['sortDir'])
                    ->get();
            }

        } else if ($str['sortBy'] == 'isNotAnswer') {

            if ($str['sortOrder'] == 'votes_count') {
                return Question::withCount('users')
                    ->whereDoesntHave('answers')
                    ->orderBy('users_count', $str['sortDir'])
                    ->get();

            } else {
                return Question::query()
                    ->whereDoesntHave('answers')
                    ->orderBy($str['sortOrder'], $str['sortDir'])
                    ->get();
            }

        } else if ($str['sortBy'] == 'isVoteAnswer') {

            if ($str['sortOrder'] == 'votes_count') {
                return Question::withCount('users')
                    ->orderBy('users_count', $str['sortDir'])
                    ->get();

            } else {
                return Question::query()
                    ->getRelation('users')
                    ->orderBy($str['sortOrder'], $str['sortDir'])
                    ->get();

            }

        } else if ($str['sortBy'] == 'isNotVoteAnswer') {

            if ($str['sortOrder'] == 'votes_count') {
                return Question::withCount('users')
                    ->orderBy('users_count', $str['sortDir'])
                    ->get();

            } else {
                return Question::query()
                    ->whereNotIn('id', function ($query) {
                        $query->select('user_id')->from('users_questions_votes');
                    })
                    ->orderBy($str['sortOrder'], $str['sortDir'])
                    ->get();
            }
        }
    }
}
