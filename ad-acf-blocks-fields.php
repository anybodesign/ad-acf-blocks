<?php defined('ABSPATH') or die(); 

function adblocks_add_fields() {

	if( function_exists('acf_add_local_field_group') ):
	
	acf_add_local_field_group(array(
		'key' => 'group_5ce4003f7a365',
		'title' => __('AD ACF Block 01: Rich Text', 'adblocks'),
		'fields' => array(
			array(
				'key' => 'field_5ce3ffde2ab33',
				'label' => __('Layout', 'adblocks'),
				'name' => 'layout',
				'type' => 'button_group',
				'instructions' => __('Choose a layout for this block', 'adblocks'),
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
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
				'allow_null' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
				'return_format' => 'value',
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
							'operator' => '==',
							'value' => '1col',
						),
					),
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
							'value' => '2-1col',
						),
					),
					array(
						array(
							'field' => 'field_5ce3ffde2ab33',
							'operator' => '==',
							'value' => '1-2col',
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
							'value' => '2-1col',
						),
					),
					array(
						array(
							'field' => 'field_5ce3ffde2ab33',
							'operator' => '==',
							'value' => '1-2col',
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
	
	acf_add_local_field_group(array(
		'key' => 'group_5ce416f19cc8d',
		'title' => __('AD ACF Block 02: Text + Image', 'adblocks'),
		'fields' => array(
			array(
				'key' => 'field_5ce41de031ede',
				'label' => __('Text area', 'adblocks'),
				'name' => 'text',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '65',
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
				'key' => 'field_5ce41de031ee0',
				'label' => __('Picture', 'adblocks'),
				'name' => 'picture',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '35',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_5ce41de031edf',
				'label' => __('Picture on the right', 'adblocks'),
				'name' => 'right',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '30',
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
				'key' => 'field_5ceba9d006162',
				'label' => __('Enlarge picture', 'adblocks'),
				'name' => 'zoom',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '30',
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
				'key' => 'field_5cec15ae50656',
				'label' => __('Vertical centering', 'adblocks'),
				'name' => 'center',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '30',
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
					'value' => 'acf/textimg',
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
	
	acf_add_local_field_group(array(
		'key' => 'group_5ce417112b1de',
		'title' => __('AD ACF Block 03: Photo gallery', 'adblocks'),
		'fields' => array(
			array(
				'key' => 'field_5ce4174ccc530',
				'label' => __('Layout', 'adblocks'),
				'name' => 'columns',
				'type' => 'button_group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'2cols' => __('2 columns', 'adblocks'),
					'3cols' => __('3 columns', 'adblocks'),
					'4cols' => __('4 columns', 'adblocks'),
					'5cols' => __('5 columns', 'adblocks'),
					'6cols' => __('6 columns', 'adblocks'),
				),
				'allow_null' => 0,
				'default_value' => '4cols',
				'layout' => 'horizontal',
				'return_format' => 'value',
			),
			array(
				'key' => 'field_5ce4174ccc531',
				'label' => __('Gallery', 'adblocks'),
				'name' => 'gallery',
				'type' => 'gallery',
				'instructions' => __('Select the pictures', 'adblocks'),
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'medium',
				'insert' => 'append',
				'library' => 'all',
				'min' => '',
				'max' => '',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_5dc12ae66f8fb',
				'label' => __('Lengend display', 'adblocks'),
				'name' => 'legend',
				'type' => 'button_group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'inside' => __('Inside the picture', 'adblocks'),
					'outside' => __('Outside the picture', 'adblocks'),
				),
				'allow_null' => 0,
				'default_value' => 'inside',
				'layout' => 'horizontal',
				'return_format' => 'value',
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
	
	acf_add_local_field_group(array(
		'key' => 'group_5cecfe35069c4',
		'title' => __('AD ACF Block 04: Content Gallery', 'adblocks'),
		'fields' => array(
			array(
				'key' => 'field_5cecfedc6837e',
				'label' => __('Layout', 'adblocks'),
				'name' => 'layout',
				'type' => 'button_group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'2cols' => __('2 columns', 'adblocks'),
					'3cols' => __('3 columns', 'adblocks'),
					'4cols' => __('4 columns', 'adblocks'),
					'5cols' => __('5 columns', 'adblocks'),
					'6cols' => __('6 columns', 'adblocks'),
				),
				'allow_null' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
				'return_format' => 'value',
			),
			array(
				'key' => 'field_5cecfef96837f',
				'label' => __('Content', 'adblocks'),
				'name' => 'gallery',
				'type' => 'relationship',
				'instructions' => __('Select the pages or posts you wish to have in this gallery', 'adblocks'),
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => '',
				'taxonomy' => '',
				'filters' => array(
					0 => 'search',
					1 => 'post_type',
					2 => 'taxonomy',
				),
				'elements' => array(
					0 => 'featured_image',
				),
				'min' => '',
				'max' => '',
				'return_format' => 'object',
			),
			array(
				'key' => 'field_5dc12c25bac3d',
				'label' => __('Title display', 'adblocks'),
				'name' => 'title',
				'type' => 'clone',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'clone' => array(
					0 => 'field_5dc12ae66f8fb',
				),
				'display' => 'seamless',
				'layout' => 'block',
				'prefix_label' => 0,
				'prefix_name' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/content',
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
	
	acf_add_local_field_group(array(
		'key' => 'group_5ced02f02266d',
		'title' => __('AD ACF Block 05: CTA', 'adblocks'),
		'fields' => array(
			array(
				'key' => 'field_5ced030883dea',
				'label' => __('Text area', 'adblocks'),
				'name' => 'text',
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
				'key' => 'field_5ced030883deb',
				'label' => __('Link', 'adblocks'),
				'name' => 'link',
				'type' => 'link',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
			),
			array(
				'key' => 'field_5ced030883dec',
				'label' => __('Style', 'adblocks'),
				'name' => 'style',
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
						'key' => 'field_5ced030883ded',
						'label' => __('Texte color', 'adblocks'),
						'name' => 'white_text',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'message' => __('Switch text to white', 'adblocks'),
						'default_value' => 0,
						'ui' => 1,
						'ui_on_text' => '',
						'ui_off_text' => '',
					),
					array(
						'key' => 'field_5ced030883dee',
						'label' => __('Background color', 'adblocks'),
						'name' => 'bg_color',
						'type' => 'color_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
					),
					array(
						'key' => 'field_5ced030883def',
						'label' => __('Background picture', 'adblocks'),
						'name' => 'bg_image',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array(
						'key' => 'field_5ced030883df0',
						'label' => __('Overlay', 'adblocks'),
						'name' => 'overlay',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'message' => __('Add an overlay over the background image', 'adblocks'),
						'default_value' => 0,
						'ui' => 1,
						'ui_on_text' => '',
						'ui_off_text' => '',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/cta',
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
add_action('acf/init', 'adblocks_add_fields');