@extends('app')
@section('content')
<main class="main-container">
    <x-package-aside/>
    <div class="page-content-one-question p-5">
        <hgroup class="main-group-menu-top row mt-5 mb-5">
            <div class="text-menu-content-one-question col-8">
                <p>{{$question->title}}</p>
            </div>
            <div class="btn-menu-content col-4">
                <a id="btnAskQuestion" type="button" href="/new-question" class="btn btn-primary ">Ask Question</a>
            </div>
        </hgroup>
        <article class="main-page-content-one-question row mr-5">
            <div class="add-vote col-1">
                <div id="addVoteQuestion" class="top-arrow"></div>
                <div class="digit-vote">
                    <p>{{$countVotesQuestion}}</p>
                </div>
                <div id="deleteVoteQuestion" class="bottom-arrow"></div>
            </div>
            <div class="question col-11">
                <div class="question-content" id="question-question">
                    <p>{{$question->body}}</p>
                </div>
            </div>
            <input type="hidden" id="question" name="question" value="{{ $question->id }}" />
        </article>
        <hgroup class="row align-items-center mt-5 mr-5">
            <div class="text-menu-content col-8">
                <div class="row align-items-center">
                    <span>{{$countAnswers}} </span>
                    <span class="ml-1">Answers</span>
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
        @foreach($answers as $answer)
            <article class="main-page-content-one-answer  row mt-5 mr-10 mb-5 pb-5">
                <div class="add-vote col-1">
                    <div class="top-arrow"></div>
                    <div class="digit-vote">
                        <p>{{$countVotesAnswer}}</p>
                    </div>
                    <div class="bottom-arrow"></div>
                </div>
                <div class="question col-11">
                    <div class="question-content" id="question-question">
                        <p>{{$answer->body}}</p>
                    </div>
                </div>
            </article>
        @endforeach
        <div class="answer-container mt-5">
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
</main>
@endsection
