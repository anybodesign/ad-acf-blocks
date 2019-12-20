<?php defined('ABSPATH') or die(); 

// Text Block

add_action('acf/init', 'text_block_init');
function text_block_init() {

	if( function_exists('acf_register_block') ) {

		// Rich Text
		
		acf_register_block(array(
			'name'				=> 	'text',
			'title'				=> 	__('Rich Text', 'adblocks'),
			'description'		=> 	__('Rich text block with some background andd layout options.', 'adblocks'),
			'category'			=> 	'ad-blocks',
			'icon'				=> 	'<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M22.08,24l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-20.16c0,-1.06 0.86,-1.92 1.92,-1.92l20.16,0c1.06,0 1.92,0.86 1.92,1.92l0,2.08l-2,0l0,-1.2c0,-0.441 -0.358,-0.8 -0.8,-0.8l-18.4,0c-0.442,0 -0.8,0.359 -0.8,0.8l0,18.4c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-1.2l2,0l0,2.08c0,1.06 -0.86,1.92 -1.92,1.92Z" style="fill:#555d66;"/><path d="M20,19l-2,0l0,-2l2,0l0,2Zm-4,0l-12,0l0,-2l12,0l0,2Zm-6,-4l-6,0l0,-2l6,0l0,2Zm14,0l-12,0l0,-2l12,0l0,2Zm0,-4.143l-8,0l0,-1.857l8,0l0,1.857Zm-10,0l-10,0l0,-1.857l10,0l0,1.857Zm6,-3.857l-16,0l0,-2l16,0l0,2Z" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> 	array( 'text', 'texte' ),
            'render_template'   =>	ADBLOCKS__PLUGIN_PATH . '/blocks/block-text/templates/block-text-template.php',
            'enqueue_assets'	=>	function() {
										wp_enqueue_style( 'block-text', ADBLOCKS__PLUGIN_URL . '/blocks/block-text/css/block-text.css' );
										//wp_enqueue_script( 'block-text', ADBLOCKS__PLUGIN_URL . '/blocks/block-text/js/block-text.js', array('jquery'), '', true );
									},
		));
	}	
}


// Load ACF fields (PHP)

require_once( ADBLOCKS__PLUGIN_PATH . '/blocks/block-text/block-text-fields.php' );

