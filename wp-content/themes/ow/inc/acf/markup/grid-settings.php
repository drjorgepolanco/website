<?php
function ow_grid_set_type( $set ) {
	$type = $set['type'];

	if ( $type !== 'static-height' ) {
		echo 'ow-masonry ow-' . $type;
	}
	else {
		echo 'ow-' . $type;
	}
}
function ow_grid_set_side_pad( $set ) {
	$type   = $set['type'];
	$item   = $set['item'];
	$gutter = $item['gutter'];

	if ( $type !== 'masonry-fixed' ):
		$side_pad = $gutter / 2;
		echo 'padding-left: ' . $side_pad .'px; padding-right: ' . $side_pad .'px;';
	endif;
}
function ow_grid_set_mw( $set ) {
	$type = $set['type'];
    $ctnr = $set['ctnr'];
    $mw   = $ctnr['mw'];   // select: 768px, 960px, 1280px, 1920px, 100%

    if ( $type !== 'masonry-fixed') {
        echo 'max-width: ' . $mw . ';';
    }
}
function ow_grid_set_items_width( $set ) {
    $type = $set['type'];

    if ( $type === 'masonry-fixed' ) {
        echo 'ow-fixed';
    }
    else {
    	echo 'ow-fluid';
    }
}
function ow_grid_set_items_max_per_row( $set ) {
	$type = $set['type'];
    $ctnr = $set['ctnr'];
    $mw   = $ctnr['mw'];   		// select: 768px, 960px, 1280px, 1920px, 100%
    $xs   = $ctnr['items_xs'];	// max-columns: 2, cms: 768px, css: 640px
    $sm   = $ctnr['items_sm'];	// max-columns: 3, cms: 960px, css: 840px
    $md   = $ctnr['items_md'];	// max-columns: 4, cms: 1280px, css: 1200px
    $lg   = $ctnr['items_lg'];	// max-columns: 5, cms: 1920px, css: 1680px
    $xl   = $ctnr['items_xl'];	// max-columns: 6, cms: 100%, css: 2240px

    if ( $type !== 'masonry-fixed') {
		$class = '';

		switch ( $mw ) {
		    case '768px':
		        $class = $xs;
		        break;
		    case '960px':
		        $class = $sm;
		        break;
		    case '1280px':
		    	$class = $md;
		    	break;
		    case '1920px':
		        $class = $lg;
		        break;
		    case '100%':
		        $class = $xl;
		        break;
		}
		echo 'ow-' . $class;    	
    }
}
