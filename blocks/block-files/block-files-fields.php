<?php defined('ABSPATH') or die(); 

function adblocks_files_block_fields() {

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_60e5945264969',
	'title' => __('AD ACF Block 11: File list', 'adblocks'),
	'fields' => array(
		array(
			'key' => 'field_60e5949e44098',
			'label' => __('Add files', 'adblocks'),
			'name' => 'add_files',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => __('Add a file', 'adblocks'),
			'sub_fields' => array(
				array(
					'key' => 'field_60e594ab44099',
					'label' => __('File', 'adblocks'),
					'name' => 'file',
					'type' => 'file',
					'instructions' => __('Allowed file type: PDF, ZIP, DOC, JPEG, PNG, MP3 and MP4', 'adblocks'),
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'library' => 'all',
					'min_size' => '',
					'max_size' => '',
					'mime_types' => 'pdf, zip, jpg, jpeg, png, doc, mp3, mp4',
				),
				array(
					'key' => 'field_61bc308f4ed93',
					'label' => __('Custom title', 'adblocks'),
					'name' => 'title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_60e5aa9a3ad63',
			'label' => __('Display file type icon', 'adblocks'),
			'name' => 'files_icons',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_61430ae0b8d5a',
			'label' => __('Use custom theme icons', 'adblocks'),
			'name' => 'custom_icons',
			'type' => 'true_false',
			'instructions' => __('Icons path in the theme must be: <em>/img/icons/files/</em><br>
File names: <em>archive.svg, audio.svg, picture.svg, text.svg, video.svg, blank.svg</em>', 'adblocks'),
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_60e5aa9a3ad63',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/files',
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
add_action('acf/init', 'adblocks_files_block_fields');