<?php
/**
 * Schema related features
 * @package    Vanstone_Online
 * @subpackage vonline
 * @since      1.0.0
 */

if ( ! function_exists( 'vonline_get_schema' ) ) {

	function vonline_get_schema( $location ) {

		$enable = get_theme_mod( 'vonline_enable_schema', 0 );

		if ( !$enable ) {
			return;
		}

		switch ( $location ) {
			case 'html':
				if ( is_home() || is_front_page() ) {
					$schema = 'itemscope="itemscope" itemtype="https://schema.org/WebPage"';
				} elseif ( is_category() || is_tag() ) {
					$schema = 'itemscope="itemscope" itemtype="https://schema.org/Blog"';
				} elseif ( is_singular( 'post') ) {
					$schema = 'itemscope="itemscope" itemtype="https://schema.org/Article"';
				} elseif ( is_page() ) {
					$schema = 'itemscope="itemscope" itemtype="https://schema.org/WebPage"';
				} else {
					$schema = 'itemscope="itemscope" itemtype="https://schema.org/WebPage"';
				}
				break;

			case 'header';
				$schema = 'itemscope="itemscope" itemtype="https://schema.org/WPHeader"';
				break;

			case 'logo';
				$schema = 'itemscope itemtype="https://schema.org/Brand"';
				break;

			case 'nav';
				$schema = 'itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement"';
				break;	
				
			case 'sidebar';
				$schema = 'itemscope="itemscope" itemtype="https://schema.org/WPSideBar"';
				break;	
				
			case 'footer';
				$schema = 'itemscope="itemscope" itemtype="https://schema.org/WPFooter"';
				break;
				
			case 'headline';
				$schema = 'itemprop="headline"';
				break;

			case 'entry_content';
				$schema = 'itemprop="text"';
				break;		
				
			case 'published_date';
				$schema = 'itemprop="datePublished"';
				break;
				
			case 'modified_date';
				$schema = 'itemprop="dateModified"';
				break;		
				
			case 'author_name';
				$schema = 'itemprop="name"';
				break;			
				
			case 'image';
				$schema = 'itemprop="image"';
				break;				

			default:
				$schema = '';
				break;
		}

		return $schema;

	}

}

if ( ! function_exists( 'vonline_do_schema' ) ) {
	function vonline_do_schema( $location ) {
		echo vonline_get_schema( $location );
	}
}