<?php

if ( ! function_exists( 'tailor_shortcode_heading_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_heading_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'heading'			=>	'',
		    'style'				=>	'',
	    ), $atts, $tag );
	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';
	    $heading = $atts['heading'];
	    
	    $outer_html = '
<div '.$id.' class="'.$class.' row">
  <div class="col-md-12 p-5 text-center">
    <h1>'.$heading.'</h1>
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

    add_shortcode( 'tailor_heading', 'tailor_shortcode_heading_element' );
}