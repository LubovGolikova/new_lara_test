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
    private $questionService;

    public  function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function index()
    {
        $questions = $this->questionService->getAll();
        return response()->json($questions);
    }

    public function store(QuestionRequest $request)
    {

        $validated = $request->validated();
        $questions = $this->questionService->create($validated);
        return response()->json($questions);
    }

    public function search(Request $request)
    {
        $searchStr = $request->str;
        $questions = $this->questionService->searchAll($searchStr);
        return response()->json($questions);
    }

    public function sortDataDESC()
    {
        $questions = $this->questionService->sortData($param=1);
        return response()->json($questions);
    }

    public function sortDataASC()
    {
        $questions = $this->questionService->sortData($param=0);
        return response()->json($questions);
    }

    public function sortVotesDESC()
    {
        $questions = $this->questionService->sortVotes($param=1);
        return response()->json($questions);
    }

    public function sortVotesASC()
    {
        $questions = $this->questionService->sortVotes($param=0);
        return response()->json($questions);
    }

    public function createVote($id)
    {
        $question = $this->questionService->addVote($id);
        return response()->json($question);
    }

    public  function isAnswer()
    {
        $questions = $this->questionService->isAnswer();
        return response()->json($questions);
    }

    public  function isNotAnswer()
    {
        $questions = $this->questionService->isNotAnswer();
        return response()->json($questions);
    }

    public function isVoteAnswer()
    {
        $questions = $this->questionService->isVoteAnswer();
        return response()->json($questions);
    }

    public function isNotVoteAnswer()
    {
        $questions = $this->questionService->isNotVoteAnswer();
        return response()->json($questions);
    }
}
