<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

if (is_single()) :
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

            <div class="entry-meta">
                <?php
//                if ('post' == get_post_type())
//                    ppo_posted_on();

                /*
                if (!post_password_required() && ( comments_open() || get_comments_number() )) :
                    ?>
                    <span class="comments-link"><?php comments_popup_link(__('<i class="fa fa-comment"></i> Comments', SHORT_NAME), __('<i class="fa fa-comment"></i> 1 Comment', SHORT_NAME), __('<i class="fa fa-comment"></i> % Comments', SHORT_NAME)); ?></span>
                    <?php
                endif;
                */

//                edit_post_link(__('<i class="fa fa-pencil"></i> Edit', SHORT_NAME), '<span class="edit-link">', '</span>');
                ?>
            </div><!-- .entry-meta -->
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
            /* translators: %s: Name of current post */
            the_content( sprintf( __('Read more <span class="meta-nav">&rarr;</span>', SHORT_NAME) ) );

            wp_link_pages(array(
                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', SHORT_NAME) . '</span>',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
            ));
            ?>
        </div><!-- .entry-content -->
        
        <div class="mb15">
            <div class="fb-like" data-href="<?php echo getCurrentRquestUrl(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>

        <?php the_tags('<footer class="entry-meta"><span class="tag-links"><i class="fa fa-tags"></i> ', ', ', '</span></footer>'); ?>
    </article><!-- #post-## -->
<?php
else:
    $date_format = get_option( 'date_format' );
    $time_format = get_option( 'time_format' );
    $posttags = get_the_tags();
?>
    <div class="col-xs-12 col-sm-4 col-md-4 mb30" itemscope="" itemtype="http://schema.org/Article">
        <a href="<?php the_permalink(); ?>" onclick="_gaq.push(['_trackEvent', 'Xem tin', 'Xem tin', '<?php the_title(); ?>']);">
            <img src="<?php the_post_thumbnail_url('260x130'); ?>" style="width:100%; max-width:100%;" alt="<?php the_title(); ?>" onError="this.src=no_image_src" itemprop="image" class="itemThumb" />
        </a>
        <div style="height: 60px" class="mt5 t_center itemTitle" itemprop="name">
            <a href="<?php the_permalink(); ?>" itemprop="url" onclick="_gaq.push(['_trackEvent', 'Xem tin', 'Xem tin', '<?php the_title(); ?>']);"><?php the_title(); ?></a>
        </div>
    </div>
<?php endif; ?>