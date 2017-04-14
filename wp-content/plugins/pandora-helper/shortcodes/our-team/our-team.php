<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Our Team
 *
 * @param $atts
 *
 * @return string
 */

function pandora_shortcode_our_team( $atts ) {

	$our_team = shortcode_atts( array(
		'title'              => '',
		'job'           	 => '',
		'description'        => '',
		'image'              => '',
		'image_size'         => '',
		'icon_display'     	 => '',
		'facebook_link'      => '',
		'twitter_link'     	 => '',
		'google_link'     	 => '',
		'linkedin_link'      => '',
		'instagram_link'     => '',
		'pinterest_link'     => '',
		'behance_link'       => '',
		'tumblr_link'        => '',
		'dribbble_link'      => '',
		'youtube_link'       => '',
		'vimeo_link'         => '',
		'rss_link'           => '',
		'alignment'          => '',
		'el_class'           => '',
		'css_animation'      => '',

	), $atts );

	$css_animation = pandora_getCSSAnimation( $our_team['css_animation'] );

	// Image
	$image_size = 'thumbnail';
	if ( $our_team['image_size'] ) {
		if ( in_array( $our_team['image_size'], array( 'medium', 'large', 'full' ) ) ) {
			$image_size = $our_team['image_size'];
		}

		preg_match_all( '/\d+/', $our_team['image_size'], $size_matches );
		if ( $size_matches[0] ) {
			if ( isset ( $size_matches[0][0] ) && isset ( $size_matches[0][1] ) ) {
				$image_size = array( $size_matches[0][0], $size_matches[0][1] );
			} else {
				$image_size = array( 100, 100 );
			}
		}
	}
	$image_html = wp_get_attachment_image( $our_team['image'], $image_size );

	$icon_alignment = '';
	if ( $our_team['alignment'] ) {
		$icon_alignment = 'style = "text-align: ' . $our_team['alignment'] . ';"';
	}

	//button inline style

	$social_display = '';
	if ( $our_team['icon_display'] == 'yes' ) {
		$social_display .= 'display: inline-block ;';
	} else {
		$social_display .= 'display: none;';
	}
	if ( $social_display ) {
		$social_display = ' style="' . $social_display . '"';
	}
	
	$our_team_title = '';
	if ( isset( $our_team['title'] ) && $our_team['title'] != '' ) {
		$our_team_title = '<h6 class="team-title">' . esc_html( $our_team['title'] ) . '</h6>';
	}
	
	$our_team_job = '';
	if ( isset( $our_team['job'] ) && $our_team['job'] != '' ) {
		$our_team_job = '<p><span class="company color">' . esc_html( $our_team['job'] ) . '</span></p>';
	}
	$our_team_des = '';
	if ( isset( $our_team['description'] ) && $our_team['description'] != '' ) {
		$our_team_des = '<p class="info">' . $our_team['description'] . '</p>';
	}
	
	$facebook_link = '';
	if ( isset( $our_team['facebook_link'] ) && $our_team['facebook_link'] != '' ) {
		$facebook_link = '<li><a class="facebook social-icon" href="' . esc_url( $our_team['facebook_link'] ) . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
	}
	$twitter_link = '';
	if ( isset( $our_team['twitter_link'] ) && $our_team['twitter_link'] != '' ) {
		$twitter_link = '<li><a class="twitter social-icon" href="' . esc_url( $our_team['twitter_link'] ) . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
	}
	$google_link = '';
	if ( isset( $our_team['google_link'] ) && $our_team['google_link'] != '' ) {
		$google_link = '<li><a class="google social-icon" href="' . esc_url( $our_team['google_link'] ) . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
	}
	$linkedin_link = '';
	if ( isset( $our_team['linkedin_link'] ) && $our_team['linkedin_link'] != '' ) {
		$linkedin_link = '<li><a class="linkedin social-icon" href="' . esc_url( $our_team['linkedin_link'] ) . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
	}
	$instagram_link = '';
	if ( isset( $our_team['instagram_link'] ) && $our_team['instagram_link'] != '' ) {
		$instagram_link = '<li><a class="instagram social-icon" href="' . esc_url( $our_team['instagram_link'] ) . '" target="_blank"><i class="fa fa-instagram"></i></a></li>';
	}
	$pinterest_link = '';
	if ( isset( $our_team['pinterest_link'] ) && $our_team['pinterest_link'] != '' ) {
		$pinterest_link = '<li><a class="pinterest social-icon" href="' . esc_url( $our_team['pinterest_link'] ) . '" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
	}
	$behance_link = '';
	if ( isset( $our_team['behance_link'] ) && $our_team['behance_link'] != '' ) {
		$behance_link = '<li><a class="behance social-icon" href="' . esc_url( $our_team['behance_link'] ) . '" target="_blank"><i class="fa fa-behance"></i></a></li>';
	}
	$tumblr_link = '';
	if ( isset( $our_team['tumblr_link'] ) && $our_team['tumblr_link'] != '' ) {
		$tumblr_link = '<li><a class="tumblr social-icon" href="' . esc_url( $our_team['tumblr_link'] ) . '" target="_blank"><i class="fa fa-tumblr"></i></a></li>';
	}
	$dribbble_link = '';
	if ( isset( $our_team['dribbble_link'] ) && $our_team['dribbble_link'] != '' ) {
		$dribbble_link = '<li><a class="dribbble social-icon" href="' . esc_url( $our_team['dribbble_link'] ) . '" target="_blank"><i class="fa fa-dribbble"></i></a></li>';
	}
	$youtube_link = '';
	if ( isset( $our_team['youtube_link'] ) && $our_team['youtube_link'] != '' ) {
		$youtube_link = '<li><a class="youtube social-icon" href="' . esc_url( $our_team['youtube_link'] ) . '" target="_blank"><i class="fa fa-youtube"></i></a></li>';
	}
	$vimeo_link = '';
	if ( isset( $our_team['vimeo_link'] ) && $our_team['vimeo_link'] != '' ) {
		$vimeo_link = '<li><a class="vimeo social-icon" href="' . esc_url( $our_team['vimeo_link'] ) . '" target="_blank"><i class="fa fa-vine"></i></a></li>';
	}
	$rss_link = '';
	if ( isset( $our_team['rss_link'] ) && $our_team['rss_link'] != '' ) {
		$rss_link = '<li><a class="rss social-icon" href="' . esc_url( $our_team['rss_link'] ) . '" target="_blank"><i class="fa fa-rss"></i></a></li>';
	}

	$entry_css = '';
	if ( $our_team['alignment'] ) {
		$entry_css .= 'text-align:' . $our_team['alignment'] . '; ';
	}
	if ( $our_team['background_color'] ) {
		$entry_css .= 'background-color:' . $our_team['background_color'] . '; ';
	}
	if ( $entry_css ) {
		$entry_css = ' style="' . $entry_css . '"';
	}
	$html .=
		'<div class="pandora-team-member' . $css_animation . ' ' . esc_attr( $our_team['el_class'] ) . '" ' . $entry_css . '>
			<div class="team-img relative oh">
				<div class="team-img">'.$image_html.'</div>
				<div class="team-socials" '.$social_display.'>
					<ul class="social-link">
						'.$facebook_link.'
						'.$twitter_link.'
						'.$google_link.'
						'.$linkedin_link.'
						'.$instagram_link.'
						'.$pinterest_link.'
						'.$behance_link.'
						'.$tumblr_link.'
						'.$dribbble_link.'
						'.$youtube_link.'
						'.$vimeo_link.'
						'.$rss_link.'
					</ul>
				</div>
			</div>
			<div class="team-details">
				'. $our_team_title .'
				'. $our_team_job .'
				'. $our_team_des .'
			</div>
		</div>';
		
	
	return $html;
}

add_shortcode( 'pandora-our-team', 'pandora_shortcode_our_team' );