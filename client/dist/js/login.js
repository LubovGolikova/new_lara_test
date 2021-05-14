(function($) {
    $(document).ready(function() {
        const loginForm = document.getElementById("login-form");

        // //TODO receive data from form
        $('body').on('click', '#login-form-submit', function() {

            const email = loginForm.email.value;
            const password = loginForm.password.value;
            // if (email === "1" && password === "1") {
            //     alert("You have successfully logged in.");
            //     location.reload();
            // } else {
            //     loginErrorMsg.style.opacity = 1;
            // }
            // response.headers['Content-Security-Policy']=""
            $.post("http://127.0.0.1:8000/api/auth/login",
                {
                    email: email ,
                    password: password
                },
                function(data, status){
                    $( "#result" ).empty().append( data );
                    alert("Data: " + data + "\nStatus: " + status);
                });
        });

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

        // $('body').on('click', '#filter', function () {
        //    alert("!!!!");
        // });
    });
})(jQuery);