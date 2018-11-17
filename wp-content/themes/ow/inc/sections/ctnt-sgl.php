<?php function ow_sctn_ctnt_sgl( $args ) {
	$ctnt = $args['content'];
	ow_acf_sctn_ctnt_sgl( 'ctnt-sgl', $ctnt );
}