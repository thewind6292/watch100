<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Images
 *
 * @param $atts
 *
 * @return string
 */
function pandora_shortcode_images( $atts ) {

	$images   = shortcode_atts( array(
		'images'    => '',
		'cell'      => 5,
		'size'      => '',
		'animation' => '',
		'el_class'  => '',
	), $atts );
	$el_class = esc_attr( $images['el_class'] );

	$animation = pandora_getCSSAnimation( $images['animation'] );
	// get images
	$image_size = 'full';
	if ( $images['size'] ) {
		if ( in_array( $images['size'], array( 'medium', 'large', 'full' ) ) ) {
			$image_size = $images['size'];
		}

		preg_match_all( '/\d+/', $images['size'], $size_matches );
		if ( $size_matches[0] ) {
			if ( isset ( $size_matches[0][0] ) && isset ( $size_matches[0][1] ) ) {
				$image_size = array( $size_matches[0][0], $size_matches[0][1] );
			} else {
				$image_size = array( 100, 100 );
			}
		}
	}

	$cell   = intval( $images['cell'] );
	$images = explode( ',', $images['images'] );

	$html    = '<ul class="pandora-images-gallery-grid ' . $animation . ' ' . $el_class . '">';
	$percent = 100 / $cell;
	$styleli = 'style="width: ' . $percent . '%"';
	if ( $images ) {
		$count       = 0;
		$length      = count( $images );
		$mark_bottom = 0;

		if ( $length % $cell == 0 ) {
			$mark_bottom = $length - $cell;
		} else {
			$mark_bottom = $length % $cell;
		}

		foreach ( $images as $image ) {
			$class = 'isotope-item';
			$count ++;
			if ( $count % $cell == 0 ) { //Add class last
				$class .= ' last';
			}

			if ( $count > $mark_bottom ) { //Add class bottom
				$class .= ' bottom';
			}

			if ( $count % 2 == 0 ) { //Add class even
				$class .= ' even';
			}

			if ( $count > $length - 2 ) {
				$class .= ' super-bottom';
			}

			$li = '<li class="' . $class . '" ' . $styleli . '>';
			$li .= wp_get_attachment_image( $image, $image_size ) . '</li>';
			$html .= $li;
		}
	}

	$html .= "</ul>";

	return $html;
}

add_shortcode( 'pandora-images', 'pandora_shortcode_images' );

