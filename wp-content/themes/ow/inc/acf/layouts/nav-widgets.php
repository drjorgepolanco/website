<?php function ow_acf_lyts_nav_wgts( $args ) {
    $args   = $args[0];
    $menus  = $args['menus'];
    $social = $args['social'];
    $cta    = $args['cta'];
    ow_acf_mrkp_cta( $cta );
    ow_acf_mrkp_menus( $menus ); 
    ow_acf_mrkp_social( $social );
}