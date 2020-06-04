(function($) {

	var initializeBlock = function() {

		function scrollToAnchor(anchorID){
			var target = $(anchorID);
			var targetOffset = target.attr('data-offset');
			var targetSpeed = target.attr('data-speed');
	
			$('html,body').animate({scrollTop: target.offset().top - targetOffset}, targetSpeed);
		}
	
		$('a[href^="#"]').not('a[href="#"]').on('click', function() {
			var targetID = $(this).attr('href');
			scrollToAnchor( targetID );
			
			return false;
		});	
	}

    // Initialize each block on page load (front end).
    $(document).ready(function() {
      initializeBlock();
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview', initializeBlock );
    }

})(jQuery);