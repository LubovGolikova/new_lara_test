@extends('app')
@section('content')

<main class="main-container">
    <x-package-aside/>
    <div class="page-content p-4" id="content">
        <div class="menu-page-content bg-white p-5">
            <hgroup class="row justify-content-between align-items-center">
                <div class="text-menu-content">
                    <h1>Top Questions</h1>
                </div>
                <a id="btnAskQuestion" type="button" href="/new-question" class="btn btn-primary ">Ask Question</a>
            </hgroup>
            <hgroup class="row justify-content-between mt-2">
                <div>123 questions</div>

                <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-secondary">Interesting</button>
                    <button type="button" class="btn btn-outline-secondary"> <span class="badge badge-primary">123</span> Bounties</button>
                    <button type="button" class="btn btn-outline-secondary">Hot</button>
                    <button type="button" class="btn btn-outline-secondary">Week</button>
                    <button type="button" class="btn btn-outline-secondary">Month</button>
                </div>
            </hgroup>
            <div class="separator"></div>
            <div class="main-page-content">
                <article id="questions-home">
                    <div class="question-summary" id="question-summary-home">
                        @foreach($questions as $question)
                        <div id="question-container-home">
                              <div class="row">
                                   <div class="stats-container col-3">
                                       <div class="row">
                                           <div class="col-3">
                                               <p id="votes-home">{{$question->id}}</p>
                                               <label>votes</label>
                                           </div>
                                           <div class="col-3">
                                               <p id="answers-home">{{$question->id}}</p>
                                               <label>answers</label>
                                           </div>
                                           <div class="col-3">
                                               <p id="views-home">{{$question->id}}</p>
                                               <label>views</label>
                                           </div>
                                       </div>
                                    </div>
                                    <div class="summary col-9">
                                        <div class="question-container">
                                            <a href="/question/{{$question->id}}"><h2 id="title-home">{{$question->title}}</h2></a>
                                        </div>
                                        <div id="user-container-home">{{$question->user_id}}</div>
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
