<?php


/* Add custom fonts to wysiwyg editor */
/* ================================== */

add_filter( 'tiny_mce_before_init', 'ow_mce_custom_font_size_array' );
function ow_mce_custom_font_size_array( $init ) {
  $theme_advanced_fonts = "12px 16px 18px 20px 22px 24px 28px 32px 36px 40px 44px 48px 52px 56px 60px 64px 68px 72px 84px 96px";
  $init['fontsize_formats'] = $theme_advanced_fonts;
  return $init;
}



// /* Force editor to insert <br> instead of <p> when pressing enter */
// /* ============================================================== */

// defined( 'ABSPATH' ) OR exit;
// function mytheme_tinymce_settings( $tinymce_init_settings ) {
//     $tinymce_init_settings['forced_root_block'] = false;
//     return $tinymce_init_settings;
// }
// add_filter( 'tiny_mce_before_init', 'mytheme_tinymce_settings' );

// remove_filter ( 'the_content', 'wpautop' );
// add_filter ( 'the_content', 'add_newlines_to_post_content' );
// function add_newlines_to_post_content( $content ) {
//     return nl2br( $content );
// }