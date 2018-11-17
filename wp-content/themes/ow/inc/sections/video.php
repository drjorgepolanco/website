<?php function ow_sctn_video( $args ) {
	$ctnt = $args['content'];
	ow_acf_sctn_video( 'video', $ctnt );
}