import ENV from "./config";

(function($) {
    $(document).ready(function() {
        const registerForm = document.getElementById("register-form")

        $('body').on('click', '#register-form-submit', function(e) {
            e.preventDefault();
            let data = new FormData(document.querySelector('#register-form'));
            data.append('files[]', $('#avatar-path').get(0).files[0]);
            $.ajax({
                url: ENV.apiEndpoint + '/api/auth/register',
                method: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: data,
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
