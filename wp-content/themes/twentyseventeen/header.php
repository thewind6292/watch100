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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php global $woocommerce; ?>
<div class="full"></div>
        <div class="content-buy-fast cf" id="wrapper-buy-fast"></div>
        <div id="top-header" class="top-header">
            <div class="container container-header"></div>
        </div>
        <header id="header-main" class="main">
            <div class="container container-header">
                <div class="header-wrap">
                    <div class="push-button"><a id="jqCorraMenu" class=" menu-trigger ss-icon" href="javascript:;">Menu</a></div>
                    <div class="support-top">
                        <div class="hotline support">Chăm sóc khách hàng: <span><?php if(of_get_option('phone_number_1')) {
                        echo of_get_option('phone_number_1');} ?></span></div>
                        <div class="hotline advisory">Mua hàng online: <span><?php if(of_get_option('phone_number_2')) {
                        echo of_get_option('phone_number_2');} ?></span></div>
                        <div class="hotline complain">Tư vấn - bảo hành: <span><?php if(of_get_option('phone_number_3')) {
                        echo of_get_option('phone_number_3');} ?></span></div>
                    </div>
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
                        <div  class="search">
                            <div id="search-form" class="form-search"> <?php get_search_form() ?> </div>
                        </div>
                        <div id="shopcart" class="shopcart pull-right">
                            <div class="shopcart_content block_content">
                            	<?php if ( sizeof( $woocommerce->cart->cart_contents) == 0 ) :
									echo '<a class="buy" href="' . $woocommerce->cart->get_checkout_url() . '" title="' . __( 'Giỏ hàng của bạn' ) . '">' . __( 'Giỏ hàng của bạn' ) . '</a>';
								endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>	
        <div id="nav-mainmenu" class=" hidden-md hidden-sm hidden-xs">
            <div class="container">
            	<div class="border-mainmenu"></div>
				<?php if(function_exists('wp_nav_menu')){wp_nav_menu( 'theme_location=top&menu_class=nav navbar-nav');} ?>
    		 </div>
        </div>
