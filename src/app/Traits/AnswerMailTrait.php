<?php

namespace App\Traits;

use App\Models\Answer;
use App\Models\Question;

trait AnswerMailTrait
{
    /**
     * @param Answer $answer
     * @return array
     */
    public function receiveTextQuestion(Answer $answer)
    {
        $questionId = $answer->question_id;
        $questions = Question::query()
            ->where('id', '=', $questionId)
            ->get();
        $questionText = [];
        foreach($questions as $question) {
            $questionText['title'] = $question->title;
            $questionText['body'] = $question->body;
        }

        return $questionText;
    }

    /**
     * @return mixed
     */
    public function mostPopularAnswers()
    {
        $answers = Answer::selectRaw('answers.id, count(*) as count')
            ->join('user_answer_votes', 'answers.id', '=', 'user_answer_votes.answer_id')
            ->groupBy('answers.id')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();

        return $answers;
    }


}
