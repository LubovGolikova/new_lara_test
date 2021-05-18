@extends('app')
@section('content')
<main class="main-container">
    <x-package-aside/>
    <div class="page-one-question-content p-4" id="content">
        <div class="menu-page-content bg-white p-5">
            <div class="row justify-content-between align-items-center">
                <div class="text-menu-content">
                    <h1>Title</h1>
                </div>
                <a id="btnAskQuestion" type="button" href="/new-question" class="btn btn-primary ">Ask Question</a>
            </div>
            <div class="separator"></div>
            <div class="main-one-question-page-content">
                <div class="row mr-5">
                    <div class="add-vote col-1">
                        <div class="top-arrow"></div>
                        <div class="digit-vote">
                            <p>0</p>
                        </div>
                        <div class="bottom-arrow"></div>
                    </div>
                    <div class="question col-11">
                        <div class="question-content" id="question-question">
                            <h2>Body</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator-one-question"></div>
            <div class="answer-container">
                <div class="answer-text text-left">
                    <label>Your Answer</label>
                </div>
                <form action="" method="post">
                    <div class="answer-text text-left">
                        <label>Body</label>
                    </div>
                    <div class="form-group row">
                        <div class="col ">
                            <textarea id="body"  class="form-control" name="body" value=""></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col">
                            <button id="send" type="submit" class="btn btn-primary ">
                                Post Your Answer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
