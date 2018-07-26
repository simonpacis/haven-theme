<?php

if ( ! function_exists( 'tailor_shortcode_submenu_container_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom container element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_submenu_container_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
	    ), $atts, $tag );

	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-container {$atts['class']}" ) );

	    $outer_html = '
	    <div '. $id .' class="'.$class.' row mb-5">
	    	<div class="col-md-8 offset-md-2">
	    		<div class="d-flex flex-row justify-content-around" id="mininav">
	    			%s
	    		</div>
	    	</div>
	    </div>';
	    //var_dump($content);
	    $inner_html = do_shortcode( $content );
	    //$inner_html = "";
	    /**
	     * Filter the HTML for the element.
	     *
	     * @param string $outer_html
	     * @param string $inner_html
	     * @param array $atts
	     */
	    $html = apply_filters( 'tailor_shortcode_submenu_container_html', sprintf( $outer_html, $inner_html ), $outer_html, $inner_html, $atts );

	    return $html;
    }

    add_shortcode( 'tailor_submenu_container', 'tailor_shortcode_submenu_container_element' );
}