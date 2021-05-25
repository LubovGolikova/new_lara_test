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
            // const {token} = document.cookie;
            // const token = sessionStorage.getItem("token");
            const token = localStorage.getItem("token");
            console.log(token);
            $.ajax({
                url: ENV.apiEndpoint + '/api/questions/vote',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                method: 'GET',
                dataType: 'json',
                data: {id:idQuestion},
                success: function(data){
                    console.log('success: '+data);
                    console.log("------");
                    console.log(token);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert("Your vote already exist!!!");
                    // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });

            var value = localStorage.totallocal;

            jQuery.post(
                "admin-new-order.php",
                {myKey: value},
                function(data){
                    var value = localStorage.totallocal;
                }).fail(function()
            {
                alert("error");
            });


        });

        $('body').on('click', '#deleteVoteQuestion', function() {
            $('#addVoteQuestion').removeClass("add-vote-top");
            $('#deleteVoteQuestion').addClass("add-vote-bottom");
        });

    });
})(jQuery);
