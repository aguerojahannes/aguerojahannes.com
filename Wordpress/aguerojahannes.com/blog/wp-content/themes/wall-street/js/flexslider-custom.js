jQuery(window).load(function() {
	$c = 1;
	jQuery(".flexslider").each(function(){

		// Get control nav
		$nav_menu = jQuery(this).find("ul.flexslider-grid");

		// Add unique control nav class
		new_menu = "flexslider-grid-"+$c;
		$nav_menu.addClass(new_menu);
		new_menu_item = "." + new_menu + " li";

		jQuery(this).flexslider({
	        controlNav: true,
			directionNav: true,
	        slideshow: false,
			manualControls: new_menu_item,
			prevText: "",
			nextText: "",
			smoothHeight: true,
			start: function(slider) {
		       var slide_height = slider.slides.parents('.flexslider').height();
		       jQuery('.flexslider-grid').height(slide_height).mCustomScrollbar("update");
		      },
	      	after: function(slider) {
		       var slide_height = slider.slides.parents('.flexslider').height();
		       jQuery('.flexslider-grid').height(slide_height).mCustomScrollbar("update");
		    }
		});
		$c++;
	});

	jQuery(".flexslider-grid").mCustomScrollbar({
	    scrollInertia:150,
	    advanced:{
	        updateOnContentResize: true
	    }
	});

});