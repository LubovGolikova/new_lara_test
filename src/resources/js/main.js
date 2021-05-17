(function($) {
    $(document).ready(function() {
        const loginForm = document.getElementById("login-form");
        // const loginButton = document.getElementById("login-form-submit");
        // const loginErrorMsg = document.getElementById("login-error-msg");

        $.get("http://127.0.0.1:8000/api/questions", function(data, status){
            var bodyString = '';
            data.forEach(({ user_id, title, body, votes_questions_count}) => {
                var answer=0;
                let elem = document.createElement('div');

                elem.append(document.getElementById('question-template').content.cloneNode(true));
                elem.querySelector(".user-container").textContent=user_id;
                elem.querySelector("#title").textContent=title;
                // question-summary
                // bodyString += ('<div class="row"><div class="stats-container col-1">' +
                //     '<p>' + votes_questions_count +'</p>'+ '<label>votes</label>' +
                //     '<p>' + a +'</p>'+ '<label>answers</label>'+
                //     '</div>'
                //     + '<div class="summary">'+
                //     // '<div class="question-container col-11">'+'<a href="../view/question.html/'+id+'\"'+'><h2>' + title + '</h2></a>'
                //     '<div class="question-container col-11">'+'<a id="questionId" href="../view/question.html"><h2>' + title + '</h2></a>'
                //     +'<p>' + body + '</p>' + '</div>' + '<div class="user-container">'+ user_id +
                //     '</div>'+'</div>'+'</div>'+'<div class="separator"></div>');

                $('.question-summary').append(elem);
            })
        });

        // $.get('https://создание-сайта.net/action.php', {param: my}).done(function(data){
        //     //data - это аргумент, в который передается содержимое полученной страницы
        //     if(data=="ok"){
        //         alert("Ответ успешный")
        //     }
        // });

        //
        // loginButton.addEventListener("click", (e) => {
        //     e.preventDefault();
        //     const username = loginForm.username.value;
        //     const password = loginForm.password.value;
        //
        //     if (username === "user" && password === "web_dev") {
        //         alert("You have successfully logged in.");
        //         location.reload();
        //     } else {
        //         loginErrorMsg.style.opacity = 1;
        //     }
        // })
        // //TODO receive data from form
        // $('body').on('click', '#login-form-submit', function() {
        //
        //     const email = loginForm.email.value;
        //     const password = loginForm.password.value;
        //     // if (email === "1" && password === "1") {
        //     //     alert("You have successfully logged in.");
        //     //     location.reload();
        //     // } else {
        //     //     loginErrorMsg.style.opacity = 1;
        //     // }
        //     // response.headers['Content-Security-Policy']=""
        //       $.post("http://127.0.0.1:8000/api/auth/login",
        //         {
        //                email: email ,
        //                password: password
        //         },
        //          function(data, status){
        //              // var content = $( data ).find( '#content' );
        //              // $( "#result" ).empty().append( content );
        //
        //              alert("Data: " + data + "\nStatus: " + status);
        //     });
        // });

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
