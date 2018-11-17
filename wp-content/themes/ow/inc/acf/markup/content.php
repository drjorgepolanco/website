<?php function ow_acf_mrkp_ctnt( $args ) {
	$args   = $args[0];
	$show   = $args['show'];
	$editor = $args['editor'];
	if ( $show ) {
		?>
		<div class="ow-wrap-mrkp-ctnt">
			<?php echo $editor; ?>
		</div>
		<?php
	}
}