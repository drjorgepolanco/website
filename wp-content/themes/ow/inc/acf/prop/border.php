<?php function ow_acf_prop_brdr( $args ) {
	$args  = $args[0];
   	$width = $args['width'];
    $color = $args['color'];
    $rad   = $args['radius'];
    return 'border-width: ' . $width . 'px; border-style: solid; ' . ow_acf_prop_color_brdr( $color ) . ' ' . ow_acf_prop_brdr_rad( $rad );
}