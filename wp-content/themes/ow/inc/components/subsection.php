<?php 
/* 
    This Component doesn't exist in the CMS because Image is only shown
    when Section Type === Static
    Content Double: fields inside ctnt.col_one and ctnt.col_two
    Content Single: fields inside ctnt
*/
function ow_cpnt_subsctn( $type, $args ) {
    $ctnt = $args['ctnt'];
    $cta  = $args['cta'];
    ?>
    <div class="ow-wrap-subsctn ow-<?php echo $type; ?>">
        <div class="ow-subsctn clearfix">
            <div class="inner clearfix">
                <?php
                if ( $type === 'dyc' ) {
                    $pos = $args['pos_dyc'][0]['prop_pos_ctnt_dyc'];
                    ow_cpnt_subsctn_ctnt( $ctnt, $cta, $pos );
                } 
                else {
                    $pos = $args['pos_stc'][0]['prop_pos_ctnt_stc'];
                    $img = $args['img'];
                    ow_acf_mrkp_img( $img );
                    ow_cpnt_subsctn_ctnt( $ctnt, $cta, $pos );
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
function ow_cpnt_subsctn_ctnt( $ctnt, $cta, $pos ) {
    ?>
    <div class="ow-wrap-mrkp-ctnt clearfix">
        <div class="inner">
            <div class="ow-wrap-mrkp-ctnt-set clearfix <?php ow_acf_mrkp_pos( $pos ); ?>">
                <div class="inner">
                    <div class="ow-mrkp-ctnt-bg"></div>
                    <div class="ow-mrkp-ctnt-body">
                        <?php
                        ow_acf_mrkp_ctnt( $ctnt );
                        ow_acf_mrkp_cta( $cta );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}