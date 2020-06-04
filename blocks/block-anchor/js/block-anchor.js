(function($) {

	var initializeBlock = function( $block ) {

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



// Vanilla JavaScript Scroll to Anchor
// @ https://perishablepress.com/vanilla-javascript-scroll-anchor/

/*
document.addEventListener('click', function(e) {
  
	// If it isn't an anchor element, don't even bother...
	if (e.target.tagName !== 'A') return;
	
	if ((e.target.href && e.target.href.indexOf('#') != -1) && ((e.target.pathname == location.pathname) || ('/' + e.target.pathname == location.pathname)) && (e.target.search == location.search)) {
	
		scrollAnchors(e, e.target);
	
	}
  
});
			
function scrollAnchors(e, respond = null) {
	// const distanceToTop = el => Math.floor(el.getBoundingClientRect().top);

	function distanceToTop(el) { 
		return Math.floor(el.getBoundingClientRect().top); 
	}
	
	e.preventDefault();
	var targetID = (respond) ? respond.getAttribute('href') : this.getAttribute('href');
	var targetAnchor = document.querySelector(targetID);
	var targetOffset = targetAnchor.getAttribute('data-offset');
	var targetSpeed = targetAnchor.getAttribute('data-speed');
	
		if (!targetAnchor) return;
		var originalTop = distanceToTop(targetAnchor);
		window.scrollBy({ top: originalTop - targetOffset, left: 0, behavior: 'smooth' });
		
		var checkIfDone = setInterval(function() {
			var atBottom = window.innerHeight + window.pageYOffset >= document.body.offsetHeight - 2;
			if (distanceToTop(targetAnchor) === 0 || atBottom) {
				targetAnchor.tabIndex = '-1';
				targetAnchor.focus();
	
				// Let's make sure the History API even exists first..
				if ('history' in window) {
					window.history.pushState('', '', targetID);
				} else {
					// Do it the old-fashioned way!
					window.location = targetID;
				}
			
				clearInterval(checkIfDone);
			}
		}, targetSpeed);
}
*/