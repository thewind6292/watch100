<?php
if (!defined('ABSPATH')) exit('No direct script access allowed');

 /*  *
 * CodeNegar WooCommerce AJAX Product Filter by Category widget
 *
 * Adds widget to use in sidebar
 *
 * @package    	WooCommerce AJAX Product Filter
 * @author      Farhad Ahmadi <ahm.farhad@gmail.com>
 * @license     http://codecanyon.net/licenses
 * @link		http://codenegar.com/go/wcpf
 * @version    	2.8.0
 */

class Woocommerce_product_filter_category extends WP_Widget{
    public function __construct() {
        global $codenegar_wcpf;
        parent::__construct(
            'woocommerce_product_filter_category',
            __('Product Filter by Category', $codenegar_wcpf->text_domain),
            array('description' => __('Filter products by hierarchical category navigation.', $codenegar_wcpf->text_domain))
        );
    }

    public function defaults() {
        $defaults = array(
            'widget' => 'cat',
            'type'    => 'list',
            'selected' => 0,
            'title' => '',
            'sub_title' => '',
            'range_template' => '%s $ - %e $',
            'min' => 0,
            'max' => 100,
            'print_before_widget' => 'true',
            'print_after_widget' => 'true',
            'hide_empty' => 'true',
            'custom_class' => '',
        );

        return $defaults;
    }

    public function form($instance) { // Backend widget form
        global $codenegar_wcpf;
        wp_enqueue_script('jquery');
        wp_enqueue_script('codenegar-admin-option-widget');
        wp_enqueue_style('codenegar-admin-option-widget-css');
        $defaults = $this->defaults();
        if(count($instance)>0){ // not first time
            $instance = codenegar_parse_args($instance, array('print_before_widget' => 'false', 'print_after_widget' => 'false', 'hide_empty' => 'false')); // if it has been saved and checkboxes have no value means there were unchecked
        }
        $instance = codenegar_parse_args($instance, $defaults);
        extract($instance); // Extract array to multiple variables
        ?>
		<p>
			<label for="<?php echo $this->get_field_id('type'); ?>" ><?php _e('Display Type', $codenegar_wcpf->text_domain); ?>:</label>
			<select
			name="<?php echo $this->get_field_name('type'); ?>"
			class="widget_type widefat"
			id = "<?php echo $this->get_field_id('type'); ?>"
			>
				<option <?php if(isset($type) && $type == 'list') { echo 'selected="selected"'; } ?>  value="list"><?php _e('List (Checkbox/Toggle List)', $codenegar_wcpf->text_domain); ?></option>
				<option <?php if(isset($type) && $type == 'dropdown') { echo 'selected="selected"'; } ?>  value="dropdown"><?php _e('Dropdown', $codenegar_wcpf->text_domain); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('selected'); ?>" ><?php _e('Category', $codenegar_wcpf->text_domain); ?>:</label>
			<?php
            $options = array(
                'selected'    =>    $selected,
                'name'        =>    $this->get_field_name('selected'),
                'id'        =>    $this->get_field_id('selected'),
                'class'        =>    'widefat',
            );
            $codenegar_wcpf->helper->dropdown_cat($options);
            ?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>" ><?php _e('Title', $codenegar_wcpf->text_domain); ?>:</label>
			<input
				type="text"
				class="widefat"
				id = "<?php echo $this->get_field_id('title'); ?>"
				name = "<?php echo $this->get_field_name('title'); ?>"
				value = "<?php if(isset($title)) echo $title; ?>"
			/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('sub_title'); ?>" ><?php _e('Sub Title', $codenegar_wcpf->text_domain); ?>:</label>
			<input
				type="text"
				class="widefat"
				id = "<?php echo $this->get_field_id('sub_title'); ?>"
				name = "<?php echo $this->get_field_name('sub_title'); ?>"
				value = "<?php if(isset($sub_title)) echo $sub_title; ?>"
			/>
		</p>
		<p>
			<input class="checkbox"
				<?php if(isset($hide_empty) && $hide_empty == 'true') { echo 'checked="checked"'; } ?>
				id = "<?php echo $this->get_field_id('hide_empty'); ?>"
				name = "<?php echo $this->get_field_name('hide_empty'); ?>"
				value = "true"
				type = "checkbox"
			/>
			<label for="<?php echo $this->get_field_id('hide_empty'); ?>" ><?php _e('Hide Empty', $codenegar_wcpf->text_domain); ?></label>
		</p>
		<p>

			<input class="checkbox"
				<?php if(isset($print_before_widget) && $print_before_widget == 'true') { echo 'checked="checked"'; } ?>
				id = "<?php echo $this->get_field_id('print_before_widget'); ?>"
				name = "<?php echo $this->get_field_name('print_before_widget'); ?>"
				value = "true"
				type = "checkbox"
			/>
			<label for="<?php echo $this->get_field_id('print_before_widget'); ?>" ><?php _e('Print Widget Opener', $codenegar_wcpf->text_domain); ?></label>
		</p>
		<p>

			<input class="checkbox"
				<?php if(isset($print_after_widget) && $print_after_widget == 'true') { echo 'checked="checked"'; } ?>
				id = "<?php echo $this->get_field_id('print_after_widget'); ?>"
				name = "<?php echo $this->get_field_name('print_after_widget'); ?>"
				value = "true"
				type = "checkbox"
			/>
			<label for="<?php echo $this->get_field_id('print_after_widget'); ?>" ><?php _e('Print Widget Closer', $codenegar_wcpf->text_domain); ?></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('custom_class'); ?>" ><?php _e('Custom CSS Class', $codenegar_wcpf->text_domain); ?>:</label>
			<input
				type="text"
				class="widefat"
				id = "<?php echo $this->get_field_id('custom_class'); ?>"
				name = "<?php echo $this->get_field_name('custom_class'); ?>"
				value = "<?php if(isset($custom_class)) echo $custom_class; ?>"
			/>
		</p>
		<?php
    }

    public function widget($args, $instance) { // Frontend widget form
        global $codenegar_wcpf;

        if(!$codenegar_wcpf->helper->is_wcpf_area()){ // Not on product page - return
            return;
        }

        $defaults = $this->defaults();
        if(count($instance)>0){ // not first time
            $instance = codenegar_parse_args($instance, array('print_before_widget' => 'false', 'print_after_widget' => 'false', 'hide_empty' => 'false')); // if it has been saved and checkboxes have no value means there were unchecked
        }
        $instance = codenegar_parse_args($instance, $defaults);

        extract($instance);
        extract($args);
        // $before_widget, $print_before_widget,... are defined by extracting arrays
        $before_widget = $codenegar_wcpf->helper->add_master_wrap_class($before_widget);
        if($print_before_widget == 'true'){
            if($type == 'list' || $type == 'dropdown'){
                $before_widget = $codenegar_wcpf->helper->add_layered_class($before_widget);
            }
            echo $before_widget;
        }
        echo $before_title;
        echo $title;
        echo $after_title;
        ?>

			<?php
                if($instance['hide_empty'] == 'true'){
                    $instance['hide_empty'] = 1;
                }else{
                    $instance['hide_empty'] = 0;
                }
                codenegar_wcpf_generate_widget($instance);
            ?>

		<?php
        if($print_after_widget == 'true'){
            echo $after_widget;
        }
    }
}

function woocommerce_product_filter_category_widget_register() {
    register_widget('woocommerce_product_filter_category');
}

add_action('widgets_init', 'woocommerce_product_filter_category_widget_register');
?>
