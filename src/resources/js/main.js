(function($) {
    $(document).ready(function() {

        $.get("http://127.0.0.1:8000/api/questions", function(data, status){
            data.forEach(({ user_id, title, body, votes_questions_count}) => {
                var answers = '0';
                var views= '0';
                let elemHome = document.createElement('div');
                elemHome.append(document.getElementById('question-template-home').content.cloneNode(true));
                elemHome.querySelector("#user-container-home").textContent = user_id;
                elemHome.querySelector("#title-home").textContent = title;
                elemHome.querySelector("#answers-home").textContent = answers;
                elemHome.querySelector("#views-home").textContent = views;
                elemHome.querySelector("#votes-home").textContent = votes_questions_count;
                $('#question-summary-home').append(elemHome);
            })
        });
        $.get("http://127.0.0.1:8000/api/questions", function(data, status){
            data.forEach(({ user_id, title, body, votes_questions_count}) => {
                var answers = '0';
                let elemQuestions = document.createElement('div');
                elemQuestions.append(document.getElementById('question-template-questions').content.cloneNode(true));
                elemQuestions.querySelector("#user-container-questions").textContent = user_id;
                elemQuestions.querySelector("#title-questions").textContent = title;
                elemQuestions.querySelector("#body-questions").textContent = body+'..';
                elemQuestions.querySelector("#answers-questions").textContent = answers;
                elemQuestions.querySelector("#votes-questions").textContent = votes_questions_count;
                $('#question-summary-questions').append(elemQuestions);
            })
        });
    });
})(jQuery);
