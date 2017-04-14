<?php
/*
 * This is Category Treeview Menu widget
 */

// don't load directly
if(!defined('ABSPATH')) die('-1');


// registered brand logos carousel widget
if(! function_exists('pandora_category_treeview_widget'))
{
	function pandora_category_treeview_widget() {
		register_widget('Pandora_CategoryTreeview_Widget');
	}
}
add_action('widgets_init', 'pandora_category_treeview_widget');


// get product search theme
if(! function_exists('pandora_category_treeview_themes'))
{
	function pandora_category_treeview_themes($active, $type = "list") {
		$themes = ($type == "list") ? "" : array();
		$path 	= get_template_directory() . '/vc-templates/treeview-menu';
		$files 	= pandora_get_all_files($path);
		
		for($i = 0; $i < count($files); $i++) {
			if($type == "list") {
				$themes .= '<option value="'. esc_attr($files[$i]) .'"'.(($files[$i] == $active) ? ' selected="selected"' : '') .'>'. $files[$i] .'</option>';
			}
			else {
				$themes = array_merge($themes, array($files[$i] => $files[$i]));
			}
		}
		
		return $themes;
	}
}

// Pandora Product Carousel Widget Class
if(! class_exists('Pandora_CategoryTreeview_Widget')) 
{
	class Pandora_CategoryTreeview_Widget extends WP_Widget 
	{	
		/**
		 * Register widget with WordPress.
		 */
		
		public function __construct() 
		{
			parent::__construct(
				'pandora_category_treeview', // Base ID
				esc_html__('Pandora Category Treeview', 'pandora'), // Name
				array('description' => esc_html__('A widget that display category in Treeview menu.', 'pandora')) // Args
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
			$treeview_type  = !empty($instance['treeview_type']) ? $instance['treeview_type'] : "postcategory";
			$treeview_theme = !empty($instance['treeview_theme']) ? $instance['treeview_theme'] : "default.php";
			$return_content = "";
			
			if($treeview_type == 'postcategory') {
				$categories = get_terms('category' , array('hide_empty' => false, 'hierarchical' => true, 'parent' => 0));
			}
			else {
				$categories = get_terms('product_cat' , array('hide_empty' => false, 'hierarchical' => true, 'parent' => 0));
			}
			
			if(count($categories) && is_file(get_template_directory() . '/vc-templates/treeview-menu/' . $treeview_theme)) {
				include get_template_directory() . '/vc-templates/treeview-menu/' . $treeview_theme;
			}
			
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
			$title 				= !empty($instance['title']) ? $instance['title'] : esc_html__('New title', 'pandora');
			$unique_id 			= !empty($instance['unique_id']) ? $instance['unique_id'] : "pandora-category-treeview";
			$class 				= !empty($instance['class_suffix']) ? $instance['class_suffix'] : "";
			$treeview_theme 	= !empty($instance['treeview_theme']) ? $instance['treeview_theme'] : "default.php";
			$treeview_type		= !empty($instance['treeview_type']) ? $instance['treeview_type'] : "postcategory";
			$item_counter		= !empty($instance['item_counter']) ? $instance['item_counter'] : 'no';
			$treeview_control	= !empty($instance['treeview_control']) ? $instance['treeview_control'] : 'no';
			$animated_speed		= !empty($instance['animated_speed']) ? $instance['animated_speed'] : "normal";
			$collapsed			= !empty($instance['collapsed']) ? $instance['collapsed'] : 'yes';
			$unique				= !empty($instance['unique']) ? $instance['unique'] : 'no';
			
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('unique_id')); ?>"><?php esc_html_e('Unique ID:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('unique_id')); ?>" name="<?php echo esc_attr($this->get_field_name('unique_id')); ?>" type="text" value="<?php echo esc_attr($unique_id); ?>">
				<em><?php _e('Enter unique ID for this treeview menu. Eg: pandora-category-treeview, pandora-category-treeview-1, pandora-category-treeview-2 ...', 'pandora'); ?></em>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('class_suffix')); ?>"><?php esc_html_e('Class Suffix:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('class_suffix')); ?>" name="<?php echo esc_attr($this->get_field_name('class_suffix')); ?>" type="text" value="<?php echo esc_attr($class); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('treeview_theme')); ?>"><?php esc_html_e('Treeview Theme', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('treeview_theme')); ?>" id="<?php echo esc_attr($this->get_field_id('treeview_theme')); ?>">				
					<?php echo pandora_category_treeview_themes($treeview_theme); ?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('treeview_type')); ?>"><?php esc_html_e('Treeview Source', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('treeview_type')); ?>" id="<?php echo esc_attr($this->get_field_id('treeview_type')); ?>">				
					<option value="postcategory"<?php echo($treeview_type == 'postcategory') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Post Catogory', 'pandora'); ?></option>
					<option value="woocategory"<?php echo($treeview_type == 'woocategory') ? ' selected="selected"' : ""; ?>><?php esc_html_e('WooCommerce Category', 'pandora'); ?></option>
				</select>
				<em><?php esc_html_e('Support 2 sources: Post Category and WooCommerce Category.', 'pandora'); ?></em>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('item_counter')); ?>"><?php esc_html_e('Items Counter', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('item_counter')); ?>" id="<?php echo esc_attr($this->get_field_id('item_counter')); ?>">				
					<option value="no"<?php echo($item_counter == 'no') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Disabled', 'pandora'); ?></option>
					<option value="yes"<?php echo($item_counter == 'yes') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Enabled', 'pandora'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('treeview_control')); ?>"><?php esc_html_e('Treeview Control', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('treeview_control')); ?>" id="<?php echo esc_attr($this->get_field_id('treeview_control')); ?>">				
					<option value="no"<?php echo($treeview_control == 'no') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Disabled', 'pandora'); ?></option>
					<option value="yes"<?php echo($treeview_control == 'yes') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Enabled', 'pandora'); ?></option>
				</select>
			</p>			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('animated_speed')); ?>"><?php esc_html_e('Animated Speed', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('animated_speed')); ?>" id="<?php echo esc_attr($this->get_field_id('animated_speed')); ?>">				
					<option value="slow"<?php echo($animated_speed == 'slow') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Slow', 'pandora'); ?></option>
					<option value="normal"<?php echo($animated_speed == 'normal') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Normal', 'pandora'); ?></option>
					<option value="fast"<?php echo($animated_speed == 'fast') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Fast', 'pandora'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('collapsed')); ?>"><?php esc_html_e('Collapsed', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('collapsed')); ?>" id="<?php echo esc_attr($this->get_field_id('collapsed')); ?>">				
					<option value="no"<?php echo($collapsed == 'no') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Disabled', 'pandora'); ?></option>
					<option value="yes"<?php echo($collapsed == 'yes') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Enabled', 'pandora'); ?></option>
				</select>
				<em><?php esc_html_e('Sets whether all nodes should be collapsed by default.', 'pandora'); ?></em>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('unique')); ?>"><?php esc_html_e('Unique', 'pandora'); ?></label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('unique')); ?>" id="<?php echo esc_attr($this->get_field_id('unique')); ?>">				
					<option value="no"<?php echo($unique == 'no') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Disabled', 'pandora'); ?></option>
					<option value="yes"<?php echo($unique == 'yes') ? ' selected="selected"' : ""; ?>><?php esc_html_e('Enabled', 'pandora'); ?></option>
				</select>
				<em><?php esc_html_e('Sets whether only one tree node can be open at any time, collapsing any previous open nodes.', 'pandora'); ?></em>
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
			
			$instance['title'] 		  	= (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
			$instance['unique_id'] 		= (!empty($new_instance['unique_id'])) ? strip_tags($new_instance['unique_id']) : '';
			$instance['class'] 		  	= (!empty($new_instance['class_suffix'])) ? strip_tags($new_instance['class_suffix']) : '';
			$instance['treeview_theme'] = (!empty($new_instance['treeview_theme'])) ? strip_tags($new_instance['treeview_theme']) : 'default.php';
			$instance['treeview_type'] 	= (!empty($new_instance['treeview_type'])) ? strip_tags($new_instance['treeview_type']) : 'postcategory';
			$instance['item_counter'] 	= (!empty($new_instance['item_counter'])) ? strip_tags($new_instance['item_counter']) : 'no';
			$instance['treeview_control'] = (!empty($new_instance['treeview_control'])) ? strip_tags($new_instance['treeview_control']) : 'no';
			$instance['animated_speed'] = (!empty($new_instance['animated_speed'])) ? strip_tags($new_instance['animated_speed']) : 'normal';
			$instance['collapsed'] 		= (!empty($new_instance['collapsed'])) ? strip_tags($new_instance['collapsed']) : 'no';
			$instance['unique'] 		= (!empty($new_instance['unique'])) ? strip_tags($new_instance['unique']) : 'no';
			
			return $instance;
		}
		
		/**
		 * Create Shortcode for this widget
		 * [pandora_category_treeview class_suffix="WIDGET_CLASS_SUFFIX" ...]
		 */
		 
		public static function shortcode($atts, $content = "")
		{
			$widget = new Pandora_CategoryTreeview_Widget;
			return $widget->widget('shortcode', $atts);
		}
	}
}


