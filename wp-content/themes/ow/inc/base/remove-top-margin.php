<?php
/* Remove default top margin from html tag */
add_action( 'get_header', 'remove_admin_login_header' );
function remove_admin_login_header() {
    remove_action( 'wp_head', '_admin_bar_bump_cb' );
}