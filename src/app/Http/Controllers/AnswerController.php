<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use Illuminate\Http\Request;
use App\Services\AnswerService;
class AnswerController extends Controller
{
    private $answerService;

    public function __construct(AnswerService $answerService)
    {
        $this->answerService = $answerService;
    }

    public function index()
    {
        $answers = $this->answerService->getAll();
        return response()->json($answers);
    }

    public function create(AnswerRequest $request)
    {
        return response()->json('dfdfdfd!!!');
//        $validated = $request->validated();
//        $answer = $this->answerRepository->create($validated);
//        return response()->json($answer);
    }

}
