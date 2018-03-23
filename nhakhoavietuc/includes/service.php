<?php
/* ----------------------------------------------------------------------------------- */
# Create post_type
/* ----------------------------------------------------------------------------------- */
add_action('init', 'create_service_post_type');

function create_service_post_type() {
    $args = array(
        'labels' => array(
            'name' => __('Services', SHORT_NAME),
            'singular_name' => __('Services', SHORT_NAME),
            'add_new' => __('Add new', SHORT_NAME),
            'add_new_item' => __('Add new Service', SHORT_NAME),
            'new_item' => __('New Service', SHORT_NAME),
            'edit' => __('Edit', SHORT_NAME),
            'edit_item' => __('Edit Service', SHORT_NAME),
            'view' => __('View Service', SHORT_NAME),
            'view_item' => __('View Service', SHORT_NAME),
            'search_items' => __('Search Services', SHORT_NAME),
            'not_found' => __('No Service found', SHORT_NAME),
            'not_found_in_trash' => __('No Service found in trash', SHORT_NAME),
        ),
        'public' => false,
        'show_ui' => true,
        'publicy_queryable' => true,
        'exclude_from_search' => false,
        'menu_position' => 5,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => array(
            'title', 'editor'
        ),
        'rewrite' => array('slug' => 'service', 'with_front' => false),
        'can_export' => true,
        'description' => __('Service description here.', SHORT_NAME)
    );

    register_post_type('service', $args);
}

/* ----------------------------------------------------------------------------------- */
# Meta box
/* ----------------------------------------------------------------------------------- */

$service_meta_box = array(
    'id' => 'service-meta-box',
    'title' => 'Thông tin',
    'page' => 'service',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Order',
            'desc' => '',
            'id' => 'order',
            'type' => 'text',
            'std' => '1',
        ),
        array(
            'name' => 'Target link',
            'desc' => '',
            'id' => 'link',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Background Color',
            'desc' => '',
            'id' => 'bgcolor',
            'type' => 'text',
            'std' => '',
        ),
));
// Add service meta box
if (is_admin()) {
    add_action('admin_menu', 'service_add_box');
    add_action('save_post', 'service_add_box');
    add_action('save_post', 'service_save_data');
}

/**
 * Add meta box
 * @global array $service_meta_box
 */
function service_add_box() {
    global $service_meta_box;
    add_meta_box($service_meta_box['id'], $service_meta_box['title'], 'service_show_box', $service_meta_box['page'], $service_meta_box['context'], $service_meta_box['priority']);
}

/**
 * Callback function to show fields in service meta box
 * @global array $service_meta_box
 * @global Object $post
 */
function service_show_box() {
    // Use nonce for verification
    global $service_meta_box, $post;
    custom_output_meta_box($service_meta_box, $post);
    
    $item_value = get_post_meta($post->ID, 'service_icon', true);
    echo '<table width="100%">';
    echo '<tr>';
    echo '<th style="text-align: left;"><label for="service_icon">Icon</label></th>';
    echo '<td>';
    echo '<select value="' . $item_value . '" id="service_icon" name="service_icon" style="width: 100%">';
    echo '<option value="">' . __('No Icon', SHORT_NAME) . '</option>';
    foreach (font_awesome_icons() as $icon_category => $icons) {
        echo '<optgroup label="' . $icon_category . '">';
        foreach ($icons as $icon) {
            echo '<option value="' . $icon . '"' . selected($item_value, $icon, false) . '>' . ucwords(str_replace('-', ' ', $icon)) . '</option>';
        }
        echo '</optgroup>';
    }
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    echo '</table>';
}
/**
 * Save data from service meta box
 * @global array $service_meta_box
 * @param int $post_id
 * @return 
 */
function service_save_data($post_id) {
    global $service_meta_box;
    custom_save_meta_box($service_meta_box, $post_id);
    
    $old = get_post_meta($post_id, 'service_icon', true);
    $new = $_POST['service_icon'];
    if (isset($_POST['service_icon']) && $new != $old) {
        update_post_meta($post_id, 'service_icon', $new);
    } elseif ('' == $new && $old) {
        delete_post_meta($post_id, 'service_icon', $old);
    }
}