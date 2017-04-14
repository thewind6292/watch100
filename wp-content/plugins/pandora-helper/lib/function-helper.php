<?php 

function pandora_helper_register_shortcode()
{
	/* Register Shortcode for Pandora Themes */
	if(class_exists('Pandora_BrandCarousel_Widget')) {
		add_shortcode('pandora_brand_carousel', array('Pandora_BrandCarousel_Widget', 'shortcode'));
	}

	if(class_exists('Pandora_CategoryTreeview_Widget')) {
		add_shortcode('pandora_category_treeview', array('Pandora_CategoryTreeview_Widget', 'shortcode'));
	}

	if(class_exists('Pandora_PostCarousel_Widget')) {
		add_shortcode('pandora_post_carousel', array('Pandora_PostCarousel_Widget', 'shortcode'));
	}

	if(class_exists('Pandora_PostListing_Widget')) {
		add_shortcode('pandora_post_listing', array('Pandora_PostListing_Widget', 'shortcode'));
	}

	if(class_exists('Pandora_PostRecent_Widget')) {
		add_shortcode('pandora_post_recent', array('Pandora_PostRecent_Widget', 'shortcode'));
	}

	if(class_exists('Pandora_ProductCarousel_Widget')) {
		add_shortcode('pandora_product_carousel', array('Pandora_ProductCarousel_Widget', 'shortcode'));
	}

	if(class_exists('Pandora_ProductListing_Widget')) {
		add_shortcode('pandora_product_listing', array('Pandora_ProductListing_Widget', 'shortcode'));
	}

	if(class_exists('Pandora_ProductSearch_Widget')) {
		add_shortcode('pandora_product_search', array('Pandora_ProductSearch_Widget', 'shortcode'));
	}

	if(class_exists('Pandora_SocialMedia_Widget')) {
		add_shortcode('pandora_social_media', array('Pandora_SocialMedia_Widget', 'shortcode'));
	}

	if(class_exists('Pandora_WooTestimonial_Widget')) {
		add_shortcode('pandora_woo_testimonial', array('Pandora_WooTestimonial_Widget', 'shortcode'));
	}
}

function pandora_shortcode_custom_css_class( $param_value, $prefix = '' ) {
	$css_class = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $param_value ) ? $prefix . preg_replace( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', '$1', $param_value ) : '';

	return $css_class;
}

