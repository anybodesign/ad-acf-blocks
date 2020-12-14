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
	
	
	// Slideshow
	
	new Splide( '.splide', {
		type	: 'fade',
		rewind	: true,
		speed	: 1000,
		arrows	: false,
		pagination	: false,
		autoplay	: true,
		lazyLoad	: 'nearby',
	} ).mount();
	
});