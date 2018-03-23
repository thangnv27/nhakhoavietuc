<?php

# Custom slider post type
add_action('init', 'create_slider_post_type');

function create_slider_post_type(){
    $args = array(
        'labels' => array(
            'name' => __('Sliders', SHORT_NAME),
            'singular_name' => __('Sliders', SHORT_NAME),
            'add_new' => __('Add new', SHORT_NAME),
            'add_new_item' => __('Add new Slider', SHORT_NAME),
            'new_item' => __('New Slider', SHORT_NAME),
            'edit' => __('Edit', SHORT_NAME),
            'edit_item' => __('Edit Slider', SHORT_NAME),
            'view' => __('View Slider', SHORT_NAME),
            'view_item' => __('View Slider', SHORT_NAME),
            'search_items' => __('Search Sliders', SHORT_NAME),
            'not_found' => __('No Slider found', SHORT_NAME),
            'not_found_in_trash' => __('No Slider found in trash', SHORT_NAME),
        ),
        'public' => false,
        'show_ui' => true,
        'publicy_queryable' => true,
        'exclude_from_search' => true,
        'menu_position' => 20,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => array(
            'title',
        ),
        'rewrite' => array('slug' => 'slider', 'with_front' => false),
        'can_export' => true,
        'description' => __('Slider description here.', SHORT_NAME)
    );
    
    register_post_type('slider', $args);
}

# Custom slider taxonomies
/*add_action('init', 'create_slider_taxonomies');

function create_slider_taxonomies(){
    register_taxonomy('slider_category', 'slider', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __('Slider Categories'),
            'singular_name' => __('Slider Categories'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Category'),
            'new_item' => __('New Category'),
            'search_items' => __('Search Categories'),
        ),
    ));
}*/

# slider meta box
$slider_meta_box = array(
    'id' => 'slider-meta-box',
    'title' => __('Information', SHORT_NAME),
    'page' => 'slider',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Hình ảnh',
            'desc' => 'Có thể điền URL ảnh hoặc chọn ảnh từ thư viện. Size: 850x400',
            'id' => 'slide_img',
            'type' => 'text',
            'std' => '',
            'btn' => true,
        ),
        array(
            'name' => 'Liên kết',
            'desc' => '',
            'id' => 'slide_link',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Sắp xếp',
            'desc' => '',
            'id' => 'slide_order',
            'type' => 'text',
            'std' => '1',
        ),
));

// Add slider meta box
if(is_admin()){
    add_action('admin_menu', 'slider_add_box');
    add_action('save_post', 'slider_add_box');
    add_action('save_post', 'slider_save_data');
}

function slider_add_box(){
    global $slider_meta_box;
    add_meta_box($slider_meta_box['id'], $slider_meta_box['title'], 'slider_show_box', $slider_meta_box['page'], $slider_meta_box['context'], $slider_meta_box['priority']);
}

// Callback function to show fields in slider meta box
function slider_show_box() {
    // Use nonce for verification
    global $slider_meta_box, $post;
    custom_output_meta_box($slider_meta_box, $post);
}

// Save data from slider meta box
function slider_save_data($post_id) {
    global $slider_meta_box;
    custom_save_meta_box($slider_meta_box, $post_id);
}
