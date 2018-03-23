<?php
/* ----------------------------------------------------------------------------------- */
# Create post_type
/* ----------------------------------------------------------------------------------- */
add_action('init', 'create_doctor_post_type');

function create_doctor_post_type() {
    $args = array(
        'labels' => array(
            'name' => __('Doctors', SHORT_NAME),
            'singular_name' => __('Doctors', SHORT_NAME),
            'add_new' => __('Add new', SHORT_NAME),
            'add_new_item' => __('Add new Doctor', SHORT_NAME),
            'new_item' => __('New Doctor', SHORT_NAME),
            'edit' => __('Edit', SHORT_NAME),
            'edit_item' => __('Edit Doctor', SHORT_NAME),
            'view' => __('View Doctor', SHORT_NAME),
            'view_item' => __('View Doctor', SHORT_NAME),
            'search_items' => __('Search Doctors', SHORT_NAME),
            'not_found' => __('No Doctor found', SHORT_NAME),
            'not_found_in_trash' => __('No Doctor found in trash', SHORT_NAME),
        ),
        'public' => true,
        'show_ui' => true,
        'publicy_queryable' => true,
        'exclude_from_search' => false,
        'menu_position' => 5,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => array(
            'title', 'editor', 'thumbnail'
        ),
        'rewrite' => array('slug' => 'doctor', 'with_front' => false),
        'can_export' => true,
        'description' => __('Doctor description here.', SHORT_NAME)
    );

    register_post_type('doctor', $args);
}

/* ----------------------------------------------------------------------------------- */
# Meta box
/* ----------------------------------------------------------------------------------- */

$doctor_meta_box = array(
    'id' => 'doctor-meta-box',
    'title' => 'Thông tin',
    'page' => 'doctor',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Điện thoại', SHORT_NAME),
            'desc' => '',
            'id' => 'phone',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Số thứ tự', SHORT_NAME),
            'desc' => '',
            'id' => 'order',
            'type' => 'text',
            'std' => '1',
        ),
));
// Add doctor meta box
if (is_admin()) {
    add_action('admin_menu', 'doctor_add_box');
    add_action('save_post', 'doctor_add_box');
    add_action('save_post', 'doctor_save_data');
}

/**
 * Add meta box
 * @global array $doctor_meta_box
 */
function doctor_add_box() {
    global $doctor_meta_box;
    add_meta_box($doctor_meta_box['id'], $doctor_meta_box['title'], 'doctor_show_box', $doctor_meta_box['page'], $doctor_meta_box['context'], $doctor_meta_box['priority']);
}

/**
 * Callback function to show fields in doctor meta box
 * @global array $doctor_meta_box
 * @global Object $post
 */
function doctor_show_box() {
    // Use nonce for verification
    global $doctor_meta_box, $post;
    custom_output_meta_box($doctor_meta_box, $post);
}
/**
 * Save data from doctor meta box
 * @global array $doctor_meta_box
 * @param int $post_id
 * @return 
 */
function doctor_save_data($post_id) {
    global $doctor_meta_box;
    custom_save_meta_box($doctor_meta_box, $post_id);
}