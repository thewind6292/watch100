<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Mapping shortcodes
 */
function pandora_map_vc_shortcodes() {

	// Mapping shortcode Icon Box
	vc_map(
		array(
			'name'                    => esc_html__( 'Icon Box', 'pandora' ),
			'base'                    => 'pandora-icon-box',
			'category'                => esc_html__( 'Pandora Widgets', 'pandora' ),
			'description'             => esc_html__( 'Display icon box with image or icon.', 'pandora' ),
			'controls'                => 'full',
			'show_settings_on_create' => true,
			'params'                  => array(

				array(
					'type'        => 'radioimage',
					'heading'     => esc_html__( 'Layout', 'pandora' ),
					'class'       => 'icon-box-layout',
					'param_name'  => 'layout',
					'admin_label' => true,
					'options'     => array(
						'top'  => PANDORA_URL . 'images/image-top.jpg',
						'top2' => PANDORA_URL . 'images/icon-top.jpg',
						'left' => PANDORA_URL . 'images/icon-left.jpg'
					),
					'description' => esc_html__( 'Choose the layout you want to display.', 'pandora' ),
				),
				// Title
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title', 'pandora' ),
					'param_name'  => 'title',
					'admin_label' => true,
					'value'       => esc_html__( 'This is an icon box.', 'pandora' ),
					'description' => esc_html__( 'Provide the title for this icon box.', 'pandora' ),
				),
				//Use custom or default title?
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Use custom or default title?', 'pandora' ),
					'param_name'  => 'title_custom',
					'value'       => array(
						__( 'Default', 'pandora' ) => '',
						__( 'Custom', 'pandora' )  => 'custom',
					),
					'description' => esc_html__( 'If you select default you will use default title which customized in typography.', 'pandora' )
				),
				//Heading
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Heading element', 'pandora' ),
					'param_name'  => 'heading_tag',
					'value'       => array(
						'h3' => 'h3',
						'h2' => 'h2',
						'h4' => 'h4',
						'h5' => 'h5',
						'h6' => 'h6',
					),
					'description' => esc_html__( 'Choose heading type of the title.', 'pandora' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				//Title color
				array(
					'type'        => 'colorpicker',
					'admin_label' => true,
					'heading'     => esc_html__( 'Title color ', 'pandora' ),
					'param_name'  => 'title_color',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Select the title color.', 'pandora' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				//Title size
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => esc_html__( 'Title size ', 'pandora' ),
					'param_name'  => 'title_size',
					'min'         => 0,
					'value'       => '',
					'suffix'      => 'px',
					'description' => esc_html__( 'Select the title size.', 'pandora' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),

				//Title weight
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Title weight ', 'pandora' ),
					'param_name'  => 'title_weight',
					'value'       => array(
						__( 'Choose the title font weight', 'pandora' ) => '',
						__( 'Normal', 'pandora' )                       => 'normal',
						__( 'Bold', 'pandora' )                         => 'bold',
						__( 'Bolder', 'pandora' )                       => 'bolder',
						__( 'Lighter', 'pandora' )                      => 'lighter',
					),
					'description' => esc_html__( 'Select the title weight.', 'pandora' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				//Title style
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Title style ', 'pandora' ),
					'param_name'  => 'title_style',
					'value'       => array(
						__( 'Choose the title font style', 'pandora' ) => '',
						__( 'Italic', 'pandora' )                      => 'italic',
						__( 'Oblique', 'pandora' )                     => 'oblique',
						__( 'Initial', 'pandora' )                     => 'initial',
						__( 'Inherit', 'pandora' )                     => 'inherit',
					),
					'description' => esc_html__( 'Select the title style.', 'pandora' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				// Description
				array(
					'type'        => 'textarea',
					'admin_label' => true,
					'heading'     => esc_html__( 'Description', 'pandora' ),
					'param_name'  => 'description',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Provide the description for this icon box.', 'pandora' )
				),
				//Use custom or default description ?
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Use custom or default description?', 'pandora' ),
					'param_name'  => 'description_custom',
					'value'       => array(
						__( 'Default', 'pandora' ) => '',
						__( 'Custom', 'pandora' )  => 'custom',
					),
					'description' => esc_html__( 'If you select default you will use default description which customized in typography.', 'pandora' )
				),
				//Description color
				array(
					'type'        => 'colorpicker',
					'admin_label' => true,
					'heading'     => esc_html__( 'Description color ', 'pandora' ),
					'param_name'  => 'description_color',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Select the description color.', 'pandora' ),
					'dependency'  => array(
						'element' => 'description_custom',
						'value'   => 'custom',
					),
				),
				//Description size
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => esc_html__( 'Description size ', 'pandora' ),
					'param_name'  => 'description_size',
					'min'         => 0,
					'value'       => '',
					'suffix'      => 'px',
					'description' => esc_html__( 'Select the description size.', 'pandora' ),
					'dependency'  => array(
						'element' => 'description_custom',
						'value'   => 'custom',
					),
				),
				//Description weight
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Description weight ', 'pandora' ),
					'param_name'  => 'description_weight',
					'value'       => array(
						__( 'Choose the description font weight', 'pandora' ) => '',
						__( 'Normal', 'pandora' )                             => 'normal',
						__( 'Bold', 'pandora' )                               => 'bold',
						__( 'Bolder', 'pandora' )                             => 'bolder',
						__( 'Lighter', 'pandora' )                            => 'lighter',
					),
					'description' => esc_html__( 'Select the description weight.', 'pandora' ),
					'dependency'  => array(
						'element' => 'description_custom',
						'value'   => 'custom',
					),
				),
				//Description style
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Description style ', 'pandora' ),
					'param_name'  => 'description_style',
					'value'       => array(
						__( 'Choose the description font style', 'pandora' ) => '',
						__( 'Italic', 'pandora' )                            => 'italic',
						__( 'Oblique', 'pandora' )                           => 'oblique',
						__( 'Initial', 'pandora' )                           => 'initial',
						__( 'Inherit', 'pandora' )                           => 'inherit',
					),
					'description' => esc_html__( 'Select the description style.', 'pandora' ),
					'dependency'  => array(
						'element' => 'description_custom',
						'value'   => 'custom',
					),
				),
				// Icon type
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Icon type', 'pandora' ),
					'value'       => array(
						__( 'Choose icon type', 'pandora' ) => '',
						__( 'Single Image', 'pandora' )     => 'image',
						__( 'Font Awesome', 'pandora' )     => 'fontawesome',
						__( 'Openiconic', 'pandora' )       => 'openiconic',
						__( 'Typicons', 'pandora' )         => 'typicons',
						__( 'Entypo', 'pandora' )           => 'entypo',
						__( 'Linecons', 'pandora' )         => 'linecons',
						__( 'Fastex Icon', 'pandora' )      => 'fastex',
					),
					'admin_label' => true,
					'param_name'  => 'icon_type',
					'description' => esc_html__( 'Select icon type.', 'pandora' ),
				),
				// Icon type: Image - Image picker
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Choose image', 'pandora' ),
					'param_name'  => 'icon_image',
					'admin_label' => true,
					'value'       => '',
					'description' => esc_html__( 'Upload the custom image icon.', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'image',
					),
				),
				//Image size
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image size', 'pandora' ),
					'param_name'  => 'image_size',
					'admin_label' => true,
					'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'image',
					),
				),
				// Icon type: Fontawesome - Icon picker
				array(
					'type'        => 'iconpicker',
					'admin_label' => true,
					'heading'     => esc_html__( 'Icon', 'pandora' ),
					'param_name'  => 'icon_fontawesome',
					'value'       => 'fa fa-heart',
					'settings'    => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 50,
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'fontawesome',
					),
					'description' => esc_html__( 'FontAwesome library.', 'pandora' ),
				),
				// Icon type: Openiconic - Icon picker
				array(
					'type'        => 'iconpicker',
					'admin_label' => true,
					'heading'     => esc_html__( 'Icon', 'pandora' ),
					'param_name'  => 'icon_openiconic',
					'value'       => '',
					'settings'    => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 50,
						'type'         => 'openiconic',
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'openiconic',
					),
					'description' => esc_html__( 'Openiconic library.', 'pandora' ),
				),
				// Icon type: Typicons - Icon picker
				array(
					'type'        => 'iconpicker',
					'admin_label' => true,
					'heading'     => esc_html__( 'Icon', 'pandora' ),
					'param_name'  => 'icon_typicons',
					'value'       => '',
					'settings'    => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 50,
						'type'         => 'typicons',
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'typicons',
					),
					'description' => esc_html__( 'Typicons library.', 'pandora' ),
				),
				// Icon type: Entypo - Icon picker
				array(
					'type'        => 'iconpicker',
					'admin_label' => true,
					'heading'     => esc_html__( 'Icon', 'pandora' ),
					'param_name'  => 'icon_entypo',
					'value'       => '',
					'settings'    => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 50,
						'type'         => 'entypo',
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'entypo',
					),
					'description' => esc_html__( 'Entypo library.', 'pandora' ),
				),
				// Icon type: Lincons - Icon picker
				array(
					'type'        => 'iconpicker',
					'admin_label' => true,
					'heading'     => esc_html__( 'Icon', 'pandora' ),
					'param_name'  => 'icon_linecons',
					'value'       => '',
					'settings'    => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 50,
						'type'         => 'linecons',
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'linecons',
					),
					'description' => esc_html__( 'Linecons library.', 'pandora' ),
				),
				// Icon type: Fastex Icon - Icon picker
				array(
					'type'        => 'iconpicker',
					'admin_label' => true,
					'heading'     => esc_html__( 'Icon', 'pandora' ),
					'param_name'  => 'icon_fastex',
					'value'       => 'fastexicon-delivery22',
					'settings'    => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 50,
						'type'         => 'fastex',
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'fastex',
					),
					'description' => esc_html__( 'Fastex library.', 'pandora' ),
				),

				//Icon link
				array(
					'type'        => 'vc_link',
					'heading'     => __( 'Icon link', 'pandora' ),
					'param_name'  => 'icon_link',
					'admin_label' => true,
					'description' => __( 'Enter the link for icon.', 'pandora' ),
				),

				//Icon size
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => esc_html__( 'Icon size', 'pandora' ),
					'param_name'  => 'icon_size',
					'value'       => 40,
					'min'         => 16,
					'max'         => 100,
					'suffix'      => 'px',
					'description' => esc_html__( 'Select the icon size.', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons', 'fastex' ),
					),
				),
				//Icon color
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Icon color', 'pandora' ),
					'param_name'  => 'icon_color',
					'value'       => '#89BA49',
					'description' => esc_html__( 'Select the icon color.', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons', 'fastex' ),
					),
				),
				//Display the button?
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Display the button?', 'pandora' ),
					'param_name'  => 'button_display',
					'value'       => array( esc_html__( '', 'pandora' ) => 'yes' ),
					'description' => esc_html__( 'Tick it to display the button.', 'pandora' ),
				),
				//Button link
				array(
					'type'        => 'vc_link',
					'heading'     => esc_html__( 'Button link', 'pandora' ),
					'param_name'  => 'button_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the button link', 'pandora' ),
					'dependency'  => array(
						'element' => 'button_display',
						'value'   => 'yes',
					),
				),
				//Button value
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Button value', 'pandora' ),
					'param_name'  => 'button_value',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the button value', 'pandora' ),
					'dependency'  => array(
						'element' => 'button_display',
						'value'   => 'yes',
					),
				),
				//Background color
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Background color', 'pandora' ),
					'param_name'  => 'background_color',
					'value'       => '',
					'description' => esc_html__( 'Select the background color.', 'pandora' ),
				),
				//Text Alignment
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Text alignment', 'pandora' ),
					'param_name'  => 'alignment',
					'value'       => array(
						__( 'Choose the text alignment', 'pandora' ) => '',
						__( 'Text at left', 'pandora' )              => 'left',
						__( 'Text at center', 'pandora' )            => 'center',
						__( 'Text at right', 'pandora' )             => 'right',
					),
				),
				// Animation
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Animation', 'pandora' ),
					'param_name'  => 'css_animation',
					'value'       => array(
						__( 'No', 'pandora' )                 => '',
						__( 'Top to bottom', 'pandora' )      => 'top-to-bottom',
						__( 'Bottom to top', 'pandora' )      => 'bottom-to-top',
						__( 'Left to right', 'pandora' )      => 'left-to-right',
						__( 'Right to left', 'pandora' )      => 'right-to-left',
						__( 'Appear from center', 'pandora' ) => 'appear'
					),
					'description' => esc_html__( 'Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'pandora' )
				),
				// Extra class
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Extra class', 'pandora' ),
					'param_name'  => 'el_class',
					'value'       => '',
					'description' => esc_html__( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'pandora' ),
				),
			)
		)
	);
	
	// Mapping shortcode Banner Box
	vc_map(
		array(
			'name'                    => esc_html__( 'Banner Box', 'pandora' ),
			'base'                    => 'pandora-banner-box',
			'category'                => esc_html__( 'Pandora Widgets', 'pandora' ),
			'description'             => esc_html__( 'Display banner box with image.', 'pandora' ),
			'controls'                => 'full',
			'show_settings_on_create' => true,
			'params'                  => array(

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Layout', 'pandora' ),
					'class'       => 'icon-box-layout',
					'param_name'  => 'layout',
					'admin_label' => true,
					'value'     => array(
						esc_html__( 'Choose layout', 'pandora' ) => '',
						esc_html__( 'Image Left', 'pandora' )    => 'left',
						esc_html__( 'Image Right', 'pandora' )   => 'right',
					),
					'description' => esc_html__( 'Choose the layout you want to display.', 'pandora' ),
				),
				// Title
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title', 'pandora' ),
					'param_name'  => 'title',
					'admin_label' => true,
					'value'       => esc_html__( 'This is an banner box.', 'pandora' ),
					'description' => esc_html__( 'Provide the title for this banner box.', 'pandora' ),
				),
				//Use custom or default title?
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Use custom or default title?', 'pandora' ),
					'param_name'  => 'title_custom',
					'value'       => array(
						__( 'Default', 'pandora' ) => '',
						__( 'Custom', 'pandora' )  => 'custom',
					),
					'description' => esc_html__( 'If you select default you will use default title which customized in typography.', 'pandora' )
				),
				//Heading
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Heading element', 'pandora' ),
					'param_name'  => 'heading_tag',
					'value'       => array(
						'h2' => 'h2',
						'h3' => 'h3',
						'h4' => 'h4',
						'h5' => 'h5',
						'h6' => 'h6',
					),
					'description' => esc_html__( 'Choose heading type of the title.', 'pandora' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Margin', 'pandora' ),
					'param_name'  => 'title_margin',
					'admin_label' => true,
					'value'       => '0',
					'description' => esc_html__( 'Margin title for this banner box.', 'pandora' ),
				),
				//Title color
				array(
					'type'        => 'colorpicker',
					'admin_label' => true,
					'heading'     => esc_html__( 'Title color ', 'pandora' ),
					'param_name'  => 'title_color',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Select the title color.', 'pandora' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				//Title size
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => esc_html__( 'Title size ', 'pandora' ),
					'param_name'  => 'title_size',
					'min'         => 0,
					'value'       => '',
					'suffix'      => 'px',
					'description' => esc_html__( 'Select the title size.', 'pandora' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),

				//Title weight
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Title weight ', 'pandora' ),
					'param_name'  => 'title_weight',
					'value'       => array(
						__( 'Choose the title font weight', 'pandora' ) => '',
						__( 'Normal', 'pandora' )                       => 'normal',
						__( 'Bold', 'pandora' )                         => 'bold',
						__( 'Bolder', 'pandora' )                       => 'bolder',
						__( 'Lighter', 'pandora' )                      => 'lighter',
					),
					'description' => esc_html__( 'Select the title weight.', 'pandora' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				//Title style
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Title style ', 'pandora' ),
					'param_name'  => 'title_style',
					'value'       => array(
						__( 'Choose the title font style', 'pandora' ) => '',
						__( 'Italic', 'pandora' )                      => 'italic',
						__( 'Oblique', 'pandora' )                     => 'oblique',
						__( 'Initial', 'pandora' )                     => 'initial',
						__( 'Inherit', 'pandora' )                     => 'inherit',
					),
					'description' => esc_html__( 'Select the title style.', 'pandora' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				
				// Sub Title
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Sub Title', 'pandora' ),
					'param_name'  => 'subtitle',
					'admin_label' => true,
					'value'       => esc_html__( 'This is an banner box.', 'pandora' ),
					'description' => esc_html__( 'Provide the sub title for this banner box.', 'pandora' ),
				),
				//Use custom or default title?
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Use custom or default subtitle?', 'pandora' ),
					'param_name'  => 'subtitle_custom',
					'value'       => array(
						__( 'Default', 'pandora' ) => '',
						__( 'Custom', 'pandora' )  => 'custom',
					),
					'description' => esc_html__( 'If you select default you will use default title which customized in typography.', 'pandora' )
				),
				//Heading
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Heading element', 'pandora' ),
					'param_name'  => 'subheading_tag',
					'value'       => array(
						'h3' => 'h3',
						'h2' => 'h2',
						'h4' => 'h4',
						'h5' => 'h5',
						'h6' => 'h6',
					),
					'description' => esc_html__( 'Choose heading type of the subtitle.', 'pandora' ),
					'dependency'  => array(
						'element' => 'subtitle_custom',
						'value'   => 'custom',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Margin', 'pandora' ),
					'param_name'  => 'subtitle_margin',
					'admin_label' => true,
					'value'       => '0',
					'description' => esc_html__( 'Margin subtitle for this banner box.', 'pandora' ),
				),
				//SubTitle color
				array(
					'type'        => 'colorpicker',
					'admin_label' => true,
					'heading'     => esc_html__( 'Subtitle color ', 'pandora' ),
					'param_name'  => 'subtitle_color',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Select the subtitle color.', 'pandora' ),
					'dependency'  => array(
						'element' => 'subtitle_custom',
						'value'   => 'custom',
					),
				),
				//SubTitle size
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => esc_html__( 'Subtitle size ', 'pandora' ),
					'param_name'  => 'subtitle_size',
					'min'         => 0,
					'value'       => '',
					'suffix'      => 'px',
					'description' => esc_html__( 'Select the subtitle size.', 'pandora' ),
					'dependency'  => array(
						'element' => 'subtitle_custom',
						'value'   => 'custom',
					),
				),
				//SubTitle weight
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Subtitle weight ', 'pandora' ),
					'param_name'  => 'subtitle_weight',
					'value'       => array(
						__( 'Choose the title font weight', 'pandora' ) => '',
						__( 'Normal', 'pandora' )                       => 'normal',
						__( 'Bold', 'pandora' )                         => 'bold',
						__( 'Bolder', 'pandora' )                       => 'bolder',
						__( 'Lighter', 'pandora' )                      => 'lighter',
					),
					'description' => esc_html__( 'Select the subtitle weight.', 'pandora' ),
					'dependency'  => array(
						'element' => 'subtitle_custom',
						'value'   => 'custom',
					),
				),
				//Title style
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Subtitle style ', 'pandora' ),
					'param_name'  => 'subtitle_style',
					'value'       => array(
						__( 'Choose the title font style', 'pandora' ) => '',
						__( 'Italic', 'pandora' )                      => 'italic',
						__( 'Oblique', 'pandora' )                     => 'oblique',
						__( 'Initial', 'pandora' )                     => 'initial',
						__( 'Inherit', 'pandora' )                     => 'inherit',
					),
					'description' => esc_html__( 'Select the subtitle style.', 'pandora' ),
					'dependency'  => array(
						'element' => 'subtitle_custom',
						'value'   => 'custom',
					),
				),
				
				// Description
				array(
					'type'        => 'textarea',
					'admin_label' => true,
					'heading'     => esc_html__( 'Description', 'pandora' ),
					'param_name'  => 'description',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Provide the description for this icon box.', 'pandora' )
				),
				//Use custom or default description ?
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Use custom or default description?', 'pandora' ),
					'param_name'  => 'description_custom',
					'value'       => array(
						__( 'Default', 'pandora' ) => '',
						__( 'Custom', 'pandora' )  => 'custom',
					),
					'description' => esc_html__( 'If you select default you will use default description which customized in typography.', 'pandora' )
				),
				//Description color
				array(
					'type'        => 'colorpicker',
					'admin_label' => true,
					'heading'     => esc_html__( 'Description color ', 'pandora' ),
					'param_name'  => 'description_color',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Select the description color.', 'pandora' ),
					'dependency'  => array(
						'element' => 'description_custom',
						'value'   => 'custom',
					),
				),
				//Description size
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => esc_html__( 'Description size ', 'pandora' ),
					'param_name'  => 'description_size',
					'min'         => 0,
					'value'       => '',
					'suffix'      => 'px',
					'description' => esc_html__( 'Select the description size.', 'pandora' ),
					'dependency'  => array(
						'element' => 'description_custom',
						'value'   => 'custom',
					),
				),
				//Description weight
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Description weight ', 'pandora' ),
					'param_name'  => 'description_weight',
					'value'       => array(
						__( 'Choose the description font weight', 'pandora' ) => '',
						__( 'Normal', 'pandora' )                             => 'normal',
						__( 'Bold', 'pandora' )                               => 'bold',
						__( 'Bolder', 'pandora' )                             => 'bolder',
						__( 'Lighter', 'pandora' )                            => 'lighter',
					),
					'description' => esc_html__( 'Select the description weight.', 'pandora' ),
					'dependency'  => array(
						'element' => 'description_custom',
						'value'   => 'custom',
					),
				),
				//Description style
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Description style ', 'pandora' ),
					'param_name'  => 'description_style',
					'value'       => array(
						__( 'Choose the description font style', 'pandora' ) => '',
						__( 'Italic', 'pandora' )                            => 'italic',
						__( 'Oblique', 'pandora' )                           => 'oblique',
						__( 'Initial', 'pandora' )                           => 'initial',
						__( 'Inherit', 'pandora' )                           => 'inherit',
					),
					'description' => esc_html__( 'Select the description style.', 'pandora' ),
					'dependency'  => array(
						'element' => 'description_custom',
						'value'   => 'custom',
					),
				),
				// Icon type: Image - Image picker
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Choose image', 'pandora' ),
					'param_name'  => 'icon_image',
					'admin_label' => true,
					'value'       => '',
					'description' => esc_html__( 'Upload the custom image icon.', 'pandora' ),
				),
				//Image size
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image size', 'pandora' ),
					'param_name'  => 'image_size',
					'admin_label' => true,
					'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'pandora' ),
				),
				//Icon link
				array(
					'type'        => 'vc_link',
					'heading'     => __( 'Image link', 'pandora' ),
					'param_name'  => 'img_link',
					'admin_label' => true,
					'description' => __( 'Enter the link for img.', 'pandora' ),
				),

				//Display the button?
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Display the button?', 'pandora' ),
					'param_name'  => 'button_display',
					'value'       => array( esc_html__( '', 'pandora' ) => 'yes' ),
					'description' => esc_html__( 'Tick it to display the button.', 'pandora' ),
				),
				//Button link
				array(
					'type'        => 'vc_link',
					'heading'     => esc_html__( 'Button link', 'pandora' ),
					'param_name'  => 'button_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the button link', 'pandora' ),
					'dependency'  => array(
						'element' => 'button_display',
						'value'   => 'yes',
					),
				),
				//Button value
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Button value', 'pandora' ),
					'param_name'  => 'button_value',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the button value', 'pandora' ),
					'dependency'  => array(
						'element' => 'button_display',
						'value'   => 'yes',
					),
				),
				//Background Button color
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Background Button', 'pandora' ),
					'param_name'  => 'background_button',
					'value'       => '',
					'description' => esc_html__( 'Select the background button color.', 'pandora' ),
					'dependency'  => array(
						'element' => 'button_display',
						'value'   => 'yes',
					),
				),
				//Color button
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Color Button', 'pandora' ),
					'param_name'  => 'color_button',
					'value'       => '',
					'description' => esc_html__( 'Select the button color.', 'pandora' ),
					'dependency'  => array(
						'element' => 'button_display',
						'value'   => 'yes',
					),
				),
				//Border button color
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Border Button Color', 'pandora' ),
					'param_name'  => 'border_button',
					'value'       => '',
					'description' => esc_html__( 'Select the border button color.', 'pandora' ),
					'dependency'  => array(
						'element' => 'button_display',
						'value'   => 'yes',
					),
				),
				
				//Background color
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Background color', 'pandora' ),
					'param_name'  => 'background_color',
					'value'       => '',
					'description' => esc_html__( 'Select the background color.', 'pandora' ),
				),
				//Text Alignment
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Text alignment', 'pandora' ),
					'param_name'  => 'alignment',
					'value'       => array(
						__( 'Choose the text alignment', 'pandora' ) => '',
						__( 'Text at left', 'pandora' )              => 'left',
						__( 'Text at center', 'pandora' )            => 'center',
						__( 'Text at right', 'pandora' )             => 'right',
					),
				),
				// Animation
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Animation', 'pandora' ),
					'param_name'  => 'css_animation',
					'value'       => array(
						__( 'No', 'pandora' )                 => '',
						__( 'Top to bottom', 'pandora' )      => 'top-to-bottom',
						__( 'Bottom to top', 'pandora' )      => 'bottom-to-top',
						__( 'Left to right', 'pandora' )      => 'left-to-right',
						__( 'Right to left', 'pandora' )      => 'right-to-left',
						__( 'Appear from center', 'pandora' ) => 'appear'
					),
					'description' => esc_html__( 'Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'pandora' )
				),
				// Extra class
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Extra class', 'pandora' ),
					'param_name'  => 'el_class',
					'value'       => '',
					'description' => esc_html__( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'pandora' ),
				),
			)
		)
	);
	
	// Mapping shortcode Images
	vc_map(
		array(
			'name'                    => esc_html__( 'Images', 'pandora' ),
			'base'                    => 'pandora-images',
			'category'                => esc_html__( 'Pandora Widgets', 'pandora' ),
			'description'             => esc_html__( 'Display images gallery.', 'pandora' ),
			'controls'                => 'full',
			'show_settings_on_create' => true,
			'params'                  => array(

				// Get images
				array(
					'type'        => 'attach_images',
					'heading'     => esc_html__( 'Choose images', 'pandora' ),
					'param_name'  => 'images',
					'admin_label' => true,
					'value'       => '',
					'description' => esc_html__( 'Choose images from media library.', 'pandora' ),
				),
				// Images grid columns
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => esc_html__( 'Number of columns', 'pandora' ),
					'param_name'  => 'cell',
					'min'         => 1,
					'max'         => 12,
					'value'       => 5,
				),
				// Image size
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image size', 'pandora' ),
					'param_name'  => 'size',
					'admin_label' => true,
					'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'pandora' ),
				),
				// Animation
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Animation', 'pandora' ),
					'param_name'  => 'animation',
					'value'       => array(
						__( 'No', 'pandora' )                 => '',
						__( 'Top to bottom', 'pandora' )      => 'top-to-bottom',
						__( 'Bottom to top', 'pandora' )      => 'bottom-to-top',
						__( 'Left to right', 'pandora' )      => 'left-to-right',
						__( 'Right to left', 'pandora' )      => 'right-to-left',
						__( 'Appear from center', 'pandora' ) => 'appear'
					),
					'description' => esc_html__( 'Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'pandora' )
				),
				// Extra class
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Extra class', 'pandora' ),
					'param_name'  => 'el_class',
					'value'       => '',
					'description' => esc_html__( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'pandora' ),
				),
			)
		)
	);
	
	// Mapping shortcode Our Team
	vc_map(
		array(
			'name'                    => esc_html__( 'Our Team', 'pandora' ),
			'base'                    => 'pandora-our-team',
			'category'                => esc_html__( 'Pandora Widgets', 'pandora' ),
			'description'             => esc_html__( 'Display our team.', 'pandora' ),
			'controls'                => 'full',
			'show_settings_on_create' => true,
			'params'                  => array(

				// Title
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Name', 'pandora' ),
					'param_name'  => 'title',
					'admin_label' => true,
					'value'       => esc_html__( 'Name', 'pandora' ),
					'description' => esc_html__( 'Provide the nem for team member.', 'pandora' ),
				),
				// Job
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Job', 'pandora' ),
					'param_name'  => 'job',
					'admin_label' => true,
					'value'       => esc_html__( 'Job', 'pandora' ),
					'description' => esc_html__( 'Provide the job for your team.', 'pandora' ),
				),
				// Description
				array(
					'type'        => 'textarea',
					'admin_label' => true,
					'heading'     => esc_html__( 'Description', 'pandora' ),
					'param_name'  => 'description',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Provide the description for this icon box.', 'pandora' )
				),
				//Image - Image picker
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Choose image', 'pandora' ),
					'param_name'  => 'image',
					'admin_label' => true,
					'value'       => '',
					'description' => esc_html__( 'Upload the custom image icon.', 'pandora' ),
				),
				//Image size
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image size', 'pandora' ),
					'param_name'  => 'image_size',
					'admin_label' => true,
					'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'pandora' ),
				),
				//Icon link
				array(
					'type'        => 'vc_link',
					'heading'     => __( 'Image link', 'pandora' ),
					'param_name'  => 'img_link',
					'admin_label' => true,
					'description' => __( 'Enter the link for img.', 'pandora' ),
				),

				//Display the icon?
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Display the icon?', 'pandora' ),
					'param_name'  => 'icon_display',
					'value'       => array( esc_html__( '', 'pandora' ) => 'yes' ),
					'description' => esc_html__( 'Tick it to display the icon.', 'pandora' ),
				),
				//Button link
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Facebook link', 'pandora' ),
					'param_name'  => 'facebook_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the Facebook link', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_display',
						'value'   => 'yes',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Twitter link', 'pandora' ),
					'param_name'  => 'twitter_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the Twitter link', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_display',
						'value'   => 'yes',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Google+ link', 'pandora' ),
					'param_name'  => 'google_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the Google+ link', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_display',
						'value'   => 'yes',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Linkedin link', 'pandora' ),
					'param_name'  => 'linkedin_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the Linkedin link', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_display',
						'value'   => 'yes',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Instagram link', 'pandora' ),
					'param_name'  => 'instagram_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the Instagram link', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_display',
						'value'   => 'yes',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Pinterest link', 'pandora' ),
					'param_name'  => 'pinterest_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the Pinterest link', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_display',
						'value'   => 'yes',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Behance link', 'pandora' ),
					'param_name'  => 'behance_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the Behance link', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_display',
						'value'   => 'yes',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Tumblr link', 'pandora' ),
					'param_name'  => 'tumblr_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the Tumblr link', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_display',
						'value'   => 'yes',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Dribbble link', 'pandora' ),
					'param_name'  => 'dribbble_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the Dribbble link', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_display',
						'value'   => 'yes',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Youtube link', 'pandora' ),
					'param_name'  => 'youtube_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the Youtube link', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_display',
						'value'   => 'yes',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Vimeo link', 'pandora' ),
					'param_name'  => 'vimeo_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the Vimeo link', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_display',
						'value'   => 'yes',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'RSS link', 'pandora' ),
					'param_name'  => 'rss_link',
					'value'       => esc_html__( '', 'pandora' ),
					'description' => esc_html__( 'Write the RSS link', 'pandora' ),
					'dependency'  => array(
						'element' => 'icon_display',
						'value'   => 'yes',
					),
				),
				
				//Background color
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Background color', 'pandora' ),
					'param_name'  => 'background_color',
					'value'       => '',
					'description' => esc_html__( 'Select the background color.', 'pandora' ),
				),
				//Text Alignment
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Text alignment', 'pandora' ),
					'param_name'  => 'alignment',
					'value'       => array(
						__( 'Choose the text alignment', 'pandora' ) => '',
						__( 'Text at left', 'pandora' )              => 'left',
						__( 'Text at center', 'pandora' )            => 'center',
						__( 'Text at right', 'pandora' )             => 'right',
					),
				),
				// Animation
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Animation', 'pandora' ),
					'param_name'  => 'css_animation',
					'value'       => array(
						__( 'No', 'pandora' )                 => '',
						__( 'Top to bottom', 'pandora' )      => 'top-to-bottom',
						__( 'Bottom to top', 'pandora' )      => 'bottom-to-top',
						__( 'Left to right', 'pandora' )      => 'left-to-right',
						__( 'Right to left', 'pandora' )      => 'right-to-left',
						__( 'Appear from center', 'pandora' ) => 'appear'
					),
					'description' => esc_html__( 'Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'pandora' )
				),
				// Extra class
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Extra class', 'pandora' ),
					'param_name'  => 'el_class',
					'value'       => '',
					'description' => esc_html__( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'pandora' ),
				),
			)
		)
	);

	// Mapping shortcode Counter Box
	vc_map( array(
		'name'        => esc_html__( 'Counter Box', 'pandora' ),
		'base'        => 'pandora-counter-box',
		'class'       => '',
		'category'    => esc_html__( 'Pandora Widgets', 'pandora' ),
		'description' => esc_html__( 'Display counter box.', 'pandora' ),
		'params'      => array(

			//Circle box color
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Circle color', 'pandora' ),
				'param_name'  => 'b_color',
				'value'       => esc_html__( '', 'pandora' ),
				'description' => esc_html__( 'Select the circle box background color', 'pandora' )
			),
			// Count to number
			array(
				'type'        => 'number',
				'admin_label' => true,
				'value'       => 10,
				'min'         => 0,
				'heading'     => esc_html__( 'Number', 'pandora' ),
				'param_name'  => 'number',
				'description' => esc_html__( 'Enter number in box to count.', 'pandora' ),
			),
			//Number color
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Number color', 'pandora' ),
				'param_name'  => 'number_color',
				'value'       => esc_html__( '', 'pandora' ),
				'description' => esc_html__( 'Select the number color', 'pandora' )
			),
			// Text
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Text', 'pandora' ),
				'admin_label' => true,
				'param_name'  => 'text',
				'value'       => '',
				'description' => esc_html__( 'Short text in counter box.', 'pandora' ),
			),
			//Text color
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Text color', 'pandora' ),
				'param_name'  => 'text_color',
				'value'       => esc_html__( '', 'pandora' ),
				'description' => esc_html__( 'Select the text color', 'pandora' )
			),
			// Extra class
			array(
				'type'        => 'textfield',
				'admin_label' => true,
				'heading'     => esc_html__( 'Extra class', 'pandora' ),
				'param_name'  => 'el_class',
				'value'       => '',
				'description' => esc_html__( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'pandora' ),
			),
		)
	) );

	// Mapping shortcode Google Map
	vc_map(
		array(
			'name'                    => esc_html__( 'Google Map', 'pandora' ),
			'base'                    => 'pandora-google-map',
			'category'                => esc_html__( 'Pandora Widgets', 'pandora' ),
			'description'             => esc_html__( 'Display Google map.', 'pandora' ),
			'controls'                => 'full',
			'show_settings_on_create' => true,
			'params'                  => array(
				// Map center
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Map center', 'pandora' ),
					'param_name'  => 'map_center',
					'admin_label' => true,
					'value'       => '',
					'description' => esc_html__( 'The name of a place, town, city, or even a country. Can be an exact address too.', 'pandora' ),

				),
				// Map height
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => esc_html__( 'Height', 'pandora' ),
					'param_name'  => 'height',
					'min'         => 0,
					'value'       => 480,
					'suffix'      => 'px',
					'description' => esc_html__( 'Height of the map.', 'pandora' ),
				),
				// Zoom options
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => esc_html__( 'Zoom level', 'pandora' ),
					'param_name'  => 'zoom',
					'min'         => 0,
					'max'         => 21,
					'value'       => 12,
					'description' => esc_html__( 'A value from 0 (the world) to 21 (street level).', 'pandora' ),
				),
				// Show marker
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Marker', 'pandora' ),
					'param_name'  => 'marker_at_center',
					'value'       => array( esc_html__( '', 'pandora' ) => 'true' ),
					'description' => esc_html__( 'Show marker at map center.', 'pandora' ),
				),
				// Get marker
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Choose marker icon', 'pandora' ),
					'param_name'  => 'marker_icon',
					'admin_label' => true,
					'value'       => '',
					'description' => esc_html__( 'Replaces the default map marker with your own image.', 'pandora' ),
					'dependency'  => array( 'element' => 'marker_at_center', 'value' => array( 'true' ) )
				),
				// Other options
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Scroll to zoom', 'pandora' ),
					'param_name'  => 'scroll_zoom',
					'value'       => array( esc_html__( '', 'pandora' ) => 'true' ),
					'description' => esc_html__( 'Allow scrolling over the map to zoom in or out.', 'pandora' ),
				),
				// Other options
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Draggable', 'pandora' ),
					'param_name'  => 'draggable',
					'value'       => array( esc_html__( '', 'pandora' ) => 'true' ),
					'description' => esc_html__( 'Allow dragging the map to move it around.', 'pandora' ),
				),
				// Animation
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Animation', 'pandora' ),
					'param_name'  => 'animation',
					'value'       => array(
						__( 'No', 'pandora' )                 => '',
						__( 'Top to bottom', 'pandora' )      => 'top-to-bottom',
						__( 'Bottom to top', 'pandora' )      => 'bottom-to-top',
						__( 'Left to right', 'pandora' )      => 'left-to-right',
						__( 'Right to left', 'pandora' )      => 'right-to-left',
						__( 'Appear from center', 'pandora' ) => 'appear'
					),
					'description' => esc_html__( 'Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'pandora' )
				),
				// Extra class
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Extra class', 'pandora' ),
					'param_name'  => 'el_class',
					'value'       => '',
					'description' => esc_html__( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'pandora' ),
				),

			)
		)
	);
}

add_action( 'vc_before_init', 'pandora_map_vc_shortcodes' );
