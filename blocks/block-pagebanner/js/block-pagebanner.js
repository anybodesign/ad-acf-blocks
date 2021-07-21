jQuery(document).ready(function($) {
	
	function scrollDown(anchorID) {
		
		var target = $(anchorID);
		var targetSpeed = 1000;
		
		$('html,body').animate({scrollTop: target.offset().top}, targetSpeed);
	}

	$('.scroll-down').on('click', function() {
		var targetID = '#banner_after';
		scrollDown( targetID );
		
		return false;
	});	 

	var video = document.getElementById("banner_video");
	function stopVideo(){
		video.pause();
		//video.currentTime = 0;
	}
	function playVideo(){
		video.play();
		//video.currentTime = 0;
	}
	$("#banner_stop").on('click', function() {
	    stopVideo();
		$(this).hide();
		$('#banner_play').show();
	});
	$("#banner_play").on('click', function() {
	    playVideo();
		$(this).hide();
		$('#banner_stop').show();
	});
	
	// Slick

	// $('.banner-slideshow').slick({
	// 	speed: 1000,
	// 	autoplay: true,
	// 	infinite: true,
    // 	slidesToShow: 1,
	// 	slidesToScroll: 1,
	// 	fade: true,
	// 	arrows: false,
	// 	dots: false,
	// 	infinite: true,
	// 	draggable: false,
	// 	swipe: false,
	// 	touchMove: false
    // });
	
	$('.slick-slide').removeAttr('tabindex');
	
	$(window).on('load',function() {
		$('.slick-slide').removeAttr('tabindex');
	});
	
	$(window).on('resize',function() {
		if ($(window).width() > 720) {
			$('.slick-slide').removeAttr('tabindex');
		}
	});	
	
});