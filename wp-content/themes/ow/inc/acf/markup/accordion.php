<?php 
function ow_acf_mrkp_accn( $args ){
    $args     = $args['item'][0];
    $active   = $args['active'];
    $trigger  = $args['trigger'];
    $ctnt     = $args['ctnt'];

    $icon     = $args['icon'];
    $color    = $icon['color'];
    $pos      = $icon['pos'];
    $iactive  = $icon['active'];
    $ipassive = $icon['passive']; 
    
    $args_a   = array( 'icon' => $iactive,  'class' => 'active',  'color' => $color );
    $args_p   = array( 'icon' => $ipassive, 'class' => 'passive', 'color' => $color );
    ?>
    <li class="ow-item ow-accn <?php if ( $active ) { echo 'active'; } ?> clearfix ow-pos ow-<?php echo $pos; ?>">
        <div class="ow-header clearfix">
            <a href="#0" class="ow-trigger ow-accn-trigger clearfix">
                <span class="inner">
                    <span class="ow-wrap-text clearfix"><?php echo $trigger; ?></span>
                    <span class="ow-wrap-icon">
                        <span class="inner">
                            <?php  
                            ow_accn_icon( $args_a );
                            ow_accn_icon( $args_p );
                            ?>
                        </span>
                    </span>                    
                </span>
            </a>
        </div>
        <div class="ow-ctnt clearfix" <?php if ( $active ) { echo 'style="display: block;"'; } ?>>
            <?php ow_acf_mrkp_ctnt( $ctnt ); ?>
        </div>
    </li><!-- .ow-accn -->
    <?php
}
function ow_accn_icon( $args ) {
    $icon  = $args['icon'];
    $class = $args['class'];
    $color = $args['color'];
    echo '<i class="fa fa-' . $icon . ' ow-icon ow-' . $class . '" style="color:' . $color . ';"></i>';
}