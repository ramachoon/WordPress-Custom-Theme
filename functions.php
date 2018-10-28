<?php
/*
    This file holds all the functionality of our theme.
    It will be different on every theme you create.
*/

/*
    What we are doing bellow is adding our bootstrap styles into our theme.
    We can't do it the normal way which we have done in the past, but rather add it into the wp_head or wp_footer sections

    Whenever we work in the functions.php file, we need to create a function to tell it what to do
    and then tell wordpress what loading que do you want that function to be a part of.
    This one bellow is adding in our css and js into the scripts que which gets loaded when the page loads
*/
function addCustomThemeStyles(){
    // Style
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.3', 'all');
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme-style.css', array(), '0.0.1', 'all');

    // Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.1.3', true);
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array(), '0.0.1', true);
}
add_action('wp_enqueue_scripts', 'addCustomThemeStyles');

/*
    Enabling the ability to have featured images on pages/posts.
    This will created the featured images tab on the pages and posts panel.
*/
add_theme_support( 'post-thumbnails' );
/*
    adding a new image size into the theme.
    Images will only be cropped to this size on upload.
    So any images uploaded to site before we add the new image size won't be able to use this image size
*/
add_image_size('icon', 50, 50, true);


// function register_my_menu() {
//   register_nav_menu('header-menu',__( 'Header Menu' ));
// }
// add_action( 'init', 'register_my_menu' );

function addCustomMenus(){
    add_theme_support('menus');
    register_nav_menu('header_nav', 'This is the navigation which appears at the top of the page');
    register_nav_menu('footer_nav', 'This is the navigation which appears at the bottom of the page');
}
add_action('init', 'addCustomMenus');

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
