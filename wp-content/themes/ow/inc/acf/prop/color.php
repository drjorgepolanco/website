<?php 
/* Helpers: Prop: Color */
function ow_acf_prop_color( $color ) {
	if ( $color ) {
		return 'color: #' . $color . ';';
	}
}
function ow_acf_prop_color_brdr( $color ) {
	if ( $color ) {
		return 'border-color: #' . $color . ';';
	}
}
function ow_acf_prop_color_bg( $bg ) {
	if ( $bg ) {
		return 'background-color: #' . $bg . ';';
	}
}