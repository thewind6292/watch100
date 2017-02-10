<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="wrapper-footer">    
            <div id="footer">
                <div class="container">

                    <div class="center-footer">
                        <div id="bottom-nav">
                            <ul>
                                <li class=' none_ul level0 menu-item' >
                                    <?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
                                            <?php dynamic_sidebar( 'sidebar-2' ); ?>
                                    <?php } ?>
                                </li>
                                <li class=' none_ul level0 menu-item' >
                                    <?php if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
                                            <?php dynamic_sidebar( 'sidebar-3' ); ?>
                                    <?php } ?>
                                </li>
                                <li class=' none_ul level0 menu-item' >
                                    <?php if ( is_active_sidebar( 'sidebar-footer-3' ) ) { ?>
                                            <?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
                                    <?php } ?>
                                </li>
                                <li class=' none_ul level0 menu-item' >
                                    <?php if ( is_active_sidebar( 'sidebar-footer-4' ) ) { ?>
                                            <?php dynamic_sidebar( 'sidebar-footer-4' ); ?>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>    		
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12 col-lg-4 col-md-4">
                            <div class="title-col-ft">Thông tin liên hệ</div>
                            <div class="top-footer">
                                <p>
                                Địa chỉ: <?php if(of_get_option('address_1')) {
                                        echo of_get_option('address_1');} ?><br />
                                Điện thoại: <?php if(of_get_option('phone_number_2')) {
                                        echo of_get_option('phone_number_2');} ?><br />
                                Email: <?php if(of_get_option('email')) {
                                        echo of_get_option('email');} ?><br />
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12 col-lg-4 col-md-4">
                            <div class="title-col-ft">Kết nối với Gallewatch</div>
                            <div class="top-footer">
                                <div class="social-ft">
                                    <a href="<?php if(of_get_option('link_fb')) {
                                        echo of_get_option('link_fb');} ?>" target="_blink">
                                        <img   src="http://www.gallewatch.com/images/face.png"  />
                                    </a>
                                    <a href="<?php if(of_get_option('link_fb')) {
                                        echo of_get_option('link_fb');} ?>" target="_blink">
                                        <img   src="http://www.gallewatch.com/images/tw.png"  />
                                    </a>
                                    <a href="<?php if(of_get_option('link_fb')) {
                                        echo of_get_option('link_fb');} ?>" target="_blink"> 
                                        <img   src="http://www.gallewatch.com/images/gg.png"  />
                                    </a>
                                    <a href="<?php if(of_get_option('link_fb')) {
                                        echo of_get_option('link_fb');} ?>" target="_blink"> 
                                        <img   src="http://www.gallewatch.com/images/youtube.png"  />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12 col-lg-4 col-md-4 group-fb">
                            <div class="fb-page" data-href="https://www.facebook.com/Watch100vn-%C4%90%E1%BB%93ng-h%E1%BB%93-ch%C3%ADnh-h%C3%A3ng-100-980592438728060/" data-tabs="timeline" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Watch100vn-%C4%90%E1%BB%93ng-h%E1%BB%93-ch%C3%ADnh-h%C3%A3ng-100-980592438728060/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Watch100vn-%C4%90%E1%BB%93ng-h%E1%BB%93-ch%C3%ADnh-h%C3%A3ng-100-980592438728060/">Watch100.vn - Đồng hồ chính hãng 100</a></blockquote></div>
                        </div>
                    </div>
                    <div class="border-mainmenu border-ft"></div>
                    <div class="bottom-footer">
                        <div class=" bottom_info">
                            <p style="text-align: center;">
                                <?php if(of_get_option('text_footer')) {
                                        echo of_get_option('text_footer');} ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="ajax-loader" style="/* display: none; */"><div class="loader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle></svg></div></div>
        <div id="fb-root"></div>
        <script language="javascript" type="text/javascript" src="http://www.gallewatch.com/templates/default/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "c6652b23-5a6c-4da6-a3a0-d0cc1ca50cd2", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
        <script language="javascript" type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/owl-carousel/js/owl.carousel.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/js/main.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/js/form.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/js/default.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/owl-carousel/js/owl.carousel.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/js/vertical.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/js/progress_bar.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/js/progress_bars.js"></script>
        <script type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/js/custom_js.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/js/jquery.ratingbar.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/js/jquery.raty.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/js/search.js"></script>
        

    
        <script language="javascript" type="text/javascript" src="http://www.gallewatch.com/libraries/jquery/magiczoomplus/magiczoomplus.js"></script>
        <script language="javascript" type="text/javascript" src="http://www.gallewatch.com/libraries/jquery/jquery.ui/jquery-ui.js"></script>
        <div id="fb-root"></div><script>$(document).ready(function() {var raido = $(".wrap").attr("data-toggle");if(raido==1){$(".vnk-tuvan").css("display","none");$(".x").click(function(){$(".wrap").slideToggle();$(".vnk-tuvan").slideToggle();});$(".vnk-tuvan").click(function(){$(".wrap").slideToggle();$(this).slideToggle();}); }else{$(".wrap").css("display","none");$(".x").click(function(){$(".wrap").slideToggle();$(".vnk-tuvan").slideToggle();});$(".vnk-tuvan").click(function(){$(".wrap").slideToggle();$(this).slideToggle();});}}) (function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=561973880635651";fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));</script><style>.wrap{position:fixed; width:300px; height: 400px; z-index:9999999; right:0px; bottom:0px;}.x{font-family: arial, helvetica;background: rgba(78,86,101,0.8) none repeat scroll 0 0;font-size:14px;font-weight:bold;color: #fff;display: inline-block;height: 25px;line-height: 25px;position: absolute;right: 0;text-align: center;top: -19px;width: 25px;z-index: 99999999;}.x:hover{cursor: pointer;}.pxem{text-align:left;height:20px;margin-bottom: 0;margin-top: 0;background: #34495E;width:100%;bottom: 0;display: block;left: 0px;position: absolute;z-index: 999999999;border-left: 1px solid #fff;}.pxem a.axem{color: #fff;font-family: arial,helvetica;font-size: 12px;line-height: 23px;padding-left: 5px;text-decoration: none;}.pxem a.axem:hover{text-decoration: underline;}.alogo{position: absolute;bottom: 0;right: 0px;z-index: 999999999999;width: 75px;height: 20px;display: inline-block;background:#34495E;border-left:2px solid #2c3e50;padding-right: 0px;padding-left: 5px}.vnk-tuvan{position:fixed;width: 300px;background:#34495E;z-index:99999999;right:0px;bottom:0px;  border-style: solid solid none;border-width: 1px 1px 0; border-color: #2c3e50}.vnk-tuvan p{color: #fff;font-size: 15px;margin: 0;padding: 0 13px; text-align: left;}.vnk-tuvan p a{color: #fff;font-size: 15px;padding: 5px 0px 7px;margin: 0;display:inline-block;font-family: arial, helvetica;text-decoration: none;}.vnk-tuvan p a:hover{text-decoration: underline;cursor: pointer;}.vnk-tuvan p img {float: right;margin-top: 10px;} </style><div data-toggle="1" class="wrap" style="position:fixed; width:280px; height: 320px; "><span class="x" style="">X</span><div class="fb-page" data-adapt-container-width="true" data-height="320" data-hide-cover="false" data-href="https://www.facebook.com/Watch100vn-%C4%90%E1%BB%93ng-h%E1%BB%93-ch%C3%ADnh-h%C3%A3ng-100-980592438728060/" data-show-facepile="true" data-show-posts="false" data-small-header="false" data-tabs="messages" data-width="280" style="position:relative; z-index:9999999; right:0px; bottom:21px;border-left: 1px solid #fff;border-top: 1px solid #fff;"></div><p class="pxem" style=""><a class="axem" style="" href="#" target="_blank"></a><a class="alogo" style=""></a></p></div><div class="vnk-tuvan" style="width: 278px;" ><p style=" "><a style="">Bạn cần tư vấn ?</a><img src="https://wordpress.vnkings.com/wp-content/themes/wordpress-vnkings/images/supprt.png"></p></div>
<?php wp_footer(); ?>

</body>
</html>
