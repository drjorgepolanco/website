<?php function ow_acf_prop_opacity( $args ) {
	$args = $args[0]['prop_opacity'];
	if ( $args ) {
		return 'opacity: ' . $args . ';';
	}
}