jQuery(document).ready(function($){

    // People page
    $(".people-buttons button").click(function() {
        $(".people-buttons button").removeClass("active");
        $(this).addClass("active");
        var selection = $(this).attr("name");
        $("section.people-list").removeClass("active");
        $("#" + selection).addClass("active");
    });
});