<?php
/**
 * @package vonline
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php do_action('vonline_inside_top_post'); ?>

	<header class="entry-header">
		
		<div class="meta-post">
			<?php vonline_all_cats(); ?>
		</div>

		<?php the_title( '<h1 class="title-post entry-title" ' . vonline_get_schema( "headline" ) . '>', '</h1>' ); ?>

		<?php if ( get_theme_mod('hide_meta_single') != 1 && apply_filters( 'vonline_single_post_meta_enable', true ) ) : ?>
		<div class="single-meta">
			<?php vonline_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() && ( get_theme_mod( 'post_feat_image' ) != 1 ) ) : ?>
		<div class="entry-thumb">
			<?php the_post_thumbnail('large-thumb'); ?>
		</div>
	<?php endif; ?>

	<div class="entry-content" <?php vonline_do_schema( 'entry_content' ); ?>>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'vonline' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php vonline_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php do_action('vonline_inside_bottom_post'); ?>

</article><!-- #post-## -->
