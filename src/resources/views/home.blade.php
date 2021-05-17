@include('header');

<main class="main-container">
@include('aside');
    <div class="page-content p-4" id="content">
        <div class="menu-page-content bg-white p-5">
            <hgroup class="row justify-content-between align-items-center">
                <div class="text-menu-content">
                    <h1>All Questions</h1>
                </div>
                <a id="btnAskQuestion" type="button" href="view/new-question.html" class="btn btn-primary ">Ask Question</a>
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
            <div class="col">
                <div class="collapse" id="filter-body">
                    <div class="filter-card mt-5 mb-3 card-body">
                        <div class="filter-card-content row">
                            <div class="order-by-group col-6">
                                <fieldset>
                                    <legend>Filter by</legend>
                                    <div class="filter-position">
                                        <input class="filter-by-checkbox" type="checkbox" name="filterId" value=""/>
                                        <label>Has answer</label>
                                    </div>
                                    <div class="filter-position">
                                        <input class="filter-by-checkbox" type="checkbox" name="filterId" value=""/>
                                        <label>Has voted answer</label>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="filter-sorted-group col-6 ">
                                <fieldset>
                                    <legend>Sorted by</legend>
                                    <div class="filter-position">
                                        <input class="filter-by-radio" type="radio" name="sortId" value=""/>
                                        <label>Order by </label>
                                    </div>
                                    <div class="filter-position">
                                        <input class="filter-by-radio" type="radio" name="sortId" value=""/>
                                        <label>Order by votes</label>
                                    </div>
                                    <div class="filter-position">
                                        <input class="filter-by-radio" type="radio" name="sortId" value=""/>
                                        <label>Order direction</label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="filter-card-separator"></div>
                        <div class="row justify-content-between ml-1 mr-5">
                            <a href="#" class="btn btn-primary">Apply filter</a>
                            <a href="#" class="card-link">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <div class="main-page-content">
            <article id="questions">
                <div class="question-summary" id="question-summary">
                    <template id="question-template">
                              <div class="row">
                                   <div class="stats-container col-1">
                                       <p> votes</p>
                                       <label>votes</label>
                                        <p>answers</p>
                                       <label>answers</label>
                                    </div>
                                    <div class="summary">
                                        <div class="question-container col-11">
                                            <a href="../view/question.html">
                                           <h2 id="title">title</h2></a>
                                            <p> body</p>
                                        </div>
                                        <div class="user-container">user_id</div>
                                    </div>
                               </div>
                    </template>
                </div>
            </article>
        </div>
    </div>
</main>

@include('footer');
