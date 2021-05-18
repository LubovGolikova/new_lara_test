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
        //TODO receive username
        foreach ($questions as $question)
        {
            $users = app()->make('UserService')->getUserById($question->user_id);
            dd($users);
        }
        return view('layouts.home',compact('questions','users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function questions()
    {
        $questions =  app()->make('QuestionService')->get();
        return view('layouts.questions',compact('questions'));
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
//        dd($answers);
        return view('layouts.question',compact('question','answers'));
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
