<?php
function ow_lyts_header_meta( $id ) {
	$thumb_src = ( has_post_thumbnail( $id ) ) ? wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'medium' ) : '';
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport"           content="width=device-width, initial-scale=1">
    <meta property="og:site_name"   content="<?php bloginfo('name'); ?>" />
    <meta property="og:image"       content="<?php echo esc_attr( $thumb_src[0] ); ?>">
    <meta property="og:description" content="<?php bloginfo('description');; ?>">
    <meta property="og:url"         content="<?php the_permalink(); ?>">
	<link rel="profile"             href="http://gmpg.org/xfn/11">
	<?php
}