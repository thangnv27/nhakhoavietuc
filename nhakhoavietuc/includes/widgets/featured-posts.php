<?php

class Featured_Posts_widget extends WP_Widget {

    function Featured_Posts_widget() {
        $widget_ops = array('classname' => 'featured-posts-widget', 'description' => __('Show posts by category.'));
        $control_ops = array('id_base' => 'featured_posts_widget');
        parent::__construct('featured_posts_widget', 'PPO: Featured Posts', $widget_ops, $control_ops);
    }

    /**
     * Displays category posts widget on blog.
     *
     * @param array $instance current settings of widget .
     * @param array $args of widget area
     */
    function widget($args, $instance) {
        global $post;
        $post_old = $post; // Save the post object.
        extract($args);

        $ids = explode(",", $instance["ids"]);
        
        
        echo $before_widget;
        // Widget title
        echo $before_title;
        echo $instance["widget_title"];
        echo $after_title;
        ?>		
        <div class="featured-posts">
            <ul class="items">								
            <?php
            $posts = new WP_Query(array(
                'posts_per_page' => -1,
                'post__in' => $ids,
            ));
            while ($posts->have_posts()) : $posts->the_post();
            ?>						
                <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
            <?php
            endwhile;
            wp_reset_query();
            ?>
            </ul>
        </div>
        <div class="clear"></div>
        <?php

        echo $after_widget;
        $post = $post_old; // Restore the post object.
    }

    /**
     * Form processing...
     *
     * @param array $new_instance of widget .
     * @param array $old_instance of widget .
     */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['widget_title'] = strip_tags($new_instance['widget_title']);
        $instance['ids'] = $new_instance['ids'];
        return $instance;
    }

    /**
     * The configuration form.
     *
     * @param array $instance of widget to display already stored value .
     * 
     */
    function form($instance) {
        ?>		
        <p>
            <label for="<?php echo $this->get_field_id("widget_title"); ?>">Tiêu đề</label>
            <input class="widefat" id="<?php echo $this->get_field_id("widget_title"); ?>" name="<?php echo $this->get_field_name("widget_title"); ?>" type="text" value="<?php echo esc_attr($instance["widget_title"]); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id("ids"); ?>">IDs</label>
            <input class="widefat" id="<?php echo $this->get_field_id("ids"); ?>" name="<?php echo $this->get_field_name("ids"); ?>" type="text" value="<?php echo esc_attr($instance["ids"]); ?>" />
            <br />
            <span>Mỗi ID phân cách bởi dấu phẩy (,)</span>
        </p>
        <?php
    }

}
