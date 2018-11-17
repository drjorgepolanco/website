<?php function ow_acf_prop_width( $args ) {
	$args = $args[0]['prop_width'];
	if ( $args ) {
		return 'width: ' . $args . '%;';
	}
}