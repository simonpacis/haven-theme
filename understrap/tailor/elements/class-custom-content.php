<?php

/**
 * Tailor custom content element class.
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Custom_Content_Element' ) ) {

    /**
     * Tailor custom content element class.
     */
    class Tailor_Custom_Content_Element extends Tailor_Element {

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

		    $this->add_section( 'colors', array(
			    'title'                 =>  __( 'Colors' ),
			    'priority'              =>  30,
		    ) );

		    $this->add_section( 'attributes', array(
			    'title'                 =>  __( 'Attributes' ),
			    'priority'              =>  40,
		    ) );

		    $priority = 0;

		    // Add as many custom settings as you like..
		    $this->add_setting( 'setting_1', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  'Headline text here',
		    ) );
		    $this->add_control( 'setting_1', array(
			    'label'                 =>  __( 'Headline text', '' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );
		    $this->add_control( 'my_colorpicker', array(
			    'label'                 =>  __( 'My colorpicker' ),
			    'type'                  =>  'colorpicker',
			    'palettes'              =>  array(
				    '#556270',
				    '#4ecdc4',
				    '#c7f464',
				    '#ff6b6b',
				    '#c44d58',
				    '#ecca2e',
				    '#bada55',
			    ),
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
		    // This allows you to also add one of many standard control types..
		    $general_control_types = array( 'style' );

		    // This allows you to alter values for standard controls and settings..
		    $general_control_arguments = array(
			    'style'                 =>  array(
				    'control'               =>  array(
					    'choices'               =>  array(
						    ''                      =>  __( 'Left-aligned text' ),
						    'style-1'               =>  __( 'Centered text' ),
					    ),
				    ),
			    ),
		    );
		    
		    // Note the starting priority is passed to the function
		    tailor_control_presets( $this, $general_control_types, $general_control_arguments, $priority );

		    // Standard color settings..
		    $priority = 0;
		    $color_control_types = array(
			    'color',
			    'link_color',
			    'heading_color',
			    'background_color',
			    'border_color',
		    );
		    $color_control_arguments = array();
		    tailor_control_presets( $this, $color_control_types, $color_control_arguments, $priority );

		    // Standard attribute settings..
		    $priority = 0;
		    $attribute_control_types = array(
		    	'id',
			    'class',
			    'padding',
			    'margin',
			    'border_style',
			    'border_width',
			    'border_radius',
			    'shadow',
			    'background_image',
			    'background_repeat',
			    'background_position',
			    'background_size',
		    );
		    $attribute_control_arguments = array();
		    tailor_control_presets( $this, $attribute_control_types, $attribute_control_arguments, $priority );
	    }

	    /**
	     * Returns custom CSS rules for the element.
	     *
	     * @param $atts
	     * @return array
	     */
	    public function generate_css( $atts ) {
		    $css_rules = array();
		    $excluded_control_types = array();

		    // Generate CSS rules for standard settings
		    $css_rules = tailor_css_presets( $css_rules, $atts, $excluded_control_types );

		    // Create your own
		    if ( 'style-1' == $atts['style'] ) {
			    $textalign = 'left';
		    }
		    else if ( 'style-2' == $atts['style'] ) {
			    $textalign = 'center';
		    }
		    
		    if ( ! empty( $textalign ) ) {
			    $css_rules[] = array(
				    'selectors'         =>  array( '' ),
				    'declarations'      =>  array(
					    'text-align'  =>  $textalign,
				    ),
			    );
		    }
		    
		    return $css_rules;
	    }
    }
}