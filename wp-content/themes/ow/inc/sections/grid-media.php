<?php function ow_sctn_grid_media( $args ) {
	$ctnt = $args['content'];
	ow_acf_sctn_grid_media( 'grid', $ctnt );
}