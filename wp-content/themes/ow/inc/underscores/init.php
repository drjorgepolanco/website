<?php
/* ========================================================================== */
/* Underscores */
/* =========== */

/* Implement the Custom Header feature. */
require 'custom-header.php';

/* Custom template tags for this theme. */
require 'template-tags.php';

/* Functions which enhance the theme by hooking into WordPress. */
require 'template-functions.php';

/* Customizer additions. */
require 'customizer.php';

/* Load Jetpack compatibility file. */
if ( defined( 'JETPACK__VERSION' ) ) { require 'jetpack.php'; }