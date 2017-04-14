<?php
/**
 * Plugin Name: Pandora Helper
 * Plugin URI: http://pandora.com/
 * Description: The helper plugin for pandora themes.
 * Version: 1.0.0
 * Author: pandora
 * Author URI: http://pandora.com/
 * Text Domain: pandora
 * License: GPL/GNU.
  *  Copyright 2014  pandora  (email : support@pandora.com)
  *
  *  This program is free software; you can redistribute it and/or modify
  *  it under the terms of the GNU General Public License, version 2, as 
  *  published by the Free Software Foundation.
  *
  *  This program is distributed in the hope that it will be useful,
  *  but WITHOUT ANY WARRANTY; without even the implied warranty of
  *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  *  GNU General Public License for more details.
  *
  *  You should have received a copy of the GNU General Public License
  *  along with this program; if not, write to the Free Software
  * 
*/

if(!defined('ABSPATH')) die('-1');

define( 'PANDORA_PATH', plugin_dir_path( __FILE__ ) );
define( 'PANDORA_URL', plugin_dir_url( __FILE__ ) );

require_once( PANDORA_PATH . 'lib/testimonials.php' );

require_once( PANDORA_PATH . 'lib/function-helper.php' );

/**
 * Translations
 */
function pandora_add_script() {
   
    wp_enqueue_script( 'pandora-js', PANDORA_URL . 'js/plugins.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'custom-js', PANDORA_URL . 'js/custom.js', array( 'jquery' ), '', true );

}
add_action( 'wp_enqueue_scripts', 'pandora_add_script' );

function pandora_init() {
	// Depend on Visual Composer
	if ( ! class_exists( 'Vc_Manager' ) ) {
		return;
	}

	// Prepare translation
	$locale        = apply_filters( 'plugin_locale', get_locale(), 'pandora' );
	$lang_dir      = PANDORA_PATH . 'languages/';
	$mofile        = sprintf( '%s.mo', $locale );
	$mofile_local  = $lang_dir . $mofile;
	$mofile_global = WP_LANG_DIR . '/plugins/' . $mofile;

	if ( file_exists( $mofile_global ) ) {
		load_textdomain( 'pandora', $mofile_global );
	} else {
		load_textdomain( 'pandora', $mofile_local );
	}


	// Map shortcodes to Visual Composer
	require_once( PANDORA_PATH . 'shortcodes/vc-map.php' );

	// Register new parameters for shortcodes
	require_once( PANDORA_PATH . 'shortcodes/functions.php' );

	// Embed stuff for Visual Composer
	require_once( PANDORA_PATH . 'shortcodes/vc-embed.php' );

	require_once( PANDORA_PATH . 'shortcodes/icon-box/icon-box.php' );
	require_once( PANDORA_PATH . 'shortcodes/banner-box/banner-box.php' );
	require_once( PANDORA_PATH . 'shortcodes/counter-box/counter-box.php' );
	require_once( PANDORA_PATH . 'shortcodes/google-map/google-map.php' );
	require_once( PANDORA_PATH . 'shortcodes/images/images.php' );
	require_once( PANDORA_PATH . 'shortcodes/our-team/our-team.php' );

	require_once( PANDORA_PATH . 'elements/post-listing.php' );
	require_once( PANDORA_PATH . 'elements/post-carousel.php' );
	require_once( PANDORA_PATH . 'elements/post-recent.php' );
	require_once( PANDORA_PATH . 'elements/brand-carousel.php' );
	require_once( PANDORA_PATH . 'elements/testimonial/admin.php' );
	require_once( PANDORA_PATH . 'elements/testimonial/shortcode.php' );
	require_once( PANDORA_PATH . 'elements/category-treeview.php' );
	require_once( PANDORA_PATH . 'elements/social-media.php' );
	require_once( PANDORA_PATH . 'elements/product-search.php' );
	
	if (class_exists('WooCommerce')){
		// Product Carousel Widget
		require_once(PANDORA_PATH . 'elements/product-carousel.php');
	}

	if (class_exists('WooCommerce')){
		// Product Listing Widget
		require_once(PANDORA_PATH . 'elements/product-listing.php');
	}

	// Register Shortcode
	if(function_exists('pandora_helper_register_shortcode')) {
		pandora_helper_register_shortcode();
	}
}
add_action( 'plugins_loaded', 'pandora_init' );