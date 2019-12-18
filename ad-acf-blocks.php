<?php defined('ABSPATH') or die(); 
/**
 * Plugin Name: AD ACF Blocks
 * Description: A collection of blocks made with ACF for the new Editor 
 * Version: 1.2
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

define( 'ADBLOCKS__PLUGIN_VERSION', '1.2' );
define( 'ADBLOCKS__PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'ADBLOCKS__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ADBLOCKS__BASENAME', plugin_basename( __FILE__ ) );


// i18n

load_plugin_textdomain( 'adblocks', false, basename( dirname( __FILE__ ) ) . '/languages/' );


// Image size

add_image_size( 'adblocks-thumbnail-hd', 500, 500, true );
add_image_size( 'adblocks-medium-hd', 1000, 1000, false );
add_image_size( 'adblocks-large-hd', 2000, 2000, false );


// ACF Notice

add_action('after_plugin_row_' . ADBLOCKS__BASENAME, 'adblocks_plugin_row', 5, 3);
function adblocks_plugin_row($plugin_file, $plugin_data, $status) {
    
	if ( class_exists('ACF') && defined('ACF_PRO') && defined('ACF_VERSION') && version_compare(ACF_VERSION, '5.8', '>=') ) {
        return;
    } ?>
    
    <style>
        .plugins tr[data-plugin='<?php echo ADBLOCKS__BASENAME; ?>'] th,
        .plugins tr[data-plugin='<?php echo ADBLOCKS__BASENAME; ?>'] td {
            box-shadow: none;
        }
        
        <?php if ( isset($plugin_data['update']) && !empty($plugin_data['update']) ) { ?>
            
            .plugins tr.acfe-plugin-tr td {
                box-shadow: none !important;
            }
            .plugins tr.acfe-plugin-tr .update-message {
                margin-bottom: 0;
            }
            
        <?php } ?>
    </style>
    
    <tr class="plugin-update-tr active acfe-plugin-tr">
        <td colspan="3" class="plugin-update colspanchange">
            <div class="update-message notice inline notice-error notice-alt">
                <p><?php _e('AD ACF Blocks requires Advanced Custom Fields PRO (minimum: 5.8).', 'adblocks'); ?></p>
            </div>
        </td>
    </tr>
    
    <?php
    
}

// Fancybox

function adblocks_fancy() {
	if (!is_admin()) {
		wp_enqueue_script( 'jquery' );
	 	
		wp_enqueue_script(
			'fancybox', 
		    ADBLOCKS__PLUGIN_URL . 'js/jquery.fancybox.min.js',
			array('jquery'), 
			'3.5.7', 
		    true
		);
		wp_enqueue_script(
			'fancybox-init', 
		    ADBLOCKS__PLUGIN_URL . 'js/fancybox-init.js',
			array('fancybox'), 
			'3.5.7', 
		    true
		);
		
		wp_enqueue_style(
			'fancybox', 
		    ADBLOCKS__PLUGIN_URL . 'css/jquery.fancybox.min.css',
			array(), 
			'3.5.7', 
		    'screen'
		);
	}
}    
add_action('wp_enqueue_scripts', 'adblocks_fancy');


//
// ACF blocks
//
// ////////////////


// Custom Group

add_filter( 'block_categories', 'adblocks_block_categories', 10, 2 );
function adblocks_block_categories( $categories, $post ) {

    return array_merge(
        $categories,
        array(
            array(
                'slug' 	=> 'ad-blocks',
                'title' => __( 'AD ACF Blocks', 'adblocks' ),
                'icon'  => 'palmtree',
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
			'description'		=> __('Rich text block with some background andd layout options.', 'adblocks'),
			'category'			=> 'ad-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M22.08,24l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-20.16c0,-1.06 0.86,-1.92 1.92,-1.92l20.16,0c1.06,0 1.92,0.86 1.92,1.92l0,2.08l-2,0l0,-1.2c0,-0.441 -0.358,-0.8 -0.8,-0.8l-18.4,0c-0.442,0 -0.8,0.359 -0.8,0.8l0,18.4c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-1.2l2,0l0,2.08c0,1.06 -0.86,1.92 -1.92,1.92Z" style="fill:#555d66;"/><path d="M20,19l-2,0l0,-2l2,0l0,2Zm-4,0l-12,0l0,-2l12,0l0,2Zm-6,-4l-6,0l0,-2l6,0l0,2Zm14,0l-12,0l0,-2l12,0l0,2Zm0,-4.143l-8,0l0,-1.857l8,0l0,1.857Zm-10,0l-10,0l0,-1.857l10,0l0,1.857Zm6,-3.857l-16,0l0,-2l16,0l0,2Z" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'text', 'texte' ),
            'render_template'   => ADBLOCKS__PLUGIN_PATH . 'templates/block-text.php',
            'enqueue_style' 	=> ADBLOCKS__PLUGIN_URL . 'css/block-text.css',
		));
		
		// Text & Image
		
		acf_register_block(array(
			'name'				=> 'textimg',
			'title'				=> __('Text and Image', 'adblocks'),
			'description'		=> __('Text and picture block with reverse order option.', 'adblocks'),
			'category'			=> 'ad-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M22.08,24l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-20.16c0,-1.06 0.86,-1.92 1.92,-1.92l20.16,0c1.06,0 1.92,0.86 1.92,1.92l0,2.08l-2,0l0,-1.2c0,-0.441 -0.358,-0.8 -0.8,-0.8l-18.4,0c-0.442,0 -0.8,0.359 -0.8,0.8l0,18.4c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-1.2l2,0l0,2.08c0,1.06 -0.86,1.92 -1.92,1.92Z" style="fill:#555d66;"/><path d="M24,17l-10,0l0,-2l10,0l0,2Zm-12,0l-8,0l0,-10l8,0l0,10Zm10,-4l-8,0l0,-2l8,0l0,2Zm2,-4.143l-10,0l0,-1.857l10,0l0,1.857Z" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'text', 'texte', 'image' ),
            'render_template'   => ADBLOCKS__PLUGIN_PATH . 'templates/block-textimg.php',
            'enqueue_style' 	=> ADBLOCKS__PLUGIN_URL . 'css/block-textimg.css',
		));
		
		// Picture Gallery
		
		acf_register_block(array(
			'name'				=> 'gallery',
			'title'				=> __('Gallery', 'adblocks'),
			'description'		=> __('Create a picture gallery or a thumbnailed gallery of pages and/or posts.', 'adblocks'),
			'category'			=> 'ad-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M6,24l-4.08,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-4.08l2,0l0,3.2c0,0.442 0.358,0.8 0.8,0.8l3.2,0l0,2Zm16,-18l0,-3.2c0,-0.441 -0.358,-0.8 -0.8,-0.8l-3.2,0l0,-2l4.08,0c1.06,0 1.92,0.86 1.92,1.92l0,4.08l-2,0Z" style="fill:#555d66;"/><path d="M24,22c0,1.105 -0.895,2 -2,2l-12,0c-1.105,0 -2,-0.895 -2,-2l0,-12c0,-1.105 0.895,-2 2,-2l12,0c1.105,0 2,0.895 2,2l0,12Zm-2.019,0l0.019,-10l-12,10l11.981,0Zm-15.981,-2l0,0c-1.105,0 -2,-0.895 -2,-2l0,-12c0,-1.105 0.895,-2 2,-2l12,0c1.105,0 2,0.895 2,2l0,0l-12,0c-1.105,0 -2,0.895 -2,2l0,12Zm7,-10c1.656,0 3,1.359 3,3.033c0,1.674 -1.344,3.032 -3,3.032c-1.656,0 -3,-1.358 -3,-3.032c0,-1.674 1.344,-3.033 3,-3.033Zm-11,6l0,0c-1.105,0 -2,-0.895 -2,-2l0,-12c0,-1.105 0.895,-2 2,-2l12,0c1.105,0 2,0.895 2,2l0,0l-12,0c-1.105,0 -2,0.895 -2,2l0,12Z" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'photo', 'gallery', 'galerie', 'content', 'contenu' ),
            'render_template'   => ADBLOCKS__PLUGIN_PATH . 'templates/block-gallery.php',
            'enqueue_style' 	=> ADBLOCKS__PLUGIN_URL . 'css/block-gallery.css',
		));
				
		// CTA
		
		acf_register_block(array(
			'name'				=> 'cta',
			'title'				=> __('CTA', 'adblocks'),
			'description'		=> __('Call to action block, with background color or background picture.', 'adblocks'),
			'category'			=> 'ad-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M24.071,20l0,2.08c0,1.06 -0.86,1.92 -1.92,1.92l-20.16,0c-1.059,0 -1.92,-0.86 -1.92,-1.92l0,-2.08l2,0l0,1.2c0,0.442 0.359,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-1.2l2,0Zm-24,-16l0,-2.08c0,-1.06 0.86,-1.92 1.92,-1.92l20.16,0c1.06,0 1.92,0.86 1.92,1.92l0,2.08l-2,0l0,-1.2c0,-0.441 -0.358,-0.8 -0.8,-0.8l-18.4,0c-0.442,0 -0.8,0.359 -0.8,0.8l0,1.2l-2,0Z" style="fill:#555d66;"/><path d="M23.973,16c0,1.105 -0.896,2 -2,2c-4.516,0 -15.458,0 -19.973,0c-1.105,0 -2,-0.895 -2,-2c0,-2.22 0,-5.78 0,-8c0,-1.105 0.895,-2 2,-2c4.515,0 15.457,0 19.973,0c1.104,0 2,0.895 2,2c0,2.22 0,5.78 0,8Zm-7.977,-1.022l0,-2l-8.02,0l0,2l8.02,0Zm3.963,-3.956l0,-2l-15.945,0l0,2l15.945,0Z" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'cta', 'call to action' ),
            'render_template'   => ADBLOCKS__PLUGIN_PATH . 'templates/block-cta.php',
            'enqueue_style' 	=> ADBLOCKS__PLUGIN_URL . 'css/block-cta.css',
		));
		
		// Posts
		
		acf_register_block(array(
			'name'				=> 'posts',
			'title'				=> __('Posts', 'adblocks'),
			'description'		=> __('Insert one or many posts or custom posts.', 'adblocks'),
			'category'			=> 'ad-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M12,0l0,2l-9.2,0c-0.442,0 -0.8,0.359 -0.8,0.8l0,18.4c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-9.2l2,0l0,10.08c0,1.06 -0.86,1.92 -1.92,1.92l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-20.16c0,-1.06 0.86,-1.92 1.92,-1.92l10.08,0Z" style="fill:#555d66;"/><path d="M18.018,9.97l-0.997,0.748c-0.997,0.997 -1.246,2.741 -0.498,3.988l-1.994,1.994l-2.742,-2.742l-3.24,3.24c-0.499,0.498 -3.988,3.24 -4.487,2.742c-0.498,-0.499 2.244,-3.988 2.742,-4.487l3.24,-3.24l-2.742,-2.742l1.994,-1.994c1.247,0.748 2.991,0.748 3.988,-0.498l0.748,-0.748c1.246,-1.246 1.246,-2.991 0.499,-4.237l1.994,-1.994l7.477,7.228l-1.994,1.994c-1.191,-0.476 -2.837,-0.497 -3.988,0.748Z" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'post', 'publication' ),
            'render_template'   => ADBLOCKS__PLUGIN_PATH . 'templates/block-posts.php',
            'enqueue_style' 	=> ADBLOCKS__PLUGIN_URL . 'css/block-posts.css',
		));			

	}	
}


// Load ACF fields (PHP)

require_once('ad-acf-blocks-fields.php');


// Translate fields

function adblocks_custom_acf_settings_localization($localization){
  return true;
}
add_filter('acf/settings/l10n', 'adblocks_custom_acf_settings_localization');

function adblocks_custom_acf_settings_textdomain($domain){
  return 'adblocks';
}
add_filter('acf/settings/l10n_textdomain', 'adblocks_custom_acf_settings_textdomain');



//
// Auto-Updater
//
// ////////////////


require 'assets/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/anybodesign/ad-acf-blocks',
	__FILE__,
	'ad-acf-blocks'
);
$myUpdateChecker->setBranch('master');