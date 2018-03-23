<div class="col-sm-3">
    <div class="item">
        <div class="thumbnail">
            <a href="<?php the_permalink() ?>">
                <img alt="<?php the_title() ?>" src="<?php the_post_thumbnail_url('full') ?>" />
            </a>
        </div>
        <h2><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title(); ?></a></h2>
        <p>ĐT: <?php echo get_post_meta(get_the_ID(), 'phone', true) ?></p>
    </div>
</div>