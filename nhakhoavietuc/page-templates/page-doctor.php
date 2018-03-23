<?php
/*
  Template Name: Doctors
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

<section class="sc_doctors">
    <div class="container">
        <h1><?php the_title() ?></h1>
        <div class="row">
            <?php
            $loop = new WP_Query(array(
                'post_type' => 'doctor',
                'posts_per_page' => -1,
                'meta_key' => 'order',
                'order' => 'ASC',
            ));
            while ($loop->have_posts()) : $loop->the_post();
                get_template_part('template/doctor-item');
            endwhile;
            wp_reset_query();
            ?>
        </div>
    </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>