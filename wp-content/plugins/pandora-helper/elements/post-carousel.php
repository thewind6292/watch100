<?php
/*
 * This is Post Carousel widget
 */

// don't load directly
if(!defined('ABSPATH')) die('-1');


// registered product search widget
if(! function_exists('pandora_post_carousel_widget'))
{
	function pandora_post_carousel_widget() {
		register_widget('Pandora_PostCarousel_Widget');
	}
}
add_action('widgets_init', 'pandora_post_carousel_widget');


// get product carousel theme
if(! function_exists('pandora_post_carousel_themes'))
{
	function pandora_post_carousel_themes($active, $type = "list") {
		$themes = ($type == "list") ? "" : array();
		$path 	= get_template_directory() . '/vc-templates/post-carousel';
		$files 	= pandora_get_all_files($path);
		$active = str_replace(".php","",$active);
		for($i = 0; $i < count($files); $i++) {
			if($type == "list") {
				$files[$i]    = str_replace(".php","",$files[$i]);
				$themes .= '<option value="'. $files[$i] .'"'.(($files[$i] == $active) ? ' selected="selected"' : '') .'>'. $files[$i] .'</option>';
			}
			else {
				$themes = array_merge($themes, array($files[$i] => $files[$i]));
			}
		}
		
		return $themes;
	}
}

// get option product carousel theme
if(! function_exists('pandora_option_post_carousel_themes'))
{
	function pandora_option_post_carousel_themes(){
		$pandora_post_carousel_themes        = pandora_post_carousel_themes("","array");
		$pandora_option_post_carousel_themes = array();
		foreach ($pandora_post_carousel_themes as $key => $value) {
			$pandora_option_post_carousel_themes_item    = str_replace(".php","",$value);
			$pandora_option_post_carousel_themes_image   = str_replace(".php",".jpg",$value);
			$pandora_option_post_carousel_themes[$pandora_option_post_carousel_themes_item] = get_template_directory_uri() . '/vc-templates/post-carousel/'.$pandora_option_post_carousel_themes_image;
		}
		return $pandora_option_post_carousel_themes;
	}
}

// function get WooCommerce categories
if(! function_exists('pandora_get_post_categories_list'))
{
	function pandora_get_post_categories_list($parent = 0, $active = array(), $level = "") 
	{
		$cats = get_terms('category' , array('hide_empty' => false, 'hierarchical' => true, 'parent' => $parent));
		
		if(!empty($cats)) {
			foreach($cats as $cat) {
				$return  .= '<option value="'.esc_attr($cat->slug).'"'.((in_array($cat->slug, $active)) ? ' selected="selected"' : '').'>'.$level.$cat->name.'</option>';
				$return  .= pandora_get_post_categories_list($cat->term_id, $active, $level . "--");
			}		
		}
		
		return $return;
	}
}

// function get WooCommerce categories
if(! function_exists('pandora_get_post_categories_array'))
{
	function pandora_get_post_categories_array($results = array(), $parent = 0) 
	{
		$cats = get_terms('category' , array('hide_empty' => false, 'hierarchical' => true, 'parent' => $parent));
		
		if(!empty($cats)) {
			foreach($cats as $cat) {
				$results = array_merge($results, array($cat->name => $cat->slug));
				$results = pandora_get_post_categories_array($results, $cat->term_id);
			}		
		}
		
		return $results;
	}
}


