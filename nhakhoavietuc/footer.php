<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <h2 class="company-name"><?php echo get_option('unit_owner') ?></h2>
                <p>Địa chỉ: <?php echo get_option('info_address') ?></p>
                <p>Điện thoại: <?php echo get_option('info_tel') ?></p>
                <p>Email: <a href="mailto:<?php echo get_option('info_email') ?>"><?php echo get_option('info_email') ?></a></p>
                <p><a href="<?php echo get_option('info_addr_map') ?>">Địa chỉ trực tiếp trên bản đồ →</a></p>
            </div>
            <div class="col-sm-7">
                <div id="hot_line">
                    <div class="call_icon"></div>
                    <div class="call_info">
                        HOTLINE: <a href="tel:<?php echo get_option(SHORT_NAME . "_hotline") ?>"><?php echo get_option(SHORT_NAME . "_hotline") ?></a>
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