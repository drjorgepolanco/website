<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OffWhite
 */
global $post;
$slug  = $post->post_name;
$class = 'ow-page ow-default-template ow-' . $slug;
get_header(); ?>
<div id="primary" class="content-area <?php echo $class; ?>">
    <main id="main" class="site-main">
        <div class="inner">
            <div class="ow-wrap-page">
                <?php while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', 'page' );
                endwhile; ?>
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();
