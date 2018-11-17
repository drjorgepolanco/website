<?php

/* Get Post Thumbnail */
function ow_get_post_thumbnail( $class = '', $size = 'full' ) {
    if ( has_post_thumbnail() ) { 
        the_post_thumbnail( $size, array( 'class' => $class, 'alt' => get_the_title() ) );
    }
}

/* Get Post Navigation */
if ( ! function_exists( 'ow_get_post_navigation' ) ) {
    function ow_get_post_navigation( $left_icon = 'arrow-left', $right_icon = 'arrow-right') {
        the_post_navigation(
            array(
                'prev_text' => '<span><i class="fa fa-' . $left_icon . '"></i></span>',
                'next_text' => '<span><i class="fa fa-' . $right_icon . '"></i></span>',
                'screen_reader_text' => ""
            )
        ); 
    }
}

/* Get Post Comments */
function ow_get_post_comments() {
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) { 
        comments_template(); 
    }
}

/* Get Posts */
function ow_get_posts( $post_type, $show_nav = false, $show_comments = false ) {
    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content-' . $post_type, get_post_format() );
        if ( $show_nav )    { ow_get_post_navigation(); }
        if ( $show_comments ) { ow_get_post_comments(); }
    endwhile;
}

/* Get Post Slug */
function ow_get_post_slug( $id ) {
    $post = get_post( $id ); 
    $slug = $post->post_name;
    echo $slug;
}