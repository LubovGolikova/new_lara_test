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
    ], function ($routes) {

        Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
        Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
    });

    Route::get('/questions', [App\Http\Controllers\QuestionController::class, 'index']);

    Route::get('/answers', [App\Http\Controllers\AnswerController::class, 'index']);

    Route::group([
        'middleware' => ['jwt.verify']
    ], function ($routes) {

        Route::get('user', [App\Http\Controllers\AuthController::class, 'getAuthenticatedUser']);

        Route::group([
            'middleware' => 'role:admin'
        ], function () {

            Route::resource('/admin/roles', App\Http\Controllers\RoleController::class);
            Route::post('/admin/role/assign', [App\Http\Controllers\UserController::class, 'assign']);
            Route::post('/admin/role/update_assign', [App\Http\Controllers\UserController::class, 'newAssign']);
            Route::post('/admin/role/discharge', [App\Http\Controllers\UserController::class, 'discharge']);

            Route::delete('/admin/user/delete', [App\Http\Controllers\UserController::class, 'destroy']);
            Route::delete('/admin/question/delete', [App\Http\Controllers\QuestionController::class, 'destroy']);
            Route::delete('/admin/answer/delete', [App\Http\Controllers\AnswerController::class, 'destroy']);

        });

        Route::post('/questions/create', [App\Http\Controllers\QuestionController::class, 'create']);
        Route::get('/questions/vote', [App\Http\Controllers\QuestionController::class, 'createVote']);

        Route::post('/answers/create', [App\Http\Controllers\AnswerController::class, 'create']);
        Route::get('/answers/vote', [App\Http\Controllers\AnswerController::class, 'createVote']);
    });
});




