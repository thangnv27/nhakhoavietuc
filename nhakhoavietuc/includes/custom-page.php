<?php

function ppo_find_revsliders() {
    // Get WPDB Object
    global $wpdb;

    // Table name
    $table_name = $wpdb->prefix . "revslider_sliders";

    // Get sliders
    $sliders = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id ASC LIMIT 100");

    if (empty($sliders))
        return;

    return $sliders;
}

function ppo_list_revsliders() {
    $result = array(
        '' => __('-- Chọn một slider --', SHORT_NAME)
    );
    $sliders = ppo_find_revsliders();
    foreach ($sliders as $slider) {
        $result[$slider->alias] = $slider->title;
    }
    return $result;
}

/* ----------------------------------------------------------------------------------- */
# Meta box
/* ----------------------------------------------------------------------------------- */

$page_meta_box = array(
    'id' => 'page-meta-box',
    'title' => __('Thông tin', SHORT_NAME),
    'page' => 'page',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Revolution Sliders',
            'desc' => '',
            'id' => 'revslider',
            'type' => 'select',
            'std' => '',
            'options' => ppo_list_revsliders(),
        ),
));
// Add page meta box
if (is_admin()) {
    add_action('admin_menu', 'page_add_box');
    add_action('save_post', 'page_add_box');
    add_action('save_post', 'page_save_data');
}

/**
 * Add meta box
 * @global array $page_meta_box
 */
function page_add_box() {
    global $page_meta_box;
    add_meta_box($page_meta_box['id'], $page_meta_box['title'], 'page_show_box', $page_meta_box['page'], $page_meta_box['context'], $page_meta_box['priority']);
}

/**
 * Callback function to show fields in page meta box
 * @global array $page_meta_box
 * @global Object $post
 */
function page_show_box() {
    // Use nonce for verification
    global $page_meta_box, $post;
    custom_output_meta_box($page_meta_box, $post);
}
/**
 * Save data from page meta box
 * @global array $page_meta_box
 * @param int $post_id
 * @return 
 */
function page_save_data($post_id) {
    global $page_meta_box;
    custom_save_meta_box($page_meta_box, $post_id);   
}