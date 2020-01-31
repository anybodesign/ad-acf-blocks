<?php defined('ABSPATH') or die(); 

// Gallery Block

add_action('acf/init', 'adblocks_gallery_block_init');
function adblocks_gallery_block_init() {

	if( function_exists('acf_register_block') ) {

		// Picture or Posts Gallery
		
		acf_register_block(array(
			'name'				=> 	'gallery',
			'title'				=> 	__('Gallery', 'adblocks'),
			'description'		=> 	__('Create a picture gallery or a thumbnailed gallery of pages and/or posts.', 'adblocks'),
			'category'			=> 	'ad-blocks',
			'icon'				=> 	'<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M6,24l-4.08,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-4.08l2,0l0,3.2c0,0.442 0.358,0.8 0.8,0.8l3.2,0l0,2Zm16,-18l0,-3.2c0,-0.441 -0.358,-0.8 -0.8,-0.8l-3.2,0l0,-2l4.08,0c1.06,0 1.92,0.86 1.92,1.92l0,4.08l-2,0Z" style="fill:#555d66;"/><path d="M24,22c0,1.105 -0.895,2 -2,2l-12,0c-1.105,0 -2,-0.895 -2,-2l0,-12c0,-1.105 0.895,-2 2,-2l12,0c1.105,0 2,0.895 2,2l0,12Zm-2.019,0l0.019,-10l-12,10l11.981,0Zm-15.981,-2l0,0c-1.105,0 -2,-0.895 -2,-2l0,-12c0,-1.105 0.895,-2 2,-2l12,0c1.105,0 2,0.895 2,2l0,0l-12,0c-1.105,0 -2,0.895 -2,2l0,12Zm7,-10c1.656,0 3,1.359 3,3.033c0,1.674 -1.344,3.032 -3,3.032c-1.656,0 -3,-1.358 -3,-3.032c0,-1.674 1.344,-3.033 3,-3.033Zm-11,6l0,0c-1.105,0 -2,-0.895 -2,-2l0,-12c0,-1.105 0.895,-2 2,-2l12,0c1.105,0 2,0.895 2,2l0,0l-12,0c-1.105,0 -2,0.895 -2,2l0,12Z" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> 	array( 'photo', 'gallery', 'galerie', 'content', 'contenu' ),
            'render_template'   =>	ADBLOCKS__PLUGIN_PATH . '/blocks/block-gallery/templates/block-gallery-template.php',
            'enqueue_assets'	=>	function() {
										wp_enqueue_style( 'block-gallery', ADBLOCKS__PLUGIN_URL . '/blocks/block-gallery/css/block-gallery.css' );
										wp_enqueue_style( 'fancybox', ADBLOCKS__PLUGIN_URL . '/blocks/block-gallery/css/jquery.fancybox.min.css' );
										wp_enqueue_script( 'fancybox', ADBLOCKS__PLUGIN_URL . '/blocks/block-gallery/js/jquery.fancybox.min.js', array('jquery'), '', true );
										wp_enqueue_script( 'fancybox-init', ADBLOCKS__PLUGIN_URL . '/blocks/block-gallery/js/fancybox-init.js', array('fancybox'), '', true );
									},
		));
				
	}	
}


// Load ACF fields (PHP)

require_once( ADBLOCKS__PLUGIN_PATH . '/blocks/block-gallery/block-gallery-fields.php' );

