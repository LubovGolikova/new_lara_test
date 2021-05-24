import ENV from "./config";

(function($) {
    $(document).ready(function() {
       const filterForm = document.getElementById("filter-form");

       $('body').on('click', '#filter-form-submit', function(e) {
            e.preventDefault();
            const checkedHasAnswer = $("#hasAnswer").is(":checked");
            const checkedOrderDirection = $("#orderDirection").is(":checked");
            const checkedHasVotedAnswer = $("#hasVotedAnswer").is(":checked");
            const checkedOrderByVotes = $("#orderByVotes").is(":checked");
            const orderBy =  $('#orderBy').val();
            console.log(orderBy);
            console.log(checkedHasAnswer);

       });
    });
})(jQuery);
