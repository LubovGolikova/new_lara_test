(function($) {
    $(document).ready(function() {
        if( $(document).height() <= $(window).height() ){
            $(".page-footer").addClass("fixed-bottom");
        }
    });
})(jQuery);
