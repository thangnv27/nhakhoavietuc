<?php 
/*
  Template Name: Home
*/
get_header(); 

while (have_posts()) : the_post();
?>

<section>
    <?php
    $loop = new WP_Query(array ( 'post_type' => 'slider', 'orderby' => 'meta_value', 'meta_key' => 'slide_order', 'order' => 'ASC' ));
    if($loop->post_count > 0) :
    ?>
    <!-- SLIDE TOP -->
    <div id="slider">
        <ul style="display: none">
            <?php while ($loop->have_posts()) : $loop->the_post(); ?> 
            <li>
                <a href="<?php echo get_post_meta(get_the_ID(), "slide_link", true);?>">
                    <img src="<?php echo get_post_meta(get_the_ID(), "slide_img", true);?>" alt="<?php the_title(); ?>" />
                </a>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <!-- end:SLIDE TOP -->
    <?php endif; ?>
    <?php wp_reset_query(); ?>
    <?php /*
    <div class="container">
        <div class="row">
            <!--BEGIN SLIDER-->
            <div id="slider" class="col-lg-9 <?php echo (!wp_is_mobile()) ? "wow bounceInLeft animated" : "" ?>">
                <?php
                $slider = get_post_meta(get_the_ID(), 'revslider', true);
                if(!empty($slider)){
                    echo do_shortcode('[rev_slider alias="' . $slider . '"]');
                }
                ?>
            </div>
            <!--END SLIDER-->
            <div id="catalog" class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12 col-sm-3 item <?php echo (!wp_is_mobile()) ? "wow bounceInRight animated" : "" ?>" data-wow-duration="2s" data-wow-delay="500ms">
                        <a href="<?php echo get_option('home_cat_link1') ?>" target="_blank"><img src="<?php echo get_option('home_cat_img1') ?>" alt="Catalogue 1" /></a>
                    </div>
                    <div class="col-lg-12 col-sm-3 item <?php echo (!wp_is_mobile()) ? "wow bounceInRight animated" : "" ?>" data-wow-duration="2s" data-wow-delay="600ms">
                        <a href="<?php echo get_option('home_cat_link2') ?>" target="_blank"><img src="<?php echo get_option('home_cat_img2') ?>" alt="Catalogue 2" /></a>
                    </div>
                    <div class="col-lg-12 col-sm-3 item <?php echo (!wp_is_mobile()) ? "wow bounceInRight animated" : "" ?>" data-wow-duration="2s" data-wow-delay="700ms">
                        <a href="<?php echo get_option('home_cat_link3') ?>" target="_blank"><img src="<?php echo get_option('home_cat_img3') ?>" alt="Catalogue 3" /></a>
                    </div>
                    <div class="col-lg-12 col-sm-3 item <?php echo (!wp_is_mobile()) ? "wow bounceInRight animated" : "" ?>" data-wow-duration="2s" data-wow-delay="800ms">
                        <a href="<?php echo get_option('home_cat_link4') ?>" target="_blank"><img src="<?php echo get_option('home_cat_img4') ?>" alt="Catalogue 4" /></a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    */?>
</section>

<section class="sc_services">
    <div class="container">
        <div class="row sc_columns">
            <?php
            $services = new WP_Query(array(
                'post_type' => 'service',
                'showposts' => 4,
                'meta_key' => 'order',
                'order' => 'ASC',
            ));
            while ($services->have_posts()) : $services->the_post();
                get_template_part('template/service-item');
            endwhile;
            wp_reset_query();
            ?>
        </div>
    </div>
</section>

<section style="border-top: 1px solid #e1e1e1">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php the_content(); ?>
    </article><!-- #post -->
</section>
<?php endwhile; ?>

<?php get_footer(); ?>