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
    return view('layouts.home');
});

Route::get('/new-question', function () {
    return view('layouts.new-question', [
        'body_class' => 'bg-grey'
    ]);
});

Route::get('/login', function () {
    return view('layouts.login', [
        'body_class' => 'bg-grey'
    ]);
});

Route::get('/register', function () {
    return view('layouts.register', [
        'body_class' => 'bg-grey'
    ]);
});

Route::get('/question', function () {
    return view('layouts.question');
});

Route::get('/questions', function () {
    return view('layouts.questions');
});