// Add shortcodes
function pandora_brands_shortcode( $atts ) {
	global $ninjateam_amaza_options;
	$brand_index = 0;
	$ninjateam_amaza_options['brand_logos'] = isset($ninjateam_amaza_options['brand_logos']) ? $ninjateam_amaza_options['brand_logos'] :'';
	$brandfound=count($ninjateam_amaza_options['brand_logos']);

	$atts = shortcode_atts( array(
		'title'				=> '',
		'css'				=> '',
		'rowsnumber' 		=> '1',
		'items_visible' 	=> '6',
		'desktop_number' 	=> '1170,6',
		'sdesktop_number' 	=> '992,5',
		'tablet_number' 	=> '800,4',
		'stablet_number' 	=> '650,2',
		'mobile_number' 	=> '480,1',
		'add_show_icon'		=> '',
		'el_class' 			=> '',
		'type' 				=> '',
		'icon_fontawesome' 	=> '',
		'icon_openiconic' 	=> '',
		'icon_typicons' 	=> '',
		'icon_entypo' 		=> '',
		'icon_linecons' 	=> '',
	), $atts, 'ourbrands' );
	
	$el_class = $type = $icon = '';
	$items_visible	  = $desktop_number = $sdesktop_number = $tablet_number = $stablet_number = $mobile_number ='';
	$items_visible 	 .= $atts['items_visible'];
	$desktop_number  .= $atts['desktop_number'];
	$sdesktop_number .= $atts['sdesktop_number'];
	$tablet_number   .= $atts['tablet_number'];
	$stablet_number  .= $atts['stablet_number'];
	$mobile_number   .= $atts['mobile_number'];
	$css = isset( $atts['css'] ) ? $atts['css'] : '';  
	$el_class .= pandora_shortcode_custom_css_class( $css, ' ' );
	$el_class .= ' '.$atts['el_class'];
	if(!empty($atts['type'])) {
		$type = 'icon_'.$atts['type'];
	}
	else {
		$type = 'icon_fontawesome';
	}

	if(!empty($atts['add_show_icon']) && !empty($atts[$type])) {
		$icon = '<i class="'.$atts[$type].'"></i>';
		$el_class .= ' vg-icon';
	}
	
	$rowsnumber = $atts['rowsnumber'];

	$html = '';
	
	if(isset($ninjateam_amaza_options['brand_logos']) && $ninjateam_amaza_options['brand_logos']) {
		
		$html  = '<div class="wpb_text_column wpb_brand_column wpb_content_element '.$el_class.'">';
			$html  .= '<div class="wpb_wrapper">';
				if(!empty($atts['title']) && isset($atts['title'])) {
					$html .= '<div class="vg-title">';
					$html .= '<h3>'.$icon.$atts['title'].'</h3>';
					$html .= '</div>';
				}
				$html .= '<div class="brands-carousel rows-'.$rowsnumber.'">';
					foreach($ninjateam_amaza_options['brand_logos'] as $brand) {
						$brand_index ++;
						
						switch ($rowsnumber) {
							case "one":
								$html .= '<div class="group">';
								break;
							case "two":
								if ( (0 == ( $brand_index - 1 ) % 2 ) || $brand_index == 1) {
									$html .= '<div class="group">';
								}
								break;
							case "four":
								if ( (0 == ( $brand_index - 1 ) % 4 ) || $brand_index == 1) {
									$html .= '<div class="group">';
								}
								break;
						}
						
						$html .= '<div class="brands-inner">';
						$html .= '<a href="'.$brand['url'].'" title="'.$brand['title'].'">';
							$html .= '<img src="'.$brand['image'].'" alt="'.$brand['title'].'" />';
						$html .= '</a>';
						$html .= '</div>';
						
						switch ($rowsnumber) {
							case "one":
								$html .= '</div>';
								break;
							case "two":
								if ( ( ( 0 == $brand_index % 2 || $brandfound == $brand_index ))  ) { /* for odd case: $ninjateam_amaza_productsfound == $woocommerce_loop['loop'] */
									$html .= '</div>';
								}
								break;
							case "four":
								if ( ( ( 0 == $brand_index % 4 || $brandfound == $brand_index ))  ) { /* for odd case: $ninjateam_amaza_productsfound == $woocommerce_loop['loop'] */
									$html .= '</div>';
								}
								break;
						}

					}
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';
	}
	$vgwc_script = '
	<script>
		(function($) {
			"use strict";
			jQuery(document).ready(function(){
				/* Brands Logo Carousel */
				$(".brands-carousel").owlCarousel({
					items: 				'.$items_visible.',
					itemsDesktop: 		['.$desktop_number.'],
					itemsDesktopSmall: 	['.$sdesktop_number.'],
					itemsTablet: 		['.$tablet_number.'],
					itemsTabletSmall: 	['.$stablet_number.'],
					itemsMobile: 		['.$mobile_number.'],			
					slideSpeed: 		200,
					paginationSpeed: 	800,
					rewindSpeed: 		1000,				
					autoPlay: 			false,
					stopOnHover: 		false,				
					navigation: 		true,
					scrollPerPage: 		false,
					pagination: 		true,
					paginationNumbers: 	false,
					mouseDrag: 			true,
					touchDrag: 			false,
					navigationText: 	["Prev", "Next"],
					leftOffSet: 		0,
				});
			});
		})(jQuery);
	</script>';
		
	
	return $html.$vgwc_script;
}
add_shortcode( 'ourbrands', 'pandora_brands_shortcode' );

