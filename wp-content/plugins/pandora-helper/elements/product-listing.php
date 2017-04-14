<?php
/*
 * This is Product Listing widget
 */

// don't load directly
if(!defined('ABSPATH')) die('-1');


// registered Product Listing widget
if(! function_exists('pandora_product_listing_widget'))
{
	function pandora_product_listing_widget() {
		register_widget('Pandora_ProductListing_Widget');
	}
}
add_action('widgets_init', 'pandora_product_listing_widget');


// get Product Listing theme
if(! function_exists('pandora_product_listing_themes'))
{
	function pandora_product_listing_themes($active, $type = "list") {
		$themes = ($type == "list") ? "" : array();
		$path 	= get_template_directory() . '/vc-templates/product-listing';
		$files 	= pandora_get_all_files($path);
		$active = str_replace(".php","",$active);
		for($i = 0; $i < count($files); $i++) {
			if($type == "list") {
				$files[$i]    = str_replace(".php","",$files[$i]);
				$themes .= '<option value="'. esc_attr($files[$i]) .'"'.(($files[$i] == $active) ? ' selected="selected"' : '') .'>'. $files[$i] .'</option>';
			}
			else {
				$themes = array_merge($themes, array($files[$i] => $files[$i]));
			}
		}
		
		return $themes;
	}
}


// get option Product Listing theme
if(! function_exists('pandora_option_product_listing_themes'))
{
	function pandora_option_product_listing_themes(){
		$pandora_product_listing_themes        = pandora_product_listing_themes("","array");
		$pandora_option_product_listing_themes = array();
		foreach ($pandora_product_listing_themes as $key => $value) {
			$pandora_option_product_listing_themes_item    = str_replace(".php","",$value);
			$pandora_option_product_listing_themes_image   = str_replace(".php",".jpg",$value);
			$pandora_option_product_listing_themes[$pandora_option_product_listing_themes_item] = get_template_directory_uri() . '/vc-templates/product-listing/'.$pandora_option_product_listing_themes_image;
		}
		return $pandora_option_product_listing_themes;
	}
}

// function get WooCommerce categories
if(! function_exists('pandora_get_categories_list'))
{
	function pandora_get_categories_list($parent = 0, $active = array(), $level = "") 
	{
		$cats = get_terms('product_cat' , array('hide_empty' => false, 'hierarchical' => true, 'parent' => $parent));
		
		if(!empty($cats)) {
			foreach($cats as $cat) {
				$return  .= '<option value="'.esc_attr($cat->slug).'"'.((in_array($cat->slug, $active)) ? ' selected="selected"' : '').'>'.$level.$cat->name.'</option>';
				$return  .= pandora_get_categories_list($cat->term_id, $active, $level . "--");
			}		
		}
		
		return $return;
	}
}

// function get WooCommerce categories
if(! function_exists('pandora_get_categories_array'))
{
	function pandora_get_categories_array($results = array(), $parent = 0) 
	{
		$cats = get_terms('product_cat' , array('hide_empty' => false, 'hierarchical' => true, 'parent' => $parent));
		
		if(!empty($cats)) {
			foreach($cats as $cat) {
				$results = array_merge($results, array($cat->name => $cat->slug));
				$results = pandora_get_categories_array($results, $cat->term_id);
			}		
		}
		
		return $results;
	}
}


