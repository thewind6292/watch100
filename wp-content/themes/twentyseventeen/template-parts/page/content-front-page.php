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
										$_product = wc_get_product( get_the_id());
										$_product->get_regular_price();
										$_product->get_sale_price();
										$_product->get_price();
										echo ($_product->get_regular_price()).'<br>';
										echo ($_product->get_sale_price()).'<br>';
										echo ($_product->get_price()).'<br>';
										$tietkiem = $_product->get_regular_price() - $_product->get_price();
								?>
										<div class="item ">
		                                    <div class="inner_item">
		                                        <div class="frame_img_cat ">
		                                            <a href="<?php echo get_permalink(the_id()); ?>">
		                                                <?php echo get_the_post_thumbnail(get_the_id()); ?>
		                                            </a>
		                                        </div>
		                                        <div class="frame_title">
		                                            <h2><a href="<?php echo get_permalink(the_id()); ?>" class="name" ><?php the_title(); ?></a> </h2>
		                                        </div>
		                                        <div class="frame_price">
		                                            <div class="clearfix">
		                                                <div class="price pull-left"> 
		                                                    <span><?php echo $_product->get_price(); ?></span>
		                                                </div>
		                                                <div class="discount pull-right"> 
		                                                    <span class="percent "> 
		                                                        Tiết kiệm  <span class="percent_val"><?php echo $tietkiem;?></span> 
		                                                    </span>
		                                                </div>
		                                            </div>    
		                                        </div>
		                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="12365" data="http://www.gallewatch.com/12138" href="javascript:void(0)"><span>Mua ngay</span></a>
		                                    </div>	
		                                </div>
								 	<?php endwhile;
								endif;
                            ?>
                            <div class="block-content">
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-eer1h001d0.html" title = "Đồng hồ Orient EER1H001D0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/EER1H001D0.png" alt="Đồng hồ Orient EER1H001D0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-eer1h001d0.html" title = "Đồng hồ Orient EER1H001D0" class="name" >Đồng hồ Orient EER1H001D0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>5.196.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 273.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="12365" data="http://www.gallewatch.com/12138" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tm8697mcwh.html" title = "Đồng hồ Romanson TM8697MCWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/TM8697MCWH.png" alt="Đồng hồ Romanson TM8697MCWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tm8697mcwh.html" title = "Đồng hồ Romanson TM8697MCWH" class="name" >Đồng hồ Romanson TM8697MCWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.224.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 556.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="12404" data="http://www.gallewatch.com/12365" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-seiko-sut227p1.html" title = "Đồng hồ Seiko SUT227P1" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/SUT227P1.png" alt="Đồng hồ Seiko SUT227P1"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-seiko-sut227p1.html" title = "Đồng hồ Seiko SUT227P1" class="name" >Đồng hồ Seiko SUT227P1</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.311.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 479.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="13021" data="http://www.gallewatch.com/12404" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t065-430-16-031-00.html" title = "Đồng hồ TISSOT T065.430.16.031.00" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/T065_430_16_031_00.png" alt="Đồng hồ TISSOT T065.430.16.031.00"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t065-430-16-031-00.html" title = "Đồng hồ TISSOT T065.430.16.031.00" class="name" >Đồng hồ TISSOT T065.430.16.031.00</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>14.278.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 751.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="10412" data="http://www.gallewatch.com/13021" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tl3211fmcwh.html" title = "Đồng hồ Romanson TL3211FMCWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/TL3211FMCWH.png" alt="Đồng hồ Romanson TL3211FMCWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tl3211fmcwh.html" title = "Đồng hồ Romanson TL3211FMCWH" class="name" >Đồng hồ Romanson TL3211FMCWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.288.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.072.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="8616" data="http://www.gallewatch.com/10412" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl2623lwwh.html" title = "Đồng hồ Romanson RL2623LWWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/RL2623LWWH.png" alt="Đồng hồ Romanson RL2623LWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl2623lwwh.html" title = "Đồng hồ Romanson RL2623LWWH" class="name" >Đồng hồ Romanson RL2623LWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.400.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 600.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="8562" data="http://www.gallewatch.com/8616" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-936856-412309.html" title = "Đồng hồ Roamer 936856-412309" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/936856_41_23_09.png" alt="Đồng hồ Roamer 936856-412309"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-936856-412309.html" title = "Đồng hồ Roamer 936856-412309" class="name" >Đồng hồ Roamer 936856-412309</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>7.011.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 779.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="9573" data="http://www.gallewatch.com/8562" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl0382tlwwh.html" title = "Đồng hồ Romanson RL0382TLWWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/RL0382TLWWH.png" alt="Đồng hồ Romanson RL0382TLWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl0382tlwwh.html" title = "Đồng hồ Romanson RL0382TLWWH" class="name" >Đồng hồ Romanson RL0382TLWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.056.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 764.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="12618" data="http://www.gallewatch.com/9573" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68392.html" title = "Đồng hồ Festina F6839/2" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F6839_2.png" alt="Đồng hồ Festina F6839/2"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68392.html" title = "Đồng hồ Festina F6839/2" class="name" >Đồng hồ Festina F6839/2</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.286.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 254.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="8011" data="http://www.gallewatch.com/12618" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-fund0001b0.html" title = "Đồng hồ ORIENT FUND0001B0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/FUND0001B0.png" alt="Đồng hồ ORIENT FUND0001B0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-fund0001b0.html" title = "Đồng hồ ORIENT FUND0001B0" class="name" >Đồng hồ ORIENT FUND0001B0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.876.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 204.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="9439" data="http://www.gallewatch.com/8011" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f165656.html" title = "Đồng hồ FESTINA F16565/6" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F16565_6.PNG" alt="Đồng hồ FESTINA F16565/6"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f165656.html" title = "Đồng hồ FESTINA F16565/6" class="name" >Đồng hồ FESTINA F16565/6</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>5.490.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 610.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="9934" data="http://www.gallewatch.com/9439" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-nu-candino-c45222.html" title = "Đồng hồ nữ Candino C4522/2" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/c4522_2.png" alt="Đồng hồ nữ Candino C4522/2"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-nu-candino-c45222.html" title = "Đồng hồ nữ Candino C4522/2" class="name" >Đồng hồ nữ Candino C4522/2</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>10.593.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.177.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="11602" data="http://www.gallewatch.com/9934" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item item_last">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-tissot-t085-210-22-013-00.html" title = "Đồng hồ TISSOT T085.210.22.013.00" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/T085_210_22_013_00.png" alt="Đồng hồ TISSOT T085.210.22.013.00"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-tissot-t085-210-22-013-00.html" title = "Đồng hồ TISSOT T085.210.22.013.00" class="name" >Đồng hồ TISSOT T085.210.22.013.00</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>10.431.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 549.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="13" datatp="promotion" dataid="0" data="http://www.gallewatch.com/11602" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
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
                                <a href="http://www.gallewatch.com/san-pham-ban-chay.html"><span>
                                        Sản phẩm bán chạy				</span></a>
                            </h2>
                            <div class="block-content">
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-police-13936js02.html" title = "Đồng hồ Police 13936JS/02" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/VISION_PL13936_JS_02.png" alt="Đồng hồ Police 13936JS/02"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-police-13936js02.html" title = "Đồng hồ Police 13936JS/02" class="name" >Đồng hồ Police 13936JS/02</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.928.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 732.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="10" datatp="selling" dataid="12185" data="http://www.gallewatch.com/9876" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-sem7m001cb.html" title = "Đồng hồ Orient SEM7M001CB" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/SEM7M001CB.png" alt="Đồng hồ Orient SEM7M001CB"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-sem7m001cb.html" title = "Đồng hồ Orient SEM7M001CB" class="name" >Đồng hồ Orient SEM7M001CB</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>6.602.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 347.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="10" datatp="selling" dataid="12782" data="http://www.gallewatch.com/12185" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-orient-fac06004z0.html" title = "Đồng hồ Orient FAC06004Z0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/FAC06004Z0.png" alt="Đồng hồ Orient FAC06004Z0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-orient-fac06004z0.html" title = "Đồng hồ Orient FAC06004Z0" class="name" >Đồng hồ Orient FAC06004Z0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>5.367.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 282.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="10" datatp="selling" dataid="8064" data="http://www.gallewatch.com/12782" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-dg-dw0304.html" title = "Đồng hồ D&G DW0304" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/DW0304_1.png" alt="Đồng hồ D&amp;G DW0304"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-dg-dw0304.html" title = "Đồng hồ D&G DW0304" class="name" >Đồng hồ D&G DW0304</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.062.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 2.708.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="10" datatp="selling" dataid="12969" data="http://www.gallewatch.com/8064" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t101-410-22-031-00.html" title = "Đồng hồ TISSOT T101.410.22.031.00" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/T101_410_22_031_00.png" alt="Đồng hồ TISSOT T101.410.22.031.00"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t101-410-22-031-00.html" title = "Đồng hồ TISSOT T101.410.22.031.00" class="name" >Đồng hồ TISSOT T101.410.22.031.00</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>10.193.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 536.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="10" datatp="selling" dataid="7733" data="http://www.gallewatch.com/12969" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-moschino-mw0079.html" title = "Đồng hồ Moschino MW0079" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/MW0079.png" alt="Đồng hồ Moschino MW0079"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-moschino-mw0079.html" title = "Đồng hồ Moschino MW0079" class="name" >Đồng hồ Moschino MW0079</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.064.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.376.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="10" datatp="selling" dataid="13182" data="http://www.gallewatch.com/7733" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-372b4s6b.html" title = "Đồng hồ Alpina AL-372B4S6B" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/AL_372B4S6B.png" alt="Đồng hồ Alpina AL-372B4S6B"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-372b4s6b.html" title = "Đồng hồ Alpina AL-372B4S6B" class="name" >Đồng hồ Alpina AL-372B4S6B</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>23.508.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 2.612.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="10" datatp="selling" dataid="10465" data="http://www.gallewatch.com/13182" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-tm0361qlwbk.html" title = "Đồng hồ Romanson TM0361QLWBK" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/TM0361QLWBK.png" alt="Đồng hồ Romanson TM0361QLWBK"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-tm0361qlwbk.html" title = "Đồng hồ Romanson TM0361QLWBK" class="name" >Đồng hồ Romanson TM0361QLWBK</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>7.272.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.818.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="10" datatp="selling" dataid="12904" data="http://www.gallewatch.com/10465" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-calvin-klein-k4323148.html" title = "Đồng hồ Calvin Klein K4323148" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/K4323148.png" alt="Đồng hồ Calvin Klein K4323148"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-calvin-klein-k4323148.html" title = "Đồng hồ Calvin Klein K4323148" class="name" >Đồng hồ Calvin Klein K4323148</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>7.515.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 835.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="10" datatp="selling" dataid="11206" data="http://www.gallewatch.com/12904" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item item_last">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho--ernest-borel-ls5680-25121.html" title = "Đồng hồ  Ernest Borel LS5680-25121" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/LS5680_25121_s.png" alt="Đồng hồ  Ernest Borel LS5680-25121"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho--ernest-borel-ls5680-25121.html" title = "Đồng hồ  Ernest Borel LS5680-25121" class="name" >Đồng hồ  Ernest Borel LS5680-25121</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>25.944.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.365.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="10" datatp="selling" dataid="0" data="http://www.gallewatch.com/11206" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
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
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-calvin-klein-k5r31146.html" title = "Đồng hồ Calvin Klein K5R31146" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/K5R31146.png" alt="Đồng hồ Calvin Klein K5R31146"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-calvin-klein-k5r31146.html" title = "Đồng hồ Calvin Klein K5R31146" class="name" >Đồng hồ Calvin Klein K5R31146</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>7.371.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 819.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12582" data="http://www.gallewatch.com/12939" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-festina-f169621.html" title = "Đồng hồ Festina F16962/1" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F16962_1.png" alt="Đồng hồ Festina F16962/1"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-festina-f169621.html" title = "Đồng hồ Festina F16962/1" class="name" >Đồng hồ Festina F16962/1</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.114.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 346.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12195" data="http://www.gallewatch.com/12582" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-nu-candino-c42281.html" title = "Đồng hồ nữ Candino C4228/1" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_239.png" alt="Đồng hồ nữ Candino C4228/1"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-nu-candino-c42281.html" title = "Đồng hồ nữ Candino C4228/1" class="name" >Đồng hồ nữ Candino C4228/1</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>6.057.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 673.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12608" data="http://www.gallewatch.com/12195" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68451.html" title = "Đồng hồ Festina F6845/1" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F6845_1_3.png" alt="Đồng hồ Festina F6845/1"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68451.html" title = "Đồng hồ Festina F6845/1" class="name" >Đồng hồ Festina F6845/1</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>6.759.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 751.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12201" data="http://www.gallewatch.com/12608" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-cm5a11lwbk.html" title = "Đồng hồ Romanson CM5A11LWBK" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/CM5A11LWBK.png" alt="Đồng hồ Romanson CM5A11LWBK"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-cm5a11lwbk.html" title = "Đồng hồ Romanson CM5A11LWBK" class="name" >Đồng hồ Romanson CM5A11LWBK</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.808.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.202.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11693" data="http://www.gallewatch.com/12201" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-750b4e6b.html" title = "Đồng hồ ALPINA AL-750B4E6B" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_79.png" alt="Đồng hồ ALPINA AL-750B4E6B"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-750b4e6b.html" title = "Đồng hồ ALPINA AL-750B4E6B" class="name" >Đồng hồ ALPINA AL-750B4E6B</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>62.775.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 6.975.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11244" data="http://www.gallewatch.com/11693" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-nam-sdj05002b0.html" title = "Đồng hồ Orient nam SDJ05002B0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/DJ05002B.png" alt="Đồng hồ Orient nam SDJ05002B0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-nam-sdj05002b0.html" title = "Đồng hồ Orient nam SDJ05002B0" class="name" >Đồng hồ Orient nam SDJ05002B0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>11.561.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 608.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13427" data="http://www.gallewatch.com/11244" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-khac/dong-ho-romanson-tm8237lcwh.html" title = "Đồng hồ Romanson TM8237LCWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/24/resized/tm8237lcwh_1482552627.png" alt="Đồng hồ Romanson TM8237LCWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-khac/dong-ho-romanson-tm8237lcwh.html" title = "Đồng hồ Romanson TM8237LCWH" class="name" >Đồng hồ Romanson TM8237LCWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>5.760.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        &nbsp;                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12584" data="http://www.gallewatch.com/13427" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-festina-f169652.html" title = "Đồng hồ Festina F16965/2" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F16965_2.png" alt="Đồng hồ Festina F16965/2"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-festina-f169652.html" title = "Đồng hồ Festina F16965/2" class="name" >Đồng hồ Festina F16965/2</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.285.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 365.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12619" data="http://www.gallewatch.com/12584" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68393.html" title = "Đồng hồ Festina F6839/3" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F6839_3.png" alt="Đồng hồ Festina F6839/3"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68393.html" title = "Đồng hồ Festina F6839/3" class="name" >Đồng hồ Festina F6839/3</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.286.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 254.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11690" data="http://www.gallewatch.com/12619" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-frederique-constant-fc-365rm5b4.html" title = "Đồng hồ Frederique Constant FC-365RM5B4" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_83.png" alt="Đồng hồ Frederique Constant FC-365RM5B4"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-frederique-constant-fc-365rm5b4.html" title = "Đồng hồ Frederique Constant FC-365RM5B4" class="name" >Đồng hồ Frederique Constant FC-365RM5B4</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>63.783.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 3.357.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11697" data="http://www.gallewatch.com/11690" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-280ns4s6b.html" title = "Đồng hồ ALPINA AL-280NS4S6B" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_82.png" alt="Đồng hồ ALPINA AL-280NS4S6B"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-280ns4s6b.html" title = "Đồng hồ ALPINA AL-280NS4S6B" class="name" >Đồng hồ ALPINA AL-280NS4S6B</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>20.061.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 2.229.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11569" data="http://www.gallewatch.com/11697" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tl4264fmgwh.html" title = "Đồng hồ Romanson TL4264FMGWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_2_9.png" alt="Đồng hồ Romanson TL4264FMGWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tl4264fmgwh.html" title = "Đồng hồ Romanson TL4264FMGWH" class="name" >Đồng hồ Romanson TL4264FMGWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.312.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 828.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12849" data="http://www.gallewatch.com/11569" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-calvin-klein-k2n286g6.html" title = "Đồng hồ Calvin Klein K2N286G6" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/K2N286G6.png" alt="Đồng hồ Calvin Klein K2N286G6"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-calvin-klein-k2n286g6.html" title = "Đồng hồ Calvin Klein K2N286G6" class="name" >Đồng hồ Calvin Klein K2N286G6</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>11.763.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.307.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12585" data="http://www.gallewatch.com/12849" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68311.html" title = "Đồng hồ Festina F6831/1" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F6831_1.png" alt="Đồng hồ Festina F6831/1"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68311.html" title = "Đồng hồ Festina F6831/1" class="name" >Đồng hồ Festina F6831/1</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.448.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 272.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12875" data="http://www.gallewatch.com/12585" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t068-427-16-011-00.html" title = "Đồng hồ TISSOT T068.427.16.011.00" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/T068_427_16_011_00.png" alt="Đồng hồ TISSOT T068.427.16.011.00"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t068-427-16-011-00.html" title = "Đồng hồ TISSOT T068.427.16.011.00" class="name" >Đồng hồ TISSOT T068.427.16.011.00</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>21.973.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.156.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12621" data="http://www.gallewatch.com/12875" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68402.html" title = "Đồng hồ Festina F6840/2" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F6840_2.png" alt="Đồng hồ Festina F6840/2"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68402.html" title = "Đồng hồ Festina F6840/2" class="name" >Đồng hồ Festina F6840/2</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.619.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 291.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12229" data="http://www.gallewatch.com/12621" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-fstaa001w0.html" title = "Đồng hồ Orient FSTAA001W0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_246.png" alt="Đồng hồ Orient FSTAA001W0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-fstaa001w0.html" title = "Đồng hồ Orient FSTAA001W0" class="name" >Đồng hồ Orient FSTAA001W0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.555.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 134.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11274" data="http://www.gallewatch.com/12229" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/[new-2015]-dong-ho-orient-nu-fer2h001b0.html" title = "[NEW 2015] Đồng hồ Orient nữ FER2H001B0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/ER2H001B.png" alt="[NEW 2015] Đồng hồ Orient nữ FER2H001B0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/[new-2015]-dong-ho-orient-nu-fer2h001b0.html" title = "[NEW 2015] Đồng hồ Orient nữ FER2H001B0" class="name" >[NEW 2015] Đồng hồ Orient nữ FER2H001B0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>5.700.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 300.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12876" data="http://www.gallewatch.com/11274" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-calvin-klein-k3g2312s.html" title = "Đồng hồ Calvin Klein K3G2312S" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/K3G2312S.png" alt="Đồng hồ Calvin Klein K3G2312S"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-calvin-klein-k3g2312s.html" title = "Đồng hồ Calvin Klein K3G2312S" class="name" >Đồng hồ Calvin Klein K3G2312S</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>11.016.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.224.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12225" data="http://www.gallewatch.com/12876" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-ffdah002w0.html" title = "Đồng hồ Orient FFDAH002W0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_241.png" alt="Đồng hồ Orient FFDAH002W0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-ffdah002w0.html" title = "Đồng hồ Orient FFDAH002W0" class="name" >Đồng hồ Orient FFDAH002W0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>5.196.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 273.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12226" data="http://www.gallewatch.com/12225" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-ffnab002wh.html" title = "Đồng hồ Orient FFNAB002WH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_242.png" alt="Đồng hồ Orient FFNAB002WH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-ffnab002wh.html" title = "Đồng hồ Orient FFNAB002WH" class="name" >Đồng hồ Orient FFNAB002WH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.802.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 147.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11583" data="http://www.gallewatch.com/12226" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-963637-415590.html" title = "Đồng hồ Roamer 963637-415590" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_11.png" alt="Đồng hồ Roamer 963637-415590"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-963637-415590.html" title = "Đồng hồ Roamer 963637-415590" class="name" >Đồng hồ Roamer 963637-415590</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>19.998.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 2.222.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11789" data="http://www.gallewatch.com/11583" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-chronoswiss-ch-7543k.html" title = "Đồng hồ Chronoswiss CH-7543K" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_7_4.png" alt="Đồng hồ Chronoswiss CH-7543K"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-chronoswiss-ch-7543k.html" title = "Đồng hồ Chronoswiss CH-7543K" class="name" >Đồng hồ Chronoswiss CH-7543K</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>218.990.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        &nbsp;                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12796" data="http://www.gallewatch.com/11789" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-ftt16005b0.html" title = "Đồng hồ Orient FTT16005B0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/FTT16005B0.png" alt="Đồng hồ Orient FTT16005B0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-ftt16005b0.html" title = "Đồng hồ Orient FTT16005B0" class="name" >Đồng hồ Orient FTT16005B0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>6.023.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 317.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12921" data="http://www.gallewatch.com/12796" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl6a16qlwwh.html" title = "Đồng hồ Romanson RL6A16QLWWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/RL6A16QLWWH.png" alt="Đồng hồ Romanson RL6A16QLWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl6a16qlwwh.html" title = "Đồng hồ Romanson RL6A16QLWWH" class="name" >Đồng hồ Romanson RL6A16QLWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.224.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.056.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="10770" data="http://www.gallewatch.com/12921" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t055-417-11-017-00.html" title = "Đồng hồ TISSOT T055.417.11.017.00" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/16.png" alt="Đồng hồ TISSOT T055.417.11.017.00"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t055-417-11-017-00.html" title = "Đồng hồ TISSOT T055.417.11.017.00" class="name" >Đồng hồ TISSOT T055.417.11.017.00</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>14.278.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 751.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12783" data="http://www.gallewatch.com/10770" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-orient-fac07002w0.html" title = "Đồng hồ Orient FAC07002W0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/FAC07002W0.png" alt="Đồng hồ Orient FAC07002W0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-orient-fac07002w0.html" title = "Đồng hồ Orient FAC07002W0" class="name" >Đồng hồ Orient FAC07002W0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>6.270.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 330.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11680" data="http://www.gallewatch.com/12783" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-525s4e3.html" title = "Đồng hồ ALPINA AL-525S4E3" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_66.png" alt="Đồng hồ ALPINA AL-525S4E3"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-525s4e3.html" title = "Đồng hồ ALPINA AL-525S4E3" class="name" >Đồng hồ ALPINA AL-525S4E3</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>32.805.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 3.645.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11802" data="http://www.gallewatch.com/11680" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-zenith-el-primero-03-2040-406169-c496.html" title = "Đồng hồ Zenith EL PRIMERO 03.2040.4061/69.C496" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_107.png" alt="Đồng hồ Zenith EL PRIMERO 03.2040.4061/69.C496"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-zenith-el-primero-03-2040-406169-c496.html" title = "Đồng hồ Zenith EL PRIMERO 03.2040.4061/69.C496" class="name" >Đồng hồ Zenith EL PRIMERO 03.2040.4061/69.C496</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>238.970.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        &nbsp;                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11691" data="http://www.gallewatch.com/11802" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-550s5aq6b.html" title = "Đồng hồ ALPINA AL-550S5AQ6B" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_77.png" alt="Đồng hồ ALPINA AL-550S5AQ6B"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-550s5aq6b.html" title = "Đồng hồ ALPINA AL-550S5AQ6B" class="name" >Đồng hồ ALPINA AL-550S5AQ6B</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>53.784.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 5.976.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12847" data="http://www.gallewatch.com/11691" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t055-417-11-047-00.html" title = "Đồng hồ TISSOT T055.417.11.047.00" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/T055_417_11_047_00.png" alt="Đồng hồ TISSOT T055.417.11.047.00"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t055-417-11-047-00.html" title = "Đồng hồ TISSOT T055.417.11.047.00" class="name" >Đồng hồ TISSOT T055.417.11.047.00</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>14.278.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 751.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12617" data="http://www.gallewatch.com/12847" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68512.html" title = "Đồng hồ Festina F6851/2" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F6851_2.png" alt="Đồng hồ Festina F6851/2"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68512.html" title = "Đồng hồ Festina F6851/2" class="name" >Đồng hồ Festina F6851/2</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.619.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 291.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12848" data="http://www.gallewatch.com/12617" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t055-417-16-017-01.html" title = "Đồng hồ TISSOT T055.417.16.017.01" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/T055_417_16_017_01.png" alt="Đồng hồ TISSOT T055.417.16.017.01"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t055-417-16-017-01.html" title = "Đồng hồ TISSOT T055.417.16.017.01" class="name" >Đồng hồ TISSOT T055.417.16.017.01</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>13.148.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 692.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13372" data="http://www.gallewatch.com/12848" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-dl9782nmwgr.html" title = "Đồng hồ Romanson DL9782NMWGR" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/DL9782NMWGR.png" alt="Đồng hồ Romanson DL9782NMWGR"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-dl9782nmwgr.html" title = "Đồng hồ Romanson DL9782NMWGR" class="name" >Đồng hồ Romanson DL9782NMWGR</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>1.728.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 432.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11686" data="http://www.gallewatch.com/13372" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-alpina-al-525std2cd3b.html" title = "Đồng hồ ALPINA AL-525STD2CD3B" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_71.png" alt="Đồng hồ ALPINA AL-525STD2CD3B"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-alpina-al-525std2cd3b.html" title = "Đồng hồ ALPINA AL-525STD2CD3B" class="name" >Đồng hồ ALPINA AL-525STD2CD3B</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>77.787.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 8.643.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13193" data="http://www.gallewatch.com/11686" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-bambino-4-fac08003a0.html" title = "Đồng hồ Orient Bambino 4 FAC08003A0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/FAC08003A0_1.png" alt="Đồng hồ Orient Bambino 4 FAC08003A0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-bambino-4-fac08003a0.html" title = "Đồng hồ Orient Bambino 4 FAC08003A0" class="name" >Đồng hồ Orient Bambino 4 FAC08003A0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.949.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 260.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13420" data="http://www.gallewatch.com/13193" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rm4243tlwbk.html" title = "Đồng hồ Romanson RM4243TLWBK" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/23/resized/rm4243tlwbk_1482476582.png" alt="Đồng hồ Romanson RM4243TLWBK"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rm4243tlwbk.html" title = "Đồng hồ Romanson RM4243TLWBK" class="name" >Đồng hồ Romanson RM4243TLWBK</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.820.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        &nbsp;                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12622" data="http://www.gallewatch.com/13420" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68404.html" title = "Đồng hồ Festina F6840/4" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F6840_4.png" alt="Đồng hồ Festina F6840/4"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68404.html" title = "Đồng hồ Festina F6840/4" class="name" >Đồng hồ Festina F6840/4</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.619.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 291.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12926" data="http://www.gallewatch.com/12622" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl6a03qlggd.html" title = "Đồng hồ Romanson RL6A03QLGGD" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/RL6A03QLGGD.png" alt="Đồng hồ Romanson RL6A03QLGGD"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl6a03qlggd.html" title = "Đồng hồ Romanson RL6A03QLGGD" class="name" >Đồng hồ Romanson RL6A03QLGGD</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.312.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 828.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12851" data="http://www.gallewatch.com/12926" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t055-427-17-057-00.html" title = "Đồng hồ TISSOT T055.427.17.057.00" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/T055_427_17_057_00.png" alt="Đồng hồ TISSOT T055.427.17.057.00"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t055-427-17-057-00.html" title = "Đồng hồ TISSOT T055.427.17.057.00" class="name" >Đồng hồ TISSOT T055.427.17.057.00</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>27.189.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.431.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13441" data="http://www.gallewatch.com/12851" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-enicar-26231113mgk.html" title = "Đồng hồ Enicar 262/31/113MGK." >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/29/resized/262-31-113mgk_1482997754.png" alt="Đồng hồ Enicar 262/31/113MGK."  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-enicar-26231113mgk.html" title = "Đồng hồ Enicar 262/31/113MGK." class="name" >Đồng hồ Enicar 262/31/113MGK.</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>11.488.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 2.872.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11243" data="http://www.gallewatch.com/13441" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-nam-sdj05001w0.html" title = "Đồng hồ Orient nam SDJ05001W0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/DJ05001W.png" alt="Đồng hồ Orient nam SDJ05001W0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-nam-sdj05001w0.html" title = "Đồng hồ Orient nam SDJ05001W0" class="name" >Đồng hồ Orient nam SDJ05001W0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>12.302.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 647.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12610" data="http://www.gallewatch.com/11243" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68463.html" title = "Đồng hồ Festina F6846/3" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F6846_3.png" alt="Đồng hồ Festina F6846/3"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68463.html" title = "Đồng hồ Festina F6846/3" class="name" >Đồng hồ Festina F6846/3</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>6.264.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 696.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12925" data="http://www.gallewatch.com/12610" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rm6a03qlwwh.html" title = "Đồng hồ Romanson RM6A03QLWWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/RM6A03QLWWH.png" alt="Đồng hồ Romanson RM6A03QLWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rm6a03qlwwh.html" title = "Đồng hồ Romanson RM6A03QLWWH" class="name" >Đồng hồ Romanson RM6A03QLWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.768.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 942.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12224" data="http://www.gallewatch.com/12925" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-bambino-fer24008b0.html" title = "Đồng hồ Orient Bambino FER24008B0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_240.png" alt="Đồng hồ Orient Bambino FER24008B0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-bambino-fer24008b0.html" title = "Đồng hồ Orient Bambino FER24008B0" class="name" >Đồng hồ Orient Bambino FER24008B0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.873.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 256.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12839" data="http://www.gallewatch.com/12224" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-calvin-klein-k2247161.html" title = "Đồng hồ Calvin Klein K2247161" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/K2247161.png" alt="Đồng hồ Calvin Klein K2247161"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-calvin-klein-k2247161.html" title = "Đồng hồ Calvin Klein K2247161" class="name" >Đồng hồ Calvin Klein K2247161</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>8.707.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 967.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12276" data="http://www.gallewatch.com/12839" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-cm5a09hmgwh.html" title = "Đồng hồ Romanson CM5A09HMGWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/CM5A09HMGWH.png" alt="Đồng hồ Romanson CM5A09HMGWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-cm5a09hmgwh.html" title = "Đồng hồ Romanson CM5A09HMGWH" class="name" >Đồng hồ Romanson CM5A09HMGWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>8.896.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 2.224.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13377" data="http://www.gallewatch.com/12276" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl4217lwpink.html" title = "Đồng hồ Romanson RL4217LWPINK" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/RL4217LWPINK.png" alt="Đồng hồ Romanson RL4217LWPINK"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl4217lwpink.html" title = "Đồng hồ Romanson RL4217LWPINK" class="name" >Đồng hồ Romanson RL4217LWPINK</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.536.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 634.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11584" data="http://www.gallewatch.com/13377" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-963637-411590.html" title = "Đồng hồ Roamer 963637-411590" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_12.png" alt="Đồng hồ Roamer 963637-411590"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-963637-411590.html" title = "Đồng hồ Roamer 963637-411590" class="name" >Đồng hồ Roamer 963637-411590</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>19.998.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 2.222.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12573" data="http://www.gallewatch.com/11584" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-festina-f169341.html" title = "Đồng hồ Festina F16934/1" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F16934_1.png" alt="Đồng hồ Festina F16934/1"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-festina-f169341.html" title = "Đồng hồ Festina F16934/1" class="name" >Đồng hồ Festina F16934/1</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.717.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 413.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12278" data="http://www.gallewatch.com/12573" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-cm5a10mwbk.html" title = "Đồng hồ Romanson CM5A10MWBK" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/CM5A10MWBK.png" alt="Đồng hồ Romanson CM5A10MWBK"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-cm5a10mwbk.html" title = "Đồng hồ Romanson CM5A10MWBK" class="name" >Đồng hồ Romanson CM5A10MWBK</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>5.264.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.316.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13424" data="http://www.gallewatch.com/12278" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-khac/dong-ho-romanson-tm0334mwwh.html" title = "Đồng hồ Romanson TM0334MWWH" >
                                                <img class="" src="index.html" alt="Đồng hồ Romanson TM0334MWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-khac/dong-ho-romanson-tm0334mwwh.html" title = "Đồng hồ Romanson TM0334MWWH" class="name" >Đồng hồ Romanson TM0334MWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.320.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        &nbsp;                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13411" data="http://www.gallewatch.com/13424" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-pl6152mwbk.html" title = "Đồng hồ Romanson PL6152MWBK" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/01/resized/pl6152mwbk_1480585423.png" alt="Đồng hồ Romanson PL6152MWBK"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-pl6152mwbk.html" title = "Đồng hồ Romanson PL6152MWBK" class="name" >Đồng hồ Romanson PL6152MWBK</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>5.008.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.252.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13407" data="http://www.gallewatch.com/13411" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tl3252uuwwh.html" title = "Đồng hồ Romanson TL3252UUWWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/01/resized/tl3252uuwwh_1480566434.png" alt="Đồng hồ Romanson TL3252UUWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tl3252uuwwh.html" title = "Đồng hồ Romanson TL3252UUWWH" class="name" >Đồng hồ Romanson TL3252UUWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.250.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        &nbsp;                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11692" data="http://www.gallewatch.com/13407" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-710km4e6.html" title = "Đồng hồ ALPINA AL-710KM4E6" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_78.png" alt="Đồng hồ ALPINA AL-710KM4E6"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-710km4e6.html" title = "Đồng hồ ALPINA AL-710KM4E6" class="name" >Đồng hồ ALPINA AL-710KM4E6</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>68.742.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 7.638.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12274" data="http://www.gallewatch.com/11692" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-cl5a11mgwh.html" title = "Đồng hồ Romanson CL5A11MGWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/CL5A11MGWH.png" alt="Đồng hồ Romanson CL5A11MGWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-cl5a11mgwh.html" title = "Đồng hồ Romanson CL5A11MGWH" class="name" >Đồng hồ Romanson CL5A11MGWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.416.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.104.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12877" data="http://www.gallewatch.com/12274" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-calvin-klein-k3m2112x.html" title = "Đồng hồ Calvin Klein K3M2112X" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/K3M2112X.png" alt="Đồng hồ Calvin Klein K3M2112X"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-calvin-klein-k3m2112x.html" title = "Đồng hồ Calvin Klein K3M2112X" class="name" >Đồng hồ Calvin Klein K3M2112X</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.878.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 542.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12279" data="http://www.gallewatch.com/12877" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-cm5a10mcwh.html" title = "Đồng hồ Romanson CM5A10MCWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/CM5A10MCWH.png" alt="Đồng hồ Romanson CM5A10MCWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-cm5a10mcwh.html" title = "Đồng hồ Romanson CM5A10MCWH" class="name" >Đồng hồ Romanson CM5A10MCWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>5.456.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.364.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12609" data="http://www.gallewatch.com/12279" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68454.html" title = "Đồng hồ Festina F6845/4" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F6845_4_1.png" alt="Đồng hồ Festina F6845/4"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68454.html" title = "Đồng hồ Festina F6845/4" class="name" >Đồng hồ Festina F6845/4</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>6.759.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 751.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12625" data="http://www.gallewatch.com/12609" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f168603.html" title = "Đồng hồ Festina F16860/3" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F16860_3.png" alt="Đồng hồ Festina F16860/3"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f168603.html" title = "Đồng hồ Festina F16860/3" class="name" >Đồng hồ Festina F16860/3</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.554.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 506.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12811" data="http://www.gallewatch.com/12625" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl6a18qlwwh.html" title = "Đồng hồ Romanson RL6A18QLWWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/RL6A18QLWWH.png" alt="Đồng hồ Romanson RL6A18QLWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl6a18qlwwh.html" title = "Đồng hồ Romanson RL6A18QLWWH" class="name" >Đồng hồ Romanson RL6A18QLWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.056.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 764.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12924" data="http://www.gallewatch.com/12811" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rm6a03qlggd.html" title = "Đồng hồ Romanson RM6A03QLGGD" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/RM6A03QLGGD.png" alt="Đồng hồ Romanson RM6A03QLGGD"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rm6a03qlggd.html" title = "Đồng hồ Romanson RM6A03QLGGD" class="name" >Đồng hồ Romanson RM6A03QLGGD</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.096.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.024.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12852" data="http://www.gallewatch.com/12924" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t055-430-16-017-00.html" title = "Đồng hồ TISSOT T055.430.16.017.00" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/T055_430_16_017_00.png" alt="Đồng hồ TISSOT T055.430.16.017.00"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t055-430-16-017-00.html" title = "Đồng hồ TISSOT T055.430.16.017.00" class="name" >Đồng hồ TISSOT T055.430.16.017.00</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>17.888.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 941.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13426" data="http://www.gallewatch.com/12852" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tm7237mwbk.html" title = "Đồng hồ Romanson TM7237MWBK" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/23/resized/tm7237mwbk_1482486360.png" alt="Đồng hồ Romanson TM7237MWBK"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tm7237mwbk.html" title = "Đồng hồ Romanson TM7237MWBK" class="name" >Đồng hồ Romanson TM7237MWBK</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.560.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        &nbsp;                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12273" data="http://www.gallewatch.com/13426" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-cl5a10mgwh.html" title = "Đồng hồ Romanson CL5A10MGWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/CL5A10MGWH.png" alt="Đồng hồ Romanson CL5A10MGWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-cl5a10mgwh.html" title = "Đồng hồ Romanson CL5A10MGWH" class="name" >Đồng hồ Romanson CL5A10MGWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.808.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.202.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11590" data="http://www.gallewatch.com/12273" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tl4240fmwwh.html" title = "Đồng hồ Romanson TL4240FMWWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/01/resized/untitled_1_18_1480556960.png" alt="Đồng hồ Romanson TL4240FMWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tl4240fmwwh.html" title = "Đồng hồ Romanson TL4240FMWWH" class="name" >Đồng hồ Romanson TL4240FMWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.096.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.024.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12778" data="http://www.gallewatch.com/11590" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-fac00004b0.html" title = "Đồng hồ Orient FAC00004B0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/FAC00004B0.png" alt="Đồng hồ Orient FAC00004B0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-orient-fac00004b0.html" title = "Đồng hồ Orient FAC00004B0" class="name" >Đồng hồ Orient FAC00004B0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.873.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 256.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11621" data="http://www.gallewatch.com/12778" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-508821-411305.html" title = "Đồng hồ Roamer 508821-411305" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/508821_41_13_05.png" alt="Đồng hồ Roamer 508821-411305"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-508821-411305.html" title = "Đồng hồ Roamer 508821-411305" class="name" >Đồng hồ Roamer 508821-411305</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>9.927.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.103.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12927" data="http://www.gallewatch.com/11621" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl6a03qlwwh.html" title = "Đồng hồ Romanson RL6A03QLWWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/RL6A03QLWWH.png" alt="Đồng hồ Romanson RL6A03QLWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-rl6a03qlwwh.html" title = "Đồng hồ Romanson RL6A03QLWWH" class="name" >Đồng hồ Romanson RL6A03QLWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.120.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 780.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11700" data="http://www.gallewatch.com/12927" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-frederique-constant-fc-365rm5b6.html" title = "Đồng hồ Frederique Constant FC-365RM5B6" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_90.png" alt="Đồng hồ Frederique Constant FC-365RM5B6"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-frederique-constant-fc-365rm5b6.html" title = "Đồng hồ Frederique Constant FC-365RM5B6" class="name" >Đồng hồ Frederique Constant FC-365RM5B6</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>55.451.500 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 2.918.500 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13437" data="http://www.gallewatch.com/11700" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-enicar-26230131g.html" title = "Đồng hồ Enicar 262/30/131G." >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/29/resized/262-30-131g_1482978129.png" alt="Đồng hồ Enicar 262/30/131G."  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-enicar-26230131g.html" title = "Đồng hồ Enicar 262/30/131G." class="name" >Đồng hồ Enicar 262/30/131G.</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>14.304.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 3.576.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12611" data="http://www.gallewatch.com/13437" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68471.html" title = "Đồng hồ Festina F6847/1" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F6847_1_1.png" alt="Đồng hồ Festina F6847/1"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68471.html" title = "Đồng hồ Festina F6847/1" class="name" >Đồng hồ Festina F6847/1</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>6.759.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 751.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13439" data="http://www.gallewatch.com/12611" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-enicar-26231113makas.html" title = "Đồng hồ Enicar 262/31/113MAKAS" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/29/resized/262-31-113makas_1482997267.png" alt="Đồng hồ Enicar 262/31/113MAKAS"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-enicar-26231113makas.html" title = "Đồng hồ Enicar 262/31/113MAKAS" class="name" >Đồng hồ Enicar 262/31/113MAKAS</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>13.512.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 3.378.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11655" data="http://www.gallewatch.com/13439" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/[new-2015]-dong-ho-orient-fev0v001wh.html" title = "[NEW 2015] Đồng hồ Orient FEV0V001WH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/EV0V001W.png" alt="[NEW 2015] Đồng hồ Orient FEV0V001WH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/[new-2015]-dong-ho-orient-fev0v001wh.html" title = "[NEW 2015] Đồng hồ Orient FEV0V001WH" class="name" >[NEW 2015] Đồng hồ Orient FEV0V001WH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>6.194.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 326.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12790" data="http://www.gallewatch.com/11655" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-orient-fqc14001w0.html" title = "Đồng hồ Orient FQC14001W0" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/FQC14001W0.png" alt="Đồng hồ Orient FQC14001W0"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-orient-fqc14001w0.html" title = "Đồng hồ Orient FQC14001W0" class="name" >Đồng hồ Orient FQC14001W0</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>5.035.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 265.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12860" data="http://www.gallewatch.com/12790" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t061-310-11-051-00.html" title = "Đồng hồ TISSOT T061.310.11.051.00" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/T061_310_11_051_00.png" alt="Đồng hồ TISSOT T061.310.11.051.00"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-tissot-t061-310-11-051-00.html" title = "Đồng hồ TISSOT T061.310.11.051.00" class="name" >Đồng hồ TISSOT T061.310.11.051.00</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>13.148.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 692.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11586" data="http://www.gallewatch.com/12860" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tl4254rmcwh.html" title = "Đồng hồ Romanson TL4254RMCWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/01/resized/untitled_1_14_1480556914.png" alt="Đồng hồ Romanson TL4254RMCWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tl4254rmcwh.html" title = "Đồng hồ Romanson TL4254RMCWH" class="name" >Đồng hồ Romanson TL4254RMCWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.416.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.104.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11616" data="http://www.gallewatch.com/11586" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-220837-496520.html" title = "Đồng hồ Roamer 220837-496520" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_28.png" alt="Đồng hồ Roamer 220837-496520"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-220837-496520.html" title = "Đồng hồ Roamer 220837-496520" class="name" >Đồng hồ Roamer 220837-496520</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>11.916.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.324.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13440" data="http://www.gallewatch.com/11616" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-enicar-26231113mgkas.html" title = "Đồng hồ Enicar 262/31/113MGKAS" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/29/resized/262-31-113mgkas_1482997367.png" alt="Đồng hồ Enicar 262/31/113MGKAS"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-enicar-26231113mgkas.html" title = "Đồng hồ Enicar 262/31/113MGKAS" class="name" >Đồng hồ Enicar 262/31/113MGKAS</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>20.759.980 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        &nbsp;                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13422" data="http://www.gallewatch.com/13440" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tl0334hmwwh.html" title = "Đồng hồ Romanson TL0334HMWWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/23/resized/tl0334hmwwh_1482483978.png" alt="Đồng hồ Romanson TL0334HMWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tl0334hmwwh.html" title = "Đồng hồ Romanson TL0334HMWWH" class="name" >Đồng hồ Romanson TL0334HMWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.020.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        &nbsp;                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11695" data="http://www.gallewatch.com/13422" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-280ns4s6.html" title = "Đồng hồ ALPINA AL-280NS4S6" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_81.png" alt="Đồng hồ ALPINA AL-280NS4S6"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-280ns4s6.html" title = "Đồng hồ ALPINA AL-280NS4S6" class="name" >Đồng hồ ALPINA AL-280NS4S6</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>17.541.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.949.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="10784" data="http://www.gallewatch.com/11695" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-chronoswiss-ch-2843-1.html" title = "Đồng hồ Chronoswiss CH-2843.1" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/CH2843_1_Sirius_40mm_2090x3600.png" alt="Đồng hồ Chronoswiss CH-2843.1"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-chronoswiss-ch-2843-1.html" title = "Đồng hồ Chronoswiss CH-2843.1" class="name" >Đồng hồ Chronoswiss CH-2843.1</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>148.650.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        &nbsp;                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13419" data="http://www.gallewatch.com/10784" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-pm2608cmwwh.html" title = "Đồng hồ Romanson PM2608CMWWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/23/resized/pm2608cmwwh_1482459236.png" alt="Đồng hồ Romanson PM2608CMWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-pm2608cmwwh.html" title = "Đồng hồ Romanson PM2608CMWWH" class="name" >Đồng hồ Romanson PM2608CMWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>22.570.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        &nbsp;                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12591" data="http://www.gallewatch.com/13419" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68323.html" title = "Đồng hồ Festina F6832/3" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F6832_3.png" alt="Đồng hồ Festina F6832/3"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68323.html" title = "Đồng hồ Festina F6832/3" class="name" >Đồng hồ Festina F6832/3</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>2.637.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 293.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13402" data="http://www.gallewatch.com/12591" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tm4253mwwh.html" title = "Đồng hồ Romanson TM4253MWWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/11/30/resized/tm4253mwwh_1480499394.png" alt="Đồng hồ Romanson TM4253MWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-tm4253mwwh.html" title = "Đồng hồ Romanson TM4253MWWH" class="name" >Đồng hồ Romanson TM4253MWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>3.576.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 894.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12277" data="http://www.gallewatch.com/13402" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-cm5a09hmwwh.html" title = "Đồng hồ Romanson CM5A09HMWWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/CM5A09HMWWH.png" alt="Đồng hồ Romanson CM5A09HMWWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-romanson-cm5a09hmwwh.html" title = "Đồng hồ Romanson CM5A09HMWWH" class="name" >Đồng hồ Romanson CM5A09HMWWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>7.792.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.948.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11682" data="http://www.gallewatch.com/12277" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-525s4e3b.html" title = "Đồng hồ ALPINA AL-525S4E3B" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_68.png" alt="Đồng hồ ALPINA AL-525S4E3B"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-525s4e3b.html" title = "Đồng hồ ALPINA AL-525S4E3B" class="name" >Đồng hồ ALPINA AL-525S4E3B</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>38.772.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 4.308.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12936" data="http://www.gallewatch.com/11682" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-calvin-klein-k5n2s1z6.html" title = "Đồng hồ Calvin Klein K5N2S1Z6" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/K5N2S1Z6.png" alt="Đồng hồ Calvin Klein K5N2S1Z6"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-calvin-klein-k5n2s1z6.html" title = "Đồng hồ Calvin Klein K5N2S1Z6" class="name" >Đồng hồ Calvin Klein K5N2S1Z6</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>8.388.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 932.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12835" data="http://www.gallewatch.com/12936" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-calvin-klein-k0s21120.html" title = "Đồng hồ Calvin Klein K0S21120" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/K0S21120.png" alt="Đồng hồ Calvin Klein K0S21120"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-calvin-klein-k0s21120.html" title = "Đồng hồ Calvin Klein K0S21120" class="name" >Đồng hồ Calvin Klein K0S21120</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>5.751.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 639.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11671" data="http://www.gallewatch.com/12835" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-372lbn4v6.html" title = "Đồng hồ ALPINA AL-372LBN4V6" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_59.png" alt="Đồng hồ ALPINA AL-372LBN4V6"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-372lbn4v6.html" title = "Đồng hồ ALPINA AL-372LBN4V6" class="name" >Đồng hồ ALPINA AL-372LBN4V6</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>28.494.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 3.166.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11687" data="http://www.gallewatch.com/11671" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-525vg4e6.html" title = "Đồng hồ ALPINA AL-525VG4E6" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_72.png" alt="Đồng hồ ALPINA AL-525VG4E6"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-525vg4e6.html" title = "Đồng hồ ALPINA AL-525VG4E6" class="name" >Đồng hồ ALPINA AL-525VG4E6</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>29.844.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 3.316.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12873" data="http://www.gallewatch.com/11687" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-calvin-klein-k3g23128.html" title = "Đồng hồ Calvin Klein K3G23128" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/K3G23128.png" alt="Đồng hồ Calvin Klein K3G23128"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-calvin-klein-k3g23128.html" title = "Đồng hồ Calvin Klein K3G23128" class="name" >Đồng hồ Calvin Klein K3G23128</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>6.768.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 752.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12647" data="http://www.gallewatch.com/12873" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-210633-492520.html" title = "Đồng hồ Roamer 210633-492520" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_308.png" alt="Đồng hồ Roamer 210633-492520"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-210633-492520.html" title = "Đồng hồ Roamer 210633-492520" class="name" >Đồng hồ Roamer 210633-492520</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>18.387.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 2.043.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="13406" data="http://www.gallewatch.com/12647" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-tm1256qlcwh.html" title = "Đồng hồ Romanson TM1256QLCWH" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/12/01/resized/tm1256qlcwh_1480565841.png" alt="Đồng hồ Romanson TM1256QLCWH"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-romanson-tm1256qlcwh.html" title = "Đồng hồ Romanson TM1256QLCWH" class="name" >Đồng hồ Romanson TM1256QLCWH</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.224.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 1.056.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11683" data="http://www.gallewatch.com/13406" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-525s4e6b.html" title = "Đồng hồ ALPINA AL-525S4E6B" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_1_69.png" alt="Đồng hồ ALPINA AL-525S4E6B"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-alpina-al-525s4e6b.html" title = "Đồng hồ ALPINA AL-525S4E6B" class="name" >Đồng hồ ALPINA AL-525S4E6B</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>32.805.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 3.645.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="11636" data="http://www.gallewatch.com/11683" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-709856-491707.html" title = "Đồng hồ Roamer 709856-491707" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/Untitled_5.png" alt="Đồng hồ Roamer 709856-491707"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-roamer-709856-491707.html" title = "Đồng hồ Roamer 709856-491707" class="name" >Đồng hồ Roamer 709856-491707</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.734.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 526.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12579" data="http://www.gallewatch.com/11636" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-festina-f169511.html" title = "Đồng hồ Festina F16951/1" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F16951_1.png" alt="Đồng hồ Festina F16951/1"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nu/dong-ho-festina-f169511.html" title = "Đồng hồ Festina F16951/1" class="name" >Đồng hồ Festina F16951/1</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>4.275.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 475.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12937" data="http://www.gallewatch.com/12579" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item ">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-calvin-klein-k5r31141.html" title = "Đồng hồ Calvin Klein K5R31141" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/k5r31141.png" alt="Đồng hồ Calvin Klein K5R31141"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-calvin-klein-k5r31141.html" title = "Đồng hồ Calvin Klein K5R31141" class="name" >Đồng hồ Calvin Klein K5R31141</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>7.371.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 819.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="12586" data="http://www.gallewatch.com/12937" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
                                <div class="item item_last">
                                    <div class="inner_item">
                                        <div class="frame_img_cat ">
                                            <a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68464.html" title = "Đồng hồ Festina F6846/4" >
                                                <img class="" src="http://www.gallewatch.com/images/products/2016/10/12/resized/F6846_4.png" alt="Đồng hồ Festina F6846/4"  />
                                            </a>
                                        </div>

                                        <div class="frame_title">
                                            <h2><a href="http://www.gallewatch.com/dong-ho-nam/dong-ho-festina-f68464.html" title = "Đồng hồ Festina F6846/4" class="name" >Đồng hồ Festina F6846/4</a> </h2>	
                                        </div>
                                        <div class="frame_price">
                                            <div class="clearfix">
                                                <div class="price pull-left"> 
                                                    <span>6.264.000 VNĐ</span>
                                                </div>

                                                <div class="discount pull-right"> 
                                                    <span class="percent "> 
                                                        Tiết kiệm  <span class="percent_val"> 696.000 VNĐ</span>                                                    </span>
                                                </div>
                                            </div>    
                                        </div>

                                        <a  class="button-cart button-cart-fast" datalm="100" datatp="new" dataid="0" data="http://www.gallewatch.com/12586" href="javascript:void(0)"><span>Xem nhanh</span></a>

                                    </div>	
                                </div> 	
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
