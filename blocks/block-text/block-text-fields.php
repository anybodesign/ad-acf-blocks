<?php defined('ABSPATH') or die(); 

function adblocks_text_block_fields() {

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5df7a04b4c991',
	'title' => __('AD ACF Block 01: Rich Text', 'adblocks'),
	'fields' => array(
		array(
			'key' => 'field_5ce3ffde2ab33',
			'label' => __('Layout', 'adblocks'),
			'name' => 'layout',
			'type' => 'select',
			'instructions' => __('Choose a layout for this block', 'adblocks'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '75',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'1col' => __('1 column', 'adblocks'),
				'2col' => __('2 columns', 'adblocks'),
				'3col' => __('3 columns', 'adblocks'),
				'2-1col' => __('Two thirds / One third', 'adblocks'),
				'1-2col' => __('One third / Two thirds', 'adblocks'),
			),
			'default_value' => array(
				0 => '1col',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5cebff896af3c',
			'label' => __('Vertical centering', 'adblocks'),
			'name' => 'center',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
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
			'key' => 'field_5df7b66b8958a',
			'label' => __('Content area', 'adblocks'),
			'name' => 'text_group',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5ce3ffde2ab34',
					'label' => __('First column', 'adblocks'),
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5ce3ffde2ab33',
								'operator' => '!=empty',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array(
					'key' => 'field_5ce3ffde2ab35',
					'label' => __('Content', 'adblocks'),
					'name' => 'text_1',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
				array(
					'key' => 'field_5ce3ffde2ab36',
					'label' => __('Second column', 'adblocks'),
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5ce3ffde2ab33',
								'operator' => '==',
								'value' => '2col',
							),
						),
						array(
							array(
								'field' => 'field_5ce3ffde2ab33',
								'operator' => '==',
								'value' => '3col',
							),
						),
						array(
							array(
								'field' => 'field_5ce3ffde2ab33',
								'operator' => '==',
								'value' => '1-2col',
							),
						),
						array(
							array(
								'field' => 'field_5ce3ffde2ab33',
								'operator' => '==',
								'value' => '2-1col',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array(
					'key' => 'field_5ce3ffde2ab37',
					'label' => __('Content', 'adblocks'),
					'name' => 'text_2',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
				array(
					'key' => 'field_5ce3ffde2ab38',
					'label' => __('Third column', 'adblocks'),
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5ce3ffde2ab33',
								'operator' => '==',
								'value' => '3col',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array(
					'key' => 'field_5ce3ffde2ab39',
					'label' => __('Content', 'adblocks'),
					'name' => 'text_3',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/text',
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
add_action('acf/init', 'adblocks_text_block_fields');