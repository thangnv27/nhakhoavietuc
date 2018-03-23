<?php
/* ----------------------------------------------------------------------------------- */
# adds the plugin initalization scripts that add styles and functions
/* ----------------------------------------------------------------------------------- */
//if(!current_theme_supports('deactivate_layerslider')) require_once( "config-layerslider/config.php" );//layerslider plugin

######## BLOCK CODE NAY LUON O TREN VA KHONG DUOC XOA ##########################
include 'includes/config.php';
include 'libs/HttpFoundation/Request.php';
include 'libs/HttpFoundation/Response.php';
include 'libs/HttpFoundation/Session.php';
include 'libs/custom.php';
include 'libs/common-scripts.php';
include 'libs/meta-box.php';
include 'libs/theme_functions.php';
include 'libs/theme_settings.php';
include 'libs/template-tags.php';
######## END: BLOCK CODE NAY LUON O TREN VA KHONG DUOC XOA ##########################
include 'includes/custom-page.php';
include 'includes/widgets/ads.php';
include 'includes/widgets/category-posts-list.php';
include 'includes/widgets/featured-posts.php';
include 'includes/service.php';
include 'includes/doctor.php';
include 'includes/diagnosis.php';
include 'includes/shortcodes.php';
include 'includes/accordion.php';
include 'includes/slider.php';

if (is_admin()) {
    $basename_excludes = array('plugins.php', 'plugin-install.php', 'plugin-editor.php', 'theme-editor.php', 
        'tools.php', 'import.php', 'export.php');
    if (in_array($basename, $basename_excludes)) {
//        wp_redirect(admin_url());
    }
    
    include 'includes/plugins-required.php';

    // Add filter
    add_filter( 'enter_title_here', 'ppo_change_title_text' );
    
    // Add action
    add_action('admin_menu', 'custom_remove_menu_pages');
    add_action('admin_menu', 'remove_menu_editor', 102);
}

/**
 * Remove admin menu
 */
function custom_remove_menu_pages() {
    remove_menu_page('edit-comments.php');
//    remove_menu_page('plugins.php');
//    remove_menu_page('tools.php');
}

function remove_menu_editor() {
    remove_submenu_page('themes.php', 'themes.php');
    remove_submenu_page('themes.php', 'theme-editor.php');
    remove_submenu_page('plugins.php', 'plugin-editor.php');
    remove_submenu_page('options-general.php', 'options-writing.php');
    remove_submenu_page('options-general.php', 'options-discussion.php');
    remove_submenu_page('options-general.php', 'options-media.php');
}

