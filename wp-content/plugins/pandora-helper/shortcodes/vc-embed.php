<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Embed custom Fastex Icon for Visual Composer system
 */
function pandora_embed_icon() {

	// Embed to shortcode VC Icon
	global $vc_add_css_animation;
	$settings = array(
		'params' => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Icon library', 'pandora' ),
				'value'       => array(
					__( 'Font Awesome', 'pandora' ) => 'fontawesome',
					__( 'Open Iconic', 'pandora' )  => 'openiconic',
					__( 'Typicons', 'pandora' )     => 'typicons',
					__( 'Entypo', 'pandora' )       => 'entypo',
					__( 'Linecons', 'pandora' )     => 'linecons',
					__( 'Fastex Icons', 'pandora' ) => 'fastex',
				),
				'admin_label' => true,
				'param_name'  => 'type',
				'description' => esc_html__( 'Select icon library.', 'pandora' ),
			),
			// Fastex Icon
			array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'pandora' ),
				'param_name'  => 'icon_fastex',
				'value'       => 'fastexicon-delivery22',
				'settings'    => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 50,
					'type'         => 'fastex',
				),
				'dependency'  => array(
					'element' => 'type',
					'value'   => 'fastex',
				),
				'description' => esc_html__( 'Select icon from library.', 'pandora' ),
			),
			array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'pandora' ),
				'param_name'  => 'icon_fontawesome',
				'value'       => 'fa fa-adjust', // default value to backend editor admin_label
				'settings'    => array(
					'emptyIcon'    => false,
					// default true, display an "EMPTY" icon?
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
				),
				'dependency'  => array(
					'element' => 'type',
					'value'   => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'pandora' ),
			),
			array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'pandora' ),
				'param_name'  => 'icon_openiconic',
				'value'       => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
				'settings'    => array(
					'emptyIcon'    => false, // default true, display an "EMPTY" icon?
					'type'         => 'openiconic',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency'  => array(
					'element' => 'type',
					'value'   => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'pandora' ),
			),
			array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'pandora' ),
				'param_name'  => 'icon_typicons',
				'value'       => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
				'settings'    => array(
					'emptyIcon'    => false, // default true, display an "EMPTY" icon?
					'type'         => 'typicons',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency'  => array(
					'element' => 'type',
					'value'   => 'typicons',
				),
				'description' => esc_html__( 'Select icon from library.', 'pandora' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'pandora' ),
				'param_name' => 'icon_entypo',
				'value'      => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
				'settings'   => array(
					'emptyIcon'    => false, // default true, display an "EMPTY" icon?
					'type'         => 'entypo',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value'   => 'entypo',
				),
			),
			array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'pandora' ),
				'param_name'  => 'icon_linecons',
				'value'       => 'vc_li vc_li-heart', // default value to backend editor admin_label
				'settings'    => array(
					'emptyIcon'    => false, // default true, display an "EMPTY" icon?
					'type'         => 'linecons',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency'  => array(
					'element' => 'type',
					'value'   => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'pandora' ),
			),
			array(
				'type'               => 'dropdown',
				'heading'            => esc_html__( 'Icon color', 'pandora' ),
				'param_name'         => 'color',
				'value'              => array_merge( getVcShared( 'colors' ), array( esc_html__( 'Custom color', 'pandora' ) => 'custom' ) ),
				'description'        => esc_html__( 'Select icon color.', 'pandora' ),
				'param_holder_class' => 'vc_colored-dropdown',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Custom color', 'pandora' ),
				'param_name'  => 'custom_color',
				'description' => esc_html__( 'Select custom icon color.', 'pandora' ),
				'dependency'  => array(
					'element' => 'color',
					'value'   => 'custom',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Background shape', 'pandora' ),
				'param_name'  => 'background_style',
				'value'       => array(
					__( 'None', 'pandora' )            => '',
					__( 'Circle', 'pandora' )          => 'rounded',
					__( 'Square', 'pandora' )          => 'boxed',
					__( 'Rounded', 'pandora' )         => 'rounded-less',
					__( 'Outline Circle', 'pandora' )  => 'rounded-outline',
					__( 'Outline Square', 'pandora' )  => 'boxed-outline',
					__( 'Outline Rounded', 'pandora' ) => 'rounded-less-outline',
				),
				'description' => esc_html__( 'Select background shape and style for icon.', 'pandora' )
			),
			array(
				'type'               => 'dropdown',
				'heading'            => esc_html__( 'Background color', 'pandora' ),
				'param_name'         => 'background_color',
				'value'              => array_merge( getVcShared( 'colors' ), array( esc_html__( 'Custom color', 'pandora' ) => 'custom' ) ),
				'std'                => 'grey',
				'description'        => esc_html__( 'Select background color for icon.', 'pandora' ),
				'param_holder_class' => 'vc_colored-dropdown',
				'dependency'         => array(
					'element'   => 'background_style',
					'not_empty' => true,
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Custom background color', 'pandora' ),
				'param_name'  => 'custom_background_color',
				'description' => esc_html__( 'Select custom icon background color.', 'pandora' ),
				'dependency'  => array(
					'element' => 'background_color',
					'value'   => 'custom',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Size', 'pandora' ),
				'param_name'  => 'size',
				'value'       => array_merge( getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
				'std'         => 'md',
				'description' => esc_html__( 'Icon size.', 'pandora' )
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Icon alignment', 'pandora' ),
				'param_name'  => 'align',
				'value'       => array(
					__( 'Left', 'pandora' )   => 'left',
					__( 'Right', 'pandora' )  => 'right',
					__( 'Center', 'pandora' ) => 'center',
				),
				'description' => esc_html__( 'Select icon alignment.', 'pandora' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'URL (Link)', 'pandora' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Add link to icon.', 'pandora' )
			),
			$vc_add_css_animation,
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'pandora' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'pandora' )
			),
			array(
				'type'       => 'css_editor',
				'heading'    => __( 'CSS box', 'js_composer' ),
				'param_name' => 'css',
				'group'      => __( 'Design Options', 'js_composer' )
			),

		),
	);
	vc_map_update( 'vc_icon', $settings );

	// Embed to shortcode VC section (of tab)
	$new_icon_params = vc_map_integrate_shortcode(
		'vc_icon',
		'i_',
		'',
		array(
			'include_only_regex' => '/^(type|icon_\w*)/',
		), array(
			'element' => 'add_icon',
			'value'   => 'true',
		)
	);
	$settings        = array(
		'params' => array_merge( array(
			array(
				'type'        => 'textfield',
				'param_name'  => 'title',
				'heading'     => esc_html__( 'Title', 'pandora' ),
				'description' => esc_html__( 'Enter section title (Note: you can leave it empty).', 'pandora' ),
			),
			array(
				'type'        => 'el_id',
				'param_name'  => 'tab_id',
				'settings'    => array(
					'auto_generate' => true,
				),
				'heading'     => esc_html__( 'Section ID', 'pandora' ),
				'description' => esc_html__( 'Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'pandora' ),
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'add_icon',
				'heading'     => esc_html__( 'Add icon?', 'pandora' ),
				'description' => esc_html__( 'Add icon next to section title.', 'pandora' ),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'i_position',
				'value'       => array(
					__( 'Before title', 'pandora' ) => 'left',
					__( 'After title', 'pandora' )  => 'right',
				),
				'dependency'  => array(
					'element' => 'add_icon',
					'value'   => 'true',
				),
				'heading'     => esc_html__( 'Icon position', 'pandora' ),
				'description' => esc_html__( 'Select icon position.', 'pandora' ),
			),
		),
			$new_icon_params,
			array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Extra class name', 'pandora' ),
					'param_name'  => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'pandora' )
				)
			)
		),
	);
	vc_map_update( 'vc_tta_section', $settings );

}

add_action( 'init', 'pandora_embed_icon' );