// Pandora Post Carousel Widget Class
if(! class_exists('Pandora_PostCarousel_Widget')) 
{
	class Pandora_PostCarousel_Widget extends WP_Widget 
	{	
		/**
		 * Register widget with WordPress.
		 */
		
		public function __construct() 
		{
			parent::__construct(
				'pandora_post_carousel', // Base ID
				esc_html__('Pandora Post Carousel', 'pandora'), // Name
				array('description' => esc_html__('A widget that display Wordpress Posts in responsive carousel.', 'pandora')) // Args
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

			$total_post		= !empty($instance['total_post']) ? intval($instance['total_post']) : 12;			
			$row_carousel	= !empty($instance['row_carousel']) ? intval($instance['row_carousel']) : 1;			
			
			/* Query Data */
			switch($carousel_type) {
				case "older":
					$query = array(
						'post_status' 		=> 'publish',
						'orderby' 			=> 'date',
						'order' 			=> 'ASC',
						'posts_per_page' 	=> $total_post,
					);
					$query = ($categories == 'all') ? $query : array_merge($query, array("cat" => $categories));
				break;
				case "featured":
					$query = array(
						'post_status' 	=> 'publish',
						'meta_query' 	=> array(
							array(
								'key' 	=> '_featured',
								'value' => 'yes',
						)),
						'posts_per_page' 	=> $total_post,
					);
					$query = ($categories == 'all') ? $query : array_merge($query, array("cat" => $categories));
				break;		
				case "latest":
				default:
					$query = array(
						'post_status' 		=> 'publish',
						'orderby' 			=> 'date',
						'order' 			=> 'DESC',
						'posts_per_page' 	=> $total_post,
					);
					$query = ($categories == 'all') ? $query : array_merge($query, array("cat" => $categories));
				break;
			}
			
			$pandora_query 		= new WP_Query($query);
			$total_items 	= count($pandora_query->posts);
			$total_loop 	= ceil($total_items/$row_carousel);
			$key_loop   	= 0;
			$return_content = '<p>'. esc_html__("No item found. Please check your config(*_*)", "pandora") .'</p>';
			
			if($total_items && is_file(get_template_directory() . '/vc-templates/post-carousel/' . $carousel_theme)) {
				include get_template_directory() . '/vc-templates/post-carousel/' . $carousel_theme;
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
			$unique_id 		= !empty($instance['unique_id']) ? $instance['unique_id'] : "pandora-post-carousel-".$random;
			$class 			= !empty($instance['class_suffix']) ? $instance['class_suffix'] : "";
			
			$cActive		= !empty($instance['categories']) ? explode(",", $instance['categories']) : array();			
			$carousel_type  = !empty($instance['carousel_type']) ? $instance['carousel_type'] : "latest";
			$categories 	= pandora_get_post_categories_list(0, $cActive);
			$carousel_theme = !empty($instance['carousel_theme']) ? $instance['carousel_theme'] : "default";
			$carousel_theme = $carousel_theme.".php";
			$total_post	    = !empty($instance['total_post']) ? $instance['total_post'] : "12";
			$items_visible  = !empty($instance['items_visible']) ? $instance['items_visible'] : "4";
			$row_carousel	= !empty($instance['row_carousel']) ? $instance['row_carousel'] : "1";
			
			if(isset($instance['post_image'])):
				$post_image     = !empty($instance['post_image']) ? $instance['post_image'] : "0";
			else:
				$post_image     = 1;
			endif;

			if(isset($instance['post_title'])):
				$post_title     = !empty($instance['post_title']) ? $instance['post_title'] : "0";
			else:
				$post_title     = 1;
			endif;		
				
			if(isset($instance['post_date'])):
				$post_date     = !empty($instance['post_date']) ? $instance['post_date'] : "0";
			else:
				$post_date     = 1;
			endif;

			if(isset($instance['post_author'])):
				$post_author   = !empty($instance['post_author']) ? $instance['post_author'] : "0";
			else:
				$post_author   = 1;
			endif;

			if(isset($instance['post_comment'])):
				$post_comment  = !empty($instance['post_comment']) ? $instance['post_comment'] : "0";
			else:
				$post_comment  = 1;
			endif;

			if(isset($instance['post_category'])):
				$post_category     = !empty($instance['post_category']) ? $instance['post_category'] : "0";
			else:
				$post_category     = 1;
			endif;

			if(isset($instance['post_description'])):
				$post_description     = !empty($instance['post_description']) ? $instance['post_description'] : "0";
			else:
				$post_description     = 1;
			endif;

			if(isset($instance['post_button_readmore'])):
				$post_button_readmore     = !empty($instance['post_button_readmore']) ? $instance['post_button_readmore'] : "0";
			else:
				$post_button_readmore     = 1;
			endif;

			if(isset($instance['next_preview'])):
				$next_preview     = !empty($instance['next_preview']) ? $instance['next_preview'] : "0";
			else:
				$next_preview     = 1;
			endif;

			if(isset($instance['pagination'])):
				$pagination     = !empty($instance['pagination']) ? $instance['pagination'] : "0";
			else:
				$pagination     = 1;
			endif;

			$post_image_size= !empty($instance['post_image_size']) ? $instance['post_image_size'] : "thumbnail";
			$limit_text_description = !empty($instance['limit_text_description']) ? $instance['limit_text_description'] : "20";
			$post_text_readmore     = !empty($instance['post_text_readmore']) ? $instance['post_text_readmore'] : "Read more";

			$responsive		= !empty($instance['responsive']) ? $instance['responsive'] : "";
			$items_desktop	= !empty($instance['items_desktop']) ? $instance['items_desktop'] : "[1199,4]";
			$items_sdesktop	= !empty($instance['items_sdesktop']) ? $instance['items_sdesktop'] : "[979,3]";
			$items_tablet	= !empty($instance['items_tablet']) ? $instance['items_tablet'] : "[768,2]";
			$items_stablet	= !empty($instance['items_stablet']) ? $instance['items_stablet'] : "false";
			$items_mobile	= !empty($instance['items_mobile']) ? $instance['items_mobile'] : "[479,1]";
			$items_custom	= !empty($instance['items_custom']) ? $instance['items_custom'] : "false";
			
			$slide_speed      = !(empty($instance['slide_speed']) && $instance['slide_speed']=='') ? intval($instance['slide_speed']) : "200";
			$autoplay_speed   = !(empty($instance['autoplay_speed']) && $instance['autoplay_speed']=='') ? intval($instance['autoplay_speed']) : "5000";
			$pagination_speed = !(empty($instance['pagination_speed']) && $instance['pagination_speed']=='') ? intval($instance['pagination_speed']) : "800";
			$rewind_speed     = !(empty($instance['rewind_speed']) && $instance['rewind_speed']=='') ? intval($instance['rewind_speed']) : "1000";
			$left_offset      = !(empty($instance['left_offset']) && $instance['left_offset']=='') ? intval($instance['left_offset']) : "-15";

			$auto_play		   = !empty($instance['auto_play']) ? $instance['auto_play'] : "0";
			$stop_hover        = !empty($instance['stop_hover']) ? $instance['stop_hover'] : "0";
			$scroll_page       = !empty($instance['scroll_page']) ? $instance['scroll_page'] : "0";
			$pagination_number = !empty($instance['pagination_number']) ? $instance['pagination_number'] : "0";
			$mouse_drag        = !empty($instance['mouse_drag']) ? $instance['mouse_drag'] : "0";
			$touch_drag        = !empty($instance['touch_drag']) ? $instance['touch_drag'] : "0";
			$rewind_nav        = !empty($instance['rewind_nav']) ? $instance['rewind_nav'] : "0";
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('unique_id')); ?>"><?php esc_html_e('Unique ID:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('unique_id')); ?>" name="<?php echo esc_attr($this->get_field_name('unique_id')); ?>" type="text" value="<?php echo esc_attr($unique_id); ?>">
				<em><?php _e('Enter unique ID for this carousel. Eg: pandora-post-carousel, pandora-post-carousel-1, pandora-post-carousel-2 ...', 'pandora'); ?></em>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('class_suffix')); ?>"><?php esc_html_e('Class Suffix:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('class_suffix')); ?>" name="<?php echo esc_attr($this->get_field_name('class_suffix')); ?>" type="text" value="<?php echo esc_attr($class); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('carousel_type')); ?>"><?php esc_html_e('Carousel Type', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('carousel_type')); ?>" id="<?php echo esc_attr($this->get_field_id('carousel_type')); ?>">				
					<option value="latest"<?php echo($carousel_type == 'latest') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Latest Published', 'pandora'); ?></option>
					<option value="older"<?php echo($carousel_type == 'older') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Older Published', 'pandora'); ?></option>
					<option value="featured"<?php echo($carousel_type == 'featured') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Featured Posts', 'pandora'); ?></option>					
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Filter by Categories(No select = All)', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('categories')); ?>[]" id="<?php echo esc_attr($this->get_field_id('categories')); ?>" multiple="true">				
					<?php echo ($categories); ?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('carousel_theme')); ?>"><?php esc_html_e('Carousel Theme', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('carousel_theme')); ?>" id="<?php echo esc_attr($this->get_field_id('carousel_theme')); ?>">				
					<?php echo pandora_post_carousel_themes($carousel_theme); ?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('total_post')); ?>"><?php esc_html_e('Total Posts:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('total_post')); ?>" name="<?php echo esc_attr($this->get_field_name('total_post')); ?>" type="text" value="<?php echo esc_attr($total_post); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('items_visible')); ?>"><?php esc_html_e('Items Visible:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('items_visible')); ?>" name="<?php echo esc_attr($this->get_field_name('items_visible')); ?>" type="text" value="<?php echo esc_attr($items_visible); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('row_carousel')); ?>"><?php esc_html_e('Row of Carousel:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('row_carousel')); ?>" name="<?php echo esc_attr($this->get_field_name('row_carousel')); ?>" type="text" value="<?php echo esc_attr($row_carousel); ?>">
			</p>
			<p>
				<input class="checkbox" id="<?php echo esc_attr($this->get_field_id('responsive')); ?>" name="<?php echo esc_attr($this->get_field_name('responsive')); ?>" type="checkbox" value="1" <?php echo($responsive) ? 'checked="checked"' : ''; ?>>
				<label for="<?php echo esc_attr($this->get_field_id('responsive')); ?>"><?php esc_html_e('Disabled Responsive', 'pandora'); ?></label>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('items_desktop')); ?>"><?php esc_html_e('Items Desktop:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('items_desktop')); ?>" name="<?php echo esc_attr($this->get_field_name('items_desktop')); ?>" type="text" value="<?php echo esc_attr($items_desktop); ?>">
				<em><?php _e('The format is [x,y] whereby x=browser width and y=number of slides displayed.', 'pandora'); ?></em>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('items_sdesktop')); ?>"><?php esc_html_e('Items Desktop Small:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('items_sdesktop')); ?>" name="<?php echo esc_attr($this->get_field_name('items_sdesktop')); ?>" type="text" value="<?php echo esc_attr($items_sdesktop); ?>">				
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('items_tablet')); ?>"><?php esc_html_e('Items Tablet:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('items_tablet')); ?>" name="<?php echo esc_attr($this->get_field_name('items_tablet')); ?>" type="text" value="<?php echo esc_attr($items_tablet); ?>">				
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('items_stablet')); ?>"><?php esc_html_e('Items Tablet Small:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('items_stablet')); ?>" name="<?php echo esc_attr($this->get_field_name('items_stablet')); ?>" type="text" value="<?php echo esc_attr($items_stablet); ?>">				
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('items_mobile')); ?>"><?php esc_html_e('Items Mobile:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('items_mobile')); ?>" name="<?php echo esc_attr($this->get_field_name('items_mobile')); ?>" type="text" value="<?php echo esc_attr($items_mobile); ?>">				
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('items_custom')); ?>"><?php esc_html_e('Items Custom:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('items_custom')); ?>" name="<?php echo esc_attr($this->get_field_name('items_custom')); ?>" type="text" value="<?php echo esc_attr($items_custom); ?>">
				<em><?php _e('Example: [[0, 2], [400, 4], [700, 6], [1000, 8], [1200, 10], [1600, 16]]', 'pandora'); ?></em>
			</p>
			<p> <b>Post Setting</b> </p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('post_image')); ?>"><?php esc_html_e('Post Image', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_image')); ?>" name="<?php echo esc_attr($this->get_field_name('post_image')); ?>" type="radio" value="0" <?php echo($post_image==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_image')); ?>" name="<?php echo esc_attr($this->get_field_name('post_image')); ?>" type="radio" value="1" <?php echo($post_image==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('post_image_size')); ?>"><?php esc_html_e('Post Image Size', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('post_image_size')); ?>" id="<?php echo esc_attr($this->get_field_id('post_image_size')); ?>">				
					<option value="thumbnail">Thumbnail</option>
					<option value="medium">Medium resolution</option>
					<option value="large">Large resolution</option>
					<option value="full">Original image resolution</option>
				</select>
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('post_title')); ?>"><?php esc_html_e('Post Title', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_title')); ?>" name="<?php echo esc_attr($this->get_field_name('post_title')); ?>" type="radio" value="0" <?php echo($post_title==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_title')); ?>" name="<?php echo esc_attr($this->get_field_name('post_title')); ?>" type="radio" value="1" <?php echo($post_title==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('post_date')); ?>"><?php esc_html_e('Post Date', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_date')); ?>" name="<?php echo esc_attr($this->get_field_name('post_date')); ?>" type="radio" value="0" <?php echo($post_date==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_date')); ?>" name="<?php echo esc_attr($this->get_field_name('post_date')); ?>" type="radio" value="1" <?php echo($post_date==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('post_author')); ?>"><?php esc_html_e('Post Author', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_author')); ?>" name="<?php echo esc_attr($this->get_field_name('post_author')); ?>" type="radio" value="0" <?php echo($post_author==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_author')); ?>" name="<?php echo esc_attr($this->get_field_name('post_author')); ?>" type="radio" value="1" <?php echo($post_author==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('post_comment')); ?>"><?php esc_html_e('Post Comment', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_comment')); ?>" name="<?php echo esc_attr($this->get_field_name('post_comment')); ?>" type="radio" value="0" <?php echo($post_comment==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_comment')); ?>" name="<?php echo esc_attr($this->get_field_name('post_comment')); ?>" type="radio" value="1" <?php echo($post_comment==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('post_category')); ?>"><?php esc_html_e('Post Category', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_category')); ?>" name="<?php echo esc_attr($this->get_field_name('post_category')); ?>" type="radio" value="0" <?php echo($post_category==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_category')); ?>" name="<?php echo esc_attr($this->get_field_name('post_category')); ?>" type="radio" value="1" <?php echo($post_category==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('post_description')); ?>"><?php esc_html_e('Post Description', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_description')); ?>" name="<?php echo esc_attr($this->get_field_name('post_description')); ?>" type="radio" value="0" <?php echo($post_description==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_description')); ?>" name="<?php echo esc_attr($this->get_field_name('post_description')); ?>" type="radio" value="1" <?php echo($post_description==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('limit_text_description')); ?>"><?php esc_html_e('Limit Text Description:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('limit_text_description')); ?>" name="<?php echo esc_attr($this->get_field_name('limit_text_description')); ?>" type="text" value="<?php echo esc_attr($limit_text_description); ?>">
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('post_button_readmore')); ?>"><?php esc_html_e('Post Button Readmore', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_button_readmore')); ?>" name="<?php echo esc_attr($this->get_field_name('post_button_readmore')); ?>" type="radio" value="0" <?php echo($post_button_readmore==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('post_button_readmore')); ?>" name="<?php echo esc_attr($this->get_field_name('post_button_readmore')); ?>" type="radio" value="1" <?php echo($post_button_readmore==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('post_text_readmore')); ?>"><?php esc_html_e('Post Text Readmore:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('post_text_readmore')); ?>" name="<?php echo esc_attr($this->get_field_name('post_text_readmore')); ?>" type="text" value="<?php echo esc_attr($post_text_readmore); ?>">
			</p>

			<p> <b>Carousel Setting</b> </p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('slide_speed')); ?>"><?php esc_html_e('Slide Speed:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('slide_speed')); ?>" name="<?php echo esc_attr($this->get_field_name('slide_speed')); ?>" type="text" value="<?php echo esc_attr($slide_speed); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('autoplay_speed')); ?>"><?php esc_html_e('Auto Play Speed:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('autoplay_speed')); ?>" name="<?php echo esc_attr($this->get_field_name('autoplay_speed')); ?>" type="text" value="<?php echo esc_attr($autoplay_speed); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('pagination_speed')); ?>"><?php esc_html_e('Pagination Speed:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('pagination_speed')); ?>" name="<?php echo esc_attr($this->get_field_name('pagination_speed')); ?>" type="text" value="<?php echo esc_attr($pagination_speed); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('rewind_speed')); ?>"><?php esc_html_e('Rewind Speed:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('rewind_speed')); ?>" name="<?php echo esc_attr($this->get_field_name('rewind_speed')); ?>" type="text" value="<?php echo esc_attr($rewind_speed); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('left_offset')); ?>"><?php esc_html_e('Left Offset:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('left_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('left_offset')); ?>" type="text" value="<?php echo esc_attr($left_offset); ?>">
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('next_preview')); ?>"><?php esc_html_e('Next Preview', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('next_preview')); ?>" name="<?php echo esc_attr($this->get_field_name('next_preview')); ?>" type="radio" value="0" <?php echo($next_preview==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('next_preview')); ?>" name="<?php echo esc_attr($this->get_field_name('next_preview')); ?>" type="radio" value="1" <?php echo($next_preview==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('pagination')); ?>"><?php esc_html_e('Pagination', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('pagination')); ?>" name="<?php echo esc_attr($this->get_field_name('pagination')); ?>" type="radio" value="0" <?php echo($pagination==0) ? 'checked="checked"' : ''; ?>> Hide 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('pagination')); ?>" name="<?php echo esc_attr($this->get_field_name('pagination')); ?>" type="radio" value="1" <?php echo($pagination==1) ? 'checked="checked"' : ''; ?>> Show
			</p>
			<p>	
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('auto_play')); ?>"><?php esc_html_e('Auto Play', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('auto_play')); ?>" name="<?php echo esc_attr($this->get_field_name('auto_play')); ?>" type="radio" value="0" <?php echo($auto_play==0) ? 'checked="checked"' : ''; ?>> No 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('auto_play')); ?>" name="<?php echo esc_attr($this->get_field_name('auto_play')); ?>" type="radio" value="1" <?php echo($auto_play==1) ? 'checked="checked"' : ''; ?>> Yes
			</p>	
			<p>	
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('stop_hover')); ?>"><?php esc_html_e('Stop Hover', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('stop_hover')); ?>" name="<?php echo esc_attr($this->get_field_name('stop_hover')); ?>" type="radio" value="0" <?php echo($stop_hover==0) ? 'checked="checked"' : ''; ?>> No 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('stop_hover')); ?>" name="<?php echo esc_attr($this->get_field_name('stop_hover')); ?>" type="radio" value="1" <?php echo($stop_hover==1) ? 'checked="checked"' : ''; ?>> Yes
			</p>		
			<p>	
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('scroll_page')); ?>"><?php esc_html_e('Scroll Page', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('scroll_page')); ?>" name="<?php echo esc_attr($this->get_field_name('scroll_page')); ?>" type="radio" value="0" <?php echo($scroll_page==0) ? 'checked="checked"' : ''; ?>> No 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('scroll_page')); ?>" name="<?php echo esc_attr($this->get_field_name('scroll_page')); ?>" type="radio" value="1" <?php echo($scroll_page==1) ? 'checked="checked"' : ''; ?>> Yes
			</p>		
			<p>	
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('pagination_number')); ?>"><?php esc_html_e('Pagination Number', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('pagination_number')); ?>" name="<?php echo esc_attr($this->get_field_name('pagination_number')); ?>" type="radio" value="0" <?php echo($pagination_number==0) ? 'checked="checked"' : ''; ?>> No 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('pagination_number')); ?>" name="<?php echo esc_attr($this->get_field_name('pagination_number')); ?>" type="radio" value="1" <?php echo($pagination_number==1) ? 'checked="checked"' : ''; ?>> Yes
			</p>	 
			<p>	
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('mouse_drag')); ?>"><?php esc_html_e('Mouse Drag', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('mouse_drag')); ?>" name="<?php echo esc_attr($this->get_field_name('mouse_drag')); ?>" type="radio" value="0" <?php echo($mouse_drag==0) ? 'checked="checked"' : ''; ?>> No 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('mouse_drag')); ?>" name="<?php echo esc_attr($this->get_field_name('mouse_drag')); ?>" type="radio" value="1" <?php echo($mouse_drag==1) ? 'checked="checked"' : ''; ?>> Yes
			</p>	
			<p>	
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('touch_drag')); ?>"><?php esc_html_e('Touch Drag', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('touch_drag')); ?>" name="<?php echo esc_attr($this->get_field_name('touch_drag')); ?>" type="radio" value="0" <?php echo($touch_drag==0) ? 'checked="checked"' : ''; ?>> No 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('touch_drag')); ?>" name="<?php echo esc_attr($this->get_field_name('touch_drag')); ?>" type="radio" value="1" <?php echo($touch_drag==1) ? 'checked="checked"' : ''; ?>> Yes
			</p>	
			<p>	
				<label class="pandora_label_owl_setting" style="" for="<?php echo esc_attr($this->get_field_id('rewind_nav')); ?>"><?php esc_html_e('Rewind Nav', 'pandora'); ?></label>		
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('rewind_nav')); ?>" name="<?php echo esc_attr($this->get_field_name('rewind_nav')); ?>" type="radio" value="0" <?php echo($rewind_nav==0) ? 'checked="checked"' : ''; ?>> No 
				<input class="radio" id="<?php echo esc_attr($this->get_field_id('rewind_nav')); ?>" name="<?php echo esc_attr($this->get_field_name('rewind_nav')); ?>" type="radio" value="1" <?php echo($rewind_nav==1) ? 'checked="checked"' : ''; ?>> Yes
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
			$instance['unique_id'] 		= !empty($new_instance['unique_id']) ? strip_tags($new_instance['unique_id']) : 'pandora-post-carousel';
			$instance['class_suffix'] 	= !empty($new_instance['class_suffix']) ? strip_tags($new_instance['class_suffix']) : '';
			$instance['carousel_type'] 	= !empty($new_instance['carousel_type']) ? strip_tags($new_instance['carousel_type']) : 'latest';
			$instance['categories']   	= is_array($new_instance['categories']) ? implode(",", $new_instance['categories']) : 'all';
			$instance['carousel_theme'] = !empty($new_instance['carousel_theme']) ? strip_tags($new_instance['carousel_theme']) : 'default';
			$instance['total_post'] 	= !empty($new_instance['total_post']) ? intval($new_instance['total_post']) : '12';
			$instance['items_visible'] 	= !empty($new_instance['items_visible']) ? intval($new_instance['items_visible']) : '4';
			$instance['row_carousel'] 	= !empty($new_instance['row_carousel']) ? intval($new_instance['row_carousel']) : '1';

			$instance['post_image'] 	= !empty($new_instance['post_image']) ? intval($new_instance['post_image']) : "0";
			$instance['post_image_size'] = !empty($new_instance['post_image_size']) ? strip_tags($new_instance['post_image_size']) : 'thumbnail';
			$instance['post_title'] 	= !empty($new_instance['post_title']) ? intval($new_instance['post_title']) : "0";
			$instance['post_date'] 	    = !empty($new_instance['post_date']) ? intval($new_instance['post_date']) : "0";
			$instance['post_author'] 	    = !empty($new_instance['post_author']) ? intval($new_instance['post_author']) : "0";
			$instance['post_comment'] 	    = !empty($new_instance['post_comment']) ? intval($new_instance['post_comment']) : "0";
			$instance['post_category'] 	= !empty($new_instance['post_category']) ? intval($new_instance['post_category']) : "0";
			$instance['post_description'] 	      = !empty($new_instance['post_description']) ? intval($new_instance['post_description']) : "0";
			$instance['limit_text_description']   = !empty($new_instance['limit_text_description']) ? intval($new_instance['limit_text_description']) : "100";
			$instance['post_button_readmore'] 	  = !empty($new_instance['post_button_readmore']) ? intval($new_instance['post_button_readmore']) : "0";
			$instance['post_text_readmore']       = !empty($new_instance['post_text_readmore']) ? strip_tags($new_instance['post_text_readmore']) : 'Read more';

			$instance['responsive']		= !empty($new_instance['responsive']) ? intval($new_instance['responsive']) : "";
			$instance['items_desktop']	= !empty($new_instance['items_desktop']) ? $new_instance['items_desktop'] : "[1199,4]";
			$instance['items_sdesktop']	= !empty($new_instance['items_sdesktop']) ? $new_instance['items_sdesktop'] : "[979,3]";
			$instance['items_tablet']	= !empty($new_instance['items_tablet']) ? $new_instance['items_tablet'] : "[768,2]";
			$instance['items_stablet']	= !empty($new_instance['items_stablet']) ? $new_instance['items_stablet'] : "false";
			$instance['items_mobile']	= !empty($new_instance['items_mobile']) ? $new_instance['items_mobile'] : "[479,1]";
			$instance['items_custom']	= !empty($new_instance['items_custom']) ? $new_instance['items_custom'] : "false";
			
			$instance['next_preview'] 	= !empty($new_instance['next_preview']) ? intval($new_instance['next_preview']) : "0"; 
			$instance['pagination'] 	= !empty($new_instance['pagination']) ? intval($new_instance['pagination']) : "0"; 

			$instance['slide_speed'] 	    = $new_instance['slide_speed']!="" ? $new_instance['slide_speed'] : 200 ;
			$instance['autoplay_speed'] 	= $new_instance['autoplay_speed']!="" ? $new_instance['autoplay_speed'] : 5000 ;
			$instance['pagination_speed'] 	= $new_instance['pagination_speed']!="" ? $new_instance['pagination_speed'] : 800 ;
			$instance['rewind_speed'] 	    = $new_instance['rewind_speed']!="" ? $new_instance['rewind_speed'] : 1000 ;
			$instance['left_offset'] 	    = $new_instance['left_offset']!="" ? $new_instance['left_offset'] : -15 ;

			$instance['auto_play'] 	    = !empty($new_instance['auto_play']) ? intval($new_instance['auto_play']) : '0';
			$instance['stop_hover'] 	= !empty($new_instance['stop_hover']) ? intval($new_instance['stop_hover']) : '0';
			$instance['scroll_page'] 	= !empty($new_instance['scroll_page']) ? intval($new_instance['scroll_page']) : '0';
			$instance['pagination_number'] 	= !empty($new_instance['pagination_number']) ? intval($new_instance['pagination_number']) : '0';
			$instance['mouse_drag'] 	= !empty($new_instance['mouse_drag']) ? intval($new_instance['mouse_drag']) : '0';
			$instance['touch_drag'] 	= !empty($new_instance['touch_drag']) ? intval($new_instance['touch_drag']) : '0';
			$instance['rewind_nav'] 	= !empty($new_instance['rewind_nav']) ? intval($new_instance['rewind_nav']) : '0';
			
			return $instance;
		}

		/**
		 * Create Shortcode for this widget
		 * [Pandora_post_carousel class_suffix="WIDGET_CLASS_SUFFIX" ...]
		 */
		 
		public static function shortcode($atts, $content = "")
		{
			$widget = new Pandora_PostCarousel_Widget;
			return $widget->widget('shortcode', $atts);
		}
	}
}

