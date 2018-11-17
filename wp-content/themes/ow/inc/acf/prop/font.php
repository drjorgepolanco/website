<?php function ow_acf_prop_font( $args ) {
	$args  = $args[0];
	$size  = $args['size'][0]['prop_font_size'];
	$color = $args['color'];
	return 'font-size: ' . $size . 'px; ' . ow_acf_prop_color( $color );
}