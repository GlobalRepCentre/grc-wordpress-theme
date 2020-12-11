// Controls tabs on the people page

jQuery(document).ready(function($){

  // Set initial active panel
  if (window.location.hash) {
    var s = window.location.hash.substring(1);
    if (s === 'contributors' || s === 'advisory-board' || s === 'journalism-advisors') {
      // close staff panel (open by default)
      var $activeTab = $('.active[role="tab"]');
      var $activePanel = $('section#' + $activeTab.attr('aria-controls'));
      $activeTab.add($activePanel).removeClass('active');

      var $panel = $('section#' + s);
      var $tab = $('button#' + $panel.attr('aria-labelledby'));
      $tab.add($panel).addClass('active');
      $panel.focus();
    }
  }

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