// Add this widget to Visual Composer
if(! class_exists('PandoraPostCarouselAddonClass')) 
{
	class PandoraPostCarouselAddonClass 
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
				"name" 			=> esc_html__("Pandora Post Carousel", 'pandora'),
				"description" 	=> esc_html__("A responsive carousel for WordPress.", 'pandora'),
				"base" 			=> "pandora_post_carousel",
				"class" 		=> "",
				"controls" 		=> "full",
				"icon" 			=> "icon-wpb-wp",
				"category" 		=> esc_html__('Pandora Widgets', 'pandora'),
				
				"params" => array(
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Unique ID", 'pandora'),
						"param_name" 	=> "unique_id",
						"value" 		=> "pandora-post-carousel-".$random,
						"admin_label" 	=> true,
						"description" 	=> esc_html__('Enter unique ID for this carousel. Eg: pandora-post-carousel, pandora-post-carousel-1, pandora-post-carousel-2 ...', 'pandora'),
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
						"param_name"  => "carousel_theme",
						'admin_label' => true,
						'options'     => pandora_option_post_carousel_themes(),
					),
					array(
						"type" 			=> "checkbox",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Filter by Categories(No select = No Filter)", 'pandora'),
						"param_name" 	=> "categories",
						"value" 		=> pandora_get_post_categories_array(),
						"description" 	=> "",
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Carousel Type", 'pandora'),
						"param_name" 	=> "carousel_type",
						"value" 		=> array(
							esc_html__('Latest Published', 'pandora') => 'latest',
							esc_html__('Older Published', 'pandora') 	=> 'older',
							esc_html__('Featured Posts', 'pandora') 	=> 'featured',							
						),
						"description" 	=> "",
						"admin_label" 	=> true,
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Total Posts", 'pandora'),
						"param_name" 	=> "total_post",
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
						"heading" 		=> esc_html__("Row of Carousel", 'pandora'),
						"param_name" 	=> "row_carousel",
						"value" 		=> "1",
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Post Image", 'pandora'),
						"param_name" 	=> "post_image",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Post Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Post Image Size", 'pandora'),
						"param_name" 	=> "post_image_size",
						"value" 		=> array(
							esc_html__('Thumbnail', 'pandora') 	               => 'thumbnail',
							esc_html__('Medium resolution', 'pandora') 	       => 'medium',
							esc_html__('Large resolution', 'pandora') 	       => 'large',
							esc_html__('Original image resolution', 'pandora') => 'full',
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Post Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Post Title", 'pandora'),
						"param_name" 	=> "post_title",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Post Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Post Date", 'pandora'),
						"param_name" 	=> "post_date",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Post Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Post Author", 'pandora'),
						"param_name" 	=> "post_author",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Post Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Post Comment", 'pandora'),
						"param_name" 	=> "post_comment",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Post Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Post Category", 'pandora'),
						"param_name" 	=> "post_category",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Post Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Post Description", 'pandora'),
						"param_name" 	=> "post_description",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Post Settings", 'pandora'),
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Limit text Description", 'pandora'),
						"param_name" 	=> "limit_text_description",
						"value" 		=> "100",
						"description" 	=> "",
						"group" 		=> esc_html__("Post Settings", 'pandora'),						
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Post Button Readmore", 'pandora'),
						"param_name" 	=> "post_button_readmore",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Post Settings", 'pandora'),
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Post Text Readmore", 'pandora'),
						"param_name" 	=> "post_text_readmore",
						"value" 		=> "Read more",
						"description" 	=> "",
						"group" 		=> esc_html__("Post Settings", 'pandora'),						
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Slide Speed", 'pandora'),
						"param_name" 	=> "slide_speed",
						"value" 		=> "200",
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),						
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Auto Play Speed", 'pandora'),
						"param_name" 	=> "autoplay_speed",
						"value" 		=> "5000",
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),						
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Pagination Speed", 'pandora'),
						"param_name" 	=> "pagination_speed",
						"value" 		=> "800",
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),						
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Rewind Speed", 'pandora'),
						"param_name" 	=> "rewind_speed",
						"value" 		=> "1000",
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),						
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Left Offset", 'pandora'),
						"param_name" 	=> "left_offset",
						"value" 		=> "-15",
						"description" 	=> "pixel",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),						
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Next & Preview Buttons", 'pandora'),
						"param_name" 	=> "next_preview",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Pagination", 'pandora'),
						"param_name" 	=> "pagination",
						"value" 		=> array(
							esc_html__('Show', 'pandora') 	=> 1,
							esc_html__('Hide', 'pandora') 	=> 0,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Auto Play", 'pandora'),
						"param_name" 	=> "auto_play",
						"value" 		=> array(
							esc_html__('No', 'pandora') 	=> 0,
							esc_html__('Yes', 'pandora') 	=> 1,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Stop Hover", 'pandora'),
						"param_name" 	=> "stop_hover",
						"value" 		=> array(
							esc_html__('No', 'pandora') 	=> 0,
							esc_html__('Yes', 'pandora') 	=> 1,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Scroll Per Page", 'pandora'),
						"param_name" 	=> "scroll_page",
						"value" 		=> array(
							esc_html__('No', 'pandora') 	=> 0,
							esc_html__('Yes', 'pandora') 	=> 1,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Pagination Number", 'pandora'),
						"param_name" 	=> "pagination_number",
						"value" 		=> array(
							esc_html__('No', 'pandora') 	=> 0,
							esc_html__('Yes', 'pandora') 	=> 1,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Mouse Drag", 'pandora'),
						"param_name" 	=> "mouse_drag",
						"value" 		=> array(
							esc_html__('No', 'pandora') 	=> 0,
							esc_html__('Yes', 'pandora') 	=> 1,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Touch Drag", 'pandora'),
						"param_name" 	=> "touch_drag",
						"value" 		=> array(
							esc_html__('No', 'pandora') 	=> 0,
							esc_html__('Yes', 'pandora') 	=> 1,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Rewind Nav", 'pandora'),
						"param_name" 	=> "rewind_nav",
						"value" 		=> array(
							esc_html__('No', 'pandora') 	=> 0,
							esc_html__('Yes', 'pandora') 	=> 1,
						),
						"description" 	=> "",
						"group" 		=> esc_html__("Carousel Settings", 'pandora'),
					),
					array(
						"type" 			=> "checkbox",
						"save_always" 	=> true,
						"heading" 		=> esc_html__("Responsive", 'pandora'),
						"param_name" 	=> "responsive",
						"value" 		=> array("Disabled" => 1),
						"description" 	=> esc_html__("You can use Owl Carousel on desktop-only websites too! Just check this option to disable resposive capabilities", 'pandora'),
						'group' 		=> esc_html__('Responsive', 'pandora'),
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"heading" 		=> esc_html__("Items Desktop", 'pandora'),
						"param_name" 	=> "items_desktop",
						"value" 		=> "[1199,4]",
						"description" 	=> esc_html__("This allows you to preset the number of slides visible with a particular browser width. The format is [x,y] whereby x=browser width and y=number of slides displayed. For example [1199,4] means that if(window<=1199){ show 4 slides per page}", 'pandora'),
						'group' 		=> esc_html__('Responsive', 'pandora'),
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"heading" 		=> esc_html__("Items Desktop Small", 'pandora'),
						"param_name" 	=> "items_sdesktop",
						"value" 		=> "[979,3]",
						"description" 	=> esc_html__("As above", 'pandora'),
						'group' 		=> esc_html__('Responsive', 'pandora'),
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"heading" 		=> esc_html__("Items Tablet", 'pandora'),
						"param_name" 	=> "items_tablet",
						"value" 		=> "[768,2]",
						"description" 	=> esc_html__("As above", 'pandora'),
						'group' 		=> esc_html__('Responsive', 'pandora'),
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"heading" 		=> esc_html__("Items Tablet Small", 'pandora'),
						"param_name" 	=> "items_stablet",
						"value" 		=> "false",
						"description" 	=> esc_html__("As above. Default value is disabled.", 'pandora'),
						'group' 		=> esc_html__('Responsive', 'pandora'),
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"heading" 		=> esc_html__("Items Mobile", 'pandora'),
						"param_name" 	=> "items_mobile",
						"value" 		=> "[479,1]",
						"description" 	=> esc_html__("As above", 'pandora'),
						'group' 		=> esc_html__('Responsive', 'pandora'),
					),
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"heading" 		=> esc_html__("Items Custom", 'pandora'),
						"param_name" 	=> "items_custom",
						"value" 		=> "false",
						"description" 	=> esc_html__("This allow you to add custom variations of items depending from the width If this option is set, itemsDeskop, itemsDesktopSmall, itemsTablet, itemsMobile etc. are disabled For better preview, order the arrays by screen size, but it's not mandatory Don't forget to include the lowest available screen size, otherwise it will take the default one for screens lower than lowest available.<br>Example:<br>[[0, 2], [400, 4], [700, 6], [1000, 8], [1200, 10], [1600, 16]]", 'pandora'),
						'group' 		=> esc_html__('Responsive', 'pandora'),
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
new PandoraPostCarouselAddonClass();