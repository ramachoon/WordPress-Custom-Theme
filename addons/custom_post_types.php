<?php
/*
    Custom post types are really important in wordpress.
    They allow us to create new types of post whcih we can then render them out on our page.
    Bellow we are creating a post type called staff. This will include all of the staff members of our company.

    For any bit of content the user needs to upload, it would be worth making a post type.
    Examples could be
        - Staff members
        - A second blog
        - Images for a image slider
        - A list of books of movies

    https://developer.wordpress.org/reference/functions/register_post_type/

*/

function add_staff_post_type(){

    /*
        You want to include a list of all the labels for your post type.
        They should be unique to the one you are creating.
        This will help describe to your users what is happening on the admin dashboard
        https://developer.wordpress.org/reference/functions/get_post_type_labels/#description

        In this section we say _x()
        Often there could be two things name the same, especially if we use a plugin.
        The plugin we install might also include a post type called staff.
        This would then confuse our site about which one to use.
        Saying _x() we tell it that this name is unique to this theme to read it seperatly to other it might find.
        You need to say _x(text, 'information about the text', text domain which you set in your style.css)

    */
    $labels = array(
        'name' => _x('Staff', 'post type name', '18wdwu02customtheme'),
        'singular_name' => _x('Staff', 'post types singluar name', '18wdwu02customtheme'),
        'add_new_item' => _x('Add New Staff Member', 'adding new staff member', '18wdwu02customtheme')
    );

    /*
        All of the arguments that you want your post type to register
        https://developer.wordpress.org/reference/functions/register_post_type/#parameters

        List of all the built in wordpress icons you can use
        https://developer.wordpress.org/resource/dashicons/
    */
    $args = array(
        'labels' => $labels,
        'description' => 'a post type for the staff memebers in the company',
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-groups',
        'supports' => array(
            'title',
            'thumbnail'
        ),
        'query_var' => true
    );

    /*
        register_post_type needs two values
        first is the name of the post type you want to add,
        second is an array of arguments. We have seperated that into a different variable but you could
        include it all together.

        There is a list of post types which you can't use because they are already in use ie. posts and pages
    */
    register_post_type('staff', $args);
}

add_action('init', 'add_staff_post_type');
/*
    Look on staff.template.php to see us call this custom post type
*/
