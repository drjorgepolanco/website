<?php if ( ! function_exists( 'ow_lyts_footer' ) ) {
    function ow_lyts_footer() {
    	$footer = get_field( 'opts_footer', 'option' );
        ow_acf_lyts_footer( $footer );
    }
}