<?php 
//include_once 'libs/bbit-compress.php'; 
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta http-equiv="Cache-control" content="no-store; no-cache"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="author" content="PPO.VN" />
    <meta name="robots" content="index, follow" /> 
    <meta name="googlebot" content="index, follow" />
    <meta name="bingbot" content="index, follow" />
    <meta name="geo.region" content="VN" />
    <meta name="geo.position" content="14.058324;108.277199" />
    <meta name="ICBM" content="14.058324, 108.277199" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <?php if(is_home() or is_front_page()): ?>
    <meta name="keywords" content="<?php echo get_option('keywords_meta') ?>" />
    <?php endif; ?>
    <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />        
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        var siteUrl = "<?php bloginfo('siteurl'); ?>";
        var themeUrl = "<?php bloginfo('stylesheet_directory'); ?>";
        var is_home = <?php echo (is_home() or is_front_page()) ? 'true' : 'false'; ?>;
        var is_product = <?php echo (is_singular('product')) ? 'true' : 'false'; ?>;
        var is_mobile = <?php echo wp_is_mobile() ? 'true' : 'false'; ?>;
        var is_user_logged_in = <?php echo is_user_logged_in() ? 'true' : 'false'; ?>;
        var is_fixed_menu = <?php echo (get_option(SHORT_NAME . "_fixedMenu")) ? 'true' : 'false'; ?>;
        var no_image_src = themeUrl + "/images/no_image.png";
        var ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>';
        var lang = "<?php echo getLocale(); ?>";
        var fan_page_url='<?php echo get_option(SHORT_NAME . "_fbURL"); ?>';
        var header_style=<?php echo intval(get_option(SHORT_NAME . "_headerStyle")) ?>;
    </script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/modernizr.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="ajax_loading" style="display: none;z-index: 99999" class="ajax-loading-block-window">
        <div class="loading-image"></div>
    </div>
    <!--Alert Message-->
    <div id="nNote" class="nNote" style="display: none;"></div>
    <!--END: Alert Message-->
    
    <!--MOBILE HEADER-->
    <div id="st-container" class="st-container">
        <div class="mobile-header clearfix mobile-unclicked" style="transform: translate(0px, 0px);">
            <div id="st-trigger-effects">
                <button data-effect="st-effect-4" class="left-menu">
                    <div class="menu-icon">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                    <span>MENU</span>
                </button>
            </div>
            <div class="title">
                <?php
                if(get_option('mobilelogo')){
                ?>
                    <a title="<?php bloginfo("name"); ?>" href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_option("mobilelogo"); ?>" alt="NHA KHOA VIỆT ÚC" />
                    </a>
                <?php
                } else {
                ?>
                    <p class="proxima"><a title="<?php bloginfo("name"); ?>" href="<?php echo home_url(); ?>">NHA KHOA VIỆT ÚC</a></p>
                <?php }?>
            </div>
            <div id="st-trigger-effects">
                <button data-effect="st-effect-5" class="right-menu font22">
                    <i class="fa fa-thumbs-o-up"></i>
                </button>
            </div>
        </div>
        
        <nav id="menu-4" class="st-menu st-effect-4">
            <form method="get" action="<?php echo home_url(); ?>" id="search_mini_form">
                <div class="form-search">
                    <div class="searchcontainer"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        <input type="text" maxlength="128" class="input-text" value="" name="s" id="search" />
                    </div>
                </div>
            </form>

            <?php
            wp_nav_menu(array(
                'container' => '',
                'theme_location' => 'menu-header',
                'menu_class' => 'nav',
                'menu_id' => '',
            ));
            ?>
        </nav>
    </div>
    <!--/MOBILE HEADER-->
    
    <!--DESKTOP HEADER-->
    <?php
    if(get_option(SHORT_NAME . "_headerStyle") == 2){
        get_template_part('template/header-2');
    } else {
        get_template_part('template/header-1');
    }
    ?>
    <!--/DESKTOP HEADER-->