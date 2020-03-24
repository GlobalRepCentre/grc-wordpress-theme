jQuery(document).ready(function($){

    // Contact page

    $("input[name$='contact-type']").click(function() {
        // When a selection is made, store value of radio button
        var selection = $(this).val();
        $("form.wpcf7-form").hide();
        // Then load appropriate contact form
        $("#" + selection + "-form").show();
    });
});