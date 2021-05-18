@extends('app')
@section('content')
<main class="main-container">
    <x-package-aside/>
    <div class="page-one-question-content p-4" id="content">
        <div class="menu-page-content bg-white p-5">
            <hgroup class="row  align-items-center">
                <div class="text-menu-content col-8">
                    <p>{{$question->title}}</p>
                </div>
                <div class="btn-menu-content col-4">
                <a id="btnAskQuestion" type="button" href="/new-question" class="btn btn-primary ">Ask Question</a>
                </div>
            </hgroup>
            <div class="separator-one-question"></div>
            <article class="main-one-question-page-content">
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
                            <p>{{$question->body}}</p>
                        </div>
                    </div>
                </div>
            </article>

{{--            TODO answers--}}
            <hgroup class="row align-items-center mt-5">
                <div class="text-menu-content col-8 mt-3">
                    @foreach($answers as $answer)
                    <div class="row align-items-center">
                        <p>1</p>
                        <p>Answers</p>
                    </div>
                </div>
                <div class="btn-menu-content col-4">
                    <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-secondary">Active</button>
                        <button type="button" class="btn btn-outline-secondary">Oldest</button>
                        <button type="button" class="btn btn-outline-secondary">Votes</button>
                    </div>
                </div>
            </hgroup>
            <article class="main-one-question-page-content">
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
                            <p>{{$answer->body}}</p>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
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
