(function($) {
    $(document).ready(function() {
        $.get("http://127.0.0.1:8000/api/questions", function(data, status){
            var bodyString = '';
            var source   = document.getElementById('questionListTemplate').innerHTML;
            var template = Handlebars.compile(source);
            document.getElementById('question-summary').innerHTML = template(data);
        });

        $('body').on('click', '#btnFilter', function () {
            $(this).height("300");
        });

        //TODO receive data from form
        $('body').on('click', '#btnAskQuestion', function() {
            $.post("http://127.0.0.1:8000/api/questions/create",
                {

                },
                function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
            });
        });

        //TODO добавить путь к файлу header
        Handlebars.registerPartial('header', fs.readFileSync(__dirname + 'view/partials/header.html').toString());
        // Handlebars.registerPartial('Footer', 'FOOTER!');
        var template1 = Handlebars.compile(document.getElementById('template1').innerHTML);
        document.getElementById('output1').innerHTML = template1({});

    });
})(jQuery);

