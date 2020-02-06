<?php defined('ABSPATH') or die(); 

// Advanced List Block

add_action('acf/init', 'adblocks_advancedlist_block_init');
function adblocks_advancedlist_block_init() {

	if( function_exists('acf_register_block') ) {

		// Text & Image
		
		acf_register_block(array(
			'name'				=> 	'advanced-list',
			'title'				=> 	__('Advanced List', 'adblocks'),
			'description'		=> 	__('Create advanced lists with titles, description, note, price, icon…', 'adblocks'),
			'category'			=> 	'ad-blocks',
			'icon'				=> 	'<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M22.08,24l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-20.16c0,-1.06 0.86,-1.92 1.92,-1.92l20.16,0c1.06,0 1.92,0.86 1.92,1.92l0,2.08l-2,0l0,-1.2c0,-0.441 -0.358,-0.8 -0.8,-0.8l-18.4,0c-0.442,0 -0.8,0.359 -0.8,0.8l0,18.4c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-1.2l2,0l0,2.08c0,1.06 -0.86,1.92 -1.92,1.92Z" style="fill:#555d66;"/><rect x="4" y="13" width="2" height="2" style="fill:#555d66;"/><rect x="4" y="17" width="2" height="2" style="fill:#555d66;"/><rect x="8" y="13" width="12" height="2" style="fill:#555d66;"/><rect x="8" y="17" width="10" height="2" style="fill:#555d66;"/><rect x="4" y="9" width="2" height="2" style="fill:#555d66;"/><rect x="8" y="9" width="16" height="2" style="fill:#555d66;"/><rect x="4" y="5" width="2" height="2" style="fill:#555d66;"/><rect x="8" y="5" width="8" height="2" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> 	array( 'list', 'liste' ),
/*
            'example' 			=>	array(
										'attributes' => array(
											'cover' => ADBLOCKS__PLUGIN_URL . '/assets/fallback.png',
							        	),
									),
*/
            'render_template'   =>	ADBLOCKS__PLUGIN_PATH . '/blocks/block-advanced-list/templates/block-advanced-list-template.php',
            'enqueue_assets'	=>	function() {
										wp_enqueue_style( 'block-advanced-list', ADBLOCKS__PLUGIN_URL . '/blocks/block-advanced-list/css/block-advanced-list.css' );
										//wp_enqueue_script( 'block-advanced-list', ADBLOCKS__PLUGIN_URL . '/blocks/block-advanced-list/js/block-advanced-list.js', array('jquery'), '', true );
									},
		));
	}	
}


// Load ACF fields (PHP)

require_once( ADBLOCKS__PLUGIN_PATH . '/blocks/block-advanced-list/block-advanced-list-fields.php' );
require_once( ADBLOCKS__PLUGIN_PATH . '/global-fields/background-fields.php' );