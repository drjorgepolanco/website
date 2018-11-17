<?php if ( ! function_exists( 'ow_cpnt_page_pagination' ) ) {
    function ow_cpnt_page_pagination() {
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ow' ),
            'after'  => '</div>',
        ) );
    }
}