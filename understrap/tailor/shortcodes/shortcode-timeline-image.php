<?php

if ( ! function_exists( 'tailor_shortcode_timeline_image_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_timeline_image_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'heading'			=>	'',
		    'body'				=>	'',
		    'bgimg'				=>	'',
		    'style'				=>	'',
	    ), $atts, $tag );
	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';
	    $heading = $atts['heading'];
	    $bgimg = wp_get_attachment_url( $atts['bgimg'] );
	    $body = $atts['body'];
	    
	    $outer_html = '
<div '.$id.' class="'.$class.' row pb-5 pt-5">
  <div class="col-10 offset-1 col-md-3 offset-md-2">
    <h2>'.$heading.'</h2>
    <p style="font-weight: 300;">'.$body.'</p>
  </div>
  <div class="col-10 offset-1 col-md-5 text-center">
	<img src="'.$bgimg.'">
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

    add_shortcode( 'tailor_timeline_image', 'tailor_shortcode_timeline_image_element' );
}