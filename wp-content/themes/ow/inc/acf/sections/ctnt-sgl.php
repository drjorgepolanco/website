<?php 
function ow_acf_sctn_ctnt_sgl( $name, $args ) {
	$args = $args[0];
	$type = $args['type'];
	$ctnt = $args['ctnt'];

	ow_cpnt_sctn_header( $name, $args );
        ow_cpnt_subsctn( $type, $ctnt );
	ow_cpnt_sctn_footer();
}