<?php
$pandora_options = get_option("pandora_options");

if (function_exists('createTypeTestimonial') && isset($pandora_options['enable_testimonials']) && $pandora_options['enable_testimonials']){
	add_action( 'init','createTypeTestimonial',0 );
}