<?php
/* Register Secondary Menu */
add_action( 'after_setup_theme', 'register_secondary_menu' );
function register_secondary_menu() {
  register_nav_menu( 'secondary', __( 'Secondary', 'ow-child' ) );
}
