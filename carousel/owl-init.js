jQuery(document).ready(function($){

  var owl = $("#featured-slider");

  owl.owlCarousel({
  	margin: 24,
    nav: true,
    navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
  	responsive: {
  	    0: {
  	        items: 1
  	    },
        850: {
            items: 2
        },
  	    1200: {
  	    	items: 3
  	    }
  	},
    onInitialized: removeloader
  });
  function removeloader(event) {
    $("#slider-loader").fadeOut('slow');
  }
});