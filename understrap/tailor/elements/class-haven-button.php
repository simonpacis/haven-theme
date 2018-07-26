<?php

/**
 * Tailor custom content element class.
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Haven_Button_Element' ) ) {

	class Tailor_Haven_Button_Element extends Tailor_Element {
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
		    $this->add_setting( 'button_text', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'button_text', array(
			    'label'                 =>  __( 'Button text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority = 10,
		    ) );

		    $this->add_setting( 'button_link', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'button_link', array(
			    'label'                 =>  __( 'Button text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority = 20,
		    ) );

		    $this->add_setting( 'external', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'external', array(
			 'type' => 'checkbox',
			 'section'               =>  'general',
			 'choices' => array(
			   '1' => __( 'Open externally' ),
			 ),
			 'priority'              =>  $priority = 30,
			) );


		    $this->add_setting( 'put_in_wrapper', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '1',
		    ) );

		    $this->add_control( 'put_in_wrapper', array(
			 'type' => 'checkbox',
			 'section'               =>  'attributes',
			 'choices' => array(
			   '1' => __( 'Put button in row & column wrapper' ),
			 ),
			 'priority'              =>  $priority = 15,
			) );
		    $this->add_setting( 'wrapper_class', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  'col-md-6 offset-md-3 text-center p-5',
		    ) );
		    $this->add_control( 'wrapper_class', array(
			    'label'                 =>  __( 'Wrapper class', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'attributes',
			    'priority'              =>  $priority = 20,
		    ) );
		    $this->add_setting( 'id', array(
		    	'sanitize_callback'		=>	'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );

		    $this->add_control( 'id', array(
			    'label'                 =>  __( 'ID name', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'attributes',
			    'priority'              =>  $priority = 5,
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
			    'id',
			    'wrapper_class'
		    );
		    $attribute_control_arguments = array();
		    tailor_control_presets( $this, $attribute_control_types, $attribute_control_arguments, $priority );
	    }

	}

}