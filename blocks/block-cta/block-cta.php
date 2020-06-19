<?php defined('ABSPATH') or die(); 

// CTA Block

add_action('acf/init', 'adblocks_cta_block_init');
function adblocks_cta_block_init() {

	if( function_exists('acf_register_block') ) {

		// CTA
		
		acf_register_block(array(
			'name'				=> 	'cta',
			'title'				=> 	__('CTA', 'adblocks'),
			'description'		=> 	__('Call to action block, with background color or background picture.', 'adblocks'),
			'category'			=> 	'ad-blocks',
			'icon'				=> 	'<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M24.071,20l0,2.08c0,1.06 -0.86,1.92 -1.92,1.92l-20.16,0c-1.059,0 -1.92,-0.86 -1.92,-1.92l0,-2.08l2,0l0,1.2c0,0.442 0.359,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-1.2l2,0Zm-24,-16l0,-2.08c0,-1.06 0.86,-1.92 1.92,-1.92l20.16,0c1.06,0 1.92,0.86 1.92,1.92l0,2.08l-2,0l0,-1.2c0,-0.441 -0.358,-0.8 -0.8,-0.8l-18.4,0c-0.442,0 -0.8,0.359 -0.8,0.8l0,1.2l-2,0Z" style="fill:#555d66;"/><path d="M23.973,16c0,1.105 -0.896,2 -2,2c-4.516,0 -15.458,0 -19.973,0c-1.105,0 -2,-0.895 -2,-2c0,-2.22 0,-5.78 0,-8c0,-1.105 0.895,-2 2,-2c4.515,0 15.457,0 19.973,0c1.104,0 2,0.895 2,2c0,2.22 0,5.78 0,8Zm-7.977,-1.022l0,-2l-8.02,0l0,2l8.02,0Zm3.963,-3.956l0,-2l-15.945,0l0,2l15.945,0Z" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> 	array( 'cta', 'call to action' ),
            'render_template'   =>	ADBLOCKS__PLUGIN_PATH . 'blocks/block-cta/templates/block-cta-template.php',
            'enqueue_assets'	=>	function() {
										wp_enqueue_style( 'block-cta', ADBLOCKS__PLUGIN_URL . 'blocks/block-cta/css/block-cta.css' );
									},
			'example' 			=> array(
									'attributes'		=> array(
										'mode'			=> 'preview',
										'data'			=> array(
											'text'			=> __('<h4>Cupcake ipsum</h4><p>Chupa chups jelly toffee lollipop cotton candy chocolate apple pie, gingerbread caramels I love soufflé I love.</p>'),
											'bg_color'		=> '#efefef',
										),
									)
			),
									
		));
	}	
}


// Load ACF fields (PHP)

require_once( ADBLOCKS__PLUGIN_PATH . 'blocks/block-cta/block-cta-fields.php' );
require_once( ADBLOCKS__PLUGIN_PATH . 'global-fields/background-fields.php' );