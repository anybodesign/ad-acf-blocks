jQuery(document).ready(function($) {
	
	$('[data-fancybox]').fancybox({
		buttons : [
			'close'
		],
		beforeShow: function(){
			$("body").css({'overflow-y':'hidden'});
		},
		afterClose: function(){
			$("body").css({'overflow-y':'visible'});
		}
	});
	
});