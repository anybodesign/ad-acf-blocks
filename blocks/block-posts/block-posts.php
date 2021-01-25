<?php defined('ABSPATH') or die(); 

// Posts Block

add_action('acf/init', 'adblocks_posts_block_init');
function adblocks_posts_block_init() {

	if( function_exists('acf_register_block') ) {
		
		// Posts
		
		acf_register_block(array(
			'name'				=> 	'posts',
			'title'				=> 	__('Posts', 'adblocks'),
			'description'		=> 	__('Insert one or many posts or custom posts.', 'adblocks'),
			'category'			=> 	'ad-blocks',
			'icon'				=> 	'<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M12,0l0,2l-9.2,0c-0.442,0 -0.8,0.359 -0.8,0.8l0,18.4c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-9.2l2,0l0,10.08c0,1.06 -0.86,1.92 -1.92,1.92l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-20.16c0,-1.06 0.86,-1.92 1.92,-1.92l10.08,0Z" style="fill:#555d66;"/><path d="M18.018,9.97l-0.997,0.748c-0.997,0.997 -1.246,2.741 -0.498,3.988l-1.994,1.994l-2.742,-2.742l-3.24,3.24c-0.499,0.498 -3.988,3.24 -4.487,2.742c-0.498,-0.499 2.244,-3.988 2.742,-4.487l3.24,-3.24l-2.742,-2.742l1.994,-1.994c1.247,0.748 2.991,0.748 3.988,-0.498l0.748,-0.748c1.246,-1.246 1.246,-2.991 0.499,-4.237l1.994,-1.994l7.477,7.228l-1.994,1.994c-1.191,-0.476 -2.837,-0.497 -3.988,0.748Z" style="fill:#555d66;"/></g></svg>',
			'mode'				=> 	'auto',
			'supports'			=> 	array( 'align' => array( 'wide', 'full' ), 'mode' => false),
			'keywords'			=>	array( 'post', 'publication' ),
			'render_template'   =>	ADBLOCKS__PLUGIN_PATH . 'blocks/block-posts/templates/block-posts-template.php',
			'enqueue_assets'	=>	function() {
										wp_enqueue_style( 'block-posts', ADBLOCKS__PLUGIN_URL . 'blocks/block-posts/css/block-posts.css' );
									},
			'enqueue_assets'	=> function() {
										wp_enqueue_style( 'block-posts', ADBLOCKS__PLUGIN_URL . 'blocks/block-posts/css/block-posts.css' );
										wp_enqueue_style( 'slick-css', ADBLOCKS__PLUGIN_URL . 'assets/css/slick.css' );
										wp_enqueue_script( 'slick', ADBLOCKS__PLUGIN_URL . 'assets/js/slick.min.js', array('jquery'), '', true );
										//wp_enqueue_script( 'slick-init', ADBLOCKS__PLUGIN_URL . 'assets/js/slick-init.js', array('slick'), '', true );
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
require_once( ADBLOCKS__PLUGIN_PATH . 'blocks/block-posts/block-posts-fields.php' );
require_once( ADBLOCKS__PLUGIN_PATH . 'global-fields/custom-sizes.php' );
require_once( ADBLOCKS__PLUGIN_PATH . 'global-fields/background-fields.php' );