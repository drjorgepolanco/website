<?php 
function ow_acf_mrkp_clts( $type, $args ) {
    $args  = $args[0];
    $max   = $args['max'];
    $items = $args['items'];
    if ( $items ): ?>
        <div class="ow-wrap-subsctn ow-wrap-clts ow-pos clearfix">
            <?php foreach ( $items as $item ): 
                $item = $item['item'];
                ?>
                <div class="ow-wrap-clt ow-clt-<?php echo $max; ?>">
                    <div class="inner">
                        <div class="ow-clt clearfix">
                            <div class="inner">
                                <?php ow_acf_mrkp_ctnt( $item, $pos ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  
            endforeach; ?>
        </div>
        <?php
    endif;
}