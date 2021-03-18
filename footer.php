<?php
/**
 * The template for displaying the footer.Contains the closing of the #content div and all content after
 *
 * @package    Vanstone_Online
 * @subpackage vonline
 * @since      1.0.0
 */

?>
			</div>
		</div>
	</div><!-- #content -->

	<?php do_action( 'vonline_before_footer' ); ?>

	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<?php get_sidebar( 'footer' ); ?>
	<?php endif; ?>

	<a class="go-top"><i class="vonline-svg-icon"><?php vonline_get_svg_icon( 'icon-chevron-up', true ); ?></i></a>
	<footer id="colophon" class="site-footer" role="contentinfo" <?php vonline_do_schema( 'footer' ); ?>>
		<div class="site-info container">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'vonline' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'vonline' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %2$s by %1$s.', 'vonline' ), 'vonline', '<a href="https://vanstoneonline.com/theme/vonline" rel="nofollow">vonline</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<?php do_action( 'vonline_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
