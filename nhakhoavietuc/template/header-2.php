<div class="desktop-header header-2">
    <div class="container">
        <div class="header_logo" itemtype="http://schema.org/Organization" itemscope="itemscope">
            <a rel="home" title="<?php bloginfo("name"); ?>" href="<?php echo home_url(); ?>" itemprop="url">
                <img src="<?php echo get_option("sitelogo"); ?>" alt="<?php bloginfo("name"); ?>" itemprop="logo" />
            </a>
        </div>
    </div>
    <div class="top-navigation">
        <div class="container">
            <div class="main-menu">
                <?php ubermenu( 'main' , array( 'theme_location' => 'menu-header' ) ); ?>
            </div>
        </div>
    </div>
</div>