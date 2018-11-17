<?php function ow_acf_mrkp_social( $args ) {
	$args  = $args[0];
	$show  = $args['show'];
	$icons = $args['icons'];
	if ( $show ) {
		?>
		<div class="ow-social-media">
			<ul>
				<?php foreach ( $icons as $icon ): ?>
					<li>
						<a href="<?php echo $icon['url']; ?>" target="_blank"><i class="fa fa-<?php echo $icon['name']; ?>"></i></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
}