<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Requests\QuestionSearchRequest;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(QuestionSearchRequest $request)
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
    public function create(QuestionRequest $request)
    {
        $validated = $request->validated();
        $questions = app()->make('QuestionService')->create($validated);
        return response()->json($questions);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createVote(int $id)
    {
        $question = app()->make('QuestionService')->createVote($id);
        return response()->json($question);
    }

    /**
     * @param QuestionDeleteRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(QuestionDeleteRequest $request)
    {
        $validated = $request->validated();
        dd($validated);
        $deleteData = app()->make('QuestionService')->destroy($validated);
        return response()->json($deleteData);
    }
}
