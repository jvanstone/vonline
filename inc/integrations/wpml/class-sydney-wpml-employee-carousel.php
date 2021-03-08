<?php

/**
 * Integration with WPML for vonline: Testimonials block
 */
class vonline_Pro_WPML_Elementor_Employees extends WPML_Elementor_Module_With_Items {
	
 
	/**
	 * @return string
	 */
	public function get_items_field() {
	   return 'employee_list';
	}
   
	/**
	 * @return array
	 */
	public function get_fields() {
	   return array( 'person', 'position', 'link' => array( 'url' ), );
	}
   
	/**
	 * @param string $field
	 *
	 * @return string
	 */
	protected function get_title( $field ) {
	   switch( $field ) {
			case 'person':
				return esc_html__( '[vonline Employees] Name', 'vonline' );
   
		  	case 'position':
				return esc_html__( '[vonline Employees] Position', 'vonline' );
   
			case 'link':
				return esc_html__( '[vonline Employees] Link', 'vonline' );
   
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
			case 'person':
			case 'position':
			case 'link':	
				return 'LINE';
   
			default:
				return '';
	   }
	}

}