// Controls tabs on the people page

jQuery(document).ready(function($){

  $('[role="tab"]').click(function() {
    var $activeTab = $('.active[role="tab"]');
    if ($activeTab) {
      var $activePanel = $('section#' + $activeTab.attr('aria-controls'));
      $activeTab.add($activePanel).removeClass('active');
    }
    var $panel = $('section#' + $(this).attr('aria-controls'));
    $(this).add($panel).addClass('active');
    $panel.focus();
  });
});