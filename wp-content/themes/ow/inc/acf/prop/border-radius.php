<?php function ow_acf_prop_brdr_rad( $args ) {
	$args = $args[0];
    $unit = $args['unit'];
    $px   = $args['px'];
    $pct  = $args['pct'];

    $value = ( $unit === 'px' ) ? $px . 'px' : $pct . '%';
    return 'border-radius: ' . $value . ';';
}