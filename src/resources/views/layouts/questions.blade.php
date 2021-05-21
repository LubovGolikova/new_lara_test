@extends('app')
@section('content')

<main class="main-container">
    <x-package-aside/>
    <div class="page-content p-5" >
        <hgroup class="main-group-menu-top col">
            <div class="text-menu-content  row m-3">
                <div class="col-9">
                    <h1>All Questions</h1>
                </div>
                <div class="col-3">
                    <a id="btnAskQuestion" type="button" href="/new-question" class="btn btn-primary ">Ask Question</a>
                </div>
            </div>
            <div class="row  m-3">
                <div>{{$countQuestion}} questions</div>
                <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-secondary">Newest</button>
                    <button type="button" class="btn btn-outline-secondary">Active</button>
                    <button type="button" class="btn  btn-outline-secondary">Unanswered <span class="badge badge-primary">123</span></button>
                </div>
                <button id="filter" type="button" class="btn btn-light ml-2" data-toggle="collapse" data-target="#filter-body"
                        aria-expanded="false" aria-controls="filter-body">Filter</button>
            </div>
        </hgroup>
      <x-package-filter/>
        <article  class="main-page-content m-5">
            @for ($i = 0; $i < count($questions); $i++)
                <div class="question-container-main row">
                   <div class="stats-container col-2">
                       <div class="col">
                           <div class="col-3">
                               <div class="status unanswered">
                                   <span id="votes-questions">{{$questions[$i]->votes_questions_count}}</span>
                                   <label>votes</label>
                               </div>
                           </div>
                           <div class="col-3">
                               @if ($countAnswers[$i] === 0)
                                   <div class="status unanswered-questions">
                                       <span id="answers-home">{{$countAnswers[$i]}}</span>
                                       <label>answers</label>
                                   </div>
                               @else
                                   <div class="status answered">
                                       <span id="answers-home">{{$countAnswers[$i]}}</span>
                                       <label>answers</label>
                                   </div>
                               @endif
                           </div>
                       </div>
                    </div>
                    <div class="summary col-10 mb-5">
                        <div class="question-container">
                            <a href="/question/{{$questions[$i]->id}}"><h3 id="title-questions">{{$questions[$i]->title}}</h3></a>
                            <p id="body-questions">{{$questions[$i]->shortContent()}}</p>
                        </div>
                        <div id="user-container-questions">asked by {{$questions[$i]->user->username}}</div>
                    </div>
                </div>
            @endfor
        </article>
    </div>
</main>

@endsection
