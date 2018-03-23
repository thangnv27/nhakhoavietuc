<?php
/*
  Template Name: Page Builder
 */
get_header();

while (have_posts()) : the_post();
    $slider = get_post_meta(get_the_ID(), 'revslider', true);
    if (!empty($slider)):
    ?>
        <!--BEGIN SLIDER-->
        <section id="slider">
            <?php echo do_shortcode('[rev_slider alias="' . $slider . '"]'); ?>
        </section>
        <!--END SLIDER-->
    <?php endif; ?>

    <section id="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_content(); ?>
        </article><!-- #post -->
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>