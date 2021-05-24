import ENV from "./config";

(function($) {
    $(document).ready(function() {
       const filterForm = document.getElementById("filter-form");

       $('body').on('click', '#filter-form-submit', function(e) {
            e.preventDefault();
            let checkedHasAnswer = $("#hasAnswer").is(":checked");
            let checkedHasVotedAnswer = $("#hasVotedAnswer").is(":checked");
            let checkedOrderByVotes = $("#orderByVotes").is(":checked");
            let orderBy =  $('#orderBy').val();
            let orderDirection = $('#orderDirection').val();

           $.ajax({
               url: ENV.apiEndpoint + '/api/questions',
               method: 'GET',
               dataType: 'json',
               processData: false,
               data: {
                   order_by: orderBy,
                   has_answer: checkedHasAnswer,
                   has_voted_answer: checkedHasVotedAnswer,
                   order_by_votes: checkedOrderByVotes,
                   order_direction: orderDirection
               },
               success: function(data){
                   console.log('success: '+data);
               },
               error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
               }
           });

       });
    });
})(jQuery);
