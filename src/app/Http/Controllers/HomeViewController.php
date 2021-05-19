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
        $countQuestion = app()->make('QuestionService')->countQuestion();
        foreach($questions as $question){
            $countAnswers[] = app()->make('AnswerService')->getAnswerCountByIdQuestion((int)$question->id);
        }
        return view('layouts.questions',compact('questions','countQuestion', 'countAnswers'));
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
        return view('layouts.question',compact('question','answers','countAnswers'));
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
