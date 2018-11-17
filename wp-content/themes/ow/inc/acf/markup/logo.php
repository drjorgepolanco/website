<?php function ow_acf_mrkp_logo( $args ) {
	$args = $args[0];
	$show = $args['show'];
	$img  = $args['img'];
	
	if ( $show ) {
        ?>
        <div class="ow-wrap-logo">
            <div class="inner">
    	        <a class="ow-link" href="<?php bloginfo('url'); ?>/">
    	            <?php ow_get_cpt_img( $img, 'ow-logo' ); ?>    
    	        </a>
            </div>
        </div>
        <?php
    }
}