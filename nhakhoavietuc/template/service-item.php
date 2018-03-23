<?php
$link = get_post_meta(get_the_ID(), 'link', true);
if(empty($link)) $link = "javascript://";
?>
<div class="col-lg-3 col-sm-6 sc_services_item_wrap">
    <div class="sc_services_item" style="background: #<?php echo get_post_meta(get_the_ID(), 'bgcolor', true) ?>">
        <h4 class="sc_services_item_title">
            <a href="<?php echo $link ?>">
                <i class="sc_icon fa fa-<?php echo get_post_meta(get_the_ID(), 'service_icon', true) ?>" aria-hidden="true"></i>
                <?php the_title() ?>
            </a>
        </h4>
        <div class="sc_services_item_content">
            <div class="sc_services_item_description">
                <div><?php the_content(); ?></div>
                <a href="<?php echo $link ?>" class="sc_services_item_readmore">
                    <?php _e('Xem chi tiết', SHORT_NAME) ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</div>