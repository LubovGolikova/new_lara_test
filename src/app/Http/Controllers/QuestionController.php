<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
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
        //        return response()->json('xvxcvxcv');
        $questions = $this->questionService->getAll();
        return response()->json($questions);
    }

    public function store(QuestionRequest $request)
    {
        $validated = $request->validated();

    }

}
