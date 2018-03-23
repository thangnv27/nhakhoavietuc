<section id="footer">
    <div class="widget-areas">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <?php if ( is_active_sidebar( 'footer1' ) ) { dynamic_sidebar( 'footer1' ); } ?>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <?php if ( is_active_sidebar( 'footer2' ) ) { dynamic_sidebar( 'footer2' ); } ?>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <?php if ( is_active_sidebar( 'footer3' ) ) { dynamic_sidebar( 'footer3' ); } ?>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="widget social">
                        <h3 class="widget-title"><?php _e('LIÊN KẾT MẠNG XÃ HỘI', SHORT_NAME) ?></h3>
                        <?php
                        $fbURL = get_option(SHORT_NAME . "_fbURL");
                        $twitterURL = get_option(SHORT_NAME . "_twitterURL");
                        $linkedInURL = get_option(SHORT_NAME . "_linkedInURL");
                        $googlePlusURL = get_option(SHORT_NAME . "_googlePlusURL");
                        $youtubeURL = get_option(SHORT_NAME . "_youtubeURL");
                        $pinterestURL = get_option(SHORT_NAME . "_pinterestURL");
                        $instagramURL = get_option(SHORT_NAME . "_instagramURL");
                        if(!empty($fbURL)):
                        ?>
                        <div><a href="<?php echo $fbURL ?>" title="Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i> <span>Facebook</span></a></div>
                        <?php endif; if(!empty($twitterURL)): ?>
                        <div><a href="<?php echo $twitterURL ?>" title="Twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i> <span>Twitter</span></a></div>
                        <?php endif; if(!empty($linkedInURL)): ?>
                        <div><a href="<?php echo $linkedInURL ?>" title="Linked In"><i class="fa fa-linkedin-square" aria-hidden="true"></i> <span>Linked In</span></a></div>
                        <?php endif; if(!empty($googlePlusURL)): ?>
                        <div><a href="<?php echo $googlePlusURL ?>" title="Google Plus"><i class="fa fa-google-plus-square" aria-hidden="true"></i> <span>Google Plus</span></a></div>
                        <?php endif; if(!empty($youtubeURL)): ?>
                        <div><a href="<?php echo $youtubeURL ?>" title="Youtube"><i class="fa fa-youtube-square" aria-hidden="true"></i> <span>Youtube</span></a></div>
                        <?php endif; if(!empty($pinterestURL)): ?>
                        <div><a href="<?php echo $pinterestURL ?>" title="Pinterest"><i class="fa fa-pinterest-square" aria-hidden="true"></i> <span>Pinterest</span></a></div>
                        <?php endif; if(!empty($instagramURL)): ?>
                        <div><a href="<?php echo $instagramURL ?>" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i> <span>Instagram</span></a></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div><?php echo wpautop(do_shortcode(stripslashes_deep(get_option(SHORT_NAME . "_footer")))) ?></div>
        <span>Copyright &copy; <?php bloginfo('name') ?>. All rights reserved. Thiết kế bởi <a href="http://ppo.vn" title="Thiết kế web chuyên nghiệp">PPO.VN</a></span>
    </div>
</section>

<!-- script references -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.min.js"></script>
<!--<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-ui.js"></script>-->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/wow.min.js"></script>
<?php if(is_home() or is_front_page()): ?>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.bxslider.min.js"></script>
<?php endif; ?>
<!--<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/disable-copy.js"></script>-->
<!--<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/prototype.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/effects.js"></script>-->
<!--<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/custom.js"></script>-->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/app.min.js"></script>
<?php wp_footer(); ?>
<script src="https://apis.google.com/js/platform.js" async defer></script>
</body>
</html>