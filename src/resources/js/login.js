import ENV from "./config";

(function($) {
    $(document).ready(function() {

        const loginForm = document.getElementById("login-form");
        const loginErrorMsg = document.getElementById("login-error-msg");

        $('body').on('click', '#login-form-submit', function(e) {
            e.preventDefault();
            const email = loginForm.email.value;
            const password = loginForm.password.value;
            $.post(ENV.apiEndpoint +'/api/auth/login',
                {
                    email: email ,   //qwert@sps.ccx
                    password: password   //111111111
                },
                function(data, status, xhr){
                    alert("Data: " + data + "\nStatus: " + status +" "+ response.data);
                    console.log(data+"" + response.data + "!!!!!");
                })
                .done(function() {
                    alert('Request done!'+ data.token);
                    location.reload();
                })
                .fail(function(jqxhr, settings, ex){
                        alert('failed,' +jqxhr+" "+settings+" "+ ex);
                        loginErrorMsg.style.opacity = 1;
                    }
                );

        });
    });
})(jQuery);
