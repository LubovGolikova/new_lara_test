<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionIdRequest;
use App\Http\Requests;
class HomeViewController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $questions =  app()->make('QuestionService')->get();
        return view('layouts.home',compact('questions'));
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
    public function receiveQuestion(int $id)
    {
        $question =  app()->make('QuestionService')->receiveQuestion($id);
        return view('layouts.question',compact('question'));
    }

}
