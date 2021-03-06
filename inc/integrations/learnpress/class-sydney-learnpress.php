<?php
/**
 * Class to handle LearnPress integration
 * @package    Vanstone_Online
 * @subpackage vonline
 * @since      1.0.0
 */


if ( !class_exists( 'vonline_LearnPress' ) ) :

	/**
	 * vonline_LearnPress 
	 */
	Class vonline_LearnPress {

		/**
		 * Instance
		 */		
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			//Styles
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

			//Setup
			add_action( 'wp', array( $this, 'setup' ) );		

			//Remove advertisment
			remove_action( 'admin_footer', 'learn_press_footer_advertisement', -10 );

			//Options
			add_action( 'customize_register', array( $this, 'customizer' ) );
		}

		/**
		 * Setup
		 */
		public function setup() {

			if ( ( is_post_type_archive( 'lp_course' ) || 'lp_course' == get_post_type() ) && 'no-sidebar' == $this->check_sidebar() ) {
				remove_action( 'vonline_get_sidebar', 'vonline_get_sidebar' );
				add_filter( 'vonline_content_area_class', function() { return 'fullwidth'; } );
			} elseif ( ( is_post_type_archive( 'lp_course' ) || 'lp_course' == get_post_type() ) && 'sidebar-left' == $this->check_sidebar() ) {
				add_filter( 'vonline_content_area_class', function() { return 'col-md-9 sidebar-left'; } );
			}			
		}		

		/**
		 * Learnpress Customizer options
		 */
		public function customizer( $wp_customize ) {
			require get_template_directory() . '/inc/integrations/learnpress/customize.php';
		}

		/**
		 * Check the sidebar for the current page
		 */
		public function check_sidebar() {
			$sidebar = '';

			if ( is_post_type_archive( 'lp_course' ) ) {
				$sidebar = get_theme_mod( 'vonline_learnpress_course_loop_sidebar', 'sidebar-right' );
			} elseif ( 'lp_course' == get_post_type() ) {
				$sidebar = get_theme_mod( 'vonline_learnpress_single_course_sidebar', 'sidebar-right' );
			}

			return $sidebar;			
		}

		/**
		 * Enqueue custom Learnpress styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'vonline-learnpress-css', get_template_directory_uri() . '/inc/integrations/learnpress/learnpress.css' );
		}		

	}

	/**
	 * Initialize class
	 */
	vonline_LearnPress::get_instance();

endif;