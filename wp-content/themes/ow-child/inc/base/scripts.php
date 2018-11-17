<?php

/* Enqueue the parent and child theme stylesheets */
function ow_enqueue_styles() {
    $parent_style = 'ow-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'ow-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'ow_enqueue_styles' );



/* Enqueue Child Theme Scripts */
function ow_enqueue_child_scripts() {
    if ( ! is_admin() ) {
        $particlessrc = get_stylesheet_directory_uri() . '/assets/js/particles.min.js';
        $scriptsrc    = get_stylesheet_directory_uri() . '/assets/js/main-child.js'; 

        wp_register_script( 'ow-particles',  $particlessrc, array( 'ow-jquery' ), '', true );
        wp_register_script( 'ow-main-child', $scriptsrc,    array( 'ow-jquery', 'ow-slick' ), '', true );
        
        wp_enqueue_script( 'ow-particles' );
        wp_enqueue_script( 'ow-main-child' );
    }
}
add_action( 'wp_enqueue_scripts', 'ow_enqueue_child_scripts' );



/* Enqueue Barlow Google Fonts */
function ow_add_google_fonts() {
    // wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Barlow:200,400,500,700', false ); 
    // wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Lato', false ); 
    wp_enqueue_style( 'wpb-google-fonts-source-sans', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600', false ); 
    wp_enqueue_style( 'wpb-google-fonts-spectral', 'https://fonts.googleapis.com/css?family=Spectral:500,500i,700', false ); 
}
add_action( 'wp_enqueue_scripts', 'ow_add_google_fonts' );