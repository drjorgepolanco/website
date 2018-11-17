<?php if ( ! function_exists( 'ow_cpnt_nav_int' ) ) {
	function ow_cpnt_nav_int( $tax, $items ) {
	    if ( $args ):
	        ?>
	        <section class="ow-sctn-nav ow-sctn clearfix ow-dynamic ow-wrap-nav-int">
	        	<div class="ow-nav-int clearfix">
	        		<ul>
	        			<?php 
                        foreach ( $items as $item ) {
                            $img  = get_field( 'tax_img', $item );
                            ?>
                            <li class="ow-navigation-item">
                                <a href="#<?php echo $item->slug; ?>">
                                    <?php ow_get_cpt_img( $img, 'ow-img' ); ?>
                                    <h3 class="ow-pretitle"><?php echo $item->name; ?></h3>
                                </a>
                            </li>
                            <?php
                        }
	        			?>
	        		</ul>
	        	</div>
	        </section>
	        <?php
	    endif;
	}
}