function pandora_shortcode_woocarousel( $atts ) {
	$atts = shortcode_atts( array(
		'title'				=> '',
		'alias'				=> '',
		'css'				=> '',
		'add_show_icon'		=> '',
		'el_class' 			=> '',
		'type' 				=> '',
		'icon_fontawesome' 	=> '',
		'icon_openiconic' 	=> '',
		'icon_typicons' 	=> '',
		'icon_entypo' 		=> '',
		'icon_linecons' 	=> '',
	), $atts, 'listvgwccarousel' ); 
	extract( $atts );   
	$el_class = $type = $icon = '';
	$css = isset( $atts['css'] ) ? $atts['css'] : '';  
	$el_class .= pandora_shortcode_custom_css_class( $css, ' ' );

	$el_class .= ' '.$atts['el_class'];
	if(!empty($atts['type'])) {
		$type = 'icon_'.$atts['type'];
	}
	else {
		$type = 'icon_fontawesome';
	}

	if(!empty($atts['add_show_icon'])) {
		$icon = '<i class="'.$atts[$type].'"></i>';
		$el_class .= ' vg-icon';
	}
	
	$html  = '<div class="wpb_text_column wpb_vgwc_column wpb_content_element icon '.$el_class.'">';
		$html  .= '<div class="wpb_wrapper">';
			if(!empty($atts['title']) && isset($atts['title'])) {
				$html .= '<div class="vg-title">';
				$html .= '<h3>'.$icon.$atts['title'].'</h3>';
				$html .= '</div>';
			}
			$html .= do_shortcode("[vgwc id=".$atts['alias']."]") ;
		$html .= '</div>';
	$html .= '</div>';
	return $html;
}
add_shortcode( 'listvgwccarousel', 'pandora_shortcode_woocarousel' );

function pandora_shortcode_postcarousel( $atts ) {
	$atts = shortcode_atts( array(
		'title'				=> '',
		'alias'				=> '',
		'css'				=> '',
		'add_show_icon'		=> '',
		'el_class' 			=> '',
		'type' 				=> '',
		'icon_fontawesome' 	=> '',
		'icon_openiconic' 	=> '',
		'icon_typicons' 	=> '',
		'icon_entypo' 		=> '',
		'icon_linecons' 	=> '',
	), $atts, 'listvgpccarousel' ); 
	extract( $atts );
	$el_class = $type = $icon = '';
	$css = isset( $atts['css'] ) ? $atts['css'] : '';  
	$el_class .= pandora_shortcode_custom_css_class( $css, ' ' );
	$el_class .= ' '.$atts['el_class'];
	if(!empty($atts['type'])) {
		$type = 'icon_'.$atts['type'];
	}
	else {
		$type = 'icon_fontawesome';
	}

	if(!empty($atts['add_show_icon'])) {
		$icon = '<i class="'.$atts[$type].'"></i>';
		$el_class .= ' vg-icon';
	}
	
	$html  = '<div class="wpb_text_column wpb_vgwc_column wpb_content_element '.$el_class.'">';
		$html  .= '<div class="wpb_wrapper">';
			if(!empty($atts['title']) && isset($atts['title'])) {
			$html .= '<div class="vg-title">';
				$html .= '<h3>'.$icon.$atts['title'].'</h3>';
			$html .= '</div>';
			}
			$html .= do_shortcode("[vgpc id=".$atts['alias']."]") ;
		$html .= '</div>';
	$html .= '</div>';
	return $html;
}
add_shortcode( 'listvgpccarousel', 'pandora_shortcode_postcarousel' );

function pandora_icon_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'icon' => ''
	), $atts, 'ninjateam_amaza_icon' );
	
	$html = '<i class="fa '.$atts['icon'].'"></i>';
	
	
	return $html;
}
add_shortcode( 'pandoraicon', 'pandora_icon_shortcode' );

//Add less compiler
function compileLessFile($input, $output, $params) {
    // include lessc.inc
    require_once( PANDORA_PATH.'less/lessc.inc.php' );
	
	$less = new lessc;
	$less->setVariables($params);
	
    // input and output location
    $inputFile = get_template_directory().'/less/'.$input;
    $outputFile = get_template_directory().'/css/'.$output;

    $less->compileFile($inputFile, $outputFile);
}

function pandora_excerpt_by_id($post, $length = 10, $tags = '<a><em><strong>') {
 
	if(is_int($post)) {
		// get the post object of the passed ID
		$post = get_post($post);
	} elseif(!is_object($post)) {
		return false;
	}
 
	if(has_excerpt($post->ID)) {
		$the_excerpt = $post->post_excerpt;
		return apply_filters('the_content', $the_excerpt);
	} else {
		$the_excerpt = $post->post_content;
	}
 
	$the_excerpt = strip_shortcodes(strip_tags($the_excerpt), $tags);
	$the_excerpt = preg_split('/\b/', $the_excerpt, $length * 2+1);
	$excerpt_waste = array_pop($the_excerpt);
	$the_excerpt = implode($the_excerpt);
 
	return apply_filters('the_content', $the_excerpt);
}

