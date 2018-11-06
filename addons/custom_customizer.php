<?php

function custom_theme_customizer( $wp_customize ){

    $wp_customize->add_section('custom_theme_header_info', array(
        'title' => __('Header Styles' , '18wdwu02customtheme'),
        'priority' => 20
    ));


    $wp_customize->add_setting('header_background_colour_setting', array(
        'default' => '#ffffff',
        'transport' => 'refresh'
    ));

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
}
add_action('customize_register', 'custom_theme_customizer');



function custom_theme_customizer_styles(){
    ?>

        <style type="text/css">
            .header-bg{
                background-color: <?php echo get_theme_mod('header_background_colour_setting', '#ffffff'); ?>!important;
            }
        </style>

    <?php
}
add_action('wp_head', 'custom_theme_customizer_styles');
