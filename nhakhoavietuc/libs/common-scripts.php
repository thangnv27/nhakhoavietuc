<?php
/* ----------------------------------------------------------------------------------- */
# Register main Scripts and Styles
/* ----------------------------------------------------------------------------------- */
add_action('admin_enqueue_scripts', 'ppo_register_scripts');

function ppo_register_scripts(){
    wp_enqueue_media();

    ## Enqueue Styles
//    wp_enqueue_style('chosen-template', get_template_directory_uri() . '/libs/css/chosen.min.css');
    wp_enqueue_style('colorpicker-template', get_template_directory_uri() . '/libs/css/colorpicker.css');
    wp_enqueue_style('select2-template', get_template_directory_uri() . '/libs/css/select2.css');
    wp_enqueue_style('addquicktag-template', get_template_directory_uri() . '/css/addquicktag.css');
    wp_enqueue_style( SHORT_NAME . '-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.5.0' );

    ## Enqueue Scripts
//    wp_enqueue_script(SHORT_NAME . '-chosen', get_template_directory_uri() . '/libs/js/chosen.jquery.min.js', array('jquery'));
    wp_enqueue_script(SHORT_NAME . '-colorpicker', get_template_directory_uri() . '/libs/js/colorpicker.js', array('jquery'));
    wp_enqueue_script(SHORT_NAME . '-select2', get_template_directory_uri() . '/libs/js/select2.min.js', array('jquery'));
//    wp_enqueue_script(SHORT_NAME . '-md5', get_template_directory_uri() . '/libs/js/jquery.md5.min.js', array('jquery'));
    wp_enqueue_script(SHORT_NAME . '-scripts', get_template_directory_uri() . '/libs/js/scripts.js', array('jquery'));
    wp_enqueue_script(SHORT_NAME . '-tinymce', get_template_directory_uri() . '/libs/js/tinymce.js', array('jquery'));
}