<?php function ow_acf_mrkp_menus( $menus ){
	$menus          = $menus[0];

    $primary        = $menus['primary'];
    $primary_show   = $primary['show'];
    $primary_span   = $primary['span'];

    $secondary      = $menus['secondary'];
    $secondary_show = $secondary['show'];
    $secondary_span = $secondary['span'];

    if ( $primary_show ) {
        ow_nav_menu( 'primary', $primary_span );
    } 
    if ( $secondary_show ) {
        ow_nav_menu( 'secondary', $secondary_span );
    }
}
/* nav for Wordpress Menus */
function ow_nav_menu( $location, $span ) {
    if ( $location ) {
        echo '<div id="ow-' . $location . '" class="ow-nav ow-' . $location . '">';
            wp_nav_menu(
                array(
                    'theme_location'  => $location,
                    'link_before'     => ( $span ) ? '<span>'  : '',
                    'link_after'      => ( $span ) ? '</span>' : ''
                )
            );
        echo '</div>';
    }
}