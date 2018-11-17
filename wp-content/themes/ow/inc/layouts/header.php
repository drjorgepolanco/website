<?php if ( ! function_exists( 'ow_lyts_header' ) ) {
    function ow_lyts_header() {
        $header = get_field( 'opts_header', 'option' );
        ow_acf_lyts_header( $header );
    }
}