<?php

/* Get Page by Title */
function ow_get_page_by_title( $title ) {
    echo esc_url( get_permalink( get_page_by_title( $title ) ) );
}
