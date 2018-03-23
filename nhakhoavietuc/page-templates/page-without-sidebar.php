<?php
/*
  Template Name: Without Sidebar
 */
get_header();
?>

<section id="main">
    <div class="container">
        <?php
        // Breadcrumbs
        if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div id="breadcrumbs">','</div>'); }

        // Start the Loop.
        while (have_posts()) : the_post();

            // Include the page content template.
            get_template_part('content', 'page');

//            get_template_part('template/post-bottom');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
        endwhile;
        ?>
    </div>
</section>

<?php get_footer(); ?>