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

    Route::get('/questions', [App\Http\Controllers\QuestionController::class, 'index']);
    Route::get('/questions/search', [App\Http\Controllers\QuestionController::class, 'search']);
    Route::get('/questions/sortData', [App\Http\Controllers\QuestionController::class, 'sortData']);

    Route::get('/answers', [App\Http\Controllers\AnswerController::class, 'index']);
    Route::get('/answers/search', [App\Http\Controllers\AnswerController::class, 'search']);

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