// Add this widget to Visual Composer
if(! class_exists('PandoraCategoryTreeviewAddonClass')) 
{
	class PandoraCategoryTreeviewAddonClass 
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
			
			vc_map(array(
				"name" 			=> esc_html__("Pandora Category Treeview", 'pandora'),
				"description" 	=> esc_html__("Display category in Treeview menu.", 'pandora'),
				"base" 			=> "pandora_category_treeview",
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
						"value" 		=> "pandora-category-treeview",
						"admin_label" 	=> true,
						"description" 	=> esc_html__('Enter unique ID for this Treeview menu. Eg: pandora-category-treeview, pandora-category-treeview-1, pandora-category-treeview-2 ...', 'pandora'),
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
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Treeview Theme", 'pandora'),
						"param_name" 	=> "treeview_theme",
						"value" 		=> pandora_category_treeview_themes("", "array"),
						"description" 	=> "",
						"admin_label" 	=> true,
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Treeview Type", 'pandora'),
						"param_name" 	=> "treeview_type",
						"value" 		=> array(
							esc_html__('Post Category', 'pandora') 		=> 'postcategory',
							esc_html__('WooCommerce Category', 'pandora') => 'woocategory',
						),
						"description" 	=> esc_html__("Support 2 sources: Post Category and WooCommerce Category.", 'pandora'),
						"admin_label" 	=> true,
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Item Counter", 'pandora'),
						"param_name" 	=> "item_counter",
						"value" 		=> array(
							esc_html__('Disabled', 'pandora') 	=> 'no',
							esc_html__('Enabled', 'pandora') 		=> 'yes',
						),
						"description" 	=> "",
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Treeview Control", 'pandora'),
						"param_name" 	=> "treeview_control",
						"value" 		=> array(
							esc_html__('Disabled', 'pandora') 	=> 'no',
							esc_html__('Enabled', 'pandora') 		=> 'yes',
						),
						"description" 	=> esc_html__("Specifies the HTML element(s) on the page that will contain links to collapse, expand, and toggle all nodes within the tree, in that order.", 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Animated Speed", 'pandora'),
						"param_name" 	=> "animated_speed",
						"value" 		=> array(
							esc_html__('Slow', 'pandora') 	=> 'slow',
							esc_html__('Normal', 'pandora') 	=> 'normal',
							esc_html__('Fast', 'pandora') 	=> 'fast',
						),
						"description" 	=> "",
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Collapsed", 'pandora'),
						"param_name" 	=> "collapsed",
						"value" 		=> array(
							esc_html__('Disabled', 'pandora') 	=> 'no',
							esc_html__('Enabled', 'pandora') 		=> 'yes',
						),
						"description" 	=> esc_html__('Sets whether all nodes should be collapsed by default.', 'pandora'),
					),
					array(
						"type" 			=> "dropdown",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Unique", 'pandora'),
						"param_name" 	=> "unique",
						"value" 		=> array(
							esc_html__('Disabled', 'pandora') 	=> 'no',
							esc_html__('Enabled', 'pandora') 		=> 'yes',
						),
						"description" 	=> esc_html__('Sets whether only one tree node can be open at any time, collapsing any previous open nodes.', 'pandora'),
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
new PandoraCategoryTreeviewAddonClass();