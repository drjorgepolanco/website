<?php
function ow_acf_mrkp_modals( $args ) {
    $args  = $args[0];
    $show  = $args['show'];
    $items = $args['items'];
    if ( $show ) {
        if ( $items ) { 
            ?>
            <section class="ow-wrap-modals clearfix">
                <ul class="ow-modals">
                    <?php 
                    foreach ( $items as $item ): 
                        ow_acf_mrkp_modal( $item );
                    endforeach; 
                    ?>
                </ul>
            </section>
            <?php
        }
    }
}