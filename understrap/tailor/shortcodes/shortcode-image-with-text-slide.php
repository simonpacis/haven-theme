<?php

if ( ! function_exists( 'tailor_shortcode_image_with_text_slide_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_image_with_text_slide_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'setting_1'         =>  '',
		    'setting_2'			=>	'',
		    'bgimg'				=>	'',
		    'style'				=>	'',
	    ), $atts, $tag );
	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';

	    if ( ! empty( $atts['setting_1'] ) ) {
		    $setting_1 .=  '' . esc_attr( $atts['setting_1'] ) . '';
	    }
	    if ( ! empty( $atts['setting_2'] ) ) {
		    $setting_2 =  '' . esc_attr( $atts['setting_2'] ) . '';
	    }
	    if ( ! empty( $atts['style'] ) ) {
	    	if($atts['style'] == "left")
	    	{
	    		$text = "left";
	    	}
	    } else {
	    	$text = "right";
	    }
		$bgimg = wp_get_attachment_url( $atts['bgimg'] );

if($text == "right")
{
	$outer_html = '<div '.$id.' class="fluid-container h-100 fill-vh-fixed '.$class.'">
	<div class="row h-100">
		<div class="col-md-8 h-lg-100 h-min-50  bg " style="background-image: url('.$bgimg.') !important;"></div>
		<div class="col-md-4 h-lg-100 h-min-50 h-lg-100 p-5 text-center">
		<h2>'.$setting_2.'</h2>
		<h4 class="pt-3">'.$setting_1.'</h4>
		</div>
	</div>
</div>';
} else {
	$outer_html = '<div '.$id.' class="fluid-container h-100 fill-vh-fixed '.$class.'">
<div class="row h-100">
<div class="col-md-4 h-lg-100 h-min-50 p-5 text-center">
<h2>'.$setting_2.'</h2>
<h4 class="pt-3">'.$setting_1.'</h4>
</div>
<div class="col-md-8 h-lg-100 h-min-50 bg" style="background-image: url('.$bgimg.') !important;"></div>
</div>
</div>';
}
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

    add_shortcode( 'tailor_image_with_text_slide', 'tailor_shortcode_image_with_text_slide_element' );
}