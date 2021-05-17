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
    return view('home');
});

Route::get('/new-question', function () {
    return view('layouts.new-question');
});

Route::get('/login', function () {
    return view('layouts.login');
});

Route::get('/register', function () {
    return view('layouts.register');
});

Route::get('/question', function () {
    return view('layouts.question');
});

Route::get('/questions', function () {
    return view('layouts.questions');
});
