@include('header')

<main class="main-container">
@include('aside')
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
                    <button type="button" class="btn  btn-outline-secondary">Hot</button>
                    <button type="button" class="btn  btn-outline-secondary">Week</button>
                    <button type="button" class="btn  btn-outline-secondary">Month</button>
                </div>
            </hgroup>
            <div class="separator"></div>
            <div class="main-page-content">
                <article id="questions">
{{--                    <div class="question-summary" id="question-summary">--}}
{{--                        <template id="question-template">--}}
{{--                              <div class="row">--}}
{{--                                   <div class="stats-container col-lg-1">--}}
{{--                                       <p id="votes"> votes</p>--}}
{{--                                       <label>votes</label>--}}
{{--                                       <p id="answers">answers</p>--}}
{{--                                       <label>answers</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="summary">--}}
{{--                                        <div class="question-container col-lg-6">--}}
{{--                                            <a href="/question">--}}
{{--                                            <h2 id="title">title</h2></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="user-container">user_id</div>--}}
{{--                                    </div>--}}
{{--                               </div>--}}
{{--                        </template>--}}
{{--                    </div>--}}
                </article>
            </div>
        </div>
    </div>
</main>

@include('footer')
