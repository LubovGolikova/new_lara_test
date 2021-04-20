<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Requests\QuestionSearchRequest;
use App\Http\Requests\QuestionIdRequest;

class QuestionController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(QuestionSearchRequest $request): string
    {
        $validated = $request->validated();
        $questions = app()->make('QuestionService')->get($validated);
        return response()->json($questions);
    }

    /**
     * @param QuestionRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(QuestionRequest $request): string
    {
        $validated = $request->validated();
        $questions = app()->make('QuestionService')->create($validated);
        return response()->json($questions);
    }

    /**
     * @param QuestionIdRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createVote(QuestionIdRequest $request): string
    {
        $validated = $request->validated();
        $question = app()->make('QuestionService')->createVote($validated);
        return response()->json($question);
    }

    /**
     * @param QuestionIdRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(QuestionIdRequest $request): string
    {
        $validated = $request->validated();
        $deleteData = app()->make('QuestionService')->destroy($validated);
        return response()->json($deleteData);
    }
}
