<?php

namespace App\Traits;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;

trait AnswerMailTrait
{

    /**
     * @return mixed
     */
    public function mostPopularAnswer()
    {

        $userID_array = [];
        $users = User::all();
        foreach ($users as $user) {
            $userID_array[] = $user->id;
        }

        $questionID_array = [];
        $questions = Question::all();
        foreach ($questions as $question) {
            $questionID_array[] = $question->id;
        }

        $id = Answer::selectRaw('answers.id, count(*) as count')
                ->join('user_answer_votes', 'answers.id', '=', 'user_answer_votes.answer_id')
                ->where('answers.question_id', $questionID_array)
                ->whereIn('user_answer_votes.user_id', $userID_array)
                ->groupBy('answers.id')
                ->orderBy('count', 'desc')
                ->limit(1)
                ->first()->id ?? null;

        if ($id) {
            $mostPopularAnswer = Answer::find($id);
        }
        return $mostPopularAnswer;
    }

    /**
     * @param Answer $mostPopularAnswer
     * @return array
     */
    public function receiveTextAnswer(Answer $mostPopularAnswer)
    {
        $id = $mostPopularAnswer->id;
        $mostPopularAnswers = Answer::query()
            ->where('id', '=', $id)
            ->get();

        $answerText = [];
        foreach ($mostPopularAnswers as $mostPopularAnswer) {
            $answerText['body'] = $mostPopularAnswer->body;
        }

        return $answerText;
    }

    /**
     * @param Answer $mostPopularAnswer
     * @return array
     */
    public function receiveTextQuestion(Answer $mostPopularAnswer)
    {
        $questionId = $mostPopularAnswer->question_id;
        $questions = Question::query()
            ->where('id', '=', $questionId)
            ->get();

        $questionText = [];
        foreach ($questions as $question) {
            $questionText['title'] = $question->title;
            $questionText['body'] = $question->body;
        }

        return $questionText;

    }
}
