(function($){

	var initializeBlock = function( $block ) {
        new Splide( '.splide', {
			type	: 'fade',
			rewind	: true,
			speed	: 1000,
			arrows	: false,
			pagination	: false,
			autoplay	: true,
			lazyLoad	: 'nearby',
		} ).mount();
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