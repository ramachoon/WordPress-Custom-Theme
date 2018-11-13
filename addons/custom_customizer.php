<?php
/*
    We want our theme to be as customizable as possible. Even though we are making themes for a
    particular client, we want these our theme to be as usable as possible for other companies.

    The Customization API is going to allow us to add sections to change anything on the page,
    from content to styles. Anything can be changed.

    Everything we write here will appear in the customizer of our theme.

    https://codex.wordpress.org/Theme_Customization_API
*/

function custom_theme_customizer( $wp_customize ){
    /*
        When we want to create new customization tools, we need to have 3 things
        - section
        - setting
        - control

        The Section is where on the customizer do we want this to go. We could either create our own sections,
        or add it to exsisting ones like Site Identity.

        The Setting is for the individual customizer you are adding.

        The Control is the piece of UI which gets shown, ie text box, colour wheel.
        You can also make your own controls, check out http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/ for reference

        Nothing will show on your customizer unless you have used all 3.
    */

    /*
        Header Customization
    */
    /*
        The add section function needs to have a unique identifier which is specific to the section.
        The title is what gets shown on the customizer and the priority is how high up it goes.
    */
    $wp_customize->add_section('custom_theme_header_info', array(
        'title' => __('Header Styles' , '18wdwu02customtheme'),
        'priority' => 20
    ));
    /*
        The settings also needs a uniquie identifier.
        Depending on what type of control you want, the default would match that. So if I am using the Color control then it would be a hex code.
        If it is text, then it would be a string.
        This default isn't the default of the css property we are going to call later, but the default
        which gets shown on the UI element.

        Transport is the setting for how do you want to show the change in the preview mode. Refresh means just refresh the page.
        If you want it to dynamically change without a refresh, you will have to add some custom JS into the theme to handle that
        https://codex.wordpress.org/Theme_Customization_API#Part_3:_Configure_Live_Preview_.28Optional.29
    */
    $wp_customize->add_setting('header_background_colour_setting', array(
        'default' => '#ffffff',
        'transport' => 'refresh'
    ));

    /*
        The control specifies what the UI element would be. By default there are
         - WP_Customize_Control()
         - WP_Customize_Color_Control()
         - WP_Customize_Upload_Control()
         - WP_Customize_Image_Control()

         Each of these will render out a different UI. There are also sub Arguments which you can add on to make it
         even more customizable.

         Like before it needs a unique identifier but you also need to specify which of the Customize Control functions
         you want to call.
         Label is what appers above the control.
         section needs to tell it what section is this control going into
         settings is the setting which you have specifed for the control.
    */
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_background_colour_control',
            array(
                'label' => __('Header Background Colour', '18wdwu02customtheme'),
                'section' => 'custom_theme_header_info',
                'settings' => 'header_background_colour_setting'
            )
        )
    );

    $wp_customize->add_setting('header_link_colour_setting', array(
        'default' => '#ffffff',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_link_colour_control',
            array(
                'label' => __('Header Link Colour', '18wdwu02customtheme'),
                'section' => 'custom_theme_header_info',
                'settings' => 'header_link_colour_setting'
            )
        )
    );

    /*
        Footer Customization
    */
    /*
        Look at footer.php to see where this customizer gets rendered.
    */
    $wp_customize->add_section('custom_theme_footer_section', array(
        'title' => __('Footer' , '18wdwu02customtheme'),
        'priority' => 21
    ));

    $wp_customize->add_setting('footer_text_setting', array(
        'default' => '',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'footer_text_control',
            array(
                'label' => __('Footer Text', '18wdwu02customtheme'),
                'section' => 'custom_theme_footer_section',
                'settings' => 'footer_text_setting',
                'type' => 'text'
            )
        )
    );





    $wp_customize->add_panel('Featured_Posts_Panel', array(
        'title' => __('Featured Posts' , '18wdwu02customtheme'),
        'priority' => 30,
        'description' => 'This panel will hold the featured pages sections'
    ));



    for ($i=1; $i <= 2 ; $i++) {

        $wp_customize->add_section('featured_post_'.$i, array(
            'title' => __('Featured Post '.$i , '18wdwu02customtheme'),
            'priority' => 21,
            'panel' => 'Featured_Posts_Panel'
        ));

        $wp_customize->add_setting('featured_post_'.$i.'_setting', array(
            'default' => '',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'featured_post_'.$i.'_control',
                array(
                    'label' => __('Featured Post', '18wdwu02customtheme'),
                    'section' => 'featured_post_'.$i,
                    'settings' => 'featured_post_'.$i.'_setting',
                    'type' => 'select',
                    'choices' => array(
                        'value1' => 'Value 1',
                        'value2' => 'Value 2',
                        'value3' => 'Value 3',
                    )
                )
            )
        );
    }




















}
add_action('customize_register', 'custom_theme_customizer');

/*
    When outputting styles like background colour, you need to figure out what is the id or class that the element
    is already taking its styles from, or make your own.

    The function bellow is being added to the wp_head which is called in our head element.
    We need to call the function, then close php, open and close style and then open php again.

    To get the customizer value you need to use the get_theme_mod() function.
    We are going to give it two values, the first is what is the setting of the control we want to output, and then the second is the initial default.
    At first install of the theme it won't take the default specifed in the setting so we need to output our own again.
*/

function custom_theme_customizer_styles(){
    ?>

        <style type="text/css">
            .header-bg{
                background-color: <?php echo get_theme_mod('header_background_colour_setting', '#ffffff'); ?>!important;
            }

            .navbar-light .navbar-nav .nav-link{
                color: <?php echo get_theme_mod('header_link_colour_setting', '#ffffff'); ?>!important;
            }
        </style>

    <?php
}
add_action('wp_head', 'custom_theme_customizer_styles');
