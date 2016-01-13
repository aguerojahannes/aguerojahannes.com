jQuery(document).ready(function( $ ){

	// Featured image fullscreen mode
	$('.image-fullscreen').on("click", function(){

		var image = $(this).parents().find('#single-featured-image');
		var sm_image = $(this).parents().find('#single-featured-image img.wp-post-image');

		var id = image.attr( "id");
		var elem = document.getElementById(id);

		$(document).on('webkitfullscreenchange mozfullscreenchange fullscreenchange',remove_fs_class_sm);

		function remove_fs_class_sm(){

			if(!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement){
				image.removeClass('fullscreen');
			}
		}

		if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {

			if (document.documentElement.requestFullscreen) {
				fullScreenApi.requestFullScreen(elem);
				image.addClass('fullscreen');
			} else if (document.documentElement.mozRequestFullScreen) {
				fullScreenApi.requestFullScreen(elem);
				image.addClass('fullscreen');
		    } else if (document.documentElement.webkitRequestFullscreen) {
				fullScreenApi.requestFullScreen(elem);
				image.addClass('fullscreen');
			}
		} else {
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			}
		}
	});


	// Flexslider fullscreen mode
	$('.flex-full-screen').each(function() {

		var flexslider = $(this).parents('.flexslider');

		var id = flexslider.attr( "id");

		var elem = document.getElementById(id);

		$(this).on("click", function(){

			var flexslider = $(this).parents('.flexslider');

			$(document).on('webkitfullscreenchange mozfullscreenchange fullscreenchange',remove_fs_class);

			function remove_fs_class(){

				if(!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement){
					flexslider.removeClass('flexslider-fullscreen');
				}
			}

			if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {

				if (document.documentElement.requestFullscreen) {
					fullScreenApi.requestFullScreen(elem);
					flexslider.addClass('flexslider-fullscreen');
				} else if (document.documentElement.mozRequestFullScreen) {
					fullScreenApi.requestFullScreen(elem);
					flexslider.addClass('flexslider-fullscreen');
			    } else if (document.documentElement.webkitRequestFullscreen) {
					fullScreenApi.requestFullScreen(elem);
					flexslider.addClass('flexslider-fullscreen');
				}
			} else {
				if (document.cancelFullScreen) {
					document.cancelFullScreen();
				} else if (document.mozCancelFullScreen) {
					document.mozCancelFullScreen();
				} else if (document.webkitCancelFullScreen) {
					document.webkitCancelFullScreen();
				}
			}
		});
	});

	// in view animation effect
	$('.home article, .archive article, .blog-page article, .action-button, .team-page article').waypoint(function() {
	  $(this).addClass('in-view');
	}, { offset: '100%' });
	

	$(window).load(function(){
		$("#preloader").fadeOut(100);
	});
	
	var i = 1;
	$('.section-count').each(function() {
		$(this).html('N 00'+i);
		i++;
	});

});