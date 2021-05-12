(function($) {
    $(document).ready(function() {
        $.get("http://127.0.0.1:8000/api/questions", function(data, status){
            var bodyString = '';
            data.forEach(({ id, user_id, title, body, votes_questions_count, }) => {

                bodyString += ('<div class="row"><div class="stats-container col-1 ">' +
                    '<p>' + id + '</p>' + '<p>' + votes_questions_count + '</p>' + '</div>'
                    + '<div class="summary">'+
                    '<div class="question-container col-11">'+'<h2>' + title + '</h2>'
                    +'<p>' + body + '</p>' + '</div>' + '<div class="user-container">'+ user_id +
                    '</div>'+'</div>'+'</div>'+'</div>'+'<div class="separator"></div>');

                $('.question-summary').html(bodyString);
            })
        });

        $('body').on('click', '#btnFilter', function () {
            $(this).height("300");
        });

        //TODO receive data from form
        $('body').on('click', '#btnAskQuestion', function() {
            $.post("http://127.0.0.1:8000/api/questions/create",
                {

                },
                function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
            });
        });
        $('#myModal').modal('show');

        $('#signUp').modal('toggle');


        // $('#myModal').on('shown.bs.modal', function () {
        //     $('#myInput').trigger('focus')
        // });

    });
})(jQuery);