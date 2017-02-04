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
	<div class="">
		<div id="slider">
		<?php if( have_rows('add_images') ):
			    while ( have_rows('add_images') ) : the_row();
			        echo '<img src="'.get_sub_field('item_image').'"/>';
			    endwhile;
		    endif;
		?>
        </div>
        <div class="group1-Wrapper">
            <a onclick="imageSlider.previous()" class="group1-Prev"></a>
            <a onclick="imageSlider.next()" class="group1-Next"></a>
        </div>
	</div>
	<br><br><br>
	<div class="container container-header">
        <div id="main_container" class="mt20">
            <div class="main-column">
                <div class="main_product">
                    <div class="block_manu block ">
                        <h2 class="block_title">
                            <a href="javascript:void(0)"><span>Thương hiệu nổi bật</span></a>
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
	                             $atts = array(
									'orderby' => 'title',
									'order'   => 'asc');
	                             $meta_query = WC()->query->get_meta_query();
									
								$args = array(
									'post_type'           => 'product',
									'post_status'         => 'publish',
									'posts_per_page'      => 20,
									'meta_key'            => 'total_sales',
									'orderby'             => 'meta_value_num',
									'meta_query'          => $meta_query
								);		

								$products_best_selling = new WP_Query(apply_filters('woocommerce_shortcode_products_query', $args, $atts));
								    
									if ($products_best_selling->have_posts()) : 
										while ($products_best_selling->have_posts()) : $products_best_selling->the_post(); 
										 // wc_get_template_part( 'content', 'product' ); 
											$_products_best_selling = wc_get_product( get_the_id());
											var_dump(get_the_id());
											// $tietkiem = $_product->get_regular_price() - $_product->get_price();
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
                                <a href="http://www.gallewatch.com/san-pham-moi.html"><span>
                                        Sản phẩm mới				</span></a>
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
                                <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 item-nh">
                                    <div class="title-cat-nh">
                                        <a href="http://www.gallewatch.com/danh-muc-tin/review-san-pham.html">Review sản phẩm</a>
                                        <div class="border-nh"></div>
                                    </div>
                                    <ul class="list-nh">
                                        <li>
                                            <div class="first-item-nh">
                                                <a href="http://www.gallewatch.com/review-san-pham/galle-watch-tip:-mot-so-goi-y-khi-mua-dong-ho-online.html" class="title-first-nh" title="Galle Watch Tip: Một số gợi ý khi mua đồng hồ online">Galle Watch Tip: Một số gợi ý khi mua đồng hồ online</a>
                                                <a href="http://www.gallewatch.com/review-san-pham/galle-watch-tip:-mot-so-goi-y-khi-mua-dong-ho-online.html" title="Galle Watch Tip: Một số gợi ý khi mua đồng hồ online">
                                                    <img src="http://www.gallewatch.com/images/news/2017/01/16/resized/untitled_1484562006.png" alt="Galle Watch Tip: Một số gợi ý khi mua đồng hồ online" />
                                                </a>
                                                <div class="date-nh">
                                                    16/01/2017                    </div>
                                                <div class="summary-nh">
                                                    <span>Mua đồng hồ qua mạng chưa bao giờ dễ hơn thế với những gợi ý từ Galle Watch Tip thứ 5 tuần này!</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="http://www.gallewatch.com/review-san-pham/galle-tip:-huong-dan-tu-thay-day-tai-nha.html" title="">Galle Tip: Hướng dẫn tự thay dây tại nhà</a></li>
                                    </ul>
                                </div>  <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 item-nh">
                                    <div class="title-cat-nh">
                                        <a href="http://www.gallewatch.com/danh-muc-tin/tin-tuc.html">Tin tức</a>
                                        <div class="border-nh"></div>
                                    </div>
                                    <ul class="list-nh">
                                        <li>
                                            <div class="first-item-nh">
                                                <a href="http://www.gallewatch.com/tin-tuc/galle-watch-voi-tuyen-ngon-chat-va-nhat.html" class="title-first-nh" title="Galle Watch với tuyên ngôn CHẤT và NHẤT">Galle Watch với tuyên ngôn CHẤT và NHẤT</a>
                                                <a href="http://www.gallewatch.com/tin-tuc/galle-watch-voi-tuyen-ngon-chat-va-nhat.html" title="Galle Watch với tuyên ngôn CHẤT và NHẤT">
                                                    <img src="http://www.gallewatch.com/images/news/2016/12/19/resized/15621683_1442632385754618_482003028543389524_n_1482116825.jpg" alt="Galle Watch với tuyên ngôn CHẤT và NHẤT" />
                                                </a>
                                                <div class="date-nh">
                                                    19/12/2016                    </div>
                                                <div class="summary-nh">
                                                    <span>Buổi lễ diễn ra giống như tên của bản hòa tấu "Nơi thời gian ngừng lại" mà Galle Watch chọn làm chủ đề. Những tín đồ đồng hồ Thủ đô và thậm chí...</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>  <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 item-nh">
                                    <div class="title-cat-nh">
                                        <a href="http://www.gallewatch.com/danh-muc-tin/chung-nhan-thuong-hieu.html">Chứng nhận thương hiệu</a>
                                        <div class="border-nh"></div>
                                    </div>
                                    <ul class="list-nh">
                                        <li>
                                            <div class="first-item-nh">
                                                <a href="http://www.gallewatch.com/chung-nhan-thuong-hieu/chung-nhan-dai-ly-uy-quyen-chinh-thuc-thuong-hieu-tissot-amp;-calvin-klein-tai-viet-nam.html" class="title-first-nh" title="Chứng nhận đại lý ủy quyền chính thức thương hiệu Tissot & Calvin Klein tại Việt Nam">Chứng nhận đại lý ủy quyền chính thức thương hiệu Tissot & Calvin Klein tại Việt Nam</a>
                                                <a href="http://www.gallewatch.com/chung-nhan-thuong-hieu/chung-nhan-dai-ly-uy-quyen-chinh-thuc-thuong-hieu-tissot-amp;-calvin-klein-tai-viet-nam.html" title="Chứng nhận đại lý ủy quyền chính thức thương hiệu Tissot & Calvin Klein tại Việt Nam">
                                                    <img src="http://www.gallewatch.com/images/news/2016/12/05/resized/untitled-1_1480933937.jpg" alt="Chứng nhận đại lý ủy quyền chính thức thương hiệu Tissot & Calvin Klein tại Việt Nam" />
                                                </a>
                                                <div class="date-nh">
                                                    05/12/2016                    </div>
                                                <div class="summary-nh">
                                                    <span>Chứng nhận đại lý ủy quyền chính thức thương hiệu Tissot & Calvin Klein tại Việt Nam</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>  <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 item-nh">
                                    <div class="title-cat-nh">
                                        <a href="http://www.gallewatch.com/danh-muc-tin/khach-hang-noi-ve-chung-toi.html">Khách hàng nói về chúng tôi</a>
                                        <div class="border-nh"></div>
                                    </div>
                                    <ul class="list-nh">
                                        <li>
                                            <div class="first-item-nh">
                                                <a href="http://www.gallewatch.com/khach-hang-noi-ve-chung-toi/review.html" class="title-first-nh" title="Khách hàng nói về chúng tôi">Khách hàng nói về chúng tôi</a>
                                                <a href="http://www.gallewatch.com/khach-hang-noi-ve-chung-toi/review.html" title="Khách hàng nói về chúng tôi">
                                                    <img src="http://www.gallewatch.com/images/news/2016/11/30/resized/khach-hang_1480490066.jpg" alt="Khách hàng nói về chúng tôi" />
                                                </a>
                                                <div class="date-nh">
                                                    29/11/2016                    </div>
                                                <div class="summary-nh">
                                                    <span>Khách hàng nói về Galle Watch như thế nào?</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>                           </div>
                        </div>
                    </div>                    </div>
            </div><!-- end.row -->
        </div> <!-- end.container -->
</article><!-- #post-## -->
