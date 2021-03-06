<?php
/**
 * The sidebar containing the main widget area.
 * @package    Vanstone_Online
 * @subpackage vonline
 * @since      1.0.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-md-3" role="complementary" <?php vonline_do_schema( 'sidebar' ); ?>>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
