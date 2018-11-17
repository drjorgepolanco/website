<?php function ow_acf_mrkp_slider( $type, $args ) {
	$args      = $args[0];

    $title     = $args['title'];

    $set       = $args['set'];
    $stype     = $set['type'];
    $name      = $set['name'];

    $nav       = $set['nav'];
    $nav_show  = $nav['show'];
    $nav_bg    = $nav['bg'];
    $nav_color = $nav['color'];
	$imgs      = $args['imgs'];

    $items     = $args['items'];
    ?>
    <div class="ow-wrap-subsctn ow-wrap-slider ow-<?php echo $type ?> clearfix">
        <div id="<?php echo $name; ?>" class="ow-slider clearfix" data-name="<?php echo $name; ?>">
            <div class="inner">
                <?php 
                if ( $nav_show ):
                    ?>
                    <a href="#0" class="ow-control ow-prev" style="<?php if ( $nav_bg ) { echo 'background: rgba(42, 42, 42, 0.1);'; } ?>">
                        <span class="ow-wrap-icon">
                            <i class="fa fa-angle-left" style="color: <?php echo $nav_color; ?>;"></i>
                        </span>
                    </a>
                    <a href="#0" class="ow-control ow-next" style="<?php if ( $nav_bg ) { echo 'background: rgba(42, 42, 42, 0.1);'; } ?>">
                        <span class="ow-wrap-icon">
                            <i class="fa fa-angle-right" style="color: <?php echo $nav_color; ?>;"></i>
                        </span>
                    </a>
                    <?php
                endif;
                ?>

                <?php if ( $title ) { echo '<div class="ow-title"><h2>' . $title . '</h2></div>'; } ?>

                <ul id="ow-slides">
                    <?php 
                    if ( $stype === 'image' ):
                        if ( $imgs ):
                            foreach ( $imgs as $img ): 
                                ?>
                                <li class="ow-slide" 
                                    style="background-image: url(<?php echo $img['url']; ?>);"> 
                                </li>
                                <?php 
                            endforeach;
                        endif;
                    endif; 

                    if ( $stype === 'content' ):
                        if ( $items ):
                            foreach ( $items as $item ): 
                                $item    = $item['item'];
                                ?>
                                <li class="ow-slide">
                                    <?php ow_cpnt_subsctn( 'static', $item ); ?>
                                </li>
                                <?php 
                            endforeach;
                        endif;
                    endif; 
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php
}