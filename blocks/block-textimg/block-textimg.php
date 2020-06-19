<?php defined('ABSPATH') or die(); 

// Text Image Block

add_action('acf/init', 'adblocks_textimg_block_init');
function adblocks_textimg_block_init() {

	if( function_exists('acf_register_block') ) {

		// Text & Image
		
		acf_register_block(array(
			'name'				=> 	'textimg',
			'title'				=> 	__('Text and Image', 'adblocks'),
			'description'		=> 	__('Text and picture block with reverse order option.', 'adblocks'),
			'category'			=> 	'ad-blocks',
			'icon'				=> 	'<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M22.08,24l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-20.16c0,-1.06 0.86,-1.92 1.92,-1.92l20.16,0c1.06,0 1.92,0.86 1.92,1.92l0,2.08l-2,0l0,-1.2c0,-0.441 -0.358,-0.8 -0.8,-0.8l-18.4,0c-0.442,0 -0.8,0.359 -0.8,0.8l0,18.4c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-1.2l2,0l0,2.08c0,1.06 -0.86,1.92 -1.92,1.92Z" style="fill:#555d66;"/><path d="M24,17l-10,0l0,-2l10,0l0,2Zm-12,0l-8,0l0,-10l8,0l0,10Zm10,-4l-8,0l0,-2l8,0l0,2Zm2,-4.143l-10,0l0,-1.857l10,0l0,1.857Z" style="fill:#555d66;"/></g></svg>',
			'mode'				=> 	'auto',
			'supports'			=> 	array( 'align' => array( 'wide', 'full' ), 'mode' => false),
			'keywords'			=> 	array( 'text', 'texte', 'image' ),
			'render_template'   =>	ADBLOCKS__PLUGIN_PATH . 'blocks/block-textimg/templates/block-textimg-template.php',
			'enqueue_assets'	=>	function() {
										wp_enqueue_style( 'block-textimg', ADBLOCKS__PLUGIN_URL . 'blocks/block-textimg/css/block-textimg.css' );
										wp_enqueue_style( 'fancybox', ADBLOCKS__PLUGIN_URL . 'assets/css/jquery.fancybox.min.css' );
										wp_enqueue_script( 'fancybox', ADBLOCKS__PLUGIN_URL . 'assets/js/jquery.fancybox.min.js', array('jquery'), '', true );
										wp_enqueue_script( 'fancybox-init', ADBLOCKS__PLUGIN_URL . 'assets/js/fancybox-init.js', array('fancybox'), '', true );
									},
			'example' 			=> array(
									'attributes'		=> array(
										'mode'			=> 'preview',
										'data'			=> array(
											'text'			=> __('<h4>Cupcake ipsum</h4><p>Chupa chups jelly toffee lollipop cotton candy chocolate apple pie.</p>'),
											'__is_preview'	=> true,
										),
									)
			),

		));
	}	
}


// Load ACF fields (PHP)

require_once( ADBLOCKS__PLUGIN_PATH . 'blocks/block-textimg/block-textimg-fields.php' );
require_once( ADBLOCKS__PLUGIN_PATH . 'global-fields/background-fields.php' );