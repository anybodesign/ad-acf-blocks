<?php defined('ABSPATH') or die(); 

function adblocks_gallery_fields() {

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5df9ebd7beef8',
	'title' => __('Block Options: Gallery Pictures', 'adblocks'),
	'fields' => array(
		array(
			'key' => 'field_5df9ebde7335e',
			'label' => __('Size', 'adblocks'),
			'name' => 'img_size',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'thumb' => __('Thumbnail', 'adblocks'),
				'medium' => __('Medium', 'adblocks'),
				'large' => __('Large', 'adblocks'),
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 1,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5df9ec267335f',
			'label' => __('External link', 'adblocks'),
			'name' => 'img_link',
			'type' => 'url',
			'instructions' => __('If you wish to add an external link to this picture.', 'adblocks'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'attachment',
				'operator' => '==',
				'value' => 'image',
			),
		),
	),
	'menu_order' => 0,
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
add_action('acf/init', 'adblocks_gallery_fields');