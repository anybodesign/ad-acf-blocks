<?php defined('ABSPATH') or die(); 

// cards Block

add_action('acf/init', 'adblocks_cards_block_init');
function adblocks_cards_block_init() {

	if( function_exists('acf_register_block') ) {

		// Picture or Posts cards
		
		acf_register_block(array(
			'name'				=> 	'cards',
			'title'				=> 	__('Cards', 'adblocks'),
			'description'		=> 	__('Create a gallery of cards with or without thumbnails.', 'adblocks'),
			'category'			=> 	'ad-blocks',
			'icon'				=> 	'<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><circle cx="12" cy="4" r="4" style="fill:#555d66;"/><path d="M4,2l-1.2,0c-0.442,0 -0.8,0.359 -0.8,0.8l0,18.4c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-18.4c0,-0.441 -0.358,-0.8 -0.8,-0.8l-1.2,0l0,-2l2.08,0c1.06,0 1.92,0.86 1.92,1.92l0,20.16c0,1.06 -0.86,1.92 -1.92,1.92l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-20.16c0,-1.06 0.86,-1.92 1.92,-1.92l2.08,0l0,2Zm12,18l-8,0l0,-2l8,0l0,2Zm4,-4l-16,0l0,-2l16,0l0,2Zm-2,-4l-12,0l0,-2l12,0l0,2Z" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> 	array( 'cartes', 'cards', 'blocs', 'blocks' ),
            'render_template'   =>	ADBLOCKS__PLUGIN_PATH . 'blocks/block-cards/templates/block-cards-template.php',
            'enqueue_assets'	=>	function() {
										wp_enqueue_style( 'block-cards', ADBLOCKS__PLUGIN_URL . 'blocks/block-cards/css/block-cards.css' );
									},
			'example' 			=> array(
									'attributes'		=> array(
										'mode'			=> 'preview',
										'data'			=> array(
											'__is_preview'	=> true,
										),
									)
			),
									
		));
				
	}	
}


// Load ACF fields (PHP)

require_once( ADBLOCKS__PLUGIN_PATH . 'global-fields/columns-fields.php' );
require_once( ADBLOCKS__PLUGIN_PATH . 'blocks/block-cards/block-cards-fields.php' );
require_once( ADBLOCKS__PLUGIN_PATH . 'global-fields/background-fields.php' );