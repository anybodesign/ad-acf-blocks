<?php defined('ABSPATH') or die(); 
/**
 * Plugin Name: AD ACF Blocks
 * Description: A collection of blocks made with ACF for the new Editor 
 * Version: 3.6.1
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

define( 'ADBLOCKS__PLUGIN_VERSION', '3.6.1' );
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

// Custom excerpt
// https://gist.github.com/samjbmason/4050714

function adblocks_get_excerpt($count, $post_id){
  $permalink = get_permalink($post_id);
  $title = get_the_title($post_id);
  $excerpt = get_post($post_id);
  $excerpt = $excerpt->post_content;
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));

  $excerpt = '<p>'.$excerpt.'... <a class="read-more" href="'.$permalink.'" rel="nofollow">'.esc_html__('Read more', 'adblocks').' <span class="a11y-hidden"> '.esc_html__('of ', 'adblocks').$title.'</span></a></p>';
  return $excerpt;
}


//
// ACF Blocks
//
// ////////////////


// Custom Group

if ( version_compare( $GLOBALS['wp_version'], '5.8-alpha-1', '<' ) ) {
    add_filter( 'block_categories', 'adblocks_block_categories', 10, 2 );
} else {
    add_filter( 'block_categories_all', 'adblocks_block_categories', 10, 2 );
}
function adblocks_block_categories( $block_categories, $block_editor_context ) {

    return array_merge(
        $block_categories,
        array(
            array(
                'slug' 	=> 'ad-blocks',
                'title' => __( 'AD ACF Blocks', 'adblocks' ),
                'icon'  => 'palmtree',
            ),
        )
    );
}

// Load Blocks (Thanks to Thierry Pigot @ wearewp.pro)

$adblocks = array_diff( scandir(ADBLOCKS__PLUGIN_PATH . '/blocks'), array('..', '.', '.DS_Store') );

foreach( $adblocks as $adblock ) {
	include_once ADBLOCKS__PLUGIN_PATH . 'blocks/'. $adblock .'/'. $adblock .'.php';
	include_once ADBLOCKS__PLUGIN_PATH . 'blocks/'. $adblock .'/'. $adblock .'-fields.php';
}	


// Translate Fields

function adblocks_custom_acf_settings_localization($localization){
  return true;
}
add_filter('acf/settings/l10n', 'adblocks_custom_acf_settings_localization');

function adblocks_custom_acf_settings_textdomain($domain){
  return 'adblocks';
}
add_filter('acf/settings/l10n_textdomain', 'adblocks_custom_acf_settings_textdomain');


// Common styles

function adblocks_common_css() {
	wp_enqueue_style( 
		'adblocks-common', 
		ADBLOCKS__PLUGIN_URL . 'assets/css/adblocks.css',
		array(), 
		ADBLOCKS__PLUGIN_VERSION, 
		'screen' 
	);
}
add_action( 'wp_enqueue_scripts', 'adblocks_common_css' );


// Admin styles

add_action( 'admin_init', 'adblocks_common_css' ); 

function adblocks_admin_css() {
	wp_enqueue_style( 
		'adblocks-admin', 
		ADBLOCKS__PLUGIN_URL . 'assets/css/adblocks-admin.css',
		array(), 
		ADBLOCKS__PLUGIN_VERSION, 
		'screen' 
	);
}
add_action( 'admin_init', 'adblocks_admin_css' ); 


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