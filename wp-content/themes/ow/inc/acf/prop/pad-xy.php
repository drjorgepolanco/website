<?php function ow_acf_prop_pad_xy( $args ) {
	$args = $args[0];
	return 'padding-top: ' . $args['top'] . 'px; padding-bottom: ' . $args['bottom'] . 'px; padding-left: ' . $args['left'] . 'px; padding-right: ' . $args['right'] . 'px;';
}