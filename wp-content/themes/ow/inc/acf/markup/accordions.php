<?php
function ow_acf_mrkp_accns( $type, $args ) {
    $args  = $args[0];
    $show  = $args['show'];
    $items = $args['items'];
    if ( $show ) {
        if ( $items ) { 
            ?>
            <div class="ow-wrap-subsctn ow-wrap-accns ow-<?php echo $type ?> clearfix">
                <div class="ow-accns clearfix">
                    <ul>
                        <?php 
                        foreach ( $items as $item ): 
                            ow_acf_mrkp_accn( $item );
                        endforeach; 
                        ?>
                    </ul>
                </div>
            </div>
            <?php
        }
    }
}