<?php function ow_sctn_ctnt_dbl( $args ) {
	$ctnt = $args['content'];
	ow_acf_sctn_ctnt_dbl( 'ctnt-dbl', $ctnt );
}