(function($) {
    $(document).ready(function() {
        $('body').on('click', '#btnFilter', function () {
            $(this).height("300");
        });
        // $('body').on('click', '#btnAskQuestion', function() {
        //     $.get("http://127.0.0.1:8000/api/questions", function(data, status){
        //         console.log(data);
        //         alert("Data: " + data + "\nStatus: " + status);
        //         data.forEach(({ id, user_id, title, body, votes_questions_count, }) => {
        //             document.getElementById("divContent").innerHTML = title;
        //         })
        //     });
        // });
        $('#btnAskQuestion').click(alert('!!!!'));
        // $('#btnAskQuestion').append($("<button id='test1'>TEST1</button>"));
    });
})(jQuery);

// $("p").on({
//     mouseenter: function(){
//         $(this).css("background-color", "lightgray");
//     },
//     mouseleave: function(){
//         $(this).css("background-color", "lightblue");
//     },
//     click: function(){
//         $(this).css("background-color", "yellow");
//     }
// });
