<?php function ow_acf_mrkp_ans( $args ) {
	$args     = $args[0];
	$show     = $args['show'];
	$infinite = $args['infinite'];
	$name     = $args['name'];
	$speed    = $args['speed'];
	$delay    = $args['delay'];

	if ( $show ) {
		echo 'animated ' . $name . ' ' . ow_acf_mrkp_ans_prop( $speed ) . ' ' . ow_acf_mrkp_ans_prop( $delay ) . ' ' . ow_acf_mrkp_ans_infinite( $infinite ) . '';
	}
}
function ow_acf_mrkp_ans_prop( $prop ) {
	if ( $prop !== 'default' ) {
		return $prop;
	}
}
function ow_acf_mrkp_ans_infinite( $infinite ) {
	if ( $infinite ) {
		return 'infinite';
	}
}