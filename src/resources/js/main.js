(function($) {
    $(document).ready(function() {

        $.get("http://127.0.0.1:8000/api/questions", function(data, status){
            data.forEach(({ user_id, title, body, votes_questions_count}) => {
                var answers = '0';
                let elem = document.createElement('div');
                elem.append(document.getElementById('question-template').content.cloneNode(true));
                elem.querySelector(".user-container").textContent = user_id;
                elem.querySelector("#title").textContent = title;
                elem.querySelector("#body").textContent = body+'..';
                elem.querySelector("#answers").textContent = answers;
                elem.querySelector("#votes").textContent = votes_questions_count;
                $('.question-summary').append(elem);
            })
        });
    });
})(jQuery);
