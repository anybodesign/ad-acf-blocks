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
			
			if ( $('body').hasClass('admin-bar') ) {
				var $bar = 32;
			} else {
				var $bar = 0;
			}
			$('html, body').animate({scrollTop: target.offset().top-targetOffset-$bar}, +targetSpeed);
				
			// console.log($bar);
			
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