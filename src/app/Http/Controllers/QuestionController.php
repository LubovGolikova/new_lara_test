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
    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $questions = app()->make('QuestionService')->getAll();
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
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createVote($id)
    {
        $question = app()->make('QuestionService')->createVote($id);
        return response()->json($question);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function search(Request $request)
    {
        $questions = app()->make('QuestionService')->search($this->helperData($request, 's', 'all'));
        return response()->json($questions);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function sortData(Request $request)
    {
        $questions = app()->make('QuestionService')->sortData($this->helperData($request, 'sortBy', 'isAnswer'));
        return response()->json($questions);
    }

    /**
     * @param Request $request
     * @param $sortKindVal
     * @param $defaultKind
     * @return array
     */
    public function helperData(Request $request, $sortKindVal, $defaultKind)
    {
        if ($request->has($sortKindVal)) {
            $sortKind = $request->input($sortKindVal);

        } else {
            $sortKind = $defaultKind;

        }
        if ($request->has('sortOrder')) {
            $sortOrder = $request->input('sortOrder');

        } else {
            $sortOrder = 'created_at';
        }
        if ($request->has('sortDir')) {
            $sortDir = $request->input('sortDir');

        } else {
            $sortDir = 'asc';
        }
        $arrStr = [];
        $arrStr[$sortKindVal] = $sortKind;
        $arrStr['sortOrder'] = $sortOrder;
        $arrStr['sortDir'] = $sortDir;
        return $arrStr;
    }
}
