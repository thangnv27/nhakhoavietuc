<?php get_header(); ?>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div id="breadcrumbs">','</div>'); } ?>

                <h1 class="archive-title"><?php echo single_cat_title() ?></h1>
                <div class="cat-description"><?php echo category_description() ?></div>
                <div class="row archive-content">
                    <?php
                    if(have_posts()):
                        while (have_posts()) : the_post();
                            get_template_part('content', get_post_format());
                        endwhile;
                    else:
                    ?>
                    <div class="col-sm-12">
                        <p><?php _e('Không có bài viết nào được tìm thấy trong chuyên mục này.', SHORT_NAME) ?></p>
                        <?php get_search_form(); ?>
                    </div>
                    <?php endif; ?>
                </div>

                <?php getpagenavi();?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>