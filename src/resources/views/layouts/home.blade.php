@extends('app')
@section('content')

<main class="main-container">
    <x-package-aside/>
    <div class="page-content p-5">
        <hgroup class="main-group-menu-top col">
            <div class="text-menu-content row mb-3">
                <div class="col-9">
                    <h1>Top Questions</h1>
                </div>
                <div class="col-3">
                    <a id="btnAskQuestion" type="button" href="/new-question" class="btn btn-primary ">Ask Question</a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-secondary">Interesting</button>
                    <button type="button" class="btn btn-outline-secondary"><span class="badge badge-primary">123</span> Bounties</button>
                    <button type="button" class="btn btn-outline-secondary">Hot</button>
                    <button type="button" class="btn btn-outline-secondary">Week</button>
                    <button type="button" class="btn btn-outline-secondary">Month</button>
                </div>
            </div>
        </hgroup>
        <article class="main-page-content m-5">
            @for ($i = 0; $i < count($questions); $i++)
                <div class="question-container-main row">
                   <div class="stats-container col-3">
                       <div class="row ">
                           <div class="col-3">
                               <div class="status unanswered">
                                   <span id="votes-home">{{$questions[$i]->votes_questions_count}}</span>
                                   <label>votes</label>
                               </div>
                           </div>
                           <div class="col-3">
                               <div class="status answered">
                                   <span id="answers-home">{{$countAnswers[$i]}}</span>
                                   <label>answers</label>
                               </div>
                           </div>
                       </div>
                    </div>
                   <div class="summary col-9 mb-3">
                        <div class="question-container">
                            <a href="/question/{{$questions[$i]->id}}"><h3 id="title-question">{{$questions[$i]->title}}</h3></a>
                        </div>
                        <div id="user-container-home">asked by {{$questions[$i]->user->username}}</div>
                   </div>
                </div>
            @endfor
        </article>
    </div>
</main>
@endsection
