<?php 
function ow_acf_mrkp_tabs( $type, $args ) {
    $args      = $args[0];
    $menu_set  = $args['menu_set'];
    $items     = $args['items'];

    $menu_type = $menu_set['type'];
    $menu_pos  = $menu_set['pos'];
    ?>
    <div class="ow-wrap-subsctn ow-wrap-tabs ow-<?php echo $type; ?>">
        <div class="ow-subsctn clearfix">
            <div class="inner clearfix">
                <?php
                if ( $items ):
                    ?>
                    <div class="ow-tabs clearfix ow-put-menu-<?php echo $menu_pos; ?>">
                        <div class="inner">
                            <div class="ow-menu clearfix">
                                <ul class="clearfix">
                                    <?php foreach ( $items as $key => $item ) {
                                        $args = array( 'index' => $key, 'type' => $menu_type, 'item' => $item );
                                        ow_acf_mrkp_tabs_tab_trigger( $args ); 
                                    } ?>
                                </ul>
                            </div>
                            
                            <div class="ow-ctnt clearfix">
                                <ul class="clearfix">
                                    <?php foreach ( $items as $key => $item ) { 
                                        $args = array( 'index' => $key, 'type' => $type, 'item' => $item );
                                        ow_acf_mrkp_tabs_tab_ctnt( $args ); 
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>
    <?php
}
function ow_acf_mrkp_tabs_tab_trigger( $args ) {
    $index     = $args['index'];
    $menu_type = $args['type'];
    $item      = $args['item'];
    
    $menu_item = $item['menu_item'];
    $icon      = $menu_item['icon'];
    $title     = $menu_item['title'];
    ?>
    <li class="ow-tab ow-tab-menu-item ow-tab-<?php echo $index; ?>">
        <a href="#tab-<?php echo $index; ?>" class="ow-trigger ow-tab-trigger clearfix">
            <span class="inner">
                <?php if ( $menu_type !== 'text-only'): ?>
                    <span class="ow-wrap-icon">
                        <?php ow_get_cpt_img( $icon ); ?>
                    </span> 
                <?php endif; ?>

                <?php if ( $menu_type !== 'icon-only'): ?>
                    <span class="ow-wrap-text clearfix"><?php echo $title; ?></span>
                <?php endif; ?>                   
            </span>
        </a>
    </li><!-- .ow-tabs-menu-item -->
    <?php
}
function ow_acf_mrkp_tabs_tab_ctnt( $args ) {
    $index      = $args['index'];
    $type       = $args['type'];
    $item       = $args['item'];

    $ctnt       = $item['ctnt'];
    ?>
    <li id="tab-<?php echo $index; ?>" class="ow-tab ow-tab-ctnt clearfix ow-tab-<?php echo $index; ?>">
        <div class="inner">
            <?php ow_acf_mrkp_ctnt( $ctnt ); ?>
        </div>
    </li><!-- #tab-* -->
    <?php
}