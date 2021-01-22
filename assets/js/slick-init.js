jQuery(document).ready(function($) {

	var $slick_slider;
	var settings;
	
	$slick_slider = $('.slick-slider');
	settings = {
		speed: 1000,
  		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		dots: true,
		infinite: false,
		pauseOnHover: true,
		nextArrow: '<button type="button" class="slick-next slick-arrow" aria-label="Next pannel"> › </button>',
		prevArrow: '<button type="button" class="slick-prev slick-arrow" aria-label="Previous pannel"> ‹ </button>',
		mobileFirst: true,
		responsive: [
		    {
		      breakpoint: 720,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2,
		      }
		    },
		    {
		      breakpoint: 960,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3,
		      }
		    }
		]
	};
	$slick_slider.slick(settings);

	// Tab Index

	$('.slick-slide, .slick-slide a').removeAttr('tabindex');
	
	
	$(window).on('load',function() {
		$('.slick-slide').removeAttr('tabindex');
	});
	
	$(window).on('resize',function() {
		if ($(window).width() > 720) {
			$('.slick-slide').removeAttr('tabindex');
		}
	});	
	
	
	// A11Y Dots
	
	$('.slick-dots li button').prepend("Pannel ");


});