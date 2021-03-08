<?php
/**
 * The template for displaying all single posts.
 *
 * @package vonline
 */

get_header(); ?>

	<?php if (get_theme_mod('fullwidth_single')) { //Check if the post needs to be full width
		$width = 'fullwidth';
	} else {
		$width = 'col-md-9';
	} ?>

	<?php do_action('vonline_before_content'); ?>

	<div id="primary" class="content-area <?php echo esc_attr( apply_filters( 'vonline_content_area_class', $width ) ); ?>">

		<?php vonline_yoast_seo_breadcrumbs(); ?>

		<main id="main" class="post-wrap" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php vonline_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php do_action('vonline_after_content'); ?>

<?php if ( get_theme_mod('fullwidth_single', 0) != 1 ) {
	do_action( 'vonline_get_sidebar' );
} ?>
<?php get_footer(); ?>
