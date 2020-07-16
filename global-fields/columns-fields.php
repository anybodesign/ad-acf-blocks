<?php defined('ABSPATH') or die(); 

function adblocks_columns_fields() {

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5df790c75a479',
	'title' => __('Block Options: Columns', 'adblocks'),
	'fields' => array(
		array(
			'key' => 'field_5df799d4eb0b8',
			'label' => __('Number of Columns', 'adblocks'),
			'name' => 'columns',
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
				'1col' => __('1 column', 'adblocks'),
				'2cols' => __('2 columns', 'adblocks'),
				'3cols' => __('3 columns', 'adblocks'),
				'4cols' => __('4 columns', 'adblocks'),
				'5cols' => __('5 columns', 'adblocks'),
				'6cols' => __('6 columns', 'adblocks'),
			),
			'default_value' => array(
				0 => '4cols',
			),
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
				'value' => 'acf/gallery',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/posts',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/cards',
			),
		),		
	),
	'menu_order' => -1,
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
add_action('acf/init', 'adblocks_columns_fields');