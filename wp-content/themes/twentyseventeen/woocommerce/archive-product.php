<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div class="container container-header">
    <div id="main_container" class="mt20">
        <div class="main-column">
            <!-- BREADCRUMBS-->

            <div class="border-pro border-mainmenu"></div>
            <div class='product_cat'>
                <div class="frame_head clearfix">
                    <h1><span><?php $current_category = single_cat_title("", false); if($current_category!=""){ echo $current_category; }else{ echo "Shop"; } ?></span></h1>
                </div>

                <div class='block_product_menu product_menu_0 blocks_productmenu blocks0 block'  id = "block_id_91" >					<!--FILTER-->
                    <div class="segment cf">
                    	
                    </div>
                </div>           
                <div class="sort-cate clearfix">
                    <div class="sort-follow pull-left">

                        <!--FILTER-->


                        <div class=" cf">
                            <div class="field_name normal  "><ul><li class="first-del"><a class="" href="http://gallewatch.com/dong-ho-nam-pc138.html" title="Xóa tất cả" >Xóa tất cả</a></li><li class=" activated" ><a class="" href="http://gallewatch.com/dong-ho-nam-pc138/loc-san-pham:100--trieu,50-100-trieu.html" title="PERRELET" >PERRELET</a></li><li class=" activated" ><a class="" href="http://gallewatch.com/dong-ho-nam-pc138/loc-san-pham:hang-san-xuat-perrelet,100--trieu.html" title="Từ 50 triệu - 100 triệu" >Từ 50 triệu - 100 triệu</a></li><li class=" activated" ><a class="" href="http://gallewatch.com/dong-ho-nam-pc138/loc-san-pham:hang-san-xuat-perrelet,50-100-trieu.html" title="Trên 100 triệu" >Trên 100 triệu</a></li></ul></div>		</div>

                    </div>
                    <div class="limit-follow pull-right">
                        <select name="limit" onchange="window.location = this.value">
                            <option value="?order=default"  selected="selected" >Sản phẩm mới</option>
                            <option value="?order=desc"   >Giá giảm dần</option>
                            <option value="?order=asc"   >Giá tăng dần</option>
                            <option value="?order=promotion"   >Khuyến mãi(%)</option>
                        </select>	
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

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', 'product' ); ?>

							<?php endwhile; // end of the loop. ?>

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
                    <?php wp_pagenavi(); ?>
                </div><!--end: .vertical-->
                
        </div>
    </div><!-- end.row -->
</div> <!-- end.container -->

<?php get_footer( 'shop' ); ?>