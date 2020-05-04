// Controls display of contact forms

jQuery(document).ready(function($){
  $("input[name$='contact-type']").click(function() {
    var selection = $(this).val();
    $("form.wpcf7-form").hide();
    $("#" + selection + "-form").show();
  });
});