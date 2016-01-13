jQuery(document).ready(function( $ ){

	$('#home-slider .flexslider').flexslider({
        controlNav: true,
		directionNav: false,
        slideshow: false,
		prevText: "",
		nextText: "",
		smoothHeight: false,
		start: function(){
			$('.flex-caption .home-slide-title').animate({
				opacity: 1,
				left: "0"
			});
			$('.flex-caption .slider-caption').stop().delay(400).animate({
				opacity: 1,
				right: "0"
			});
			$('.flex-caption').stop().stop().animate({
				opacity: 1,
			}, 100 );
			$('.slide-button').stop().stop().animate({
				opacity: 1,
			}, 100 );
		},
		after: function(){
			$('.flex-caption .home-slide-title').animate({
				opacity: 1,
				left: "0"
			});
			$('.flex-caption .slider-caption').stop().delay(400).animate({
				opacity: 1,
				right: "0"
			});
			$('.flex-caption').stop().stop().animate({
				opacity: 1,
			}, 100 );
			$('.slide-button').stop().delay(800).animate({
				opacity: 1,
			}, 600 );
		},
		before: function(){
			$('.flex-caption').stop().animate({
				opacity: 0
			}, 100 );
			$('.flex-caption .home-slide-title').stop().animate({
				opacity: 0,
				left: "-=50"
			}, 100 );
			$('.flex-caption .slider-caption').stop().animate({
				opacity: 0,
				right: "-=50"
			}, 100 );
			$('.slide-button').stop().stop().animate({
				opacity: 0,
			}, 100 );
		},
	});

	// Remove stuck class on window load
	jQuery(".menu-wrap").removeClass(".stuck");

	//check for touch device
	if(('ontouchstart' in window)){
		$('body').addClass('touch-screen');
	} else {
		$('body').addClass('non-touch-screen');
	}

});

function sliderHeight() {
		wh = jQuery(window).height();

	 	mainmenuHeight = jQuery('#menu-wrap').outerHeight();
		homeSlider = jQuery('#home-slider .slides .slide').outerHeight();
		adminBar = jQuery('#wpadminbar').outerHeight();
		height = wh - mainmenuHeight;
		adminMargin = height - adminBar;
		homeSliderAdmin = homeSlider - adminBar;

		if ( homeSlider < wh ) {
			jQuery('#home-slider-wrap, #home-slider .home-slider, #home-slider .home-slider li').css({height: homeSlider});
			jQuery('body.home').css({marginTop: homeSliderAdmin});
		} else {
			jQuery('#home-slider-wrap, #home-slider .home-slider, #home-slider .home-slider li').css({height: height});
			jQuery('body.home').css({marginTop: adminMargin});
		}
	}

// Parallax slideshow
function parallax_bg(){
	var scrolled = jQuery(window).scrollTop();
	jQuery('#home-slider .flexslider').css('top', -(scrolled * 0.2) + 'px');
	jQuery('#home-slider .home-slide-title').css('top', -(scrolled * 0.4) + 'px');
	jQuery('#home-slider .slider-caption').css('top', -(scrolled * 0.5) + 'px');
	jQuery('#home-slider h3.slide-button').css('top', -(scrolled * 0.6) + 'px');
	jQuery('#home-slider .flex-control-nav').css('bottom', (scrolled * 0.8) + 'px');

}

parallax_bg();

function scroll_distance() {
	var scrollTop     = jQuery(window).scrollTop(),
	    elementOffset = jQuery('#masthead-wrap').offset().top,
	    distance = (elementOffset - scrollTop);
	jQuery('#home-slider, #home-slider-wrap').height(distance + 'px');
}

jQuery(window).scroll(function(e){
	if( ! ('ontouchstart' in window)){
		parallax_bg();
		scroll_distance();
	}
});

jQuery(window).load(function() {
	sliderHeight();
	if( ! ('ontouchstart' in window)){
		scroll_distance();

		// sticky navigation menu
		jQuery('#menu-wrap').waypoint('sticky', {
		  offset: 1 // Apply "stuck" when element 30px from top
		});
	}

});

jQuery(window).bind('resize',function () {
	//Update slideshow height
	sliderHeight();
});
