<?php defined('ABSPATH') or die(); 

// Testimonial Block

add_action('acf/init', 'adblocks_testimonial_block_init');
function adblocks_testimonial_block_init() {

	if( function_exists('acf_register_block') ) {

		// Text & Image
		
		acf_register_block(array(
			'name'				=> 	'testimonial',
			'title'				=> 	__('Testimonial', 'adblocks'),
			'description'		=> 	__('Testimonial with author name and description.', 'adblocks'),
			'category'			=> 	'ad-blocks',
			'icon'				=> 	'<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M20,0l2.08,0c1.06,0 1.92,0.86 1.92,1.92l0,20.16c0,1.06 -0.86,1.92 -1.92,1.92l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-4.08l2,0l0,3.2c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-18.4c0,-0.441 -0.358,-0.8 -0.8,-0.8l-1.2,0l0,-2Z" style="fill:#555d66;"/><path d="M6,16l-5,0c-0.265,0 -0.52,-0.105 -0.707,-0.293c-0.188,-0.187 -0.293,-0.442 -0.293,-0.707c0,-2.873 0,-11.127 0,-14c0,-0.265 0.105,-0.52 0.293,-0.707c0.187,-0.188 0.442,-0.293 0.707,-0.293c3.151,0 12.849,0 16,0c0.265,0 0.52,0.105 0.707,0.293c0.188,0.187 0.293,0.442 0.293,0.707c0,2.873 0,11.127 0,14c0,0.265 -0.105,0.52 -0.293,0.707c-0.187,0.188 -0.442,0.293 -0.707,0.293l-7,0l0,4l-4,-4l0,0Zm-1.204,-7.616c0.724,-0.074 1.322,-0.336 1.795,-0.787c0.473,-0.45 0.709,-0.972 0.709,-1.564c0,-0.63 -0.233,-1.161 -0.699,-1.593c-0.466,-0.432 -1.04,-0.648 -1.721,-0.648c-0.779,0 -1.454,0.281 -2.024,0.843c-0.571,0.561 -0.856,1.243 -0.856,2.046c0,2.407 1.509,4.289 4.528,5.647l0.814,-1.333c-1.697,-0.741 -2.546,-1.611 -2.546,-2.611Zm7.637,0c0.738,-0.074 1.343,-0.336 1.816,-0.787c0.473,-0.45 0.709,-0.972 0.709,-1.564c0,-0.63 -0.233,-1.161 -0.699,-1.593c-0.466,-0.432 -1.047,-0.648 -1.742,-0.648c-0.779,0 -1.45,0.281 -2.014,0.843c-0.563,0.561 -0.845,1.243 -0.845,2.046c0,2.407 1.509,4.289 4.528,5.647l0.814,-1.333c-1.711,-0.741 -2.567,-1.611 -2.567,-2.611Z" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> 	array( 'text', 'texte', 'image' ),
            'render_template'   =>	ADBLOCKS__PLUGIN_PATH . '/blocks/block-testimonial/templates/block-testimonial-template.php',
            'enqueue_assets'	=>	function() {
										wp_enqueue_style( 'block-testimonial', ADBLOCKS__PLUGIN_URL . '/blocks/block-testimonial/css/block-testimonial.css' );
										//wp_enqueue_script( 'block-testimonial', ADBLOCKS__PLUGIN_URL . '/blocks/block-testimonial/js/block-testimonial.js', array('jquery'), '', true );
									},
		));
	}	
}


// Load ACF fields (PHP)

require_once( ADBLOCKS__PLUGIN_PATH . '/blocks/block-testimonial/block-testimonial-fields.php' );
require_once( ADBLOCKS__PLUGIN_PATH . '/global-fields/background-fields.php' );