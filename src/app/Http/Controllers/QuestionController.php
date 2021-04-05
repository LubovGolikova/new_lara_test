<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Services\QuestionService;
class QuestionController extends Controller
{
    public function index()
    {
        $questions = app()->make('QuestionService')->getAll();
        return response()->json($questions);
    }

    public function store(QuestionRequest $request)
    {

        $validated = $request->validated();
        $questions = app()->make('QuestionService')->create($validated);
        return response()->json($questions);
    }

    public function search(Request $request)
    {
        $searchStr = $request->str;
        $questions = app()->make('QuestionService')->searchAll($searchStr);
        return response()->json($questions);
    }

    public function sortDataDESC()
    {
        $questions = app()->make('QuestionService')->sortData($param=1);
        return response()->json($questions);
    }

    public function sortDataASC()
    {
        $questions = app()->make('QuestionService')->sortData($param=0);
        return response()->json($questions);
    }

    public function sortVotesDESC()
    {
        $questions = app()->make('QuestionService')->sortVotes($param=1);
        return response()->json($questions);
    }

    public function sortVotesASC()
    {
        $questions = app()->make('QuestionService')->sortVotes($param=0);
        return response()->json($questions);
    }

    public function createVote($id)
    {
        $question = app()->make('QuestionService')->addVote($id);
        return response()->json($question);
    }

    public  function isAnswer()
    {
        $questions = app()->make('QuestionService')->isAnswer();
        return response()->json($questions);
    }

    public  function isNotAnswer()
    {
        $questions = app()->make('QuestionService')->isNotAnswer();
        return response()->json($questions);
    }

    public function isVoteAnswer()
    {
        $questions = app()->make('QuestionService')->isVoteAnswer();
        return response()->json($questions);
    }

    public function isNotVoteAnswer()
    {
        $questions = app()->make('QuestionService')->isNotVoteAnswer();
        return response()->json($questions);
    }
}
