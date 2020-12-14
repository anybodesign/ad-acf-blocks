<?php defined('ABSPATH') or die(); 

// Text Block

add_action('acf/init', 'adblocks_pagebanner_block_init');
function adblocks_pagebanner_block_init() {

	if( function_exists('acf_register_block') ) {

		// pagebanner
		
		acf_register_block(array(
			'name'				=> 	'pagebanner',
			'title'				=> 	__('Page Banner', 'adblocks'),
			'description'		=> 	__('Add a page banner at the beginning of your page.', 'adblocks'),
			'category'			=> 	'ad-blocks',
			'icon'				=> 	'<svg width="100%" height="100%" viewBox="0 0 25 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M2,20l0,1.2c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l-0,-1.2l2,0l-0,2.08c-0,1.06 -0.86,1.92 -1.92,1.92l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l-0,-2.08l2,0Zm-2,-16l-0,-2.08c-0,-1.06 0.86,-1.92 1.92,-1.92l20.16,0c1.06,0 1.92,0.86 1.92,1.92l-0,2.08l-2,-0l-0,-1.2c-0,-0.441 -0.358,-0.8 -0.8,-0.8l-18.4,0c-0.442,0 -0.8,0.359 -0.8,0.8l-0,1.2l-2,0Z" style="fill:#555d66;"/><path d="M24.001,18l-24.001,-0l0,-12l24.001,-0l-0,12Zm-13,-5.001l-0,-4.999l2,-0l-0,5l1.828,-1.829l1.415,1.415l-4.243,4.242l-4.243,-4.242l1.415,-1.415l1.828,1.828Z" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false, 'multiple' => false ),
            'keywords'			=> array( 'banner', 'bannière' ),
            'render_template'   => ADBLOCKS__PLUGIN_PATH . 'blocks/block-pagebanner/templates/block-pagebanner-template.php',
            'enqueue_assets'	=> 'ad_pagebanner_assets',
			'example' 			=> array(
									'attributes'		=> array(
										'mode'			=> 'preview',
										'data'			=> array(
											'id'			=> 'pagebanner',
											'__is_preview'	=> true,
										),
									)
			),
            
		));
	}	
}

// Load assets
	
function ad_pagebanner_assets() {

	wp_register_style( 
		'block-pagebanner', 
		ADBLOCKS__PLUGIN_URL . 'blocks/block-pagebanner/css/block-pagebanner.css', 
		array(), 
		null, 
		'screen'
	);
	wp_register_style( 
		'splide-css', 
		ADBLOCKS__PLUGIN_URL . 'blocks/block-pagebanner/css/splide.min.css', 
		array(), 
		null, 
		'screen'
	);
    wp_register_script( 
	    	'block-pagebanner', 
	    	ADBLOCKS__PLUGIN_URL . 'blocks/block-pagebanner/js/block-pagebanner.js',
	    	array('jquery'), 
	    	null, 
	    	true
    );
	wp_register_script( 
	    	'splide', 
	    	ADBLOCKS__PLUGIN_URL . 'blocks/block-pagebanner/js/splide.min.js',
	    	array(), 
	    	null, 
	    	true
    );
	wp_register_script( 
	    	'splide-init', 
	    	ADBLOCKS__PLUGIN_URL . 'blocks/block-pagebanner/js/splide-init.js',
	    	array('splide'), 
	    	null, 
	    	true
    );

	wp_enqueue_style( 'block-pagebanner' );
	wp_enqueue_style( 'splide-css' );
	wp_enqueue_script( 'block-pagebanner' );
	wp_enqueue_script( 'splide' );
	wp_enqueue_script( 'splide-init' );		    
}

// Load ACF fields (PHP)

require_once( ADBLOCKS__PLUGIN_PATH . 'blocks/block-pagebanner/block-pagebanner-fields.php' );

