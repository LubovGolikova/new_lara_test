<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([
    'middleware' => 'api'
], function ($routes) {

    Route::group([
        'prefix' => 'auth'
    ], function($routes) {
        Route::post('login',  [App\Http\Controllers\AuthController::class, 'login']);
        Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
    });

    Route::get('/answers', [App\Http\Controllers\AnswerController::class, 'index']);
    Route::get('/answers/search', [App\Http\Controllers\AnswerController::class, 'search']);

    Route::get('/questions', [App\Http\Controllers\QuestionController::class, 'index']);
    Route::get('/questions/search', [App\Http\Controllers\QuestionController::class, 'search']);

    Route::get('/questions/sort/data/desc', [App\Http\Controllers\QuestionController::class, 'sortDataDESC']);
    Route::get('/questions/sort/data/asc', [App\Http\Controllers\QuestionController::class, 'sortDataASC']);
    Route::get('/questions/sort/votes/desc', [App\Http\Controllers\QuestionController::class, 'sortVotesDESC']);
    Route::get('/questions/sort/votes/asc', [App\Http\Controllers\QuestionController::class, 'sortVotesASC']);

    Route::get('/questions/has_not_vote_answers', [App\Http\Controllers\QuestionController::class, 'isNotVoteAnswer']);
    Route::get('/questions/has_vote_answers', [App\Http\Controllers\QuestionController::class, 'isVoteAnswer']);

    Route::get('/questions/has_not_answer', [App\Http\Controllers\QuestionController::class, 'isNotAnswer']);
    Route::get('/questions/has_answer', [App\Http\Controllers\QuestionController::class, 'isAnswer']);

    Route::group([
        'middleware' => ['jwt.verify']
    ], function($routes) {
        Route::get('user',[App\Http\Controllers\AuthController::class,'getAuthenticatedUser']);
        Route::post('/questions/create', [App\Http\Controllers\QuestionController::class,'store']);
        Route::post('/answers/create', [App\Http\Controllers\AnswerController::class, 'create']);
        Route::post('questions/{question}/vote',[App\Http\Controllers\QuestionController::class, 'createVote']);
        Route::post('answers/{answer}/vote',[App\Http\Controllers\AnswerController::class, 'createVote']);
    });
});




