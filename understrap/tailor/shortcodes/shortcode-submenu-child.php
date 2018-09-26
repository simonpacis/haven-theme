<?php

if ( ! function_exists( 'tailor_shortcode_submenu_child_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom child element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_submenu_child_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'pointer_id'		=>	'',
		    'pointer_name'		=>	'',
	    ), $atts, $tag );

	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-child {$atts['class']}" ) );
	    if ( ! empty( $atts['pointer_id'] ) ) {
		    $pointer_id =  '' . esc_attr( $atts['pointer_id'] ) . '';
	    }
	    if ( ! empty( $atts['pointer_name'] ) ) {
		    $pointer_name =  '' . esc_attr( $atts['pointer_name'] ) . '';
	    }
	    $outer_html = '<a href="#'.$pointer_id.'">'.$pointer_name.'</a>';

	    $inner_html = do_shortcode( $content );

	    /**
	     * Filter the HTML for the element.
	     *
	     * @param string $outer_html
	     * @param string $inner_html
	     * @param array $atts
	     */
	    //$html = apply_filters( 'tailor_shortcode_submenu_child_html', sprintf( $outer_html, $inner_html ), $outer_html, $inner_html, $atts );

	    return $outer_html;
    }

    add_shortcode( 'tailor_submenu_child', 'tailor_shortcode_submenu_child_element' );
}