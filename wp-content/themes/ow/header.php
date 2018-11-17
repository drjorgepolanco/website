<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OffWhite
 */
$id = get_the_ID();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php 
		// to be used if Yoast SEO is not installed.
		// ow_lyts_header_meta( $id ); 
		?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<?php 
			ow_cpnt_skip_link();
			ow_lyts_header(); 
			?>
			<div id="content" class="site-content">