<?php
/*
 * This is Social media widget
 */

// don't load directly
if(!defined('ABSPATH')) die('-1');

// registered social media widget
if(! function_exists('pandora_social_media_widget'))
{
	function pandora_social_media_widget() {
		register_widget('Pandora_SocialMedia_Widget');
	}
}
add_action('widgets_init', 'pandora_social_media_widget');

// Pandora Social Media Widget Class
if(! class_exists('Pandora_SocialMedia_Widget')) 
{
	class Pandora_SocialMedia_Widget extends WP_Widget 
	{

		public function __construct() 
		{
			parent::__construct(
				'pandora_social_media', // Base ID
				esc_html__('Pandora Social Media', 'pandora'), // Name
				array('description' => esc_html__('A widget that displays Social Media Profiles', 'pandora')) // Args
			);
		}

		public function widget($args, $instance) 
		{
			
			$title = apply_filters('widget_title', $instance['title']);
			
			$pandora_options = get_option("pandora_options");
			
			$facebook = $pinterest = $linkedin = $twitter = $googleplus = $rss = $tumblr = $instagram = $youtube = $vimeo = $behance = $dribble = $flickr = $git = $skype = $weibo = $foursquare = $soundcloud = $vk = "";
			
			if(isset($pandora_options['facebook_link'])) 		$facebook 	= esc_url($pandora_options['facebook_link']);
			if(isset($pandora_options['pinterest_link'])) 	$pinterest 	= esc_url($pandora_options['pinterest_link']);
			if(isset($pandora_options['linkedin_link'])) 		$linkedin 	= esc_url($pandora_options['linkedin_link']);
			if(isset($pandora_options['twitter_link'])) 		$twitter 	= esc_url($pandora_options['twitter_link']);
			if(isset($pandora_options['googleplus_link'])) 	$googleplus = esc_url($pandora_options['googleplus_link']);
			if(isset($pandora_options['rss_link'])) 			$rss 		= esc_url($pandora_options['rss_link']);
			if(isset($pandora_options['tumblr_link'])) 		$tumblr 	= esc_url($pandora_options['tumblr_link']);
			if(isset($pandora_options['instagram_link'])) 	$instagram 	= esc_url($pandora_options['instagram_link']);
			if(isset($pandora_options['youtube_link']))		$youtube 	= esc_url($pandora_options['youtube_link']);
			if(isset($pandora_options['vimeo_link'])) 		$vimeo 		= esc_url($pandora_options['vimeo_link']);
			if(isset($pandora_options['behance_link'])) 		$behance 	= esc_url($pandora_options['behance_link']);
			if(isset($pandora_options['dribble_link'])) 		$dribble 	= esc_url($pandora_options['dribble_link']);
			if(isset($pandora_options['flickr_link'])) 		$flickr 	= esc_url($pandora_options['flickr_link']);
			if(isset($pandora_options['git_link'])) 			$git 		= esc_url($pandora_options['git_link']);
			if(isset($pandora_options['skype_link'])) 		$skype 		= esc_url($pandora_options['skype_link']);
			if(isset($pandora_options['weibo_link'])) 		$weibo 		= esc_url($pandora_options['weibo_link']);
			if(isset($pandora_options['foursquare_link'])) 	$foursquare = esc_url($pandora_options['foursquare_link']);
			if(isset($pandora_options['soundcloud_link'])) 	$soundcloud = esc_url($pandora_options['soundcloud_link']);
			if(isset($pandora_options['vk_link'])) 			$vk 		= esc_url($pandora_options['vk_link']);

			$return_content = ""; // reset return content;

			$title = !empty($instance['title']) ? strip_tags($instance['title']) : '';
			
			if($args == 'shortcode') {

				$return_content .= '<h2>'.$title.'</h2>';
			}

			if(!empty($facebook)) 	$return_content .= '<a href="' . esc_url($facebook) . '" target="_blank" class="widget_connect_facebook">Facebook</a>';
			if(!empty($pinterest)) 	$return_content .= '<a href="' . esc_url($pinterest) . '" target="_blank" class="widget_connect_pinterest">Pinterest</a>';
			if(!empty($linkedin)) 	$return_content .= '<a href="' . esc_url($linkedin) . '" target="_blank" class="widget_connect_linkedin">Linkedin</a>';
			if(!empty($twitter)) 	$return_content .= '<a href="' . esc_url($twitter) . '" target="_blank" class="widget_connect_twitter">Twitter</a>';
			if(!empty($googleplus)) $return_content .= '<a href="' . esc_url($googleplus) . '" target="_blank" class="widget_connect_googleplus">Google+</a>';
			if(!empty($rss)) 		$return_content .= '<a href="' . esc_url($rss) . '" target="_blank" class="widget_connect_rss">RSS</a>';
			if(!empty($tumblr)) 	$return_content .= '<a href="' . esc_url($tumblr) . '" target="_blank" class="widget_connect_tumblr">Tumblr</a>';
			if(!empty($instagram)) 	$return_content .= '<a href="' . esc_url($instagram) . '" target="_blank" class="widget_connect_instagram">Instagram</a>';
			if(!empty($youtube)) 	$return_content .= '<a href="' . esc_url($youtube) . '" target="_blank" class="widget_connect_youtube">Youtube</a>';
			if(!empty($vimeo)) 		$return_content .= '<a href="' . esc_url($vimeo) . '" target="_blank" class="widget_connect_vimeo">Vimeo</a>';
			if(!empty($behance)) 	$return_content .= '<a href="' . esc_url($behance) . '" target="_blank" class="widget_connect_behance">Behance</a>';
			if(!empty($dribble)) 	$return_content .= '<a href="' . esc_url($dribble) . '" target="_blank" class="widget_connect_dribble">Dribble</a>';
			if(!empty($flickr)) 	$return_content .= '<a href="' . esc_url($flickr) . '" target="_blank" class="widget_connect_flickr">Flickr</a>';
			if(!empty($git)) 		$return_content .= '<a href="' . esc_url($git) . '" target="_blank" class="widget_connect_git">Git</a>';
			if(!empty($skype)) 		$return_content .= '<a href="' . esc_url($skype) . '" target="_blank" class="widget_connect_skype">Skype</a>';
			if(!empty($weibo)) 		$return_content .= '<a href="' . esc_url($weibo) . '" target="_blank" class="widget_connect_weibo">Weibo</a>';
			if(!empty($foursquare)) $return_content .= '<a href="' . esc_url($foursquare) . '" target="_blank" class="widget_connect_foursquare">Foursquare</a>';
			if(!empty($soundcloud)) $return_content .= '<a href="' . esc_url($soundcloud) . '" target="_blank" class="widget_connect_soundcloud">Soundcloud</a>';
			if(!empty($vk)) 		$return_content .= '<a href="' . esc_url($vk) . '" target="_blank" class="widget_connect_vk">VK</a>';

			if($args != 'shortcode') {

				$title = apply_filters('widget_title', $instance['title']);
				
				echo($args['before_widget']);
				
					if(! empty($title)) echo($args['before_title']). esc_html($title) .$args['after_title'];

					if($return_content==""){

						$content_null = '<p>'. esc_html__("No item found. Please check your config(*_*)", "pandora") .'</p>';
						echo $content_null;
					}else{

						echo($return_content);
					}
					
				echo $args['after_widget'];
				
			}
			else {

				if($return_content==""){

					$content_null .= '<h2>'. $title .'</h2>';
					$content_null .= '<p>'. esc_html__("No item found. Please check your config(*_*)", "pandora") .'</p>';
					return $content_null;

				}else{

					return $return_content;
				}
				
			}
		}

		public function form($instance) 
		{
			$title = !empty($instance['title']) ? strip_tags($instance['title']) : '';

			?>
			
			<p><em><?php esc_html_e('You can manager Social Media link in Pandora >> Social Media.', 'pandora'); ?></em></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'pandora'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
			</p>
			
			<?php 
		}

		public function update($new_instance, $old_instance) 
		{
			$instance = array();
			
			$instance['title'] = ! empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';

			return $instance;
		}

		/**
		 * Create Shortcode for this widget
		 * [pandora_social_media class_suffix="WIDGET_CLASS_SUFFIX" ...]
		 */
		 
		public static function shortcode($atts, $content = "")
		{
			$widget = new Pandora_SocialMedia_Widget;
			return $widget->widget("shortcode", $atts);
		}
	}
}

// Add this widget to Visual Composer
if(! class_exists('PandoraSocialMediaAddonClass')) 
{
	class PandoraSocialMediaAddonClass 
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
				"name" 			=> esc_html__("Pandora Social Media", 'pandora'),
				"description" 	=> esc_html__("Pandora Social Media for profile.", 'pandora'),
				"base" 			=> "pandora_social_media",
				"class" 		=> "",
				"controls" 		=> "full",
				"icon" 			=> "icon-wpb-wp",
				"category" 		=> esc_html__('Pandora Widgets', 'pandora'),
				
				"params" => array(
					array(
						"type" 			=> "textfield",
						"save_always" 	=> true,
						"class" 		=> "",
						"heading" 		=> esc_html__("Title", 'pandora'),
						"param_name" 	=> "title",
						"value" 		=> "Get Connected",
						"description" 	=> "You can manager Social Media link in Pandora >> Social Media."
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
new PandoraSocialMediaAddonClass();