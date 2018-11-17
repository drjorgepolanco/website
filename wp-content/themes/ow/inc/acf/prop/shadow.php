<?php function ow_acf_prop_shadow( $args ) {
	$args    = $args[0];
	$show    = $args['show'];
	$opacity = $args['opacity'];
	if ( $show ):
		return 'box-shadow: 0px 4px 10px rgba(51, 51, 51, ' . $opacity . ');';
	endif;
}