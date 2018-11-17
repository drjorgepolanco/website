<?php function ow_acf_prop_pad_y( $args ) {
	$args = $args[0];
	return 'padding-top: ' . $args['top'] . 'px; padding-bottom: ' . $args['bottom'] . 'px;';
}