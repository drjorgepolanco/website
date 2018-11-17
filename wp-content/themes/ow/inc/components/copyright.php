<?php if ( ! function_exists( 'ow_cpnt_copyright' ) ) {
	function ow_cpnt_copyright( $copy ) {
	    if ( $copy ): 
	        ?>
	        <div class="ow-wrap-copyright">
	            <div class="inner">
	                <div class="ow-copyright">
	                	<p><?php echo $copy; ?></p>
	                </div>
	            </div>
	        </div>
	        <?php 
	    endif;
	}
}