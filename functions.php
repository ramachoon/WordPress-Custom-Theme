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
    Beacuse we are adding multiple functions into the init queue.
    I have now moved them all of our add_theme_support() functions into one
    function bellow.
    This won't change anything in our site but it it just allows us to group all of them
    together in one area, saving us time.
*/
function add_custom_theme_supports(){
    /*
        Enabling the ability to have featured images on pages/posts.
        This will created the featured images tab on the pages and posts panel.
        https://codex.wordpress.org/Post_Thumbnails
    */
    add_theme_support( 'post-thumbnails' );

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
    add_theme_support('menus');
    /*
        For every menu we need to register it with a unique name and a description
        register_nav_menu('header-menu',__( 'Header Menu' ));
    */
    register_nav_menu('header_nav', 'This is the navigation which appears at the top of the page');
    register_nav_menu('footer_nav', 'This is the navigation which appears at the bottom of the page');

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

    /*
        The add_theme_support('custom-logo') function gives us the ability to add in a
        custom logo for our website.
        This will show a add Logo option in the Site Identity panel of the customizer.

        The options in the array aren't required but give us more functionality to the uploading image.
        The width and the height give the aspect ratio of the image. Ideally we want to be able to
        crop it to the right dimentions for our theme.
        Flex width and height allow the user to move the cropping area to whatever they want.
        If it is false, then it would stick within the aspect ratio given.

        https://developer.wordpress.org/themes/functionality/custom-logo/
    */
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 300,
        'flex-width' => true,
        'flex-height' => true
    ));

    /*
        This section bellow is allowing us to have a custom header image in our theme.
        It will create a Header Image panel appear in the customizer.

        If we want there to be a default image, we need to register it before we actually call the image.

        This default image will only appear the very first time someone installs the theme.
        If you upload a new image and then delete it, the default WON'T be used.
        What the custom-header does is either gives you the ability to have a header image or not.
        So if you click the hide image button. Your default won't show because you are hiding the image.

        In your code (header-front.php), you need to decide if your theme must include
        a header image or not. It you don't mind, then you will have to wrap the entire div in
        a if( get_header_image() ). This will then hide the whole div if there isn't an image uploaded.
        If you want to make sure there is always a header, then you need to write an if statement
        to check if there is an image and if there is get the url, otherwise get the url of the default
        image you want to include.

        https://codex.wordpress.org/Custom_Headers
    */
    register_default_headers( array(
        'defaultImage' => array(
            'url'           => get_template_directory_uri() . '/assets/images/default.jpeg',
            'thumbnail_url' => get_template_directory_uri() . '/assets/images/default.jpeg',
            'description'   => __( 'defaultImage', '18wdwu02customtheme' )
        )
    ) );
    $defaultImage = array(
    	'default-image'          => get_template_directory_uri() . '/assets/images/default.jpeg',
    	'width'                  => 1280,
    	'height'                 => 720,
        'header-text'            => false
    );
    add_theme_support( 'custom-header', $defaultImage );

    /*
        The function adds in the ability to have a custom background.
        You can choose between a background image or a background colour.
        If you want this to work you need to include body_class(); in the opening
        body tag of your site.
        This will also create two panels in the customizer, Background Image and Colours.
        In the Colours panel there is a new option for background colour.
        As long as you have the body_class() added to your body tag, whatever you type out will overide your css.
        The same with the image. If you want to include all the options for cropping, sizing etc,
        you need to specify the extra defaults at the bottom like it has here.

        https://codex.wordpress.org/Custom_Backgrounds
    */
    $defaults = array(
    	'default-color'          => 'ffffff',
    	'default-repeat'         => 'repeat',
    	'default-position-x'     => 'left',
        'default-position-y'     => 'top',
        'default-size'           => 'auto',
    	'default-attachment'     => 'scroll',
    	'wp-head-callback'       => '_custom_background_cb',
    	'admin-head-callback'    => '',
    	'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $defaults );

}
add_action('init', 'add_custom_theme_supports');

/*
    adding a new image size into the theme.
    Images will only be cropped to this size on upload.
    So any images uploaded to site before we add the new image size won't be able to use this image size
    https://developer.wordpress.org/reference/functions/add_image_size/
*/
add_image_size('icon', 50, 50, true);

// Register Custom Navigation Walker
/*
    Bootstrap 4 styles menus differently than 3.
    In B4, it is the a tag which gets styles rather than the li's.
    This makes it difficult to style a menu to use bootstrap.
    Luckily the wordpress community is amazing and someone has created a file which will
    convert your menu into the bootstrap version easily.
    https://github.com/wp-bootstrap/wp-bootstrap-navwalker

*/
require_once get_template_directory() . '/addons/class-wp-bootstrap-navwalker.php';

/*
    Because our functions.php file is getting long I am spliting my page up into
    different files. What is now going to happen is that whenever we want to add
    a new custom post type. We will write it all in the custom_post_types.php file.
*/
require get_parent_theme_file_path('./addons/custom_post_types.php');

/*
    Just like before, we are going to seperate out customizer sections into another file
    so our functions.php is easier to read.
*/
require get_parent_theme_file_path('./addons/custom_customizer.php');

/*
    Just like before, we are going to seperate out our custom fields sections into another file
    so our functions.php is easier to read.
*/
require get_parent_theme_file_path('./addons/custom_fields.php');

/*
    Sidebars are extra areas on your pages which users can add default wordpress
    widgets onto. Even though they are called sidebars they don't need to be
    on the side of pages. Techinally they could go anywhere on the site.

    Just like usual we have to turn on this functionality on our theme to be able to
    access the widgets section.

    First thing you need to do is register a sidebar.
    The register_sidebar() is for registering just 1 sidebar. If you want to add multiple
    you could either write the function twice, or use the register_sidebars() function.

    There is a range of parameters which you can give it and they will all use a default
    if you don't specify them. The main one we should be aware of is the id. Each sidebar
    needs a unique identifier for when we call it on the page.

    To see where the sidebar goes, look at front-page.php

    https://codex.wordpress.org/Sidebars
*/
function register_my_sidebars(){

    register_sidebar(array(
        'id' => 'front_page_sidebar',
        'name' => 'Front Page Sidebar',
        'description' => 'The sidebar which appears on the front page',
        'before_widget' => '<div id="%1$s" class="widget customWidget %2$s">',
        'after_widget' => '<hr></div>',
        'before_title' => '<h3 class="widgetTitle">',
        'after_title' => '</h3>'
    ));

}
add_action('widgets_init', 'register_my_sidebars');
