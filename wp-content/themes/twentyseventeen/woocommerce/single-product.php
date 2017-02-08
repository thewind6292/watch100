<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
	<?php
	global $product; $post;

	while ( have_posts() ) : the_post();

	$prod_id = get_the_ID();

	$acf_ma_sp      = get_field("mã_sản_phẩm");
	$acf_tinh_trang = get_field("tình_trạng");
	$acf_bao_hanh   = get_field("bảo_hành");
	$acf_xuat_xu    = get_field("xuất_xứ");

   $acf_vo            = get_field("vỏ");
   $acf_loai_day      = get_field("loại_dây");
   $acf_duong_kinh    = get_field("đường_kinh");
   $acf_do_day        = get_field("độ_dày");
   $acf_do_chiu_nuoc  = get_field("độ_chịu_nước");
   $acf_lich          = get_field("lịch");
   $acf_chuc_nang     = get_field("chức_năng");
   $acf_loai_may      = get_field("loại_may");
   $acf_mau_mat       = get_field("màu_mặt");
   $acf_mat_kinh      = get_field("mặt_kinh");
   $acf_hdsd          = get_field("nội_dung_hướng_dẫn_sử_dụng");
   $acf_nd_bao_hanh   = get_field("nội_dung_bảo_hành");
   $acf_nd_danhgia    = get_field("nội_dung_đanh_gia_&_reviews");

	$pa_thuong_hieu = woocommerce_get_product_terms($prod_id, 'pa_thuong-hieu', 'names');
	$pa_thuong_hieu = $pa_thuong_hieu[0];

	$pa_loai_dong_ho = woocommerce_get_product_terms($prod_id, 'pa_loai-dong-ho', 'names'); 
	$pa_loai_dong_ho = $pa_loai_dong_ho[0];

	$pa_loai_day = woocommerce_get_product_terms($prod_id, 'pa_loai-day', 'names'); 
	$pa_loai_day = $pa_loai_day[0];

   $pa_gioi_tinh = woocommerce_get_product_terms($prod_id, 'pa_gioi-tinh', 'names'); 
   $pa_gioi_tinh = $pa_gioi_tinh[0];

   $pa_khoang_duong_kinh = woocommerce_get_product_terms($prod_id, 'pa_khoang-duong-kinh', 'names'); 
   $pa_khoang_duong_kinh = $pa_khoang_duong_kinh[0];

   $pa_khuyen_mai = woocommerce_get_product_terms($prod_id, 'pa_khuyen-mai', 'names'); 
   $pa_khuyen_mai = $pa_khuyen_mai[0];

   $pa_kieu_dong_ho = woocommerce_get_product_terms($prod_id, 'pa_kieu-dong-ho', 'names'); 
   $pa_kieu_dong_ho = $pa_kieu_dong_ho[0];

   $pa_mau_sac = woocommerce_get_product_terms($prod_id, 'pa_mau-sac', 'names'); 
   $pa_mau_sac = $pa_mau_sac[0];

   
	$sale  = get_post_meta( $prod_id, '_sale_price', true);
	$price = get_post_meta( $prod_id, '_regular_price', true);
	if($price!="" && $sale!=""){ $discount_print =  $price - $sale; $discount_print = number_format ($discount_print,0,'',','); }
	if($price!=""){ $price = number_format ($price,0,'',','); }
	if($sale!=""){ $sale   = number_format ($sale,0,'',','); }

	if($sale!=""){ $price_print = $sale;  }else{ $price_print = $price; }

	$img_thumbnail = get_the_post_thumbnail_url($prod_id, "large", array( 'class' => 'img-responsive' )) ;
	
	if($img_thumbnail==""){

	    $img_thumbnail = "http://gallewatch.com/images/products/2016/10/12/resized/a1061_1.png";
	}
	?>
	<div class="container container-header">
            <div id="main_container" class="mt20">
               <div class="main-column">
                  
                 
                  <div class="container360">
                     <div id="basic-setup-example"></div>
                  </div>
                  <div class='product'>
                     <div class="top-detail mt20 clearfix">
                        <div class="columnleft">
                           <div class="image-table">
                              <div class="img_styling">
                                 <div class="main-img">
                                    <a id="Zoomer" href="<?php echo $img_thumbnail; ?>" class="MagicZoomPlus" rel="pan-zoom: false; rightClick: true; hint: false;zoom-position: right;show-loading:false;zoom-distance:0;zoom-width:400px; zoom-height:400px;" data-options="rightClick: true">
                                    <img class="feature_image" src="<?php echo $img_thumbnail; ?>" >
                                    </a>
                                    <div id="clickndrag" style="text-align: left;">
                                       <img border="0" src="http://www.gallewatch.com/images/click-here.png">
                                    </div>
                                 </div>
                                
                                 <div class="thumb-pro">
                                    <ul id="thumb-pro" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                                       <div class="owl-wrapper-outer">
                                          <div class="owl-wrapper" style="width: 840px; left: 0px; display: block;">
                                             <?php 

                                                global $product;
                                                  $attachment_ids = $product->get_gallery_attachment_ids();

                                                foreach( $attachment_ids as $attachment_id ) 
                                                {

                                                   $shop_thumbnail_image_url = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' )[0]; 
                                                   $shop_catalog_image_url = wp_get_attachment_image_src( $attachment_id, 'shop_catalog' )[0];

                                             ?>
                                             <div class="owl-item" style="width: 105px;">      
                                                <li class="item">
                                                   <a href="<?php echo $shop_catalog_image_url; ?>" class="Selector"  rel="zoom-id:Zoomer" rev="<?php echo $shop_catalog_image_url; ?>">
                                                   <img src="<?php echo $shop_thumbnail_image_url; ?>" >
                                                   </a>
                                                </li>
                                             </div>
                                             <?php } ?>
                                             
                                          </div>
                                       </div>
                                       <div class="owl-controls clickable" style="display: none;">
                                          <div class="owl-buttons">
                                             <div class="owl-prev"> </div>
                                             <div class="owl-next"> </div>
                                          </div>
                                       </div>
                                    </ul>
                                 </div>
                                
                              </div>
                           </div>
                        </div>
                        <div class="price-table">
                           <div class="name-table mt20" >
                              <h1 class="title-name"><?php echo the_title(); ?></h1>
                              <div class="code-manu mt10 cf">
                                 <div class="title-code fl"><span>Mã sản phẩm</span>: <?php echo $acf_ma_sp; ?></div>
                                 <span class="stick-detail fl"></span>
                                 <div class="manu fl"><span>Thương hiệu</span>: <?php echo $pa_thuong_hieu; ?></div>
                              </div>
                              <div class="rating-pro cf">
                                 <!-- <div class="col-raty fl">
                                    <div class="star-detail fl" data-rating="0"></div>
                                    <div class="count-rate fl"><span>0</span> / Có 0 đánh giá</div>
                                    <span class="stick-detail fl"></span>
                                    <a class="txt-review" data-id="reviews" href="#reviews">Xem đánh giá &amp; review sản phẩm</a>
                                 </div> -->
                              </div>
                           </div>
                           <div class="wrapper-info-pro cf">
                              <div class="left-info fl">
                                 <ul>
                                    <li class="cf">
                                       <div class="li-left fl">
                                          Tình trạng                                    
                                       </div>
                                       <span class="fl">:</span>
                                       <div class="li-right fl">
                                          <?php echo $acf_tinh_trang; ?>                                    
                                       </div>
                                    </li>
                                    <li class="cf">
                                       <div class="li-left fl">
                                          Bảo hành                                    
                                       </div>
                                       <span class="fl">:</span>
                                       <div class="li-right fl">
                                          <?php echo $acf_bao_hanh; ?>                                   
                                       </div>
                                    </li>
                                    <li class="cf">
                                       <div class="li-left fl">
                                          Xuất xứ									
                                       </div>
                                       <span class="fl">:</span>
                                       <div class="li-right fl">
                                       	   <?php echo $acf_xuat_xu; ?>  	
                                       </div>
                                    </li>
                                    <li class="cf">
                                       <div class="li-left fl">
                                          Loại đồng hồ									
                                       </div>
                                       <span class="fl">:</span>
                                       <div class="li-right fl">
                                       		<?php echo $pa_loai_dong_ho; ?>
                                       </div>
                                    </li>
                                    </table>
                                    <li class="cf">
                                       <div class="li-left fl">
                                          Loại dây									
                                       </div>
                                       <span class="fl">:</span>
                                       <div class="li-right fl">
                                       		<?php echo $pa_loai_day; ?>
                                       </div>
                                    </li>
                                    </table>
                                    </table>
                                    </table>
                                 </ul>
                                 <div class="list-social-detail">
                                    <span class="fl">Chia sẻ:</span>
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="fb fl" title="facebook"><img src="http://www.gallewatch.com/images/face.png" alt="share facebook" /></a>
                                    <a target="_blank" href="https://twitter.com/home?status=<?php the_permalink(); ?>" class="fb tw fl" title="twitter"><img src="http://www.gallewatch.com/images/tw.png" alt="share facebook" /></a>
                                    <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="fb fl" title="google plus"><img src="http://www.gallewatch.com/images/gg.png" alt="share facebook" /></a>
                                 </div>
                              </div>
                              <div class="right-info fl">
                                 <div class="bor-retails mt20">
                                    <form class="cart420" action="#" method="post">
                                       <?php if($sale!=""){ ?>

                                       <div class="price-row cf">
                                          <span class="fl">Giá niêm yết </span><span class="price-cell-r old_price fl"><?php echo $price; ?> VNĐ</span>
                                       </div>
                                       <div class="txt-price">
                                          Giá khuyến mại												
                                       </div>
                                       <div class="price-row">
                                          <span class="price-cell-r price basic_price"><?php echo $sale; ?> VNĐ</span>
                                          <input type="hidden" id="basic_price" value="" >
                                       </div>
                                       <div class="price-row">
                                          <span class="price-cell-r">Tiết kiệm <span><?php echo $discount_print; ?> VNĐ</span></span>
                                       </div>

                                       <?php }else{ ?>

                                       <div class="txt-price">
                                          Giá bán												
                                       </div>
                                       <div class="price-row">
                                          <span class="price-cell-r price basic_price"><?php echo $price_print; ?> VNĐ</span>
                                          <input type="hidden" id="basic_price" value="<?php echo $price; ?>" >
                                       </div>

                                       <?php } ?>
                                       <div  id="buy-now">
                                       	<?php if ( $product->is_in_stock() ) : ?>

                                        <?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

                                        <form class="cart" method="post" enctype='multipart/form-data'>
                                            <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

                                            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

                                            <button type="submit" class="single_add_to_cart_button button alt submit">Mua Ngay</button>

                                            <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
		                                </form>

		                                <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

		                                <?php endif; ?>
                                          <!-- <input class="submit" onclick="order(9706)" type="button" value="Mua  ngay"/><br /> -->
                                       </div>
                                       <span class="txt-hotline-dl">Hoặc mua hàng qua điện thoại</span>
                                       <span class="hotline-dl">096 463 00 55</span>
                                       <input type="hidden" value="products" name='module' />
                                       <input type="hidden" value="cart" name='view' />
                                       <input type="hidden" value="buy" name='task' />
                                       <input type="hidden" value="9706" name='record_id' id='record_id'  />
                                    </form>
                                 </div>
                              </div>
                           </div>
                    
                         </div>
                     </div>
                  </div>
                  <div class="bottom-detail">
                     <div class="row">
                     	<div class="col-lg-9">
                           <div class="product-tab" id="smartTab">
		                     	<ul class="product_tabs_ul nav nav-tabs">
								  <li class="active"><a data-toggle="tab" href="#thong-so-ky-thuat">Thông số kĩ thuật</a></li>
								  <li><a data-toggle="tab" href="#huong-dan-su-dung">Hướng dẫn sử dụng</a></li>
								  <li><a data-toggle="tab" href="#bao-hanh">Bảo hành</a></li>
								  <li><a data-toggle="tab" href="#reviews">Đánh giá &amp; reviews</a></li>
								</ul>
								

								<div class="tab-content">
								  <div id="thong-so-ky-thuat" class="tab-pane fade in active">
								    <div class="tab_content prodetails_tab">
	                                    <table class='table table-condensed compare_table' border="0" cellpadding="0" width="100%">
	                                       <tr class="title-table-dt">
	                                          <td colspan="2">Thông tin sản phẩm</td>
	                                          <td></td>
	                                       </tr>
                                          <tr class="tr-value">
                                             <td>Thương hiệu</td>
                                             <td><?php echo $pa_thuong_hieu; ?></td>        
                                          </tr>
                                          <tr class="tr-value">
                                             <td>Mã sản phẩm</td>
                                             <td><?php echo $acf_ma_sp; ?></td>        
                                          </tr>
                                          <tr class="tr-value">
                                             <td>Giới tính</td>
                                             <td><?php echo $pa_gioi_tinh; ?></td>        
                                          </tr>
                                          <tr class="tr-value">
                                             <td>Xuất xứ</td>
                                             <td><?php echo $acf_xuat_xu; ?></td>        
                                          </tr>
                                          <tr class="tr-value">
                                             <td>Loại đồng hồ</td>
                                             <td><?php echo $pa_loai_dong_ho; ?></td>        
                                          </tr>
                                          <tr class="tr-value">
                                             <td>Kiểu đồng hồ</td>
                                             <td><?php echo $pa_kieu_dong_ho; ?></td>        
                                          </tr>
	                                    </table>
	                                    <table class='table table-condensed compare_table' border="0" cellpadding="0" width="100%">
	                                       <tr class="title-table-dt">
	                                          <td colspan="2">Vỏ &amp; Dây</td>
	                                          <td></td>
	                                       </tr>
                                          <tr class="tr-value">
                                             <td>Vỏ</td>
                                             <td><?php echo $acf_vo; ?></td>        
                                          </tr>
                                          <tr class="tr-value">
                                             <td>Loại dây</td>
                                             <td><?php echo $pa_loai_day; ?></td>        
                                          </tr>
                                          <tr class="tr-value">
                                             <td>Đường kính</td>
                                             <td><?php echo $acf_duong_kinh; ?></td>        
                                          </tr>
                                          <tr class="tr-value">
                                             <td>Độ dày</td>
                                             <td><?php echo $acf_do_day; ?></td>        
                                          </tr>
	                                    </table>
	                                    <table class='table table-condensed compare_table' border="0" cellpadding="0" width="100%">
	                                       <tr class="title-table-dt">
	                                          <td colspan="2">Tính năng</td>
	                                          <td></td>
	                                       </tr>
                                          <tr class="tr-value">
                                             <td>Độ chịu nước</td>
                                             <td><?php echo $acf_do_chiu_nuoc; ?></td>        
                                          </tr>
                                          <tr class="tr-value">
                                             <td>Lịch</td>
                                             <td><?php echo $acf_lich; ?></td>        
                                          </tr>
                                          <tr class="tr-value">
                                             <td>Chức năng</td>
                                             <td><?php echo $acf_chuc_nang; ?></td>        
                                          </tr>
	                                    </table>
	                                    <table class='table table-condensed compare_table' border="0" cellpadding="0" width="100%">
	                                       <tr class="title-table-dt">
	                                          <td colspan="2">Thông số bổ sung</td>
	                                          <td></td>
	                                       </tr>
                                          <tr class="tr-value">
                                             <td>Loại máy</td>
                                             <td><?php echo $acf_loai_may; ?></td>        
                                          </tr>
                                          <tr class="tr-value">
                                             <td>Màu mặt</td>
                                             <td><?php echo $pa_mau_sac; ?></td>        
                                          </tr>
                                          <tr class="tr-value">
                                             <td>Mặt kính</td>
                                             <td><?php echo $acf_mat_kinh; ?></td>        
                                          </tr>
	                                    </table>
	                                 </div>
								  </div>
								  <div id="huong-dan-su-dung" class="tab-pane fade">
								      <div class="tab_content prodetails_tab">
                                    <?php 
                                       if($acf_hdsd!=""){

                                          echo $acf_hdsd;
                                          
                                       }else{

                                          $post_hdsd = get_post( 130 ); 
                                          
                                          echo $post_hdsd->post_content;
                                       }
                                    ?>   
	                           </div>
								  </div>
								  <div id="bao-hanh" class="tab-pane fade">
								  	    <div class="tab_content prodetails_tab">
									         <?php 
                                       if($acf_nd_bao_hanh!=""){

                                          echo $acf_nd_bao_hanh;
                                          
                                       }else{

                                          $post_ndbh = get_post( 351 ); 
                                          
                                          echo $post_ndbh->post_content;
                                       }
                                    ?> 
		                         </div>     
								  </div>
								  <div id="reviews" class="tab-pane fade">

									      <div class="tab_content prodetails_tab wrapper-name-raty cf">
		                                    
		                                    <div class="bt-raty fr">
		                                       Viết đánh giá
		                                    </div>
                                           <?php display_comments_evolved();?>
		                           </div>
		                                 
									  </div>
								</div>
							</div>
						</div>		
                        
                        <div class="col-lg-3">
                           <div class='block_banners banners_1 blocks_banner blocks1 block'  id = "block_id_105" >
                              <div class='banners  banners-default block_inner block_banner_banner'  >
                                 <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Banner')) : else : ?><?php endif; ?>
                                 <div class="clear"></div>
                              </div>
                              <div class="clear"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="content-pop-related">
                     <div class="block_products_list  blocks_product_list block blocks_product_list_vertical mt20">
                            <h2 class="block_title">
                                <span>Có thể bạn thích</span></a>
                            </h2>
                        <div class="block-content">
                        <?php

                        $term_product_current_id = wp_get_post_terms($post->ID, 'product_cat', array("fields" => "ids"));

                        $args_best_selling = array(
                           'post_type'           => 'product',
                           'post_status'         => 'publish',
                           'posts_per_page'      => 4,
                           'post__not_in' => array($post->ID),
                           'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'terms' => $term_product_current_id,
                                    'operator' => 'IN',
                                    )
                           )
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
               </div>
            </div>
         </div>
         <!-- end.row -->
      </div>
      <!-- end.container -->

      <?php endwhile; // end of the loop. ?>
<?php get_footer( 'shop' ); ?>