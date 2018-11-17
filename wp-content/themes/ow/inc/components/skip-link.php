<?php
/* Skip Link - Screen Reader Text */
if ( ! function_exists( 'ow_cpnt_skip_link' ) ) {
	function ow_cpnt_skip_link() {
		?>
		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e( 'Skip to content', 'ow' ); ?>		
		</a>
		<?php
	}
}