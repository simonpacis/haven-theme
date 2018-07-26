<?php

/**
 * Tailor custom content element class.
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Submenu_Element' ) ) {

	class Tailor_Submenu_Element extends Tailor_Element {
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
		    $this->add_setting( 'link_1_1', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_1_1', array(
			    'label'                 =>  __( 'How to use:<br>For each element that you want to be able to scroll to, you have to click on that element, click <em>Edit</em> and then go to the <em>Attributes</em> tab. In the field <em>ID name</em> you enter the id you want to give that element. Then enter the same id here on this page, for the corresponding link. Please note that this only works for elements labeled <em>Haven</em>.<br>&nbsp;<br>Link 1 text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );
		    $this->add_setting( 'link_1_2', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_1_2', array(
			    'label'                 =>  __( 'ID to scroll to on click', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );

		    $this->add_setting( 'link_2_1', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_2_1', array(
			    'label'                 =>  __( 'Link 2 text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );
		    $this->add_setting( 'link_2_2', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_2_2', array(
			    'label'                 =>  __( 'ID to scroll to on click', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );

		    $this->add_setting( 'link_3_1', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_3_1', array(
			    'label'                 =>  __( 'Link 3 text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );
		    $this->add_setting( 'link_3_2', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_3_2', array(
			    'label'                 =>  __( 'ID to scroll to on click', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );

		    $this->add_setting( 'link_4_1', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_4_1', array(
			    'label'                 =>  __( 'Link 4 text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );
		    $this->add_setting( 'link_4_2', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_4_2', array(
			    'label'                 =>  __( 'ID to scroll to on click', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );

		    $this->add_setting( 'link_5_1', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_5_1', array(
			    'label'                 =>  __( 'Link 5 text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );
		    $this->add_setting( 'link_5_2', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_5_2', array(
			    'label'                 =>  __( 'ID to scroll to on click', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );

		    $this->add_setting( 'link_6_1', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_6_1', array(
			    'label'                 =>  __( 'Link 6 text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );
		    $this->add_setting( 'link_6_2', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_6_2', array(
			    'label'                 =>  __( 'ID to scroll to on click', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );

		    $this->add_setting( 'link_7_1', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_7_1', array(
			    'label'                 =>  __( 'Link 7 text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );
		    $this->add_setting( 'link_7_2', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_7_2', array(
			    'label'                 =>  __( 'ID to scroll to on click', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );

		    $this->add_setting( 'link_8_1', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_8_1', array(
			    'label'                 =>  __( 'Link 8 text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );
		    $this->add_setting( 'link_8_2', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  '',
		    ) );
		    $this->add_control( 'link_8_2', array(
			    'label'                 =>  __( 'ID to scroll to on click', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
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
		    /*// This allows you to also add one of many standard control types..
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
		    );
		    
		    // Note the starting priority is passed to the function
		    tailor_control_presets( $this, $general_control_types, $general_control_arguments, $priority );
*/
		    // Standard attribute settings..
		    $priority = 0;
		    $attribute_control_types = array(
			    'id',
			    'class',
		    );
		    $attribute_control_arguments = array();
		    tailor_control_presets( $this, $attribute_control_types, $attribute_control_arguments, $priority );
	    }

	}

}