<?php function ow_acf_mrkp_cta( $args ) {
    $args  = $args[0];
    $show  = $args['show'];
    $count = $args['count'];
    $pos   = $args['pos'];
    $btn_1 = $args['btn_1'];
    $btn_2 = $args['btn_2'];

    if ( $show ):
        ?>
        <div class="ow-wrap-ctas clearfix">
            <div class="ow-ctas inner clearfix">
                <div class="ow-wrap-cta ow-pos ow-<?php echo $pos; ?>">
                    <?php  
                    ow_acf_mrkp_cta_item( $btn_1 );

                    if ( $count == 2 ) {
                        ow_acf_mrkp_cta_item( $btn_2 );
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    endif;
}
function ow_acf_mrkp_cta_item( $args ) {
    $link  = $args['link'];
    $props = $args['props'];
    $data  = $args['data'];
    ?>
    <a <?php ow_acf_mrkp_props_id( $props ); ?> class="ow-cta <?php ow_acf_mrkp_props_class( $props ); ?>" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" <?php ow_acf_mrkp_cta_data_attr( $data ); ?>>
        <span class="ow-text"><?php echo $link['title']; ?></span>
    </a>
    <?php
}
function ow_acf_mrkp_cta_data_attr( $args ) {
    $show = $args['show'];
    $attr = $args['attr'];
    $val  = $args['val'];
    if ( $show ) {
        echo 'data-' . $attr . '="' . $val . '" ';
    }
}