<?php 
function ow_acf_sctn_grid_media( $name, $args ) {
	$args = $args[0];
    $type = $args['type'];
	$ctnt = $args['ctnt'];

	ow_cpnt_sctn_header( $name, $args );
        ow_acf_mrkp_grid_media( $ctnt );
	ow_cpnt_sctn_footer();
}