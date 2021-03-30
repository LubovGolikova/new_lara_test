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

    public function create(AnswerRequest $request)
    {
        $answer = $this->answerRepository->create([

        ]);
        return response()->json($answer);
    }
}
