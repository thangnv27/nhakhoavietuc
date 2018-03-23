<?php
/**
 * The template for displaying Search Results pages
 */
get_header();
?>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h1 class="archive-title"><?php printf(__('Search results for: "%s"', SHORT_NAME), get_search_query()); ?></h1>

                <div class="row archive-content">
                    <?php
                    if(have_posts()):
                        while (have_posts()) : the_post();
                            get_template_part('content', get_post_format());
                        endwhile;
                    else:
                    ?>
                    <p><?php _e('Không có kết quả nào được tìm thấy, hãy tìm kiếm bằng một từ khoá khác.', SHORT_NAME) ?></p>
                    <?php get_search_form(); ?>
                    <?php endif; ?>
                </div>

                <?php getpagenavi();?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>