// Pandora Product Listing Widget Class
if(! class_exists('Pandora_ProductListing_Widget')) 
{
	class Pandora_ProductListing_Widget extends WP_Widget 
	{	
		/**
		 * Register widget with WordPress.
		 */
		
		public function __construct() 
		{
			parent::__construct(
				'pandora_product_listing', // Base ID
				esc_html__('Pandora Product Listing', 'pandora'), // Name
				array('description' => esc_html__('A widget that display products of WooCommerce in Listing.', 'pandora')) // Args
			);
		}
		
		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		 
		public function widget($args, $instance) 
		{
			$categories		= !empty($instance['categories']) ? sanitize_text_field($instance['categories']) : "all";
			$order_by		= !empty($instance['order_by']) ? $instance['order_by'] : "date";
			$order			= !empty($instance['order']) ? $instance['order'] : "desc";
			$carousel_type  = !empty($instance['carousel_type']) ? $instance['carousel_type'] : "latest";			
			$carousel_theme = !empty($instance['carousel_theme']) ? $instance['carousel_theme'] : "default";
			$carousel_theme = $carousel_theme.".php";

			$total_product	= !empty($instance['total_product']) ? intval($instance['total_product']) : 12;			
			$row_carousel	= !empty($instance['row_carousel']) ? intval($instance['row_carousel']) : 1;
			
			/* Query Data */
			switch($carousel_type) {
				case "featured":
					$query = array(
						'post_type' 	=> 'product',
						'post_status' 	=> 'publish',
						'orderby' 		=> $order_by,
						'order' 		=> $order,
						'meta_query' 	=> array(
							array(
								'key' 	=> '_featured',
								'value' => 'yes',
						)),
						'posts_per_page' 	=> $total_product,
					);
					$query = ($categories == 'all') ? $query : array_merge($query, array("product_cat" => $categories));
				break;
				case "onsale":
					$query = array(
						'post_type' 		=> 'product',
						'post_status' 		=> 'publish',
						'orderby' 			=> $order_by,
						'order' 			=> $order,
						'posts_per_page' 	=> $total_product,
						'meta_query' 		=> array(
							array(
							'key' => '_visibility',
							'value' => array('catalog', 'visible'),
							'compare' => 'IN'
							),
							array(
							'key' => '_sale_price',
							'value' => 0,
							'compare' => '>',
							'type' => 'NUMERIC'
							)
						)
					);
					$query = ($categories == 'all') ? $query : array_merge($query, array("product_cat" => $categories));
				break;
				default:
					$query = array(
						'post_type' 		=> 'product',
						'post_status' 		=> 'publish',
						'orderby' 			=> $order_by,
						'order' 			=> $order,
						'posts_per_page' 	=> $total_product,
					);
					$query = ($categories == 'all') ? $query : array_merge($query, array("product_cat" => $categories));
				break;
			}
			
			$pandora_query 		= new WP_Query($query);
			$total_items 	= count($pandora_query->posts);
			$total_loop 	= ceil($total_items/$row_carousel);
			$key_loop   	= 0;
			$return_content = '<p>'. esc_html__("No item found. Please check your config(*_*)", "pandora") .'</p>';

			if($total_items && is_file(get_template_directory() . '/vc-templates/product-listing/' . $carousel_theme)) {
				include get_template_directory() . '/vc-templates/product-listing/' . $carousel_theme;
			}
			
			/* Reset Query */
			wp_reset_postdata();
			
			if($args != 'shortcode') {
				$title = apply_filters('widget_title', $instance['title']);
				
				echo($args['before_widget']);
				
					if(! empty($title)) echo($args['before_title']). esc_html($title) .$args['after_title'];
					echo($return_content);
					
				echo $args['after_widget'];
				
			}
			else {
				return $return_content;
			}
		}
		
		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form($instance) 
		{
			$random = substr( md5(rand()), 0, 5 );

			$title 			= !empty($instance['title']) ? $instance['title'] : esc_html__('New title', 'pandora');
			$unique_id 		= !empty($instance['unique_id']) ? $instance['unique_id'] : "pandora-product-listing-".$random;
			$class 			= !empty($instance['class_suffix']) ? $instance['class_suffix'] : "";
			
			$cActive		= !empty($instance['categories']) ? explode(",", $instance['categories']) : array();			
			$carousel_type  = !empty($instance['carousel_type']) ? $instance['carousel_type'] : "latest";
			$categories 	= pandora_get_categories_list(0, $cActive);
			$order_by		= !empty($instance['order_by']) ? $instance['order_by'] : "date";
			$order			= !empty($instance['order']) ? $instance['order'] : "desc";
			$carousel_theme = !empty($instance['carousel_theme']) ? $instance['carousel_theme'] : "default";
			$carousel_theme = $carousel_theme.".php";

			$total_product	= !empty($instance['total_product']) ? $instance['total_product'] : "12";
			$items_visible  = !empty($instance['items_visible']) ? $instance['items_visible'] : "4";
			$row_carousel	= !empty($instance['row_carousel']) ? $instance['row_carousel'] : "1";
			
			if(isset($instance['product_image'])):
				$product_image     = !empty($instance['product_image']) ? $instance['product_image'] : "0";
			else:
				$product_image     = 1;
			endif;

			if(isset($instance['product_title'])):
				$product_title     = !empty($instance['product_title']) ? $instance['product_title'] : "0";
			else:
				$product_title     = 1;
			endif;
			
			if(isset($instance['product_rating'])):
				$product_rating     = !empty($instance['product_rating']) ? $instance['product_rating'] : "0";
			else:
				$product_rating     = 1;
			endif;

			if(isset($instance['product_price'])):
				$product_price     = !empty($instance['product_price']) ? $instance['product_price'] : "0";
			else:
				$product_price     = 1;
			endif;

			if(isset($instance['product_description'])):
				$product_description     = !empty($instance['product_description']) ? $instance['product_description'] : "0";
			else:
				$product_description     = 1;
			endif;

			if(isset($instance['product_button_add_to_cart'])):
				$product_button_add_to_cart     = !empty($instance['product_button_add_to_cart']) ? $instance['product_button_add_to_cart'] : "0";
			else:
				$product_button_add_to_cart     = 1;
			endif;

			if(isset($instance['product_button_wishlist'])):
				$product_button_wishlist     = !empty($instance['product_button_wishlist']) ? $instance['product_button_wishlist'] : "0";
			else:
				$product_button_wishlist     = 1;
			endif;

			if(isset($instance['product_button_compare'])):
				$product_button_compare     = !empty($instance['product_button_compare']) ? $instance['product_button_compare'] : "0";
			else:
				$product_button_compare     = 1;
			endif;

			if(isset($instance['product_button_quickview'])):
				$product_button_quickview     = !empty($instance['product_button_quickview']) ? $instance['product_button_quickview'] : "0";
			else:
				$product_button_quickview     = 1;
			endif;
			
			$product_image_size  = !empty($instance['product_image_size']) ? $instance['product_image_size'] : "thumbnail";
			$limit_text_description     = !empty($instance['limit_text_description']) ? $instance['limit_text_description'] : "20";
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('unique_id')); ?>"><?php esc_html_e('Unique ID:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('unique_id')); ?>" name="<?php echo esc_attr($this->get_field_name('unique_id')); ?>" type="text" value="<?php echo esc_attr($unique_id); ?>">
				<em><?php _e('Enter unique ID for this listing. Eg: pandora-product-listing, pandora-product-listing-1, pandora-product-listing-2 ...', 'pandora'); ?></em>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('class_suffix')); ?>"><?php esc_html_e('Class Suffix:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('class_suffix')); ?>" name="<?php echo esc_attr($this->get_field_name('class_suffix')); ?>" type="text" value="<?php echo esc_attr($class); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('carousel_type')); ?>"><?php esc_html_e('Listing Type', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('carousel_type')); ?>" id="<?php echo esc_attr($this->get_field_id('carousel_type')); ?>">				
					<option value="all"<?php echo($carousel_type == 'all') ? ' selected="selected"' : ""; ?>><?php esc_html_e('All Products', 'pandora'); ?></option>
					<option value="featured"<?php echo($carousel_type == 'featured') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Featured Products', 'pandora'); ?></option>
					<option value="onsale"<?php echo($carousel_type == 'onsale') ? ' selected="selected"' : ""; ?>><?php esc_html_e('On-sale Products', 'pandora'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Filter by Categories(No select = All)', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('categories')); ?>[]" id="<?php echo esc_attr($this->get_field_id('categories')); ?>" multiple="true">				
					<?php echo ($categories); ?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('order_by')); ?>"><?php esc_html_e('Order by:', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('order_by')); ?>" id="<?php echo esc_attr($this->get_field_id('order_by')); ?>">				
					<option value="date"<?php echo($order_by == 'date') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Date', 'pandora'); ?></option>
					<option value="price"<?php echo($order_by == 'price') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Price', 'pandora'); ?></option>
					<option value="rand"<?php echo($order_by == 'rand') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Random', 'pandora'); ?></option>
					<option value="sales"<?php echo($order_by == 'sales') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Sales', 'pandora'); ?></option>								
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('order')); ?>"><?php esc_html_e('Order:', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('order')); ?>" id="<?php echo esc_attr($this->get_field_id('order')); ?>">				
					<option value="desc"<?php echo($order == 'desc') ? ' selected="selected"' : ""; ?>><?php esc_html_e('DESC', 'pandora'); ?></option>
					<option value="asc"<?php echo($order == 'asc') ? ' selected="selected"' : ""; ?>><?php esc_html_e('ASC', 'pandora'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('carousel_theme')); ?>"><?php esc_html_e('Listing Theme', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('carousel_theme')); ?>" id="<?php echo esc_attr($this->get_field_id('carousel_theme')); ?>">				
					<?php echo pandora_product_listing_themes($carousel_theme); ?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('total_product')); ?>"><?php esc_html_e('Total Products:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('total_product')); ?>" name="<?php echo esc_attr($this->get_field_name('total_product')); ?>" type="text" value="<?php echo esc_attr($total_product); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('items_visible')); ?>"><?php esc_html_e('Items Visible:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('items_visible')); ?>" name="<?php echo esc_attr($this->get_field_name('items_visible')); ?>" type="text" value="<?php echo esc_attr($items_visible); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('row_carousel')); ?>"><?php esc_html_e('Row of Listing:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('row_carousel')); ?>" name="<?php echo esc_attr($this->get_field_name('row_carousel')); ?>" type="text" value="<?php echo esc_attr($row_carousel); ?>">
			</p>
			<p> <b>Product Setting</b> </p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('product_image')); ?>"><?php esc_html_e('Product Image', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_image')); ?>" name="<?php echo esc_attr($this->get_field_name('product_image')); ?>" type="radio" value="0" <?php echo($product_image==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_image')); ?>" name="<?php echo esc_attr($this->get_field_name('product_image')); ?>" type="radio" value="1" <?php echo($product_image==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('product_image_size')); ?>"><?php esc_html_e('Product Image Size', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('product_image_size')); ?>" id="<?php echo esc_attr($this->get_field_id('product_image_size')); ?>">				
					<option value="thumbnail">Thumbnail</option>
					<option value="medium">Medium resolution</option>
					<option value="large">Large resolution</option>
					<option value="full">Original image resolution</option>
				</select>
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('product_title')); ?>"><?php esc_html_e('Product Title', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_title')); ?>" name="<?php echo esc_attr($this->get_field_name('product_title')); ?>" type="radio" value="0" <?php echo($product_title==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_title')); ?>" name="<?php echo esc_attr($this->get_field_name('product_title')); ?>" type="radio" value="1" <?php echo($product_title==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('product_rating')); ?>"><?php esc_html_e('Product Rating', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_rating')); ?>" name="<?php echo esc_attr($this->get_field_name('product_rating')); ?>" type="radio" value="0" <?php echo($product_rating==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_rating')); ?>" name="<?php echo esc_attr($this->get_field_name('product_rating')); ?>" type="radio" value="1" <?php echo($product_rating==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('product_price')); ?>"><?php esc_html_e('Product Price', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_rating')); ?>" name="<?php echo esc_attr($this->get_field_name('product_price')); ?>" type="radio" value="0" <?php echo($product_price==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_price')); ?>" name="<?php echo esc_attr($this->get_field_name('product_price')); ?>" type="radio" value="1" <?php echo($product_price==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('product_description')); ?>"><?php esc_html_e('Product Description', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_rating')); ?>" name="<?php echo esc_attr($this->get_field_name('product_description')); ?>" type="radio" value="0" <?php echo($product_description==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_description')); ?>" name="<?php echo esc_attr($this->get_field_name('product_description')); ?>" type="radio" value="1" <?php echo($product_description==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('limit_text_description')); ?>"><?php esc_html_e('Limit Text Description:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('limit_text_description')); ?>" name="<?php echo esc_attr($this->get_field_name('limit_text_description')); ?>" type="text" value="<?php echo esc_attr($limit_text_description); ?>">
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('product_button_add_to_cart')); ?>"><?php esc_html_e('Button Add to Cart', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_button_add_to_cart')); ?>" name="<?php echo esc_attr($this->get_field_name('product_button_add_to_cart')); ?>" type="radio" value="0" <?php echo($product_button_add_to_cart==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_button_add_to_cart')); ?>" name="<?php echo esc_attr($this->get_field_name('product_button_add_to_cart')); ?>" type="radio" value="1" <?php echo($product_button_add_to_cart==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('product_button_wishlist')); ?>"><?php esc_html_e('Button Wishlist', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_button_wishlist')); ?>" name="<?php echo esc_attr($this->get_field_name('product_button_wishlist')); ?>" type="radio" value="0" <?php echo($product_button_wishlist==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_button_wishlist')); ?>" name="<?php echo esc_attr($this->get_field_name('product_button_wishlist')); ?>" type="radio" value="1" <?php echo($product_button_wishlist==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('product_button_compare')); ?>"><?php esc_html_e('Button Compare', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_button_compare')); ?>" name="<?php echo esc_attr($this->get_field_name('product_button_compare')); ?>" type="radio" value="0" <?php echo($product_button_compare==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_button_compare')); ?>" name="<?php echo esc_attr($this->get_field_name('product_button_compare')); ?>" type="radio" value="1" <?php echo($product_button_compare==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('product_button_quickview')); ?>"><?php esc_html_e('Button Quickview', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_button_quickview')); ?>" name="<?php echo esc_attr($this->get_field_name('product_button_quickview')); ?>" type="radio" value="0" <?php echo($product_button_quickview==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('product_button_quickview')); ?>" name="<?php echo esc_attr($this->get_field_name('product_button_quickview')); ?>" type="radio" value="1" <?php echo($product_button_quickview==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			
				
			<?php
		}
		
		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update($new_instance, $old_instance) 
		{
			$instance = array();
			
			$instance['title'] 		  	= !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
			$instance['unique_id'] 		= !empty($new_instance['unique_id']) ? strip_tags($new_instance['unique_id']) : 'pandora-product-carousel';
			$instance['class_suffix'] 	= !empty($new_instance['class_suffix']) ? strip_tags($new_instance['class_suffix']) : '';
			$instance['carousel_type'] 	= !empty($new_instance['carousel_type']) ? strip_tags($new_instance['carousel_type']) : 'latest';
			$instance['categories']   	= is_array($new_instance['categories']) ? implode(",", $new_instance['categories']) : 'all';
			$instance['order_by'] 		= !empty($new_instance['order_by']) ? strip_tags($new_instance['order_by']) : 'date';
			$instance['order'] 			= !empty($new_instance['order']) ? strip_tags($new_instance['order']) : 'desc';
			$instance['carousel_theme'] = !empty($new_instance['carousel_theme']) ? strip_tags($new_instance['carousel_theme']) : 'default';
			$instance['total_product'] 	= !empty($new_instance['total_product']) ? intval($new_instance['total_product']) : '12';
			$instance['items_visible'] 	= !empty($new_instance['items_visible']) ? intval($new_instance['items_visible']) : '4';
			$instance['row_carousel'] 	= !empty($new_instance['row_carousel']) ? intval($new_instance['row_carousel']) : '1';

			$instance['product_image'] 	= !empty($new_instance['product_image']) ? intval($new_instance['product_image']) : "0";
			$instance['product_image_size'] = !empty($new_instance['product_image_size']) ? strip_tags($new_instance['product_image_size']) : 'thumbnail';
			$instance['product_title'] 	= !empty($new_instance['product_title']) ? intval($new_instance['product_title']) : "0";
			$instance['product_rating'] = !empty($new_instance['product_rating']) ? intval($new_instance['product_rating']) : "0";
			$instance['product_price'] 	= !empty($new_instance['product_price']) ? intval($new_instance['product_price']) : "0";
			$instance['product_description'] 	    = !empty($new_instance['product_description']) ? intval($new_instance['product_description']) : "0";
			$instance['limit_text_description'] 	= !empty($new_instance['limit_text_description']) ? intval($new_instance['limit_text_description']) : "20";
			$instance['product_button_add_to_cart'] = !empty($new_instance['product_button_add_to_cart']) ? intval($new_instance['product_button_add_to_cart']) : "0";
			$instance['product_button_wishlist'] 	= !empty($new_instance['product_button_wishlist']) ? intval($new_instance['product_button_wishlist']) : "0";
			$instance['product_button_compare'] 	= !empty($new_instance['product_button_compare']) ? intval($new_instance['product_button_compare']) : "0";
			$instance['product_button_quickview'] 	= !empty($new_instance['product_button_quickview']) ? intval($new_instance['product_button_quickview']) : "0"; 
			
			return $instance;
		}
		
		/**
		 * Create Shortcode for this widget
		 * [pandora_product_listing class_suffix="WIDGET_CLASS_SUFFIX" ...]
		 */
		 
		public static function shortcode($atts, $content = "")
		{
			$widget = new Pandora_ProductListing_Widget;
			return $widget->widget("shortcode", $atts);
		}
	}
}

