<?php

if ( ! function_exists( 'tailor_shortcode_custom_content_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_custom_content_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'setting_1'         =>  '',
	    ), $atts, $tag );

	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';

	    if ( ! empty( $atts['setting_1'] ) ) {
		    $inner_html .=  '' . esc_attr( $atts['setting_1'] ) . '';
	    }

	    $outer_html = '<div class="fluid-container">
<div class="row greyborder">
  <div ' . trim( "{$id} class=\"col-md-8 offset-md-2 p-5 {$class}\"" ) . '>
    <h1 class="text-center"><div ' . trim( "{$id} class=\"{$class}\"" ) . '>%s</h1>
  </div>
</div>
</div>';

	    /**
	     * Filter the HTML for the element.
	     *
	     * @param string $outer_html
	     * @param string $inner_html
	     * @param array $atts
	     */
	    $html = apply_filters( 'tailor_shortcode_custom_content_html', sprintf( $outer_html, $inner_html ), $outer_html, $inner_html, $atts );
	    return $html;
    }

    add_shortcode( 'tailor_custom_content', 'tailor_shortcode_custom_content_element' );
}