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
		video.currentTime = 0;
	}
	$("#banner_stop").on('click', function() {
	    stopVideo();
	});
	 
	
});