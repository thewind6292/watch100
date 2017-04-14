<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Banner Box
 *
 * @param $atts
 *
 * @return string
 */

function pandora_shortcode_banner_box( $atts ) {

	$banner_box = shortcode_atts( array(
		'layout'             => '',
		'title'              => '',
		'heading_tag'        => 'h2',
		'title_margin'	     => '0',
		'title_color'        => '',
		'title_size'         => '',
		'title_weight'       => '',
		'title_style'        => '',
		'title_custom'       => '',
		'subtitle'           => '',
		'subheading_tag'     => 'h3',
		'subtitle_margin'	 => '0',
		'subtitle_color'     => '',
		'subtitle_size'      => '',
		'subtitle_weight'    => '',
		'subtitle_style'     => '',
		'subtitle_custom'    => '',
		'description'        => '',
		'description_color'  => '',
		'description_size'   => '',
		'description_weight' => '',
		'description_style'  => '',
		'description_custom' => '',
		'background_color'   => '',
		'icon_link'          => '',
		'icon_size'          => '40',
		'icon_color'         => '',
		'icon_image'         => '',
		'image_size'         => '',
		'button_display'     => '',
		'button_value'       => 'LEARN MORE',
		'button_link'        => '',
		'background_button'        => '',
		'color_button'        => '',
		'border_button'        => '',
		'alignment'          => '',
		'el_class'           => '',
		'css_animation'      => '',

	), $atts );

	$css_animation = pandora_getCSSAnimation( $banner_box['css_animation'] );

	$column_class = 'pull-left';
	if ( $banner_box['layout'] == 'left' ) {
		$column_class = 'pull-left';
	} elseif ( $banner_box['layout'] == 'right' ) {
		$column_class = 'pull-right';
	}

	//Title inline style
	$title_css = '';
	if ( $banner_box['title_color'] ) {
		$title_css .= 'color:' . $banner_box['title_color'] . '; ';
	}
	if ( $banner_box['title_size'] ) {
		$title_css .= 'font-size:' . $banner_box['title_size'] . 'px' . '; ';
	}
	if ( $banner_box['title_weight'] ) {
		$title_css .= 'font-weight:' . $banner_box['title_weight'] . '; ';
	}
	if ( $banner_box['title_style'] ) {
		$title_css .= 'font-style:' . $banner_box['title_style'] . '; ';
	}
	if ( $banner_box['title_margin'] ) {
		$title_css .= 'margin:' . $banner_box['title_margin'] . '; ';
	}
	if ( $title_css ) {
		$title_css = ' style="' . $title_css . '"';
	}
	
	//SubTitle inline style
	$subtitle_css = '';
	if ( $banner_box['subtitle_color'] ) {
		$subtitle_css .= 'color:' . $banner_box['subtitle_color'] . '; ';
	}
	if ( $banner_box['subtitle_size'] ) {
		$subtitle_css .= 'font-size:' . $banner_box['subtitle_size'] . 'px' . '; ';
	}
	if ( $banner_box['subtitle_weight'] ) {
		$subtitle_css .= 'font-weight:' . $banner_box['subtitle_weight'] . '; ';
	}
	if ( $banner_box['subtitle_style'] ) {
		$subtitle_css .= 'font-style:' . $banner_box['subtitle_style'] . '; ';
	}
	if ( $banner_box['subtitle_margin'] ) {
		$title_css .= 'margin:' . $banner_box['subtitle_margin'] . '; ';
	}
	if ( $subtitle_css ) {
		$subtitle_css = ' style="' . $subtitle_css . '"';
	}

	//Description inline style
	$des_css = '';
	if ( $banner_box['description_color'] ) {
		$des_css .= 'color:' . $banner_box['description_color'] . '; ';
	}
	if ( $banner_box['description_size'] ) {
		$des_css .= 'font-size:' . $banner_box['description_size'] . 'px' . '; ';
	}
	if ( $banner_box['description_weight'] ) {
		$des_css .= 'font-weight:' . $banner_box['description_weight'] . '; ';
	}
	if ( $banner_box['description_style'] ) {
		$des_css .= 'font-style:' . $banner_box['description_style'] . '; ';
	}
	if ( $des_css ) {
		$des_css = ' style="' . $des_css . '"';
	}

	// Image
	$image_size = 'thumbnail';
	if ( $banner_box['image_size'] ) {
		if ( in_array( $banner_box['image_size'], array( 'medium', 'large', 'full' ) ) ) {
			$image_size = $banner_box['image_size'];
		}

		preg_match_all( '/\d+/', $banner_box['image_size'], $size_matches );
		if ( $size_matches[0] ) {
			if ( isset ( $size_matches[0][0] ) && isset ( $size_matches[0][1] ) ) {
				$image_size = array( $size_matches[0][0], $size_matches[0][1] );
			} else {
				$image_size = array( 100, 100 );
			}
		}
	}
	$image_html = wp_get_attachment_image( $banner_box['icon_image'], $image_size );

	$icon_alignment = '';
	if ( $banner_box['alignment'] ) {
		$icon_alignment = 'style = "text-align: ' . $banner_box['alignment'] . ';"';
	}

	//button inline style

	$but_display = '';
	if ( $banner_box['button_display'] == 'yes' ) {
		$but_display .= 'display: inline-block ;';
	} else {
		$but_display .= 'display: none;';
	}
	if ( $banner_box['background_button'] ) {
		$but_display .= 'background:' . $banner_box['background_button'] . '; ';
	}
	if ( $banner_box['color_button'] ) {
		$but_display .= 'color:' . $banner_box['color_button'] . '; ';
	}
	if ( $banner_box['border_button'] ) {
		$but_display .= 'border-color:' . $banner_box['border_button'] . '; ';
	}
	if ( $but_display ) {
		$but_display = ' style="' . $but_display . '"';
	}

	$link_array  = vc_build_link( $banner_box['button_link'] );
	$button_link = '';
	if ( $link_array['url'] ) {
		$button_link .= 'href="' . esc_url( $link_array['url'] ) . '"';
	}
	if ( $link_array['title'] ) {
		$button_link .= ' title="' . esc_attr( $link_array['title'] ) . '"';
	}

	$banner_box_title = '';
	if ( isset( $banner_box['title'] ) && $banner_box['title'] != '' ) {
		$banner_box_title = '<' . $banner_box['heading_tag'] . ' ' . $title_css . ' class="title">' . esc_html( $banner_box['title'] ) . '</' . $banner_box['heading_tag'] . '>';
	}
	
	$banner_box_subtitle = '';
	if ( isset( $banner_box['subtitle'] ) && $banner_box['subtitle'] != '' ) {
		$banner_box_subtitle = '<' . $banner_box['subheading_tag'] . ' ' . $subtitle_css . ' class="subtitle">' . esc_html( $banner_box['subtitle'] ) . '</' . $banner_box['subheading_tag'] . '>';
	}
	
	$banner_box_des = '';
	if ( isset( $banner_box['description'] ) && $banner_box['description'] != '' ) {
		$banner_box_des = '<p class="des" ' . $des_css . '>' . $banner_box['description'] . '</p>';
	}

	$entry_css = '';
	if ( $banner_box['alignment'] ) {
		$entry_css .= 'text-align:' . $banner_box['alignment'] . '; ';
	}
	if ( $banner_box['background_color'] ) {
		$entry_css .= 'background-color:' . $banner_box['background_color'] . '; ';
	}
	if ( $entry_css ) {
		$entry_css = ' style="' . $entry_css . '"';
	}
	$html .=
		'<div class="banner-box' . $css_animation . ' ' . esc_attr( $banner_box['el_class'] ) . '" ' . $entry_css . '>
			<div class="banner-img '.$column_class.'">
				'.$image_html.'
			</div>
			<div class="content">
				' . $banner_box_subtitle . '
				' . $banner_box_title . '
				'. $banner_box_des .'
				<a class="banner-button" ' . $button_link . ' ' . $but_display . '>' . esc_attr( $banner_box['button_value'] ) . '</a>
			</div>
		</div>';
		
	
	return '<div class="pandora-banner-box">' . $html . '</div>';
}

add_shortcode( 'pandora-banner-box', 'pandora_shortcode_banner_box' );
