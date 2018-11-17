<?php 
function ow_cpnt_sctn_header( $name, $args ) {
    $type  = $args['type'];
    $sctn  = $args['sctn'];
    $props = $sctn['props'];
    ?>
    <section <?php ow_acf_mrkp_props_id( $props ); ?> class="ow-sctn-<?php echo $name; ?> ow-sctn clearfix <?php ow_cpnt_sctn_header_height( $type, $sctn ); ?> <?php ow_acf_mrkp_props_class( $props ); ?>">
        <div class="inner">
            <div class="ow-wrap-sctn clearfix" <?php ow_cpnt_sctn_header_mw( $name, $sctn ); ?>>
                <div class="inner">
    <?php
}
function ow_cpnt_sctn_header_height( $type, $sctn ) {
    if ( $type === 'dyc' ) { 
        echo 'ow-dyc'; 
    } 
    else { 
        echo 'ow-stc ow-height-' . $sctn['height'][0]['prop_sctn_height']; 
    }
}
function ow_cpnt_sctn_header_mw( $name, $sctn ) {
    if ( $name !== 'gallery' ) {
        echo 'style="' . ow_acf_prop_mw( $sctn['mw'] ) . '"';
    }
}