// Add this widget to Visual Composer
if(! class_exists('PandoraProductListingAddonClass')) 
{
	class PandoraProductListingAddonClass 
	{
		function __construct() {
			 add_action('init', array($this, 'integrateWithVC'));
		}
		
		public function integrateWithVC() {
			// Check if Visual Composer is installed
			if(! defined('WPB_VC_VERSION')) {
				// Display notice that Visual Compser is required
				add_action('admin_notices', array($this, 'showVcVersionNotice'));
				return;
			}
			
			/*
			Add your Visual Composer logic here.
			Lets call vc_map function to "register" our custom shortcode within Visual Composer interface.

			More info: http://kb.wpbakery.com/index.php?title=Vc_map
			*/

			$random = substr( md5(rand()), 0, 5 );

			vc_map(array(
				"name" 			=> esc_html__("Pandora Woo Listing", 'pandora'),
				"description" 	=> esc_html__("Product Listing for WooCommerce.", 'pandora'),
				"base" 			=> "pandora_product_listing",
				"class" 		=> "",
				"controls" 		=> "full",
				"icon" 			=> "icon-wpb-woocommerce",
				"category" 		=> esc_html__('Pandora Widgets', 'pandora'),
				
				"params" => array(
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Unique ID", 'pandora'),
						"param_name" 	=> "unique_id",
						"value" 		=> "pandora-product-listing-".$random,
						"admin_label" 	=> true,
						"description" 	=> esc_html__('Unique ID (auto generate random) for this listing. Please update post if you want to add more this element. Eg: pandora-product-listing, pandora-product-listing-1, pandora-product-listing-2 ...', 'pandora'),
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Class Suffix", 'pandora'),
						"param_name" 	=> "class_suffix",
						"value" 		=> "",
						"description" 	=> ""
					),
					array(
						'type'        => 'radioimage',
						"save_always" => true,
						'class'       => 'icon-box-layout',
						'heading'     => esc_html__( 'Listing Theme', 'pandora' ),
						"param_name" 	=> "carousel_theme",
						'admin_label' => true,
						'options'     => pandora_option_product_listing_themes(),
					),
					array(
						"type" 			=> "checkbox",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Filter by Categories(No select = No Filter)", 'pandora'),
						"param_name" 	=> "categories",
						"value" 		=> pandora_get_categories_array(),
						"description" 	=> "",
						"admin_label" 	=> true,
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Listing Type", 'pandora'),
						"param_name" 	=> "carousel_type",
						"value" 		=> array(
							esc_html__('All Products', 'pandora') 		=> 'all',
							esc_html__('Featured Products', 'pandora') 	=> 'featured',
							esc_html__('On-sale Products', 'pandora') 	=> 'onsale',							
						),
						"description" 	=> "",
						"admin_label" 	=> true,
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Order by", 'pandora'),
						"param_name" 	=> "order_by",
						"value" 		=> array(
							esc_html__('Date', 'pandora') 	=> 'date',
							esc_html__('Price', 'pandora') 	=> 'price',
							esc_html__('Random', 'pandora') 	=> 'rand',
							esc_html__('Sales', 'pandora') 	=> 'sales',
						),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Order", 'pandora'),
						"param_name" 	=> "order",
						"value" 		=> array(
							esc_html__('DESC', 'pandora') 	=> 'desc',
							esc_html__('ASC', 'pandora') 		=> 'asc',
						),
						"description" 	=> ""
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Total Products", 'pandora'),
						"param_name" 	=> "total_product",
						"value" 		=> "12",
						"description" 	=> ""
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Items Visible", 'pandora'),
						"param_name" 	=> "items_visible",
						"value" 		=> "4",
						"description" 	=> ""
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Row of Listing", 'pandora'),
						"param_name" 	=> "row_carousel",
						"value" 		=> "1",
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Product Image", 'pandora'),
						"param_name" 	=> "product_image",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Product Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Product Image Size", 'pandora'),
						"param_name" 	=> "product_image_size",
						"value" 		=> array(
							esc_html__('Thumbnail', 'pandora') 	               => 'thumbnail',
							esc_html__('Medium resolution', 'pandora') 	       => 'medium',
							esc_html__('Large resolution', 'pandora') 	       => 'large',
							esc_html__('Original image resolution', 'pandora') => 'full',
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Product Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Product Title", 'pandora'),
						"param_name" 	=> "product_title",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Product Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Product Rating", 'pandora'),
						"param_name" 	=> "product_rating",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Product Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Product Price", 'pandora'),
						"param_name" 	=> "product_price",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Product Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Product Description", 'pandora'),
						"param_name" 	=> "product_description",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Product Settings", 'pandora'),
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Limit text Description", 'pandora'),
						"param_name" 	=> "limit_text_description",
						"value" 		=> "100",
						"description" 	=> "",
						"group" 		=> esc_html__("Product Settings", 'pandora'),						
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Product Button Add To Cart", 'pandora'),
						"param_name" 	=> "product_button_add_to_cart",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Product Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Product Button Wishlist", 'pandora'),
						"param_name" 	=> "product_button_wishlist",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Product Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Product Button Compare", 'pandora'),
						"param_name" 	=> "product_button_compare",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Product Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Product Button Quickview", 'pandora'),
						"param_name" 	=> "product_button_quickview",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Product Settings", 'pandora'),
					),
					array(
			            'type'          => 'css_editor',
			            'heading'       => __( 'Css', 'pandora' ),
			            'param_name'    => 'css',
			            'group'         => __( 'Design options', 'pandora' ),
			        ),
				)
			));
		}
		
		
		/*
		Show notice if your plugin is activated but Visual Composer is not
		*/
		public function showVcVersionNotice() {			
			
		}
	}
}

new PandoraProductListingAddonClass();