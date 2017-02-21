<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >
	<div class="container">
		<div id="slider" class="nivoSlider"> 
		<?php if( have_rows('add_images') ):
			    while ( have_rows('add_images') ) : the_row();
			        echo '<img src="'.get_sub_field('item_image').'"/>';
			    endwhile;
		    endif;
		?>
		</div>
	</div>
	<br><br><br>
	<div class="container container-header">
        <div id="main_container" class="mt20">
            <div class="main-column">
                <div class="main_product">
                    <div class="block_manu block hidden-sm hidden-xs">
                        <h2 class="block_title">
                            <span>Thương hiệu nổi bật</span>
                        </h2>
                        <div class="content-partners des-part">
                        	<?php if( have_rows('add_img_trademark') ):
								    while ( have_rows('add_img_trademark') ) : the_row();
								    	echo '<div class="box-partners">';
								    		echo '<a href="'.get_sub_field('add_link_trademark').'"  rel="nofollow" target="_blink">';
								        	echo '<img src="'.get_sub_field('item_img_trademark').'"/></a>';
							        	echo '</div>';
								    endwhile;
							    endif;
							?>
                        </div>
                    </div>
                    <div class='block_banners banners_0 blocks_banner blocks0 block'  id = "block_id_94" >
                    	<div class="wrapper-banner cf">
                        	<?php if( have_rows('img_ads_block_1') ):
							    while ( have_rows('img_ads_block_1') ) : the_row();
							    	echo '<div class="col-banner-1 fl">';
							    		echo '<a href="'.get_sub_field('link_ads').'">';
							        	echo '<img src="'.get_sub_field('image_item').'"/></a>';
						        	echo '</div>';
							    endwhile;
						    	endif;
							?>
                        </div>
                    </div>            			

                    <div class="block_products_list  blocks_product_list block blocks_product_list_vertical mt20">
                            <h2 class="block_title">
                            	<span>Sản phẩm khuyến mãi	</span>
                            </h2>
                            <div class="block-content">
                            <?php 
                            	$query_args = array(
								    'no_found_rows'     => 1,
								    'post_status'       => 'publish',
								    'post_type'         => 'product',
								    'meta_query'        => WC()->query->get_meta_query(),
								    'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
								);
								$products = new WP_Query( $query_args );
								if ($products->have_posts()) : 
									while ($products->have_posts()) : $products->the_post(); 
									 wc_get_template_part( 'content', 'product' ); 
										$_product = wc_get_product( get_the_id());
										$tietkiem = $_product->get_regular_price() - $_product->get_price();
								?>
								 	<?php endwhile;
								endif;
								wp_reset_query(); 
                            ?>
                        	</div>
                    </div>


                    <div class='block_banners banners_0 blocks_banner blocks0 block'  id = "block_id_101" >
                    	<div class="wrapper-banner cf">
                            <?php if( have_rows('img_ads_block_2') ):
							    while ( have_rows('img_ads_block_2') ) : the_row();
							    	echo '<div class="col-banner-1 fl">';
							    		echo '<a href="'.get_sub_field('link_ads').'">';
							        	echo '<img src="'.get_sub_field('image_item').'"/></a>';
						        	echo '</div>';
							    endwhile;
						    	endif;
							?>
                        </div>
                    </div>            			

                        <div class="block_products_list  blocks_product_list block blocks_product_list_vertical mt20">
                            <h2 class="block_title">
                                <span>Sản phẩm bán chạy</span></a>
                            </h2>
                            <div class="block-content">
                            	<?php
								$args_best_selling = array(
									'post_type'           => 'product',
									'post_status'         => 'publish',
									'posts_per_page'      => 16,
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
                            </div>
                        </div>


                        <div class='block_banners banners_0 blocks_banner blocks0 block'  id = "block_id_102" >
                        	<div class="wrapper-banner cf">
                        		<?php if( have_rows('img_ads_block_3') ):
								    while ( have_rows('img_ads_block_3') ) : the_row();
								    	echo '<div class="col-banner-1 fl">';
								    		echo '<a href="'.get_sub_field('link_ads').'">';
								        	echo '<img src="'.get_sub_field('image_item').'"/></a>';
							        	echo '</div>';
								    endwhile;
							    	endif;
								?>
                            </div>
                        </div>

                        <div class="block_products_list  blocks_product_list block blocks_product_list_vertical mt20">
                            <h2 class="block_title">
                                <span> Sản phẩm mới	</span>
                            </h2>
                            <div class="block-content">
                            	<?php 
								    $args = array( 'post_type' => 'product', 'posts_per_page' => 20);
								    $loop = new WP_Query( $args );
								    while ( $loop->have_posts() ) : $loop->the_post(); 
								    global $product; 
									wc_get_template_part( 'content', 'product' ); 
								    endwhile; 
								    wp_reset_query(); 
                            	?>
                            </div>
                        </div>
                        <div class="wrapper-news-home">
						    <div class="row">
						    	<?php
							    	$args_feature_post = array(
										'post_type'           => 'post',
										'post_status'         => 'publish',
										'cat'      			  => 27,
										'posts_per_page'      => 1,
										'featured'            =>'yes'
									);

									$post_featured = new WP_Query($args_feature_post);
									if ($post_featured->have_posts()) : 
										while ($post_featured->have_posts()) : $post_featured->the_post();
										?>
										<div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 item-nh">
								            <div class="title-cat-nh">
								                <a href="<?php echo get_category_link(27); ?>"><?php echo get_cat_name(27); ?></a>
								                <div class="border-nh"></div>
								            </div>
								            <ul class="list-nh">
								                <li>
									                <div class="first-item-nh">
									                    <a href="<?php echo get_permalink(get_the_id()); ?>"><?php the_title( ); ?></a>
									                    <a href="<?php echo get_permalink(get_the_id()); ?>">
									                        <?php the_post_thumbnail( $size, $attr ); ?>
									                    </a>
									                    <div class="date-nh">
									                       <?php echo get_the_date('d/m/y',get_the_id()); ?> </div>
									                    <div class="summary-nh">
									                        <span><?php the_excerpt(); ?></span>
									                    </div>
									                </div>
								            	</li>
								         	</ul>
								        </div>
										<?php 
										endwhile;
									endif;
									wp_reset_query(); 	
								?>

								<?php
							    	$args_feature_post = array(
										'post_type'           => 'post',
										'post_status'         => 'publish',
										'cat'      			  => 28,
										'posts_per_page'      => 1,
										'featured'            =>'yes'
									);

									$post_featured = new WP_Query($args_feature_post);
									if ($post_featured->have_posts()) : 
										while ($post_featured->have_posts()) : $post_featured->the_post();
										?>
										<div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 item-nh">
								            <div class="title-cat-nh">
								                <a href="<?php echo get_category_link(28); ?>"><?php echo get_cat_name(28); ?></a>
								                <div class="border-nh"></div>
								            </div>
								            <ul class="list-nh">
								                <li>
									                <div class="first-item-nh">
									                    <a href="<?php echo get_permalink(get_the_id()); ?>"><?php the_title( ); ?></a>
									                    <a href="<?php echo get_permalink(get_the_id()); ?>">
									                        <?php the_post_thumbnail( $size, $attr ); ?>
									                    </a>
									                    <div class="date-nh">
									                       <?php echo get_the_date('d/m/y',get_the_id()); ?> </div>
									                    <div class="summary-nh">
									                        <span><?php the_excerpt(); ?></span>
									                    </div>
									                </div>
								            	</li>
								         	</ul>
								        </div>
										<?php 
										endwhile;
									endif;
									wp_reset_query(); 	
								?>

								<?php
							    	$args_feature_post = array(
										'post_type'           => 'post',
										'post_status'         => 'publish',
										'cat'      			  => 24,
										'posts_per_page'      => 1,
										'featured'            =>'yes'
									);

									$post_featured = new WP_Query($args_feature_post);
									if ($post_featured->have_posts()) : 
										while ($post_featured->have_posts()) : $post_featured->the_post();
										?>
										<div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 item-nh">
								            <div class="title-cat-nh">
								                <a href="<?php echo get_category_link(24); ?>"><?php echo get_cat_name(24); ?></a>
								                <div class="border-nh"></div>
								            </div>
								            <ul class="list-nh">
								                <li>
									                <div class="first-item-nh">
									                    <a href="<?php echo get_permalink(get_the_id()); ?>"><?php the_title( ); ?></a>
									                    <a href="<?php echo get_permalink(get_the_id()); ?>">
									                        <?php the_post_thumbnail( $size, $attr ); ?>
									                    </a>
									                    <div class="date-nh">
									                       <?php echo get_the_date('d/m/y',get_the_id()); ?> </div>
									                    <div class="summary-nh">
									                        <span><?php the_excerpt(); ?></span>
									                    </div>
									                </div>
								            	</li>
								         	</ul>
								        </div>
										<?php 
										endwhile;
									endif;
									wp_reset_query(); 	
								?>

								<?php
							    	$args_feature_post = array(
										'post_type'           => 'post',
										'post_status'         => 'publish',
										'cat'      			  => 25,
										'posts_per_page'      => 1,
										'featured'            =>'yes'
									);

									$post_featured = new WP_Query($args_feature_post);
									if ($post_featured->have_posts()) : 
										while ($post_featured->have_posts()) : $post_featured->the_post();
										?>
										<div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 item-nh">
								            <div class="title-cat-nh">
								                <a href="<?php echo get_category_link(25); ?>"><?php echo get_cat_name(25); ?></a>
								                <div class="border-nh"></div>
								            </div>
								            <ul class="list-nh">
								                <li>
									                <div class="first-item-nh">
									                    <a href="<?php echo get_permalink(get_the_id()); ?>"><?php the_title( ); ?></a>
									                    <a href="<?php echo get_permalink(get_the_id()); ?>">
									                        <?php the_post_thumbnail( $size, $attr ); ?>
									                    </a>
									                    <div class="date-nh">
									                       <?php echo get_the_date('d/m/y',get_the_id()); ?> </div>
									                    <div class="summary-nh">
									                        <span><?php the_excerpt(); ?></span>
									                    </div>
									                </div>
								            	</li>
								         	</ul>
								        </div>
										<?php 
										endwhile;
									endif;
									wp_reset_query(); 	
								?>
							</div>
					    </div>
                    </div>                    
                </div>
            </div><!-- end.row -->
        </div> <!-- end.container -->
</article><!-- #post-## -->
