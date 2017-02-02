<?php

function optionsframework_option_name() {

    // This gets the theme name from the stylesheet
    $themename = wp_get_theme();
    $themename = preg_replace("/\W/", "_", strtolower($themename));

    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themename;
    update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */
function optionsframework_options() {

    // Test data
    $test_array = array(
        'one' => __('One', 'options_framework_theme'),
        'two' => __('Two', 'options_framework_theme'),
        'three' => __('Three', 'options_framework_theme'),
        'four' => __('Four', 'options_framework_theme'),
        'five' => __('Five', 'options_framework_theme')
    );

    // Multicheck Array
    $multicheck_array = array(
        'one' => __('French Toast', 'options_framework_theme'),
        'two' => __('Pancake', 'options_framework_theme'),
        'three' => __('Omelette', 'options_framework_theme'),
        'four' => __('Crepe', 'options_framework_theme'),
        'five' => __('Waffle', 'options_framework_theme')
    );

    // Multicheck Defaults
    $multicheck_defaults = array(
        'one' => '1',
        'five' => '1'
    );

    // Background Defaults
    $background_defaults = array(
        'color' => '',
        'image' => '',
        'repeat' => 'repeat',
        'position' => 'top center',
        'attachment' => 'scroll');

    // Typography Defaults
    $typography_defaults = array(
        'size' => '15px',
        'face' => 'georgia',
        'style' => 'bold',
        'color' => '#bada55');

    // Typography Options
    $typography_options = array(
        'sizes' => array('6', '12', '14', '16', '20'),
        'faces' => array('Helvetica Neue' => 'Helvetica Neue', 'Arial' => 'Arial'),
        'styles' => array('normal' => 'Normal', 'bold' => 'Bold'),
        'color' => false
    );

    // Pull all the categories into an array
    $options_categories = array();
    $options_categories_obj = get_categories();
    foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
    }

    // Pull all tags into an array
    $options_tags = array();
    $options_tags_obj = get_tags();
    foreach ($options_tags_obj as $tag) {
        $options_tags[$tag->term_id] = $tag->name;
    }


    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = 'Select a page:';
    foreach ($options_pages_obj as $page) {
        $options_pages[$page->ID] = $page->post_title;
    }

    // If using image radio buttons, define a directory path
    $imagepath = get_template_directory_uri() . '/images/';

    $options = array();

    /* ----------------------------------------------------------------------------------- */
    /* Tab Option for home page */
    /* ----------------------------------------------------------------------------------- */
    $options[] = array(
        'name' => __('Basic Settings', 'watch100'),
        'type' => 'heading');

   
    $options[] = array(
        'name' => __('Logo website:', 'watch100'),
        'desc' => __('Upload Logo Watch100 for website.', 'watch100'),
        'id' => 'logo_watch',
        'type' => 'upload'
    );
    
     $options[] = array(
        'name' => __('Địa chỉ:', 'watch100'),
        'desc' => __('Nhập địa chỉ cửa hàng', 'watch100'),
        'id' => 'address_1',
        'type' => 'text'
    );
    $options[] = array(
        'name' => __('Sđt chăm sóc KH:', 'watch100'),
        'desc' => __('Nhập sđt chăm sóc khách hàng', 'watch100'),
        'id' => 'phone_number_1',
        'type' => 'text'
    );
    $options[] = array(
        'name' => __('Sđt mua hàng online:', 'watch100'),
        'desc' => __('Sđt mua hàng online', 'watch100'),
        'id' => 'phone_number_2',
        'type' => 'text'
    );
    $options[] = array(
        'name' => __('Sđt tư vấn bảo hành:', 'watch100'),
        'desc' => __('Sđt tư vấn bảo hành', 'watch100'),
        'id' => 'phone_number_3',
        'type' => 'text'
    );
    $options[] = array(
        'name' => __('Email:', 'watch100'),
        'desc' => __('Email', 'watch100'),
        'id' => 'email',
        'type' => 'text'
    );
    $options[] = array(
        'name' => __('Nhập text footer:', 'watch100'),
        'desc' => __('Text in footer.', 'watch100'),
        'id' => 'text_footer',
        'type' => 'textarea'
    );

    /* ----------------------------------------------------------------------------------- */
    /* Tab Option for social */
    /* ----------------------------------------------------------------------------------- */
    $options[] = array(
        'name' => __('Social media', 'watch100'),
        'type' => 'heading'
    );
    $options[] = array(
        'name' => __('Link for Facebook:', 'watch100'),
        'desc' => __('Link go to Facebook.', 'watch100'),
        'id' => 'link_fb',
        'type' => 'text'
    );
    $options[] = array(
        'name' => __('Link for Twitter:', 'watch100'),
        'desc' => __('Link go to Twitter.', 'watch100'),
        'id' => 'link_tw',
        'type' => 'text'
    );
    $options[] = array(
        'name' => __('Link for Youtube:', 'watch100'),
        'desc' => __('Link go to Youtube.', 'watch100'),
        'id' => 'link_youtube',
        'type' => 'text'
    );
    $options[] = array(
        'name' => __('Link for Google +:', 'watch100'),
        'desc' => __('Link go to Google+.', 'watch100'),
        'id' => 'link_gg',
        'type' => 'text'
    );
    $options[] = array(
        'name' => __('Link for LinkedIn:', 'watch100'),
        'desc' => __('Link go to LinkedIn.', 'watch100'),
        'id' => 'link_linked',
        'type' => 'text'
    );
    
//end
    return $options;
}
