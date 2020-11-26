<?php defined('ABSPATH') or die(); 

function adblocks_textimg_block_fields() {

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5ce416f19cc8d',
	'title' => __('AD ACF Block 02: Text + Image', 'adblocks'),
	'fields' => array(
		array(
			'key' => 'field_5f105fd167152',
			'label' => __('Proportions', 'adblocks'),
			'name' => 'proportions',
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
				'half-half' => __('Half half', 'adblocks'),
				'one-third' => __('One third / Two third', 'adblocks'),
				'two-third' => __('Two third / One third', 'adblocks'),
			),
			'default_value' => 'half-half',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5f772547bc234',
			'label' => __('Media type', 'adblocks'),
			'name' => 'media_type',
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
				'picture' => __('Picture', 'adblocks'),
				'video' => __('Video embed', 'adblocks'),
			),
			'allow_null' => 0,
			'default_value' => 'picture',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
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
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f772547bc234',
						'operator' => '==',
						'value' => 'picture',
					),
				),
			),
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
			'key' => 'field_5f7725a97898a',
			'label' => __('Video embed', 'adblocks'),
			'name' => 'video',
			'type' => 'wysiwyg',
			'instructions' => __('Copy-paste your video URL from Youtube, Vimeo…', 'adblocks'),
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f772547bc234',
						'operator' => '==',
						'value' => 'video',
					),
				),
			),
			'wrapper' => array(
				'width' => '35',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'visual',
			'toolbar' => 'basic',
			'media_upload' => 0,
			'delay' => 1,
		),
		array(
			'key' => 'field_5fbf88a83bcac',
			'label' => __('Link', 'adblocks'),
			'name' => 'link',
			'type' => 'link',
			'instructions' => __('Add an action button below the text, and a link on the picture. (Will disable the enlarge picture option)', 'adblocks'),
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
			'key' => 'field_5ece36dd24459',
			'label' => __('Featured image size', 'adblocks'),
			'name' => 'textimg_size',
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
				0 => 'field_5ece2df86f375',
			),
			'display' => 'seamless',
			'layout' => 'block',
			'prefix_label' => 0,
			'prefix_name' => 1,
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
				'width' => '33',
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
				'width' => '33',
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
				'width' => '33',
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
			'key' => 'field_5ecbe86e4beee',
			'label' => __('Enlarge picture with Fancybox', 'adblocks'),
			'name' => 'fancy',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5ceba9d006162',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '33',
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
			'key' => 'field_5e3c4b97fbce3',
			'label' => __('Round picture', 'adblocks'),
			'name' => 'round',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
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
			'key' => 'field_5fbf88733bcab',
			'label' => __('Show caption', 'adblocks'),
			'name' => 'caption',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
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

endif;

}
add_action('acf/init', 'adblocks_textimg_block_fields');