/* ----------------------------------------------------------------------------------- */
# Setup Theme
/* ----------------------------------------------------------------------------------- */
if (!function_exists("ppo_theme_setup")) {

    function ppo_theme_setup() {
        /*
	 * Make theme available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( SHORT_NAME, get_template_directory() . '/languages' );
        
        ## Enable Links Manager (WP 3.5 or higher)
        //add_filter('pre_option_link_manager_enabled', '__return_true');
        
        // This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 
            'css/editor-style.css', 
            'css/addquicktag.css',
            'css/bootstrap.min.css',
            'genericons/genericons.css',
            get_stylesheet_directory_uri(), 
        ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

        ## Post Thumbnails
        if (function_exists('add_theme_support')) {
            add_theme_support('post-thumbnails');
        }
        add_image_size('260x130', 260, 130, true); // Post thumbnail
        
        ## Post formats
//        add_theme_support('post-formats', array('link', 'quote', 'gallery', 'video', 'image', 'audio', 'aside'));
        
        ## Add support for featured content.
	add_theme_support( 'featured-content', array(
            'featured_content_filter' => 'ppo_get_featured_posts',
            'max_posts' => 6,
	));

        ## Register menu location
        register_nav_menus(array(
            'menu-header' => 'Menu Header',
//            'primary' => 'Primary Location',
//            'mobile' => 'Mobile Location',
        ));
        
        // Front-end remove admin bar
        if (!current_user_can('administrator') && !current_user_can('editor') && !is_admin()) {
            show_admin_bar(false);
        }
    }

}

add_action('after_setup_theme', 'ppo_theme_setup');

/**
 * Enqueue scripts and styles for the front end.
 */
function ppo_enqueue_scripts() {
    // Add Bootstrap stylesheet
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
    
    // Add font awesome
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.5.0' );
    
    // Add Genericons font, used in the main stylesheet.
//    wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );
    
    // Add swiper stylesheet
    wp_enqueue_style( SHORT_NAME . '-swiper', get_template_directory_uri() . '/css/swiper.min.css', array(), '3.3.1' );
    
    // Add accordion stylesheet
    wp_enqueue_style( SHORT_NAME . '-accordion', get_template_directory_uri() . '/css/accordion.min.css', array(), false );
    
    // Add colorbox stylesheet
    wp_enqueue_style( 'colorbox', get_template_directory_uri() . '/colorbox/colorbox.min.css', array(), '1.4.33' );
    
    // Add Bootstrap stylesheet
//    wp_enqueue_style( 'jquery-ui', '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', array(), '1.11.4' );
    
    // Add animate stylesheet
    wp_enqueue_style( SHORT_NAME . '-animate', get_template_directory_uri() . '/css/animate.min.css', array(), FALSE );
    
    // Load addquicktag stylesheet
    wp_enqueue_style( SHORT_NAME . '-addquicktag', get_template_directory_uri() . '/css/addquicktag.min.css', array(), FALSE );
        
    // Add font styles
    wp_enqueue_style( SHORT_NAME . '-Open-Sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,vietnamese', array(), false );
    wp_enqueue_style( SHORT_NAME . '-Open-Sans-Condensed', 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,vietnamese', array(), false );
    wp_enqueue_style( SHORT_NAME . '-Roboto-Condensed', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic&subset=latin,vietnamese', array(), false );

    // Load our main stylesheet.
    wp_enqueue_style( SHORT_NAME . '-style', get_stylesheet_uri() );
    
    // Add wordpress default stylesheet
    wp_enqueue_style( 'wp-default', get_template_directory_uri() . '/css/wp-default.css', array(), FALSE );
    
    // Add common stylesheet
    wp_enqueue_style( SHORT_NAME . '-common', get_template_directory_uri() . '/css/common.min.css', array(), FALSE );

    // Load the Internet Explorer specific stylesheet.
//    wp_enqueue_style( SHORT_NAME . '-ie', get_template_directory_uri() . '/css/ie.css', array( SHORT_NAME . '-style' ), '20131205' );
//    wp_style_add_data( SHORT_NAME . '-ie', 'conditional', 'lt IE 9' );
/*
    if ( is_singular() && comments_open() ) {
        // Add comment stylesheet
        wp_enqueue_style( 'comment', get_template_directory_uri() . '/css/comment.css', array(), FALSE );
        
        wp_enqueue_script( 'comment-reply' );
    }

    if(!is_admin()){
        wp_enqueue_script( SHORT_NAME . '-script', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), '20150315', true );
        wp_enqueue_script('ajax.js', get_bloginfo('template_directory') . "/js/ajax.min.js", array('jquery'), false, true);
    }
*/
}

add_action( 'wp_enqueue_scripts', 'ppo_enqueue_scripts' );

/* ----------------------------------------------------------------------------------- */
# Widgets init
/* ----------------------------------------------------------------------------------- */
if (!function_exists("ppo_widgets_init")) {

    // Register Sidebar
    function ppo_widgets_init() {
        register_sidebar(array(
            'id' => 'sidebar',
            'name' => __('Sidebar', SHORT_NAME),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'id' => 'footer1',
            'name' => __('Sidebar Footer 1', SHORT_NAME),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'id' => 'footer2',
            'name' => __('Sidebar Footer 2', SHORT_NAME),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'id' => 'footer3',
            'name' => __('Sidebar Footer 3', SHORT_NAME),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }

    // Register widgets
    register_widget('Ads_Widget');
    register_widget('Category_Posts_List_Widget');
    register_widget('Featured_Posts_widget');
}

add_action('widgets_init', 'ppo_widgets_init');

/* ----------------------------------------------------------------------------------- */
# Unset size of post thumbnails
/* ----------------------------------------------------------------------------------- */
/*
function ppo_filter_image_sizes($sizes) {
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['large']);

    return $sizes;
}

add_filter('intermediate_image_sizes_advanced', 'ppo_filter_image_sizes');
*/
/*
  function ppo_custom_image_sizes($sizes){
  $myimgsizes = array(
  "image-in-post" => __("Image in Post"),
  "full" => __("Original size")
  );

  return $myimgsizes;
  }

  add_filter('image_size_names_choose', 'ppo_custom_image_sizes');
 */

//PPO Feed all post type

function ppo_feed_request($qv) {
    if (isset($qv['feed']))
        $qv['post_type'] = get_post_types();
    return $qv;
}

add_filter('request', 'ppo_feed_request');

function getLocale() {
    $locale = "vn";
    if (get_query_var("lang") != null) {
        $locale = get_query_var("lang");
    } else if (function_exists("qtrans_getLanguage")) {
        $locale = qtrans_getLanguage();
    } else if (defined('ICL_LANGUAGE_CODE')) {
        $locale = ICL_LANGUAGE_CODE;
    }
    if ($locale == "vi") {
        $locale = "vn";
    }
    return $locale;
}

/**
 * Override wp title for add new/edit a post
 * 
 * @param string $title
 * @return string
 */
function ppo_change_title_text( $title ){
    $screen = get_current_screen();
 
    switch ($screen->post_type) {
        case 'diagnosis':
            $title = 'Tên bệnh nhân';
            break;
        case 'doctor':
            $title = 'Tên bác sĩ';
            break;
        default:
            break;
    }
 
     return $title;
}
/* ----------------------------------------------------------------------------------- */
# Custom Login / Logout
/* ----------------------------------------------------------------------------------- */
function change_username_wps_text($text) {
    if (in_array($GLOBALS['pagenow'], array('wp-login.php'))) {
        if ($text == 'Username') {
            $text = 'Username or Email';
        }
    }
    return $text;
}

add_filter('gettext', 'change_username_wps_text');
/*
function login_failed() {
    $login_page = get_page_link(get_option(SHORT_NAME . "_pageLoginID"));
    wp_redirect($login_page . '?login=failed');
    exit;
}

add_action('wp_login_failed', 'login_failed');

function verify_username_password($user, $username, $password) {
    $login_page = get_page_link(get_option(SHORT_NAME . "_pageLoginID"));
    if ($username == "" || $password == "") {
        wp_redirect($login_page . "?login=empty".$username);
        exit;
    }
}

add_filter('authenticate', 'verify_username_password', 1, 3);
*/
// remove the default filter
remove_filter('authenticate', 'wp_authenticate_username_password', 20, 3);

// add custom filter
add_filter('authenticate', 'ppo_authenticate_username_password', 20, 3);

function ppo_authenticate_username_password($user, $username, $password) {

    // If an email address is entered in the username box, 
    // then look up the matching username and authenticate as per normal, using that.
    if(is_email($username)){
        if (!empty($username))
            $user = get_user_by('email', $username);

        if (isset($user->user_login, $user))
            $username = $user->user_login;
    }

    // using the username found when looking up via email
    return wp_authenticate_username_password(NULL, $username, $password);
}

/**
 * Redirects the user to the custom "Forgot your password?" page instead of
 * wp-login.php?action=lostpassword.
 */
/*
function redirect_to_custom_lostpassword() {
    if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
        if ( is_user_logged_in() ) {
            wp_redirect(home_url());
            exit;
        }
 
        $login_page = get_page_link(get_option(SHORT_NAME . "_pageLoginID"));
        wp_redirect( $login_page . "?login=lostpassword" );
        exit;
    }
}

add_action( 'login_form_lostpassword', 'redirect_to_custom_lostpassword' );
*/

/**
 * A shortcode for rendering the form used to initiate the password reset.
 * [custom-lost-password-form]
 *
 * @param  array   $attributes  Shortcode attributes.
 * @param  string  $content     The text content for shortcode. Not used.
 *
 * @return string  The shortcode output
 */
//function ppo_render_password_lost_form( $attributes, $content = null ) {
//    // Parse shortcode attributes
//    $default_attributes = array( 'show_title' => true );
//    $attributes = shortcode_atts( $default_attributes, $attributes );
//
//    return get_template_html( 'password_lost_form', $attributes );
//}
//
//add_shortcode( 'custom-lost-password-form', 'ppo_render_password_lost_form' );

function redirect_after_logout() {
//    $login_page  = get_page_link(get_option(SHORT_NAME . "_pageLoginID"));
//    wp_redirect( $login_page . "?login=false" );
    wp_redirect(home_url());
    exit;
}

add_action('wp_logout','redirect_after_logout');

/**
* Render the contents of the given template to a string and returns it.
* @param    string  $template_name  The name of the template to render (without .php)
* @param    array   $attributes     The PHP variables for the template
*
* @return   string                  The contents of the template.
*/
function get_template_html($template_name, $attributes = null) {
    if (!$attributes) {
        $attributes = array();
    }
    
    ob_start();

    do_action('personalize_div_before_' . $template_name);

    require( $template_name . '.php' );

    do_action('personalize_div_before_' . $template_name);

    $html = ob_get_contents();

    ob_end_clean();

    return $html;
}

/**
 * Getter function for Featured Content Plugin.
 *
 * @return array An array of WP_Post objects.
 */
function ppo_get_featured_posts() {
    /**
     * Filter the featured posts to return in Twenty Fourteen.
     *
     * @param array|bool $posts Array of featured posts, otherwise false.
     */
    return apply_filters( 'ppo_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @return bool Whether there are featured posts.
 */
function ppo_has_featured_posts() {
    return ! is_paged() && (bool) ppo_get_featured_posts();
}