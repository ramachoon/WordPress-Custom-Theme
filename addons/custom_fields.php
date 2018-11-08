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

function show_metaboxes($post, $args){
    global $metaboxes;

    $fields = $metaboxes[$args['id']]['fields'];


    if(! empty($fields)){
        foreach ($fields as $id => $field) {
            switch($field['type']){
                case 'text':
                    $output .= '<label for="'.$id.'">'.$field['title'].'</label>';
                    $output .= '<input type="text" name="'.$id.'" class="" style="width:100%">';
                break;
                case 'number':
                    $output .= '<label for="'.$id.'">'.$field['title'].'</label>';
                    $output .= '<input type="number" name="'.$id.'" style="width:100%">';
                break;
                case 'select':
                    $output .= '<label>'.$field['title'].'</label>';
                    $output .= '<select></select>';
                break;
                default:
                    $output .= '<label>'.$field['title'].'</label>';
                    $output .= '<input type="text" name="'.$id.'">';
                break;
            }
        }
    }
    echo $output;
}
