<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="item ">
   <div class="inner_item">
      <div class="frame_img_cat ">
         <a href="http://gallewatch.com/dong-ho-nam/dong-ho-perrelet-a10611.html" title = "Đồng hồ Perrelet A1061/1" >
         <img class="" src="http://gallewatch.com/images/products/2016/10/12/resized/a1061_1.png" alt="Đồng hồ Perrelet A1061/1"  />
         </a>
      </div>
      <div class="frame_title">
         <h2 class="name" >
            <a href="http://gallewatch.com/dong-ho-nam/dong-ho-perrelet-a10611.html" title = "Đồng hồ Perrelet A1061/1" >
            Đồng hồ Perrelet A1061/1</a> 
         </h2>
      </div>
      <div class="frame_price">
         <div class="clearfix">
            <div class="price pull-left"> 
               <span>106.470.000 VNĐ</span>
            </div>
            <div class="discount pull-right"> 
               <span class="percent "> 
               &nbsp;</span>
            </div>
         </div>
      </div>
      <a datalm="16" datatp="" dataid="9660" data="http://gallewatch.com/dong-ho-nam-pc138/9661" class="button-cart button-cart-fast-cat" href="javascript:void(0)"><span>Xem nhanh</span></a>
   </div>
</div>