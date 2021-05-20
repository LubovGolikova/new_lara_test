<?php

namespace App\Http\Controllers;

class HomeViewController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $questions =  app()->make('QuestionService')->get();
        foreach($questions as $question){
            $countAnswers[] = app()->make('AnswerService')->getAnswerCountByIdQuestion((int)$question->id);
        }
        return view('layouts.home',compact('questions', 'countAnswers'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function questions()
    {
        $questions =  app()->make('QuestionService')->get();
        $countQuestion = app()->make('QuestionService')->getcountQuestion();
        foreach($questions as $question){
            $countAnswers[] = app()->make('AnswerService')->getAnswerCountByIdQuestion((int)$question->id);
        }
//        $collection = collect($questions);
//        $combined = $collection->combine($countAnswers);
//        $combined->all();
//        return view('layouts.questions',compact('combined','countQuestion','questions'));
        return view('layouts.questions',compact('countAnswers','countQuestion','questions'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getQuestion(int $id)
    {
        $question =  app()->make('QuestionService')->receiveQuestion($id);
        $answers = app()->make('AnswerService')->getAnswerByIdQuestion($id);
        $countAnswers = app()->make('AnswerService')->getAnswerCountByIdQuestion($id);
        $countVotesQuestion =  app()->make('QuestionService')->getVotesCountByIdQuestion($id);
        $countVotesAnswer = app()->make('AnswerService')->getVotesCountByIdAnswer($id);
        return view('layouts.question',compact('question','answers','countAnswers','countVotesQuestion','countVotesAnswer'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('layouts.login', [
            'body_class' => 'bg-grey'
        ]);
    }

}
