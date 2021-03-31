<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use Illuminate\Http\Request;
use App\Repositories\AnswerRepository;
class AnswerController extends Controller
{
    private $answerRepository;

    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function index()
    {
        $answers = $this->answerRepository->get();
        return response()->json($answers);
    }

    public function create(Request $request)
    {
        return response()->json('dfdfdfd!!!');
//        $validated = $request->validated();
//        $answer = $this->answerRepository->create($validated);
//        return response()->json($answer);
    }
}
