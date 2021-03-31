<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/questions', [App\Http\Controllers\QuestionController::class, 'index']);
Route::get('/answers', [App\Http\Controllers\AnswerController::class, 'index']);
Route::get('/questions/search', [App\Http\Controllers\QuestionController::class, 'search']);
Route::get('/answers/search', [App\Http\Controllers\AnswerController::class, 'search']);
Route::get('/questions/sort/data/desc', [App\Http\Controllers\QuestionController::class, 'sortDataDESC']);
Route::get('/questions/sort/data/asc', [App\Http\Controllers\QuestionController::class, 'sortDataASC']);
Route::get('/questions/sort/votes/desc', [App\Http\Controllers\QuestionController::class, 'sortVotesDESC']);
Route::get('/questions/sort/votes/asc', [App\Http\Controllers\QuestionController::class, 'sortVotesASC']);
