<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Http\Requests\AnswerSearchRequest;
use App\Http\Requests\AnswerIdRequest;
use App\Models\Answer;
use App\Notifications\AnswerReceived;
use Illuminate\Support\Facades\Notification;

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
        $data = app()->make('AnswerService')->preparedDataToSendEmail($answer->id);
        app()->make('MailService')->createMail($data);
        $user = \Auth::user();
        Notification::send($user, new AnswerReceived($user,$answer));
        return response()->json($answer);

    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createVote(AnswerIdRequest $request)
    {
        $validated = $request->validated();
        $answer = app()->make('AnswerService')->createVote($validated);
        return response()->json($answer);

    }

    /**
     * @param AnswerIdRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(AnswerIdRequest $request)
    {
        $validated = $request->validated();
        $deleteData = app()->make('AnswerService')->destroy($validated);
        return response()->json($deleteData);

    }
}
