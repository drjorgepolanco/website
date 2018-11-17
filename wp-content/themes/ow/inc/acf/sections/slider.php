<?php 
function ow_acf_sctn_slider( $name, $args ) {
	$args = $args[0];
	$type = $args['type'];
	$ctnt = $args['ctnt'];

	ow_cpnt_sctn_header( $name, $args );
        ow_acf_mrkp_slider( $type, $ctnt );
	ow_cpnt_sctn_footer();
}