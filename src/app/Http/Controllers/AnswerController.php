<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use Illuminate\Http\Request;
use App\Services\AnswerService;
class AnswerController extends Controller
{


    public function index()
    {
        $answers = app()->make('AnswerService')->getAll();
        return response()->json($answers);
    }

    public function create(AnswerRequest $request)
    {
        $validated = $request->validated();
        $answer = app()->make('AnswerService')->create($validated);
        return response()->json($answer);
    }

    public function createVote($id){
        $answer = app()->make('AnswerService')->createVote($id);
        return response()->json($answer);
    }
}
