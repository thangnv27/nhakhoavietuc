<?php 
/*
  Template Name: Contact
*/
get_header(); 
?>

<section>
    <div class="contact-maps">
        <?php echo stripslashes_deep(get_option(SHORT_NAME . "_gmaps")) ?>
    </div>
    <div class="container contact-content">
        <div class="row">
            <div class="col-sm-6"><?php echo do_shortcode(stripslashes_deep(get_option(SHORT_NAME . "_contactForm"))) ?></div>
            <div class="col-sm-6">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php the_content(); ?>
                    </article><!-- #post -->
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>