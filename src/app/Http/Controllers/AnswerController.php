<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Http\Requests\AnswerSearchRequest;
use Illuminate\Http\Request;
use App\Services\AnswerService;

class AnswerController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(AnswerSearchRequest $request)
    {
        $validated = $request->validated();
        $answers = app()->make('AnswerService')->get($validated);
        return response()->json($answers);
    }

    /**
     * @param AnswerRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(AnswerRequest $request)
    {
        $validated = $request->validated();
        $answer = app()->make('AnswerService')->create($validated);
        return response()->json($answer);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createVote($id)
    {
        $answer = app()->make('AnswerService')->createVote($id);
        return response()->json($answer);
    }
}
