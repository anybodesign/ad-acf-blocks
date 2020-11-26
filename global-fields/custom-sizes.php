<?php defined('ABSPATH') or die(); 

function adblocks_customsize_fields() {

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5fbf7dff3d8b7',
	'title' => __('Block Options: Custom Sizes', 'adblocks'),
	'fields' => array(
		array(
			'key' => 'field_5fbf84e3252aa',
			'label' => __('Featured image custom size', 'adblocks'),
			'name' => 'has_custom_size',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5fbf7e4023173',
			'label' => __('Choose another custom size', 'adblocks'),
			'name' => 'custom_size',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5fbf84e3252aa',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
			),
			'default_value' => false,
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/textimg',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/posts',
			),
		),
	),
	'menu_order' => 19,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

}
add_action('acf/init', 'adblocks_customsize_fields');


// Populate custom sizes
// https://support.advancedcustomfields.com/forums/topic/dynamically-add-options/

function adblocks_load_image_sizes_field_choices( $field ) {
	global $_wp_additional_image_sizes;

	$field['choices'] = array();

	foreach ( get_intermediate_image_sizes() as $size ) {
		if ( in_array( $size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {

			$width  = get_option( "{$size}_size_w" );
			$height = get_option( "{$size}_size_h" );
			$crop = (bool) get_option( "{$size}_crop" );

		} elseif ( isset( $_wp_additional_image_sizes[ $size ] ) ) {

			$width = $_wp_additional_image_sizes[ $size ]['width'];
			$height = $_wp_additional_image_sizes[ $size ]['height'];
			$crop = $_wp_additional_image_sizes[ $size ]['crop'];
		}
		
		$image_crop = "";
		if ( $crop == 1 ) {
			$image_crop = " - cropped";
		}

		// set the value for field values and labels as you like
		$value = $size;
		$label = $size . " ({$width}x{$height}{$image_crop})";

		$field['choices'][ $value ] = $label;
	}

	// add full size option
	$field['choices'][ 'full' ] = "Full size";

	return $field;
}
add_filter('acf/load_field/name=custom_size', 'adblocks_load_image_sizes_field_choices');