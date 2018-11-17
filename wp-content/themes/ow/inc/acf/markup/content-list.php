<?php
function ow_acf_mrkp_ctnt_list( $args ) {
    $args  = $args[0];
    $show  = $args['show'];
    $items = $args['items'];

    if ( $show ) { 
        if ( $items ) {
            ?>
            <div class="ow-wrap-mrkp-ctnt-list">
                <div class="ow-mrkp-ctnt-list row">
                    <?php 
                    foreach ( $items as $item ) {
                        ow_mrkp_ctnt_list_item( $item );
                    }
                    ?>
                </div>
            </div>
            <?php 
        }
    }
}
function ow_mrkp_ctnt_list_item( $item ) {
    $title = $item['title'];
    $body  = $item['body'];
    if ( $body ) {
        ?>
        <div class="ow-wrap-mrkp-ctnt-list-item">
            <div class="ow-mrkp-ctnt-list-item">
                <div class="ow-title">
                    <?php echo $title; ?>
                </div>
                <div class="ow-body">
                    <?php echo $body; ?>
                </div>
            </div>
        </div>
        <?php
    }
}