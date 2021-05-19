@extends('app')
@section('content')

<main class="main-container">
    <x-package-aside/>
    <div class="page-content p-4" id="content">
        <div class="menu-page-content bg-white p-5">
            <hgroup class="row justify-content-between align-items-center">
                <div class="text-menu-content">
                    <h1>All Questions</h1>
                </div>
                <a id="btnAskQuestion" type="button" href="/new-question" class="btn btn-primary ">Ask Question</a>
            </hgroup>
            <hgroup class="row justify-content-between mt-2">
                <div>123 questions</div>

                <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-secondary">Newest</button>
                    <button type="button" class="btn btn-outline-secondary">Active</button>
                    <button type="button" class="btn  btn-outline-secondary">Unanswered <span class="badge badge-primary">123</span></button>
                </div>
                <button id="filter" type="button" class="btn btn-light ml-2" data-toggle="collapse" data-target="#filter-body"
                        aria-expanded="false" aria-controls="filter-body">Filter</button>
            </hgroup>
      <x-package-filter/>
        <div class="separator"></div>
            <div class="main-page-content">
                <article id="questions-questions">
                    <div class="question-summary" id="question-summary-questions">
                        @foreach($questions as $question)
                        <div id="question-container-questions">
                              <div class="row">
                                   <div class="stats-container col-3">
                                       <p id="votes-questions">{{$question->id}}</p>
                                       <label>votes</label>
                                       <p id="answers-questions">{{$question->id}}</p>
                                       <label>answers</label>
                                    </div>
                                    <div class="summary col-9">
                                        <div class="question-container">
                                            <a href="/question/{{$question->id}}"><h3 id="title-questions">{{$question->title}}</h3></a>
                                            <p id="body-questions">{{$question->body}}</p>
                                        </div>
                                        <div id="user-container-questions">asked by {{$question->user->username}}</div>
                                    </div>
                               </div>
                            <div class="separator"></div>
                        </div>
                        @endforeach
                    </div>
                </article>
            </div>
        </div>
    </div>
</main>

@endsection
