<?php 
function ow_acf_mrkp_modal( $args ) {
    $args     = $args['item'][0];
    $status   = $args['status'];
    $props    = $args['props'];
    $title    = $args['title'];
    $body     = $args['body'];
    $cta      = $args['cta'];
    ?>
    <li <?php ow_acf_mrkp_props_id( $props ); ?> class="ow-wrap-modal ow-item clearfix <?php echo $status; ?> <?php ow_acf_mrkp_props_class( $props ); ?>" role="dialog">
        <div class="ow-modal" role="document">
            <div class="ow-wrap-ctnt clearfix">
                <div class="inner">
                    <a href="#0" class="ow-close">
                        <span class="inner">
                            <i class="fa fa-times"></i>
                        </span>
                    </a>
                    
                    <div class="ow-ctnt clearfix">
                        <?php 
                        if ( $title ) { 
                            ?>
                            <div class="ow-wrap-title">
                                <h3 class="ow-title"><?php echo $title; ?></h3>
                            </div>
                            <?php 
                        }
                        if ( $body ) { 
                            ?>
                            <div class="ow-wrap-body">
                                <div class="ow-body"><?php echo $body; ?></div>
                            </div>
                            <?php 
                        }
                        if ( $cta ) {
                            ow_acf_mrkp_cta( $cta ); 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </li><!-- .ow-wrap-modal -->
    <?php
}