<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OffWhite
 */
global $post;
$slug  = $post->post_name;
$class = 'ow-article ow-single ow-' . $slug;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
	<div class="inner">
		<div class="ow-content-wrap">

			<div class="entry-content">
				<?php the_content(); ?>
				<?php new Section( 'section' ); ?>
				<?php ow_cpnt_page_pagination(); ?>				
			</div><!-- .entry-content -->

			<?php //ow_page_footer(); ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->