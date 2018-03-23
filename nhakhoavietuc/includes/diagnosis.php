<?php
/* ----------------------------------------------------------------------------------- */
# Create post_type
/* ----------------------------------------------------------------------------------- */
add_action('init', 'create_diagnosis_post_type');

function create_diagnosis_post_type() {
    $args = array(
        'labels' => array(
            'name' => __('Chẩn đoán'),
            'singular_name' => __('Chẩn đoán'),
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new Diagnosis'),
            'new_item' => __('New Diagnosis'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit Diagnosis'),
            'view' => __('View Diagnosis'),
            'view_item' => __('View Diagnosis'),
            'search_items' => __('Search Diagnosis'),
            'not_found' => __('No Diagnosis found'),
            'not_found_in_trash' => __('No Diagnosis found in trash'),
        ),
        'public' => false,
        'show_ui' => true,
        'publicy_queryable' => true,
        'exclude_from_search' => false,
        'menu_position' => 5,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => array(
            'title',
        ),
        'rewrite' => array('slug' => 'diagnosis', 'with_front' => false),
        'can_export' => true,
        'description' => __('Diagnosis description here.'),
    );

    register_post_type('diagnosis', $args);
}

/* ----------------------------------------------------------------------------------- */
# Meta box
/* ----------------------------------------------------------------------------------- */

$diagnosis_age = array();
for ($_age = 14; $_age <= 75; $_age++) {
   $diagnosis_age[$_age] = $_age; 
}

$diagnosis_meta_box = array(
    'id' => 'diagnosis-meta-box',
    'title' => 'Thông tin',
    'page' => 'diagnosis',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Giới tính',
            'desc' => '',
            'id' => 'sex',
            'type' => 'radio',
            'std' => '',
            'options' => array(
                'male' => 'Name',
                'female' => 'Nữ',
            )
        ),
        array(
            'name' => 'Tuổi',
            'desc' => '',
            'id' => 'age',
            'type' => 'select',
            'std' => '',
            'options' => $diagnosis_age
        ),
        array(
            'name' => 'Email',
            'desc' => '',
            'id' => 'email',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Số điện thoại',
            'desc' => '',
            'id' => 'mobile',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Địa chỉ',
            'desc' => '',
            'id' => 'address',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Chọn điều trị',
            'desc' => '',
            'id' => 'treatment',
            'type' => 'radio',
            'std' => '',
            'options' => treatment_list(),
        ),
        array(
            'name' => 'Ghi chú',
            'desc' => '',
            'id' => 'comments',
            'type' => 'textarea',
            'std' => '',
        ),
        array(
            'name' => 'Ảnh chụp trực diện',
            'desc' => '',
            'id' => 'photo_1',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Ảnh chụp vòm trên',
            'desc' => '',
            'id' => 'photo_2',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Ảnh chụp vòm dưới',
            'desc' => '',
            'id' => 'photo_3',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Ảnh chụp răng cắn bên phải',
            'desc' => '',
            'id' => 'photo_4',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Ảnh chụp răng cắn bên trái',
            'desc' => '',
            'id' => 'photo_5',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Ảnh chụp từ dưới lên',
            'desc' => '',
            'id' => 'photo_6',
            'type' => 'text',
            'std' => '',
        ),
));
// Add diagnosis meta box
if (is_admin()) {
    add_action('admin_menu', 'diagnosis_add_box');
    add_action('save_post', 'diagnosis_add_box');
    add_action('save_post', 'diagnosis_save_data');
}

/**
 * Add meta box
 * @global array $diagnosis_meta_box
 */
function diagnosis_add_box() {
    global $diagnosis_meta_box;
    add_meta_box($diagnosis_meta_box['id'], $diagnosis_meta_box['title'], 'diagnosis_show_box', $diagnosis_meta_box['page'], $diagnosis_meta_box['context'], $diagnosis_meta_box['priority']);
}

/**
 * Callback function to show fields in diagnosis meta box
 * @global array $diagnosis_meta_box
 * @global Object $post
 */
function diagnosis_show_box() {
    // Use nonce for verification
    global $diagnosis_meta_box, $post;
    custom_output_meta_box($diagnosis_meta_box, $post);
}
/**
 * Save data from diagnosis meta box
 * @global array $diagnosis_meta_box
 * @param int $post_id
 * @return 
 */
function diagnosis_save_data($post_id) {
    global $diagnosis_meta_box;
    custom_save_meta_box($diagnosis_meta_box, $post_id);   
}

if (is_admin()) :

    function diagnosis_remove_meta_boxes() {
        if (!current_user_can('manage_options')) {
            remove_meta_box('submitdiv', 'diagnosis', 'normal');
        }
    }

    add_action('admin_menu', 'diagnosis_remove_meta_boxes');
endif;