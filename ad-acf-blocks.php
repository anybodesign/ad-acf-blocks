<?php if ( !defined('ABSPATH') ) die();
/**
 * Plugin Name: AD ACF Blocks
 * Description: A collection of blocks made with ACF for the new Editor 
 * Version: 1.0
 * Author: Thomas Villain - Anybodesign
 * Author URI: https://anybodesign.com/
 * Text Domain: adblocks
 * Domain Path: /languages/ 
 */

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


//
// Plugin Basics
//
// ////////////////


// Constants

define( 'ADBLOCKS__PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'ADBLOCKS__PLUGIN_URL', plugin_dir_url( __FILE__ ) );


// i18n

load_plugin_textdomain( 'adblocks', false, basename( dirname( __FILE__ ) ) . '/languages/' );


// Image size

add_image_size( 'thumbnail-hd', 320, 320, true );


// ACF Notice

if( ! class_exists('acf') ) {
	
	register_activation_hook( __FILE__, 'adblocks_admin_notice_activation_hook' );
	
	function adblocks_admin_notice_activation_hook() {
		set_transient( 'adblocks-admin-notice-transient', true, 5 );
	}
	
	function adblocks_admin_notice(){
	
		if ( get_transient( 'adblocks-admin-notice-transient' ) ) {
			?>
			<div class="notice notice-info is-dismissible">
				<p><?php _e( 'Remember, AD ACF Blocks needs ACF Pro 5.8 or greater to be installed and activated!', 'adblocks' ); ?></p>
			</div>
			<?php
			delete_transient( 'adblocks-admin-notice-transient' );
		}
	}
	add_action( 'admin_notices', 'adblocks_admin_notice' );
}


//
// ACF blocks
//
// ////////////////


// Custom Group

add_filter( 'block_categories', 'adblocks_block_categories', 10, 2 );
function fs_block_categories( $categories, $post ) {

    return array_merge(
        $categories,
        array(
            array(
                'slug' 	=> 'ad-blocks',
                'title' => __( 'AD Blocks', 'adblocks' ),
                //'icon'  => 'lightbulb',
            ),
        )
    );
}


// ACF Blocks

add_action('acf/init', 'adblocks_init');
function adblocks_init() {

	if( function_exists('acf_register_block') ) {

		// Rich Text
		
		acf_register_block(array(
			'name'				=> 'text',
			'title'				=> __('Rich Text', 'adblocks'),
			'category'			=> 'fs-blocks',
			'icon'				=> 'text',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => false, 'mode' => false),
            'keywords'			=> array( 'text', 'texte' ),
            'render_template'   => ADBLOCKS__PLUGIN_PATH . 'templates/block-text.php',
            'enqueue_style' 	=> ADBLOCKS__PLUGIN_URL . 'css/block-text.css',
		));
		
		// Text & Image
		
		acf_register_block(array(
			'name'				=> 'textimg',
			'title'				=> __('Text and Image', 'adblocks'),
			'category'			=> 'fs-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><rect x="13.927" y="6.942" width="10.045" height="2" style="fill:#555d66;"/><rect x="13.927" y="14.827" width="7.49" height="2" style="fill:#555d66;"/><rect x="13.927" y="10.885" width="5.005" height="2" style="fill:#555d66;"/><rect x="0.027" y="6.058" width="11.8" height="11.885" style="fill:#555d66;"/><path d="M10.01,15.827l0.012,-5.913l-8.102,5.913l8.09,0Zm-6.086,-7.885c1.105,0 2.003,0.884 2.003,1.972c0,1.088 -0.898,1.971 -2.003,1.971c-1.106,0 -2.004,-0.883 -2.004,-1.971c0,-1.088 0.898,-1.972 2.004,-1.972Z" style="fill:#fff;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'text', 'texte', 'image' ),
            'render_template'   => ADBLOCKS__PLUGIN_PATH . 'templates/block-textimg.php',
            'enqueue_style' 	=> ADBLOCKS__PLUGIN_URL . 'css/block-textimg.css',
		));
		
		// Picture Gallery
		
		acf_register_block(array(
			'name'				=> 'gallery',
			'title'				=> __('Picture gallery', 'adblocks'),
			'category'			=> 'fs-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><rect x="6" y="6" width="12" height="12" style="fill:#555d66;"/><path d="M16.39,16.289l0.011,-5.971l-8.238,5.971l8.227,0Zm-6.428,-8.386c1.125,0 2.038,0.892 2.038,1.99c0,1.099 -0.913,1.991 -2.038,1.991c-1.124,0 -2.037,-0.892 -2.037,-1.991c0,-1.098 0.913,-1.99 2.037,-1.99Z" style="fill:#fff;"/><rect x="20" y="8" width="4" height="8" style="fill:#555d66;"/><rect x="0" y="8" width="4" height="8" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'photo', 'gallery', 'galerie' ),
            'render_template'   => ADBLOCKS__PLUGIN_PATH . 'templates/block-gallery.php',
            'enqueue_style' 	=> ADBLOCKS__PLUGIN_URL . 'css/block-gallery.css',
		));
		
		// Content Gallery
		
		acf_register_block(array(
			'name'				=> 'content',
			'title'				=> __('Content gallery', 'adblocks'),
			'description'		=> __('Create links to your pages or posts.', 'adblocks'),
			'category'			=> 'fs-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><rect x="20.12" y="7.841" width="3.88" height="8.085" style="fill:#555d66;"/><rect x="0" y="7.841" width="3.88" height="8.085" style="fill:#555d66;"/><rect x="6" y="6" width="12" height="12" style="fill:#555d66;"/><path d="M13.872,11.882l-0.464,0.349c-0.465,0.464 -0.581,1.277 -0.233,1.858l-0.929,0.929l-1.277,-1.278l-1.51,1.51c-0.232,0.232 -1.858,1.51 -2.09,1.278c-0.232,-0.233 1.045,-1.858 1.277,-2.091l1.51,-1.509l-1.277,-1.278l0.929,-0.929c0.58,0.349 1.393,0.349 1.858,-0.232l0.348,-0.348c0.581,-0.581 0.581,-1.394 0.232,-1.975l0.929,-0.929l3.484,3.368l-0.929,0.929c-0.555,-0.222 -1.322,-0.232 -1.858,0.348Z" style="fill:#fff;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'content', 'contenu', 'gallery', 'galerie' ),
            'render_template'   => ADBLOCKS__PLUGIN_PATH . 'templates/block-content.php',
            'enqueue_style' 	=> ADBLOCKS__PLUGIN_URL . 'css/block-content.css',
		));
		
		// CTA
		
		acf_register_block(array(
			'name'				=> 'cta',
			'title'				=> __('CTA', 'adblocks'),
			'category'			=> 'fs-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><rect x="0.014" y="5" width="23.973" height="14" style="fill:#555d66;"/><path d="M16.01,13.11l0,2l-8.02,0l0,-2l8.02,0Zm3.963,-3.955l0,2l-15.946,0l0,-2l15.946,0Z" style="fill:#fff;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'cta', 'call to action' ),
            'render_template'   => ADBLOCKS__PLUGIN_PATH . 'templates/block-cta.php',
            'enqueue_style' 	=> ADBLOCKS__PLUGIN_URL . 'css/block-cta.css',
		));		

	}	
}

// Save Acf
 
add_filter('acf/settings/save_json', 'ad_json_save_point');
function ad_json_save_point( $json_path ) {
    
    $json_path = ADBLOCKS__PLUGIN_PATH . '/json';
    return $json_path;
    
}

// Load Acf
 
add_filter('acf/settings/load_json', 'ad_json_load_point');
function ad_json_load_point( $json_path ) {
    
    unset($json_path[0]);
    $json_path[] = ADBLOCKS__PLUGIN_PATH . '/json';
    return $json_path;
    
}