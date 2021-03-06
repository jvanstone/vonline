<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 * @package    Vanstone_Online
 * @subpackage vonline
 * @since      1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php vonline_do_schema( 'html' ); ?>>
<?php wp_body_open(); ?>

<?php do_action('vonline_before_site'); //Hooked: vonline_preloader() ?>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vonline' ); ?></a>

	<?php do_action('vonline_before_header'); //Hooked: vonline_header_clone() ?>

	<header id="masthead" class="site-header" role="banner" <?php vonline_do_schema( 'header' ); ?>>
		<div class="header-wrap">
            <div class="<?php echo esc_attr( vonline_menu_container() ); ?>">
                <div class="row">
					<div class="col-md-4 col-sm-8 col-xs-12">
					<?php if ( get_theme_mod('site_logo') ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="site-logo" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" <?php vonline_do_schema( 'logo' ); ?> /></a>
						<?php if ( is_home() && !is_front_page() ) : ?>
							<h1 class="site-title screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
						<?php endif; ?>
					<?php else : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>	        
					<?php endif; ?>
					</div>
					<div class="col-md-8 col-sm-4 col-xs-12">
						<div class="btn-menu"><i class="vonline-svg-icon"><?php vonline_get_svg_icon( 'icon-menu', true ); ?></i></div>
						<nav id="mainnav" class="mainnav" role="navigation" <?php vonline_do_schema( 'nav' ); ?>>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'vonline_menu_fallback' ) ); ?>
						</nav><!-- #site-navigation -->
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<?php do_action('vonline_after_header'); ?>

	<div class="vonline-hero-area">
		<?php vonline_slider_template(); ?>
		<div class="header-image">
			<?php vonline_header_overlay(); ?>
			<?php if ( ( get_theme_mod('front_header_type','nothing') == 'image' && is_front_page() ) || (get_theme_mod('site_header_type') == 'image' && !is_front_page() ) ) : ?>
				<?php $shop_thumb = get_the_post_thumbnail_url( get_option( 'woocommerce_shop_page_id' )); ?>
				<?php if ( class_exists( 'Woocommerce' ) && is_shop() && !$shop_thumb  ) : ?>
					<img class="header-inner" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php vonline_header_video(); ?>

		<?php do_action('vonline_inside_hero'); ?>
	</div>

	<?php do_action('vonline_after_hero'); ?>

	<div id="content" class="page-wrap">
		<div class="container content-wrapper">
			<div class="row">	