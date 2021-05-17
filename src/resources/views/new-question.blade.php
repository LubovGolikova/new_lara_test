@include('header')
<link rel="stylesheet" href="../dist/new-question.css">
<section class="main-container">
    <div class="container">
        <div class="question-headline-text">
            Ask a public question
        </div>
        <div class="question-container">
            <form role="form" method="post">
                <div class="question-text text-left">
                    <label>Title</label>
                </div>
                <div class="form-group row">
                    <div class="col ">
                        <input id="title" type="text" class="form-control" name="title" value="">
                    </div>
                </div>
                <div class="question-text text-left">
                    <label>Body</label>
                </div>
                <div class="form-group row">
                    <div class="col ">
                        <textarea id="body"  class="form-control" name="body" value=""></textarea>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col">
                        <button id="mew-question-form-submit" type="submit" class="btn btn-primary ">
                            Send
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>


@include('footer');
