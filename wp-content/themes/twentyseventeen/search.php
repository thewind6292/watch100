<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

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




<div class="wrap">

	<header class="page-header">
		<?php if ( have_posts() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'excerpt' );

			endwhile; // End of the loop.

			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		else : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
			<?php
				get_search_form();

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
