<?php
/* Friendly Block Titles */
function my_layout_title( $title, $field, $layout, $i ) {
    if ( $value = get_sub_field( 'section_title' ) ) {
        return $title . ' - ' . $value;
    } 
    else {
        foreach ( $layout['sub_fields'] as $sub ) {
            if ( $sub['name'] == 'section_title' ) {
                $key = $sub['key'];
                if ( array_key_exists( $i, $field['value'] ) && $value = $field['value'][$i][$key] ) {
                    return $value;
                }
            }
        }
    }
    return $title;
}
add_filter( 'acf/fields/flexible_content/layout_title', 'my_layout_title', 10, 4 );



/* Options Page */
if ( function_exists('acf_add_options_page' ) ) {
    
    acf_add_options_page();
    
}


/* Load JSON */
add_filter( 'acf/settings/load_json', function( $paths ) {
  $paths = array();

  // if(is_child_theme())
  // {
  //   $paths[] = get_stylesheet_directory() . '/acf-json';
  // }
  $paths[] = get_template_directory() . '/acf-json';

  return $paths;
});


/* Save JSON */
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_template_directory() . '/acf-json';
    
    // return
    return $path;   
}
?>