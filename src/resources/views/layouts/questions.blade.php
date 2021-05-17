@include('header')

<main class="main-container">
@include('aside')
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
        @include('filter')
        <div class="separator"></div>
            <div class="main-page-content">
                <article id="questions">
                    <div class="question-summary" id="question-summary">
                        <template id="question-template">
                              <div class="row">
                                   <div class="stats-container col-lg-1">
                                       <p id="votes"> votes</p>
                                       <label>votes</label>
                                       <p id="answers">answers</p>
                                       <label>answers</label>
                                    </div>
                                    <div class="summary">
                                        <div class="question-container col-lg-6">
                                            <a href="/question">
                                            <h2 id="title">title</h2></a>
                                            <p id="body"></p>
                                        </div>
                                        <div class="user-container">user_id</div>
                                    </div>
                               </div>
                        </template>
                    </div>
                </article>
            </div>
        </div>
    </div>
</main>

@include('footer')
