<?php 
function ow_acf_mrkp_props_id( $args ) {
	$args = $args[0];
	$id   = $args['props_id'];
	if ( $id ) {
		echo 'id="' . $id . '"';
	}
}
function ow_acf_mrkp_props_class( $args ) {
	$args  = $args[0];
	$class = $args['props_class'];
	if ( $class ) {
		echo $class;
	}
}