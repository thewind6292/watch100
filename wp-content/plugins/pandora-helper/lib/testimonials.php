<?php
if(!function_exists('createTypeTestimonial')  ){
    function createTypeTestimonial() {

		// Set UI labels for Custom Post Type
		
		$labels = array(
			'name'                => _x( 'Testimonial', 'Post Type Testimonial', 'pandora' ),
			'singular_name'       => _x( 'Testimonial', 'Post Type Testimonial', 'pandora' ),
			'menu_name'           => __( 'Testimonials', 'pandora' ),
			'parent_item_colon'   => __( 'Parent Testimonial', 'pandora' ),
			'all_items'           => __( 'All Testimonials', 'pandora' ),
			'view_item'           => __( 'View Testimonial', 'pandora' ),
			'add_new_item'        => __( 'Add New Testimonial', 'pandora' ),
			'add_new'             => __( 'Add New', 'pandora' ),
			'edit_item'           => __( 'Edit Testimonial', 'pandora' ),
			'update_item'         => __( 'Update Testimonial', 'pandora' ),
			'search_items'        => __( 'Search Testimonial', 'pandora' ),
			'not_found'           => __( 'Not Found', 'pandora' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'pandora' ),

		);
		
		// Set other options for Custom Post Type
		
		$args = array(
			'label'               => __( 'Testimonial', 'pandora' ),
			'description'         => __( 'Testimonial news and reviews', 'pandora' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/	
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'menu_icon'     	  => 'dashicons-groups',
		);
		
		// Registering your Custom Post Type
		register_post_type( 'testimonial', $args );

	}
}