<?php defined('ABSPATH') or die(); 

// Text Block

add_action('acf/init', 'adblocks_files_block_init');
function adblocks_files_block_init() {

	if( function_exists('acf_register_block') ) {

		// Anchor
		
		acf_register_block(array(
			'name'				=> 	'files',
			'title'				=> 	__('File list', 'adblocks'),
			'description'		=> 	__('Add an downloadable file list.', 'adblocks'),
			'category'			=> 	'ad-blocks',
			'icon'				=> 	'<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><g fill="#555d66"><path d="M24 14h-2V2.8c0-.4-.4-.8-.8-.8H2.8c-.4 0-.8.4-.8.8v18.4c0 .4.4.8.8.8H14v2H2c-1.1 0-2-.9-2-2V2C0 .8.9 0 2 0h20c1.1 0 2 .9 2 2v12z"/><path d="M4 14h2v2H4zM8 14h4v2H8zM8 10h4v2H8zM4 6h2v2H4zM4 10.1h2v2H4zM8 6h10v2H8zM14 10.1l2.2 11.6 2.3-2.3 2.2 4.6 2.2-1.4-2.6-4H24l-10-8.5z"/></g>svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> 	array( 'files', 'fichiers' ),
            'render_template'   =>	ADBLOCKS__PLUGIN_PATH . 'blocks/block-files/templates/block-files-template.php',
            'enqueue_assets'	=>	'ad_files_assets',
			'example' 			=> array(
									'attributes'		=> array(
										'mode'			=> 'preview',
										'data'			=> array(
											'id'			=> 'files',
											'__is_preview'	=> true,
										),
									)
			),
            
		));
	}	
}

// Load assets
	
function ad_files_assets() {

	wp_register_style( 
		'block-files', 
		ADBLOCKS__PLUGIN_URL . 'blocks/block-files/css/block-files.css', 
		array(), 
		null, 
		'screen'
	);

	wp_enqueue_style( 'block-files' );		    
}

// Load ACF fields (PHP)

require_once( ADBLOCKS__PLUGIN_PATH . 'blocks/block-files/block-files-fields.php' );

