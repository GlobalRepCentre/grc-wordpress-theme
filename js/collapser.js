jQuery(document).ready(function($){
    // Vancouver Institute Page

    // Toggle collapsers
    $(".collapser .title").click(function () {
        $title = $(this);
        $title.toggleClass('active');
        $collapser = $(this).closest('.collapser');
        $content = $collapser.find('.content');
        $content.slideToggle(250, function () {
            $title.find($('.plus-minus')).html(function () {
                //change icon based on visibility
                return $content.is(":visible") ? '<i class="fas fa-minus"></i>' : '<i class="fas fa-plus"></i>';
            });
        });
    });

    // Allow collapsers to be opened via spacebar or enter for accessibility
    let collapsers = $(".collapser .title");
    
    Array.from(collapsers).forEach(title => {
        title.addEventListener('keydown', e => {
            if (e.which === 32 || e.which === 13) {
                e.preventDefault();
                title.click();
            };
        });
    });
});