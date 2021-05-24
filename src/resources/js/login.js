import ENV from "./config";

(function($) {
    $(document).ready(function() {

        const loginForm = document.getElementById("login-form");
        const loginErrorMsg = document.getElementById("login-error-msg");
        const logout = document.getElementById("logout");

        $('body').on('click', '#login-form-submit', function(e) {
            e.preventDefault();
            const email = loginForm.email.value;
            const password = loginForm.password.value;
            $.post(ENV.apiEndpoint +'/api/auth/login',
                {
                    email: email ,   //qwert@sps.ccx
                    password: password   //111111111
                },
                function(data){
                    // alert( data);
                }, 'json')
                .done(function(data) {
                    let {token} = data;
                    // sessionStorage.clear();
                    localStorage.clear();
                    // console.log(token);
                    // document.cookie = token;
                    // console.log(document.cookie);

                    // $.cookie("token",token, { expires : 365, path: "/", secure: true});
                    // alert($.cookie("token"));
                    //  console.log($.cookie("token"));

                    // sessionStorage.setItem("token", token);
                    localStorage.setItem("token", token);
                    // $("#signin").hide();
                    // $("#signup").hide();
                    // $("#logout").show();
                    // location.reload();
                    // window.location.href = "/";
                    // if (window.location.href ==  "/") {
                    //     $("#signin").hide();
                    //     $("#signup").hide();
                    //     $("#logout").show();
                    // }
                })
                .fail(function(jqxhr, settings, ex){
                        alert('failed:' + ex);
                        loginErrorMsg.style.opacity = 1;
                    }
                );


        });
    });
})(jQuery);
