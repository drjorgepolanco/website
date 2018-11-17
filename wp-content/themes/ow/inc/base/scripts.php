<?php
/**
 * Enqueue scripts and styles.
 */
function ow_scripts() {

	/* Styles */
	wp_enqueue_style( 'ow-style', get_stylesheet_uri() );

		/* UnderScores */
	wp_enqueue_script( 'underscores-navigation',          get_template_directory_uri() . '/assets/js/underscores/navigation.js',          array(), '20151215', true );
	wp_enqueue_script( 'underscores-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/underscores/skip-link-focus-fix.js', array(), '20151215', true );

	/* Vendor */
	wp_enqueue_script( 'ow-jquery',        get_template_directory_uri() . '/assets/js/vendor/jquery-2.2.4.min.js',  array(), '2.2.4',  true );
	wp_enqueue_script( 'ow-jquery-ui',     get_template_directory_uri() . '/assets/js/vendor/jquery-ui.min.js',     array(), '',       true );
	wp_enqueue_script( 'ow-slick',         get_template_directory_uri() . '/assets/js/vendor/slick.min.js',         array(), '1.6.0',  true );
	// wp_enqueue_script('ow-isotope', get_template_directory_uri() . '/assets/js/vendor/isotope.min.js', array(), '', true);
	wp_enqueue_script( 'ow-isotope-docs',  get_template_directory_uri() . '/assets/js/vendor/isotope-docs.min.js',  array(), '',       true );
	
	// wp_enqueue_script( 'ow-images-loaded', get_template_directory_uri() . '/assets/js/vendor/images-loaded.min.js', array(), '4.1.4',  true );
	wp_enqueue_script( 'ow-lightbox',      get_template_directory_uri() . '/assets/js/vendor/lightbox.min.js',      array(), '2.10.0', true );
	wp_enqueue_script( 'ow-video-popup',   get_template_directory_uri() . '/assets/js/vendor/video-popup.js',       array(), '1.0.2',  true );



	/* Main */
	wp_enqueue_script( 'ow-main', get_template_directory_uri() . '/assets/js/main.js', array(), '', true );

	/* Base Wordpress */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ow_scripts' );


/* Styles for Admin Area */
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/style-admin.css', false, '1.0.0' );
}