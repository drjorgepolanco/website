<?php function ow_acf_prop_mw( $args ) {
	$args = $args[0];
    $unit = $args['unit'];
    $px   = $args['px'];
    $pct  = $args['pct'];

    $value = ( $unit === 'px' ) ? $px . 'px' : $pct . '%';
    return 'max-width: ' . $value . ';';
}