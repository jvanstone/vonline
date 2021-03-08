<?php

/**
 * Integration with WPML for vonline: Testimonials block
 */
class vonline_Pro_WPML_Elementor_Testimonials extends WPML_Elementor_Module_With_Items {
	
 
	/**
	 * @return string
	 */
	public function get_items_field() {
	   return 'testimonials_list';
	}
   
	/**
	 * @return array
	 */
	public function get_fields() {
	   return array( 'name', 'position', 'testimonial' );
	}
   
	/**
	 * @param string $field
	 *
	 * @return string
	 */
	protected function get_title( $field ) {
	   switch( $field ) {
			case 'name':
				return esc_html__( '[vonline Testimonials] Name', 'vonline' );
   
		  	case 'position':
				return esc_html__( '[vonline Testimonials] Position', 'vonline' );
   
			case 'testimonial':
				return esc_html__( '[vonline Testimonials] Testimonial', 'vonline' );
   
			default:
				return '';
	   }
	}
   
	/**
	 * @param string $field
	 *
	 * @return string
	 */
	protected function get_editor_type( $field ) {
	   switch( $field ) {
			case 'name':
			case 'position':
				return 'LINE';
   
			case 'testimonial':
				return 'VISUAL';
   
			default:
				return '';
	   }
	}

}