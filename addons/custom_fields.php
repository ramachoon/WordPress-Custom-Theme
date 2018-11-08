<?php

$metaboxes = array(
    'staff' => array(
        'title' => 'Staff Info',
        'applicableto' => 'staff',
        'location' => 'normal',
        'priority' => 'high',
        'fields' => array(
            'staffRole' => array(
                'title' => 'Staff Members Role',
                'type' => 'text'
            ),
            'yearStarted' => array(
                'title' => 'Year Staff Member Started',
                'type' => 'number'
            )
        )
    )
 );


function add_custom_fields(){
    global $metaboxes;

    if(! empty($metaboxes) ){
        foreach($metaboxes as $id => $metabox){
            // add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null )
            add_meta_box($id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id);
        }
    }

}
add_action('admin_init', 'add_custom_fields');

function show_metaboxes($post){

}
