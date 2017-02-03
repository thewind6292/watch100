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

$prod_id = get_the_ID();

$sale  = get_post_meta( get_the_ID(), '_sale_price', true);
$price = get_post_meta( get_the_ID(), '_regular_price', true);
if($price!="" && $sale!=""){ $discount_print =  $price - $sale; $discount_print = number_format ($discount_print,0,'',','); }
if($price!=""){ $price = number_format ($price,0,'',','); }
if($sale!=""){ $sale   = number_format ($sale,0,'',','); }

if($sale!=""){ $price_print = $sale;  }else{ $price_print = $price; }

$img_thumbnail = get_the_post_thumbnail(get_the_ID(), "img-feature-size", array( 'class' => 'img-responsive' )) ;

if($img_thumbnail==""){

    $img_thumbnail_default = "http://gallewatch.com/images/products/2016/10/12/resized/a1061_1.png";
}
?>
<div class="item ">
    <div class="inner_item">
        <div class="frame_img_cat ">
            <a href="<?php the_permalink(); ?>" title = "<?php the_title(); ?>" >
                <?php if($img_thumbnail){ echo $img_thumbnail; }else{ ?><img class="img-responsive" src="<?php echo $img_thumbnail_default; ?>" /><?php }; ?>
            </a>
        </div>
        <div class="frame_title">
            <h2 class="name" >
                <a href="<?php the_permalink() ?>" title = "<?php the_title(); ?>" >
                    <?php the_title(); ?></a> 
            </h2>	
        </div>
        <div class="frame_price">
            <div class="clearfix">
                <div class="price pull-left"> 
                    <span><?php echo $price_print; ?> VNĐ</span>
                </div>
                <div class="discount pull-right"> 
                    <?php if($discount_print!=""){ ?>
                    	<span class="percent "> Tiết kiệm  <span class="percent_val"> <?php echo $discount_print; ?> VNĐ</span> </span>
                    <?php } ?>
                </div>
            </div>    
        </div>
        <a href="<?php the_permalink(); ?>" datalm="16" datatp="" dataid="9660" data="<?php the_permalink(); ?>" class="button-cart button-cart-fast-cat" href="javascript:void(0)"><span>Xem chi tiết</span></a>

    </div>    	
</div>