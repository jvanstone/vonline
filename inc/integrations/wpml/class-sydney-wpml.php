<?php

/**
 * Integration with WPML for custom Elementor blocks
 */

class vonline_WPML {

    public function __construct() {
		add_filter( 'wpml_elementor_widgets_to_translate', array( $this, 'translatable_widgets' ) );
	}

	public function translatable_widgets( $widgets ) {

		$widgets[ 'vonline-testimonials' ] = [
			'conditions' => [ 'widgetType' => 'vonline-testimonials' ],
			'fields'     => [],
			'integration-class' => 'vonline_WPML_Elementor_Testimonials',
		];

		$widgets[ 'vonline-employee-carousel' ] = [
			'conditions' => [ 'widgetType' => 'vonline-employee-carousel' ],
			'fields'     => [],
			'integration-class' => 'vonline_WPML_Elementor_Employees',
		];
		
		$widgets[ 'vonline-portfolio' ] = [
			'conditions' => [ 'widgetType' => 'vonline-portfolio' ],
			'fields'     => [],
			'integration-class' => 'vonline_WPML_Elementor_Portfolio',
		];		

		$widgets[ 'vonline-posts' ] = [
			'conditions' => [ 'widgetType' => 'vonline-posts' ],
			'fields'     => [
				[
					'field'       => 'see_all_text',
					'type'        => __( '[vonline Posts] See all button text', 'vonline' ),
					'editor_type' => 'LINE'
				],			 		  
			],
		];
					
		$this->load_integration_classes();

		return $widgets;
	}
	
	private function load_integration_classes() {
		require get_template_directory() . '/inc/integrations/wpml/class-vonline-wpml-testimonials.php';
		require get_template_directory() . '/inc/integrations/wpml/class-vonline-wpml-employee-carousel.php';
		require get_template_directory() . '/inc/integrations/wpml/class-vonline-wpml-portfolio.php';
	}
}

$vonline_wpml = new vonline_WPML();