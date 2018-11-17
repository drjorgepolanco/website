<?php function ow_acf_prop_margin_xy( $args ) {
	$args = $args[0];
	return 'margin-top: ' . $args['top'] . 'px; margin-bottom: ' . $args['bottom'] . 'px; margin-left: ' . $args['left'] . 'px; margin-right: ' . $args['right'] . 'px;';
}