<?php

/**
 * Tailor custom content element class.
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Image_With_Text_Slide_Element' ) ) {

	class Tailor_Image_With_Text_Slide_Element extends Tailor_Element {
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
		    $this->add_setting( 'setting_1', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  'Body text here',
		    ) );
		    $this->add_control( 'setting_1', array(
			    'label'                 =>  __( 'Body text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority = 11,
		    ) );

		    $this->add_setting( 'setting_2', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  'Headline text here',
		    ) );
		    $this->add_control( 'setting_2', array(
			    'label'                 =>  __( 'Headline text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority = 10,
		    ) );

		    $this->add_setting( 'setting_3', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'setting_3', array(
			    'label'                 =>  __( 'Button 1 text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority = 12,
		    ) );

		    $this->add_setting( 'setting_4', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'setting_4', array(
			    'label'                 =>  __( 'Button 1 link', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority = 13,
		    ) );

		    $this->add_setting( 'setting_5', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'setting_5', array(
			    'label'                 =>  __( 'Button 2 text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority = 14,
		    ) );

		    $this->add_setting( 'setting_6', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    
		    $this->add_control( 'setting_6', array(
			    'label'                 =>  __( 'Button 2 link', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority = 15,
		    ) );




		    $this->add_setting( 'bgimg', array(
		    	'sanitize_callback'		=>	'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );

		    $this->add_control( 'bgimg', array(
			    'label'                 =>  __( 'Image', '' ),
			    'type'                  =>  'image',
			    'section'               =>  'general',
			    'priority'              =>  $priority = 16,
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
		    // This allows you to also add one of many standard control types..
		    $general_control_types = array( 'style' );

		    // This allows you to alter values for standard controls and settings..
		    $general_control_arguments = array(
			    'style'                 =>  array(
				    'control'               =>  array(
					    'choices'               =>  array(
						    ''                      =>  __( 'Text on right' ),
						    'right'               =>  __( 'Text on left' ),
					    ),
				    ),
			    ),
		    );
		    
		    // Note the starting priority is passed to the function
		    tailor_control_presets( $this, $general_control_types, $general_control_arguments, $priority );

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