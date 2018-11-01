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
    https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
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
    https://codex.wordpress.org/Post_Thumbnails
*/

add_theme_support( 'post-thumbnails' );
/*
    adding a new image size into the theme.
    Images will only be cropped to this size on upload.
    So any images uploaded to site before we add the new image size won't be able to use this image size
    https://developer.wordpress.org/reference/functions/add_image_size/
*/
add_image_size('icon', 50, 50, true);

/*
    Adding menus into your theme.
    We want our users to be able to add in their own menus with links they define.
    We just need to register all the different menus which could appear on our site.
    Our users don't have the ability to register their own ones but use the ones which our theme allows,
    all that they can do is add new items into the menu.

    In our php files, we specify where the navigations go and style them to suit our theme.

    Bellow are two ways which you can get menus into your theme.
    The menus section is located under the Appearance tab and is unique to the current theme you have one.

    https://codex.wordpress.org/Navigation_Menus
*/

// function register_my_menu() {
//   register_nav_menu('header-menu',__( 'Header Menu' ));
// }
// add_action( 'init', 'register_my_menu' );

function addCustomMenus(){
    add_theme_support('menus');
    /*
        For every menu we need to register it with a unique name and a description
    */
    register_nav_menu('header_nav', 'This is the navigation which appears at the top of the page');
    register_nav_menu('footer_nav', 'This is the navigation which appears at the bottom of the page');
}
add_action('init', 'addCustomMenus');

// Register Custom Navigation Walker
/*
    Bootstrap 4 styles menus differently than 3.
    In B4, it is the a tag which gets styles rather than the li's.
    This makes it difficult to style a menu to use bootstrap.
    Luckily the wordpress community is amazing and someone has created a file which will
    convert your menu into the bootstrap version easily.
    https://github.com/wp-bootstrap/wp-bootstrap-navwalker

*/
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

/*
    Post formats are a way to customize the look of a post depending on what content
    it should have. Adding the theme support will show the post formats panel on the
    posts pages. There is a list of post formats available in the codex. You need to
    specify which of the post formats you want to include in your site.
    From that we can create files which render out the content differently.

    Files to look at:
        - front-page.php
        - content.php
        - content-*.php
        - single.php

    https://codex.wordpress.org/Post_Formats
*/
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'video' , 'link') );

require get_parent_theme_file_path('./addons/custom_post_types.php');

function addCustomLogo(){
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 300,
        'flex-width' => true,
        'flex-height' => true
    ));
}
add_action('init', 'addCustomLogo');
