import ENV from "./config";

(function($) {
    $(document).ready(function() {
        if( $(document).height() <= $(window).height() ){
            $(".page-footer").addClass("fixed-bottom");
        }
        $("#logout").hide();

        $('body').on('click', '#addVoteQuestion', function() {
            $('#addVoteQuestion').addClass("add-vote-top");
            $('#deleteVoteQuestion').removeClass("add-vote-bottom");
            let idQuestion = document.getElementById("question").value;
             $.get(ENV.apiEndpoint + '/api/questions/vote', {id: idQuestion}, function (data) {
                    alert(data);
                    console.log(data);
                 console.log(document.cookie);
             });

        });

        $('body').on('click', '#deleteVoteQuestion', function() {
            $('#addVoteQuestion').removeClass("add-vote-top");
            $('#deleteVoteQuestion').addClass("add-vote-bottom");
        });

    });
})(jQuery);
