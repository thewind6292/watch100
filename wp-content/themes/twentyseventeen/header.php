<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width" />
        <link type='image/x-icon' ref='http://www.gallewatch.com//images/favicon.ico' rel='icon' />
        <link href='http://fonts.googleapis.com/css?family=Roboto&amp;subset=latin,vietnamese' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/Fonts.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/theme.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/default.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/owl-carousel/css/owl.carousel.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/owl-carousel/css/owl.theme.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/owl-carousel/css/progress_bar.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/vertical.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/news_home.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/bottommenu.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/discount.css" />
		<script src="<?php echo get_theme_file_uri(); ?>/js/jquery-1.11.0.min.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/evil-icons/1.7.8/evil-icons.min.css" />

        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/cat.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/w3.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/segment.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/jquery.mCustomScrollbar.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/slide/generic.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/slide/js-image-slider.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/dev-styles.css" />
        
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/product.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_file_uri(); ?>/css/magiczoomplus.css" />
	<?php wp_head(); ?>
</head>
<?php
    global $woocomerce;
    ob_start();
?>
<body <?php body_class(); ?>>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
	<?php global $woocommerce; ?>
        <div class="full"></div>
        <div class="content-buy-fast cf" id="wrapper-buy-fast"></div>
        <div id="top-header" class="top-header">
            <div class="container container-header"></div>
        </div>
        <header id="header-main" class="main">
            <div class="header-top">
                <div class="container">
                    <div class="support-top">
                        <div class="hotline support">Chăm sóc khách hàng: <span><?php if(of_get_option('phone_number_1')) {
                        echo of_get_option('phone_number_1');} ?></span></div>
                        <div class="hotline advisory">Mua hàng online: <span><?php if(of_get_option('phone_number_2')) {
                        echo of_get_option('phone_number_2');} ?></span></div>
                        <div class="hotline complain">Tư vấn - bảo hành: <span><?php if(of_get_option('phone_number_3')) {
                        echo of_get_option('phone_number_3');} ?></span></div>
                    </div>
                </div>
            </div>
            <div class="container container-header">
                <div class="header-wrap">
                    <div class="push-button"><a id="jqCorraMenu" class=" menu-trigger ss-icon" href="javascript:;">Menu</a></div>
                    <div id="logo" class="branding">
                        <h1>
                            <a href="<?php echo get_home_url(); ?>" title="Watch100">
                            	<?php if(of_get_option('logo_watch')) {
                        		echo '<img  src="'.of_get_option('logo_watch').'" alt="Watch100" />';} ?>
                            </a>
                        </h1>
                    </div>
                    <div class="sepa"></div>
                    <div id="search" class="search pull-right">
          `              <div class="form-search"> <?php get_search_form() ?> </div>
                        <div class="dropdown dropdown_cart">
                            <button class="hidden-xs dropdown-toggle btn_cart size-15" type="button" data-toggle="dropdown">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Giỏ hàng (<span id="cart_container" class="inline-block"><a class="cart-contents text-red"><?php echo $woocommerce->cart->get_cart_contents_count(); ?></a> </span>)
                                <span class="caret"></span>
                            </button>
                            <a class="visible-xs dropdown-toggle btn_cart size-15" href="<?php echo esc_url(wc_get_cart_url()); ?>">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Giỏ hàng (<span id="cart_container" class="inline-block"><span class="cart-contents text-red"><?php echo $woocommerce->cart->get_cart_contents_count(); ?></span> </span>)
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php woocommerce_mini_cart( ); ?>
                                <!-- <li>
                                    <?php //the_widget('WC_Widget_Cart', 'title='); ?>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <?php 
            $args = array( 'post_type' => 'product', 'posts_per_page' => -1);
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); 
            echo '<p class="title-pro-pass-js">'.get_the_title().'<p>';
            global $product;
            endwhile; 
            wp_reset_query(); 
        ?>
        <div id="nav-mainmenu" class="">
            <div class="container">
            	<div class="border-mainmenu"></div>
				<?php if(function_exists('wp_nav_menu')){wp_nav_menu( 'theme_location=top&menu_class=nav navbar-nav');} ?>
                <div class="border-mainmenu"></div>
                <div id="menu-product">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>THEO THƯƠNG HIỆU</strong>
                            <ul>
                                <?php 
                                    $terms_thuonghieu = get_terms('pa_thuong-hieu', $options);
                                    foreach ($terms_thuonghieu as $term_th) { ?>
                                        <li><a href="<?php echo get_term_link($term_th->term_id) ?>"><?php echo $term_th->name; ?></a></li>
                                    <?php } ?>
                                    <li><strong><a href="<?php echo get_page_link(PAGE_PRODUCT_FEATURE); ?>">SẢN PHẨM NỔI BẬT</a></strong></li>
                                    <li><strong><a href="<?php echo get_page_link(PAGE_BEST_SELLER); ?>">SẢN PHẨM BÁN CHẠY</a></strong></li>
                                    <li><strong><a href="<?php echo get_category_link(31); ?>">ĐỒNG HỒ KHÁC</a></strong></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <strong>THEO PHÂN KHÚC TÀI CHÍNH</strong>
                            <ul>
                                <li><a href="<?php echo home_url(); ?>/?cnpf=1&amp;post_type=product&amp;cnep=0&amp;meta__price=0,2000000" title="Dưới 2 triệu">Dưới 2 triệu</a></li>
                                <li><a href="<?php echo home_url(); ?>/?cnpf=1&amp;post_type=product&amp;cnep=0&amp;meta__price=2000000,5000000" title="Từ 2 triệu - 5 triệu">Từ 2 triệu - 5 triệu</a></li>
                                <li><a href="<?php echo home_url(); ?>/?cnpf=1&amp;post_type=product&amp;cnep=0&amp;meta__price=5000000,10000000" title="Từ 5 triệu - 10 triệu">Từ 5 triệu - 10 triệu</a></li>    
                                <li><a href="<?php echo home_url(); ?>/?cnpf=1&amp;post_type=product&amp;cnep=0&amp;meta__price=10000000,20000000" title="Từ 10 triệu - 20 triệu">Từ 10 triệu - 20 triệu</a></li>
                                <li><a href="<?php echo home_url(); ?>/?cnpf=1&amp;post_type=product&amp;cnep=0&amp;meta__price=20000000,50000000" title="Từ 20 triệu - 50 triệu">Từ 20 triệu - 50 triệu</a></li>
                                <li><a href="<?php echo home_url(); ?>/?cnpf=1&amp;post_type=product&amp;cnep=0&amp;meta__price=50000000,100000000" title="Từ 50 triệu - 100 triệu">Từ 50 triệu - 100 triệu</a></li>
                                <li><a href="<?php echo home_url(); ?>/?cnpf=1&amp;post_type=product&amp;cnep=0&amp;meta__price=100000000,1000000000" title="Trên 100 triệu">Trên 100 triệu</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <strong>THEO GIỚI TÍNH</strong>
                            <ul>
                                <?php 
                                    $terms_gts = get_terms('pa_gioi-tinh', $options);
                                    foreach ($terms_gts as $term_gt) { ?>
                                        <li><a href="<?php echo get_term_link($term_gt->term_id) ?>"><?php echo $term_gt->name; ?></a></li>
                                    <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
    		 </div>
        </div>
        <?php 
            $options = array('hide_empty' => false);
        ?>