function pandora_blog_sharing() {
	global $post, $ninjateam_amaza_options;
	
	$share_url = get_permalink( $post->ID );
	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
	$postimg = $large_image_url[0];
	$posttitle = get_the_title( $post->ID );
	?>
	<div class="widget widget_socialsharing_widget">
		<h3 class="widget-title"><?php if(isset($ninjateam_amaza_options['blog_share_title'])) { echo esc_html($ninjateam_amaza_options['blog_share_title']); } else { esc_html_e('Share :', 'pandora-cover'); } ?></h3>
		<ul class="social-icons">
			<li><a class="facebook social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://www.facebook.com/sharer/sharer.php?u='.$share_url; ?>'); return false;" title="Facebook" target="_blank"><?php echo esc_html__('Facebook', 'pandora-cover'); ?></a><span class="separator">,</span></li>
			<li><a class="twitter social-icon" href="#" title="Twitter" onclick="javascript: window.open('<?php echo 'https://twitter.com/home?status='.$posttitle.'&nbsp;'.$share_url; ?>'); return false;" target="_blank"><?php echo esc_html__('Twitter', 'pandora-cover'); ?></a><span class="separator">,</span></li>
			<li><a class="pinterest social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://pinterest.com/pin/create/button/?url='.$share_url.'&amp;media='.$postimg.'&amp;description='.$posttitle; ?>'); return false;" title="Pinterest" target="_blank"><?php echo esc_html__('Pinterest', 'pandora-cover'); ?></a><span class="separator">,</span></li>
			<li><a class="gplus social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://plus.google.com/share?url='.$share_url; ?>'); return false;" title="Google +" target="_blank"><?php echo esc_html__('Google Plus', 'pandora-cover'); ?></a><span class="separator">,</span></li>
			<li><a class="linkedin social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://www.linkedin.com/shareArticle?mini=true&amp;url='.$share_url.'&amp;title='.$posttitle; ?>'); return false;" title="LinkedIn" target="_blank"><?php echo esc_html__('LinkedIn', 'pandora-cover'); ?></a></li>
		</ul>
	</div>
	<?php
}

function pandora_product_sharing() {

	if(isset($_POST['data'])) { // for the quickview
		$postid = intval( $_POST['data'] );
	} else {
		$postid = get_the_ID();
	}
	
	$share_url = get_permalink( $postid );

	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'large' );
	$postimg = $large_image_url[0];
	$posttitle = get_the_title( $postid );
	?>
	<div class="widget widget_socialsharing_widget">
		<ul class="social-icons">
			<li><a class="facebook social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://www.facebook.com/sharer/sharer.php?u='.$share_url; ?>'); return false;" title="Facebook" target="_blank"><?php echo esc_html__('Facebook', 'pandora-cover'); ?></a><span class="separator">/</span></li>
			<li><a class="twitter social-icon" href="#" title="Twitter" onclick="javascript: window.open('<?php echo 'https://twitter.com/home?status='.$posttitle.'&nbsp;'.$share_url; ?>'); return false;" target="_blank"><?php echo esc_html__('Twitter', 'pandora-cover'); ?></a> <span class="separator">/</span></li>
			<li><a class="pinterest social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://pinterest.com/pin/create/button/?url='.$share_url.'&amp;media='.$postimg.'&amp;description='.$posttitle; ?>'); return false;" title="Pinterest" target="_blank"><?php echo esc_html__('Pinterest', 'pandora-cover'); ?></a><span class="separator">/</span></li>
			<li><a class="gplus social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://plus.google.com/share?url='.$share_url; ?>'); return false;" title="Google +" target="_blank"><?php echo esc_html__('Google Plus', 'pandora-cover'); ?></a><span class="separator">/</span></li>
			<li><a class="linkedin social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://www.linkedin.com/shareArticle?mini=true&amp;url='.$share_url.'&amp;title='.$posttitle; ?>'); return false;" title="LinkedIn" target="_blank"><?php echo esc_html__('LinkedIn', 'pandora-cover'); ?></a><span class="separator">/</span></li>
		</ul>
	</div>
	<?php
}

function pandora_getCSSAnimation( $css_animation ) {
	$output = '';
	if ( $css_animation != '' ) {
		wp_enqueue_script( 'waypoints' );
		$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation;
	}

	return $output;
}