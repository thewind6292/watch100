<?php
/**
 *  ADD Widget Filter Products
 */
function product_filter() {

	register_sidebar( array(
        'name' => __( 'Lọc SP Theo Giới Tính', 'watch100' ),
        'id' => 'filter-product-by-sex',
        'description' => __( 'The widget filter product by sex for the optional Showcase Template', 'watch100' ),
        'before_widget' => '<div class="widget-filter-product widget-filter-product-by-sex">',
        'after_widget' => '</div>',
    ) ); 

    register_sidebar( array(
        'name' => __( 'Lọc SP Theo Khoảng Đường Kính', 'watch100' ),
        'id' => 'filter-product-by-diameter',
        'description' => __( 'The widget filter product by diameter for the optional Showcase Template', 'watch100' ),
        'before_widget' => '<div class="widget-filter-product widget-filter-product-by-diameter">',
        'after_widget' => '</div>',
    ) ); 

    register_sidebar( array(
        'name' => __( 'Lọc SP Theo Khuyến Mại', 'watch100' ),
        'id' => 'filter-product-by-promotion',
        'description' => __( 'The widget filter product by promotion for the optional Showcase Template', 'watch100' ),
        'before_widget' => '<div class="widget-filter-product widget-filter-product-by-promotion">',
        'after_widget' => '</div>',
    ) ); 

    register_sidebar( array(
        'name' => __( 'Lọc SP Theo Kiểu Đồng Hồ', 'watch100' ),
        'id' => 'filter-product-by-style-watches',
        'description' => __( 'The widget filter product by style watches for the optional Showcase Template', 'watch100' ),
        'before_widget' => '<div class="widget-filter-product widget-filter-product-by-style-watches">',
        'after_widget' => '</div>',
    ) ); 

    register_sidebar( array(
        'name' => __( 'Lọc SP Theo Loại Dây', 'watch100' ),
        'id' => 'filter-product-by-wire',
        'description' => __( 'The widget filter product by wire for the optional Showcase Template', 'watch100' ),
        'before_widget' => '<div class="widget-filter-product widget-filter-product-by-sex">',
        'after_widget' => '</div>',
    ) ); 

    register_sidebar( array(
        'name' => __( 'Lọc SP Theo Loại Đồng Hồ', 'watch100' ),
        'id' => 'filter-product-by-type-watches',
        'description' => __( 'The widget filter product by type watches for the optional Showcase Template', 'watch100' ),
        'before_widget' => '<div class="widget-filter-product widget-filter-product-by-type-watches">',
        'after_widget' => '</div>',
    ) ); 

    register_sidebar( array(
        'name' => __( 'Lọc SP Theo Màu Sắc', 'watch100' ),
        'id' => 'filter-product-by-color',
        'description' => __( 'The widget filter product by color for the optional Showcase Template', 'watch100' ),
        'before_widget' => '<div class="widget-filter-product widget-filter-product-by-color">',
        'after_widget' => '</div>',
    ) ); 

    register_sidebar( array(
        'name' => __( 'Lọc SP Theo Thương Hiệu', 'watch100' ),
        'id' => 'filter-product-by-trademark',
        'description' => __( 'The widget filter product by trademark for the optional Showcase Template', 'watch100' ),
        'before_widget' => '<div class="widget-filter-product widget-filter-product-by-trademark">',
        'after_widget' => '</div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Lọc SP Theo Mức Giá', 'watch100' ),
        'id' => 'filter-product-by-price',
        'description' => __( 'The widget filter product by price for the optional Showcase Template', 'watch100' ),
        'before_widget' => '<div class="widget-filter-product widget-filter-product-by-price">',
        'after_widget' => '</div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Lọc SP Filter Order', 'watch100' ),
        'id' => 'filter-product-by-filter-order',
        'description' => __( 'The widget filter product by filter order for the optional Showcase Template', 'watch100' ),
        'before_widget' => '<div class="widget-filter-product widget-filter-product-by-filter-order">',
        'after_widget' => '</div>',
    ) ); 

    register_sidebar( array(
        'name' => __( 'SPFilter', 'watch100' ),
        'id' => 'filter-product-by-SPFilter',
        'description' => __( 'The widget filter product by filter order for the optional Showcase Template', 'watch100' ),
        'before_widget' => '<div class="widget-filter-product widget-filter-product-by-filter-order">',
        'after_widget' => '</div>',
    ) );             
}
add_action( 'widgets_init', 'product_filter' );