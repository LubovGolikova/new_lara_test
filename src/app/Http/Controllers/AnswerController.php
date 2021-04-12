<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Http\Requests\AnswerSearchRequest;
use App\Http\Requests\AnswerDeleteRequest;

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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createVote(int $id)
    {
        $answer = app()->make('AnswerService')->createVote($id);
        return response()->json($answer);
    }

    /**
     * @param AnswerDeleteRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(AnswerDeleteRequest $request)
    {
        $validated = $request->validated();
        $deleteData = app()->make('AnswerService')->destroy($validated);
        return response()->json($deleteData);
    }
}
