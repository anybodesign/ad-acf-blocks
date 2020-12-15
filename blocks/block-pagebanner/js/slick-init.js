(function($){
	
	
    
	var initializeBlock = function( $block ) {
        $('.slick-slider').slick({
			speed: 1000,
			autoplay: true,
	    	slidesToShow: 1,
			slidesToScroll: 1,
			fade: true,
			arrows: false,
			dots: false,
			infinite: true,
			draggable: false,
			swipe: false,
			touchMove: false
        });
    }
	
	 
	// Huge preview issue, must deactivate
	
    // Initialize each block on page load (front end).
    $(document).ready(function() {
		initializeBlock();
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview', initializeBlock );
    }


	// Tab Index

	$('.slick-slide').removeAttr('tabindex');
	
	
	$(window).on('load',function() {
		$('.slick-slide').removeAttr('tabindex');
	});
	
	$(window).on('resize',function() {
		if ($(window).width() > 720) {
			$('.slick-slide').removeAttr('tabindex');
		}
	});	


	// Play/Pause
	
	// $('.slick-next').on('click',function() {
	// 	$('.slick-slider').slick('slickNext');
	// });
	// $('.slick-prev').on('click',function() {
	// 	$('.slick-slider').slick('slickPrev');
	// });


})(jQuery);