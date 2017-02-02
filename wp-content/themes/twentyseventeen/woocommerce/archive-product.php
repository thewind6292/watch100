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
                        <h1><span><?php single_cat_title(); ?></span></h1>
                    </div>

                    <div class='block_product_menu product_menu_0 blocks_productmenu blocks0 block'  id = "block_id_91" >				
                        <div class="segment cf">
							<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Lọc SP Theo Thương Hiệu')) : else : ?><?php endif; ?>

							<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Lọc SP Theo Khoảng Đường Kính')) : else : ?><?php endif; ?>

							<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Lọc SP Theo Màu Sắc')) : else : ?><?php endif; ?>

							<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Lọc SP Theo Kiểu Đồng Hồ')) : else : ?><?php endif; ?>

							<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Lọc SP Theo Loại Dây')) : else : ?><?php endif; ?>

							<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Lọc SP Theo Mức Giá')) : else : ?><?php endif; ?>

							<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Lọc SP Theo Loại Đồng Hồ')) : else : ?><?php endif; ?>

							<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Lọc SP Theo Giới Tính')) : else : ?><?php endif; ?>

							<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Lọc SP Theo Khuyến Mại')) : else : ?><?php endif; ?>
                        </div>    
                    </div>           
                    <div class="sort-cate clearfix">
                        <div class="sort-follow pull-left">

                            <div class=" cf">
                                <div class="field_name normal  "><ul><li class="first-del"><a class="" href="http://gallewatch.com/dong-ho-nam-pc138.html" title="Xóa tất cả" >Xóa tất cả</a></li><li class=" activated" ><a class="" href="http://gallewatch.com/dong-ho-nam-pc138/loc-san-pham:100--trieu,50-100-trieu.html" title="PERRELET" >PERRELET</a></li><li class=" activated" ><a class="" href="http://gallewatch.com/dong-ho-nam-pc138/loc-san-pham:hang-san-xuat-perrelet,100--trieu.html" title="Từ 50 triệu - 100 triệu" >Từ 50 triệu - 100 triệu</a></li><li class=" activated" ><a class="" href="http://gallewatch.com/dong-ho-nam-pc138/loc-san-pham:hang-san-xuat-perrelet,50-100-trieu.html" title="Trên 100 triệu" >Trên 100 triệu</a></li></ul></div>		</div>

                        </div>
                        <div class="limit-follow pull-right">
                            <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Lọc SP Filter Order')) : else : ?><?php endif; ?>
                        </div>
                    </div>
                    <!--<div class="block block-layered-nav">-->
                    <!--</div>-->
                    <div class='vertical clearfix' id="vertical">

                    	<?php if ( have_posts() ) :?>

							<?php woocommerce_product_loop_start(); ?>

								<?php //woocommerce_product_subcategories(); ?>

								<?php while ( have_posts() ) : the_post(); ?>
									
									<?php wc_get_template_part( 'content', 'product' ); ?>

								<?php endwhile; // end of the loop. ?>

							<?php woocommerce_product_loop_end(); ?>

						<?php else : ?>

							<?php wc_get_template( 'loop/no-products-found.php' ); ?>

						<?php endif; ?>

                    </div><!--end: .vertical-->
                    
            </div>
        </div><!-- end.row -->
    </div> <!-- end.container -->

<?php get_footer( 'shop' ); ?>