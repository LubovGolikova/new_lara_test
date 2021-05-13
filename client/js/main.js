(function($) {
    $(document).ready(function() {
        $.get("http://127.0.0.1:8000/api/questions", function(data, status){
            var bodyString = '';
            data.forEach(({ user_id, title, body, votes_questions_count}) => {
                var a=0;
                bodyString += ('<div class="row"><div class="stats-container col-1">' +
                    '<p>' + votes_questions_count +'</p>'+ '<label>votes</label>' +
                    '<p>' + a +'</p>'+ '<label>answers</label>'+
                    '</div>'
                    + '<div class="summary">'+
                    // '<div class="question-container col-11">'+'<a href="../view/question.html/'+id+'\"'+'><h2>' + title + '</h2></a>'
                    '<div class="question-container col-11">'+'<a href="../view/question.html"><h2>' + title + '</h2></a>'
                    +'<p>' + body + '</p>' + '</div>' + '<div class="user-container">'+ user_id +
                    '</div>'+'</div>'+'</div>'+'<div class="separator"></div>');

                $('.question-summary').html(bodyString);
            })
        });

        // $('body').on('click', '#filter', function () {
        //    alert("!!!!");
        // });

        // //TODO receive data from form
        $('body').on('click', '#send', function() {
            $.post("http://127.0.0.1:8000/api/questions/create",
                {
                       title: $('#title').val(),
                       body: $('#body').val()
                 },
                 function(data, status){
                 alert("Data: " + data + "\nStatus: " + status);
            });
        });
        // $('.collapse').collapse()

    });
})(jQuery);