<div class="desktop-header">
    <div class="top-navigation">
        <div class="container">
            <div class="header_logo" itemtype="http://schema.org/Organization" itemscope="itemscope">
                <a rel="home" title="<?php bloginfo("name"); ?>" href="<?php echo home_url(); ?>" itemprop="url">
                    <img src="<?php echo get_option("sitelogo"); ?>" alt="<?php bloginfo("name"); ?>" itemprop="logo" />
                </a>
            </div>
            <div class="main-menu">
                <?php ubermenu( 'main' , array( 'theme_location' => 'menu-header' ) ); ?>
            </div>
        </div>
    </div>
</div>