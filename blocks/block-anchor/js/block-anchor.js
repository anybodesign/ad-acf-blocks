(function($) {

	var initializeBlock = function() {
		
		$('a[href^="#"]').not('a[href="#"]').on('click', function() {
			
			var targetID = $(this).attr('href');
			var target = $(targetID);
			var targetOffset = target.attr('data-offset');
			var targetSpeed = target.attr('data-speed');

			console.log('targetID:'+targetID);
			console.log('id:'+target);
			console.log('speed:'+targetSpeed);
			console.log('offset:'+targetOffset);
			
			$('html, body').animate({scrollTop: target.offset().top-targetOffset}, +targetSpeed);
				
			// $('html, body').animate({
			// 	scrollTop: target.offset().top - 500
			// }, 5000);
			
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