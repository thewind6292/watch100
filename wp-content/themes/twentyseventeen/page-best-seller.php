<?php
/**
 * Template Name: Page Best Seller
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div class="container container-header">
    <div id="main_container" class="mt20">
        <div class="main-column">
            <!-- BREADCRUMBS-->

            <div class='product_cat'>
                <div class="frame_head clearfix">
                    <h1><span>Sản Phẩm Bán Chạy</span></h1>
                </div>

                <div class="wrap-list-product-after-filter"> 
	                <div class="sort-cate clearfix">
	                    <div class="sort-follow pull-left">

	                    </div>
	                    <div class="limit-follow pull-right">
	                        
	                        <?php wc_get_template_part( 'content', 'orderby' ); ?>
	                    </div>
	                </div>
	                <!--<div class="block block-layered-nav">-->
	                <!--</div>-->
	                <div class='vertical clearfix' id="vertical">
	                	<?php
							global $product, $woocommerce;
							/**
							 * woocommerce_before_main_content hook.
							 *
							 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
							 * @hooked woocommerce_breadcrumb - 20
							 */
							//do_action( 'woocommerce_before_main_content' );
						?>

						<?php if ( have_posts() ) : ?>

							<?php
								/**
								 * woocommerce_before_shop_loop hook.
								 *
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								//do_action( 'woocommerce_before_shop_loop' );
							?>

							<?php woocommerce_product_loop_start(); ?>

								<?php woocommerce_product_subcategories(); ?>

								<?php
								$args_best_selling = array(
									'post_type'           => 'product',
									'post_status'         => 'publish',
									'posts_per_page'      => 12,
									'meta_key'            => 'total_sales',
									'orderby'             => 'meta_value_num'
								);		

								$products_best_selling = new WP_Query($args_best_selling);
									if ($products_best_selling->have_posts()) : 
										while ($products_best_selling->have_posts()) : $products_best_selling->the_post(); 
										 wc_get_template_part( 'content', 'product' );
									?>
									 	<?php endwhile;
									endif;
									wp_reset_query(); 
							    ?>

							<?php woocommerce_product_loop_end(); ?>

							<?php
								/**
								 * woocommerce_after_shop_loop hook.
								 *
								 * @hooked woocommerce_pagination - 10
								 */
								//do_action( 'woocommerce_after_shop_loop' );
							?>

						<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

							<?php wc_get_template( 'loop/no-products-found.php' ); ?>

						<?php endif; ?>

						<?php
							/**
							 * woocommerce_after_main_content hook.
							 *
							 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
							 */
							//do_action( 'woocommerce_after_main_content' );

						?>
	                    <?php if(function_exists('wp_pagenavi')) {?> <?php wp_pagenavi(array( 'query' => $products_best_selling )); ?> <?php } ?> 
	                </div><!--end: .vertical-->

	        	</div><!--end: .wrap-list-product-after-filter-->  
	              
                
                
        </div>
    </div><!-- end.row -->
</div> <!-- end.container -->

<?php get_footer( 'shop' ); ?>