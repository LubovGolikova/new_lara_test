(function($) {
    $(document).ready(function() {
        if( $(document).height() <= $(window).height() ){
            $(".page-footer").addClass("fixed-bottom");
        }
        const loginForm = document.getElementById("login-form");

        $('body').on('click', '#addVoteQuestion', function() {
            $('#addVoteQuestion').addClass("add-vote-top");
            $('#deleteVoteQuestion').removeClass("add-vote-bottom");
            var idQuestion = document.getElementById("question").value;
             $.get('http://127.0.0.1:8000/api/questions/vote', {id: idQuestion}, function (data) {
                    alert(data);
                    console.log(data);
             });

        });

        $('body').on('click', '#deleteVoteQuestion', function() {
            $('#addVoteQuestion').removeClass("add-vote-top");
            $('#deleteVoteQuestion').addClass("add-vote-bottom");
        });

        $('body').on('click', '#login-form-submit', function(e) {
            e.preventDefault();
            const email = loginForm.email.value;
            const password = loginForm.password.value;
            $.post("http://127.0.0.1:8000/api/auth/login",
                {
                       email: email ,   //qwert@sps.ccx
                       password: password   //111111111
                },
                 function(data, status){
                     alert("Data: " + data + "\nStatus: " + status);
                     console.log(data+"!!!!!");
                     if (status === 'success') {
                         alert("You have successfully logged in.");
                     } else {
                         alert(status);
                            loginErrorMsg.style.opacity = 1;
                        }

            });
        });

    });
})(jQuery);
