<?php

/**
 * Tailor custom content element class.
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Html_Element' ) ) {

	class Tailor_Html_Element extends Tailor_Element {
	    /**
	     * Registers element settings, sections and controls.
	     *
	     * @access protected
	     */
	    protected function register_controls() {
		    
		    $this->add_section( 'general', array(
			    'title'                 =>  __( 'General' ),
			    'priority'              =>  10,
		    ) );


		    $this->add_section( 'attributes', array(
			    'title'                 =>  __( 'Attributes' ),
			    'priority'              =>  40,
		    ) );

		    $priority = 0;

		    // Add as many custom settings as you like..
		    $this->add_setting( 'html', array(
			    'sanitize_callback'     =>  '',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'html', array(
			    'label'                 =>  __( 'HTML', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority = 10,
		    ) );
		    
		   /* // This allows you to also add one of many standard control types..
		    $general_control_types = array( 'style' );

		    // This allows you to alter values for standard controls and settings..
		    $general_control_arguments = array(
			    'style'                 =>  array(
				    'control'               =>  array(
					    'choices'               =>  array(
						    ''                      =>  __( 'Bottom right' ),
						    'bottom-left'               =>  __( 'Bottom left' ),
						    'top-left'               =>  __( 'Top left' ),
						    'top-right'               =>  __( 'Top right' ),
					    ),
				    ),
			    ),
		    );*/
		    
		    // Note the starting priority is passed to the function
		    //tailor_control_presets( $this, $general_control_types, $general_control_arguments, $priority );

		    // Standard attribute settings..
		    $priority = 0;
		    $attribute_control_types = array(
			    'class',
			    'id'
		    );
		    $attribute_control_arguments = array();
		    tailor_control_presets( $this, $attribute_control_types, $attribute_control_arguments, $priority );
	    }

	}

}