<?php

if ( ! function_exists( 'tailor_shortcode_three_image_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_three_image_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'heading_1'			=>	'',
		    'heading_2'			=>	'',
		    'heading_3'			=>	'',
		    'bgimg_1'			=>	'',
		    'bgimg_2'			=>	'',
		    'bgimg_3'			=>	'',		    
		    'style'				=>	'',
	    ), $atts, $tag );
	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';
	    $heading_1 = $atts['heading_1'];
	    $heading_2 = $atts['heading_2'];
	    $heading_3 = $atts['heading_3'];
	    $bgimg_1 = $atts['bgimg_1'];
	    $bgimg_1 = wp_get_attachment_url( $atts['bgimg_1'] );
	    $bgimg_2 = $atts['bgimg_2'];
	    $bgimg_2 = wp_get_attachment_url( $atts['bgimg_2'] );
	    $bgimg_3 = $atts['bgimg_3'];
	    $bgimg_3 = wp_get_attachment_url( $atts['bgimg_3'] );
	    $outer_html = '
<div '.$id.' class="'.$class.' container h-min-100 fill-vh-fixed h-min-less-md-200">
  <div class="row h-min-100">
    <div class="col-md-12 h-min-100 p-5 text-center">
            <div class="row h-min-100 text-center">
            	<div class="col-md-3 mr-lg-5 offset-md-1 h-min-100">
            		<div class="h-75  bg" style="background-image: url('.$bgimg_1.') !important;"></div>
            		<p class="text-center mt-3">'.$heading_1.'</p>
            	</div>
            	<div class="col-md-3 h-min-100">
            		<div class="h-75  bg" style="background-image: url('.$bgimg_2.') !important;"></div>
            		<p class="text-center mt-3">'.$heading_2.'</p>
            	</div>
            	<div class="col-md-3 ml-lg-5 h-min-100">
            		<div class="h-75  bg" style="background-image: url('.$bgimg_3.') !important;"></div>
            		<p class="text-center mt-3">'.$heading_3.'</p>
            	</div>
            </div>
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

    add_shortcode( 'tailor_three_image', 'tailor_shortcode_three_image_element' );
}