<?php defined('ABSPATH') or die(); 

// Text Block

add_action('acf/init', 'adblocks_anchor_block_init');
function adblocks_anchor_block_init() {

	if( function_exists('acf_register_block') ) {

		// Anchor
		
		acf_register_block(array(
			'name'				=> 	'anchor',
			'title'				=> 	__('Anchor', 'adblocks'),
			'description'		=> 	__('Add an anchor anywhere in your post.', 'adblocks'),
			'category'			=> 	'ad-blocks',
			'icon'				=> 	'<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M14,0l8.08,0c1.06,0 1.92,0.86 1.92,1.92l0,20.16c0,1.06 -0.86,1.92 -1.92,1.92l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-2.08l2,0l0,1.2c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-18.4c0,-0.441 -0.358,-0.8 -0.8,-0.8l-7.2,0l0,-2Z" style="fill:#555d66;"/><path d="M8.021,9.743c-2.208,0.739 -4.706,-0.15 -5.914,-2.243c-1.38,-2.39 -0.56,-5.45 1.83,-6.83c2.39,-1.38 5.45,-0.56 6.83,1.83c1.208,2.093 0.729,4.701 -1.014,6.243l4.811,8.334c2.633,-1.992 3.742,-5.397 2.875,-8.516c0,0 -0.499,0.288 -0.499,0.288c-0.338,0.195 -0.759,0.176 -1.078,-0.05c-0.318,-0.225 -0.477,-0.615 -0.405,-0.999c0.173,-0.931 0.369,-1.985 0.515,-2.765c0.053,-0.287 0.23,-0.537 0.483,-0.683c0.253,-0.146 0.557,-0.174 0.833,-0.077c0.748,0.264 1.759,0.621 2.652,0.937c0.368,0.13 0.627,0.462 0.663,0.851c0.035,0.388 -0.158,0.762 -0.496,0.958l-0.891,0.514c1.205,3.602 0.244,7.59 -2.424,10.249l-0.511,2.747c-0.054,0.287 -0.23,0.537 -0.483,0.683c-0.253,0.146 -0.558,0.174 -0.833,0.077l-2.634,-0.931c-3.638,0.981 -7.572,-0.181 -10.089,-3.025l-0.742,0.428c-0.338,0.195 -0.759,0.176 -1.077,-0.049c-0.319,-0.226 -0.478,-0.616 -0.406,-1c0.173,-0.931 0.37,-1.985 0.515,-2.765c0.053,-0.287 0.23,-0.537 0.483,-0.683c0.253,-0.146 0.557,-0.174 0.833,-0.077c0.748,0.264 1.759,0.621 2.652,0.937c0.368,0.13 0.627,0.462 0.663,0.851c0.036,0.389 -0.158,0.763 -0.496,0.958l-0.647,0.374c2.267,2.311 5.77,3.052 8.812,1.768l-4.811,-8.334Zm-3.09,-7.351c1.439,-0.832 3.283,-0.338 4.114,1.102c0.831,1.44 0.337,3.283 -1.102,4.115c-1.44,0.831 -3.284,0.337 -4.115,-1.103c-0.831,-1.44 -0.337,-3.283 1.103,-4.114Z" style="fill:#555d66;"/></svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 'align' => false, 'mode' => false),
            'keywords'			=> 	array( 'anchor', 'ancre' ),
            'render_template'   =>	ADBLOCKS__PLUGIN_PATH . 'blocks/block-anchor/templates/block-anchor-template.php',
            'enqueue_assets'	=>	'ad_anchor_assets',
		));
	}	
}

// Load assets
	
function ad_anchor_assets() {

	wp_register_style( 
		'block-anchor-css', 
		ADBLOCKS__PLUGIN_URL . 'blocks/block-anchor/css/block-anchor.css', 
		array(), 
		null, 
		'screen'
	);
    wp_register_script( 
	    	'block-anchor', 
	    	ADBLOCKS__PLUGIN_URL . 'blocks/block-anchor/js/block-anchor.js',
	    	array('jquery'), 
	    	null, 
	    	true
    );

	wp_enqueue_style( 'block-anchor' );
	wp_enqueue_script( 'block-anchor' );
		    
}

// Load ACF fields (PHP)

require_once( ADBLOCKS__PLUGIN_PATH . 'blocks/block-anchor/block-anchor-fields.php' );

