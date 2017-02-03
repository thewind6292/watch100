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
                            <div class="title-col-ft">Đăng kí nhận tin</div>
                            <div class="top-footer">
                                <div class=" tf-item text-right">
                                    <div class='block_content discount_content'>
                                        <form id="discount_form" method="post" name="newletter_form" action="http://www.gallewatch.com/index.php?module=discount&amp;task=save" onsubmit="javascript: return check_discount_form();" >
                                            <div class="wrapper-discount">    
                                                <input type="text" name="email" id="dc_email" placeholder="Nhập email..." class="txt-input"  />
                                                <input type="submit" name="submit" value="Đăng ký" class="button-sub button" />
                                                <input type="hidden" name='return' value="Lw=="  />
                                            </div>
                                        </form>
                                    </div>                            </div>
                                <div class="social-ft">
                                    <div class="title-social">Kết nối với Gallewatch</div>
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
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "http://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7&appId=966966790009250";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>  

        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "c6652b23-5a6c-4da6-a3a0-d0cc1ca50cd2", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>


        <script type="text/javascript" src="<?php echo get_theme_file_uri(); ?>/js/custom_js.js">
        <div style='width:1px;height:1px;display:none'><img src='http://ads.novanet.vn/adverclient.js?code=2237'/></div><div style="display:none;">1.06539 sec| 2160.391 kb</div><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/templates/default/js/bootstrap.min.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/templates/default/js/main.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/templates/default/js/form.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/templates/default/js/script.min.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/modules/home/assets/js/default.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/libraries/jquery/owl_carousel/owl-carousel/owl.carousel.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/blocks/slideshow/assets/js/progress_bar.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/blocks/partners/assets/js/progress_bar.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/blocks/products_list/assets/js/vertical.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/libraries/jquery/owl_carousel/owl-carousel/owl.carousel.min.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/modules/products/assets/js/jquery.ratingbar.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/modules/products/assets/js/jquery.raty.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/libraries/jquery/jquery.ui/jquery-ui.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/blocks/search/assets/js/search.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/blocks/mainmenu/assets/js/default.js"></script><script language="javascript" type="text/javascript" src="http://www.gallewatch.com/blocks/mainmenu/assets/js/bottommenu.js"></script>
<?php wp_footer(); ?>

</body>
</html>
