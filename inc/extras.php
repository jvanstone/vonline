<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 * @package    Vanstone_Online
 * @subpackage vonline
 * @since      1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function vonline_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	$menu_style = get_theme_mod( 'menu_style', 'inline' );
	$classes[] = 'menu-' . esc_attr( $menu_style );
	
	return $classes;
}
add_filter( 'body_class', 'vonline_body_classes' );

/**
 * Support for Yoast SEO breadcrumbs
 */
function vonline_yoast_seo_breadcrumbs() {
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('
		<p class="vonline-breadcrumbs">','</p>
		');
	}
}

/**
 * Additional classes for main content area on pages
 */
if ( !function_exists( 'vonline_page_content_classes') ) {
	function vonline_page_content_classes() {

		if ( apply_filters( 'vonline_disable_cart_checkout_sidebar', true ) && class_exists( 'WooCommerce' ) && ( is_checkout() || is_cart() ) ) {
			return 'col-md-12'; //full width Woocommerce checkout and cart pages
		}

		return 'col-md-9'; //default

	}
}

/**
 * Sidebar output function
 * 
 * hooked into vonline_get_sidebar
 */
function vonline_get_sidebar() {

	if ( apply_filters( 'vonline_disable_cart_checkout_sidebar', true ) && class_exists( 'WooCommerce' ) && ( is_checkout() || is_cart() ) ) {
		return; //we don't want a sidebar on the checkout and cart page
	}

	get_sidebar();

}
add_action( 'vonline_get_sidebar', 'vonline_get_sidebar' );

/**
 * Custom header button
 */
function vonline_add_header_menu_button( $items, $args ) {

	$type = get_theme_mod( 'header_button_html', 'nothing' );

    if ( $args -> theme_location == 'primary' ) {
		if ( 'button' == $type ) {
			$link 	= get_theme_mod( 'header_custom_item_btn_link', 'https://example.org/' );
			$text 	= get_theme_mod( 'header_custom_item_btn_text', __( 'Get in touch', 'vonline' ) );
			$target = get_theme_mod( 'header_custom_item_btn_target', 1 );
			if ( $target ) {
				$target = '_blank';
			} else {
				$target = '_self';
			}

			$items .= '<li class="header-custom-item"><a class="header-button roll-button" target="' . $target . '" href="' . esc_url( $link ) . '" title="' . esc_attr( $text ) . '">' . esc_html( $text ) . '</a></li>';
		} elseif ( 'html' == $type ) {
			$content = get_theme_mod( 'header_custom_item_html' );

			$items .= '<li class="header-custom-item">' . wp_kses_post( $content ) . '</li>';
		}
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'vonline_add_header_menu_button', 11, 2 );

/**
 * Menu container
 */
if ( !function_exists( 'vonline_menu_container' ) ) {
	function vonline_menu_container() {
		$type = get_theme_mod( 'menu_container', 'container' );

		return $type;
	}
}

/**
 * Get image alts
 */
function vonline_image_alt( $image ) {
	
	$id 	= attachment_url_to_postid( $image );
	$alt 	= get_post_meta( $id, '_wp_attachment_image_alt', true) ;

	if ( $alt ) {
		return $alt;
	}
}