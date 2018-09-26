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
		    'mail_1'			=>	'',
		    'mail_2'			=>	'',
		    'mail_3'			=>	'',
		    'subheading_1'			=>	'',
		    'subheading_2'			=>	'',
		    'subheading_3'			=>	'',
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
	    $subheading_1 = $atts['subheading_1'];
	    $subheading_2 = $atts['subheading_2'];
	    $subheading_3 = $atts['subheading_3'];
	    $mail_1 = $atts['mail_1'];
	    $mail_2 = $atts['mail_2'];
	    $mail_3 = $atts['mail_3'];
	    $bgimg_1 = $atts['bgimg_1'];
	    $bgimg_1 = wp_get_attachment_url( $atts['bgimg_1'] );
	    $bgimg_2 = $atts['bgimg_2'];
	    $bgimg_2 = wp_get_attachment_url( $atts['bgimg_2'] );
	    $bgimg_3 = $atts['bgimg_3'];
	    $bgimg_3 = wp_get_attachment_url( $atts['bgimg_3'] );
	    $outer_html = '
<div '.$id.' class="'.$class.' container h-min-less-md-200 pb-5">
  <div class="row ">
    <div class="col-md-12 pt-2 pl-5 pr-5 text-center">
            <div class="row text-center">
            	<div class="col-md-3 mr-lg-5 offset-md-1">
            		<img src="'.$bgimg_1.'">
            		<p class="text-center mt-3">'.$heading_1.'<br><small><span class="text-muted">'.$subheading_1.'</span></small><br><small><span class="text-muted"><a href="mailto:'.$mail_1.'">'.$mail_1.'</a></span></small></p>
            	</div>
            	<div class="col-md-3 ">
            		<img src="'.$bgimg_2.'">
            		<p class="text-center mt-3">'.$heading_2.'<br><small><span class="text-muted">'.$subheading_2.'</span></small><br><small><span class="text-muted"><a href="mailto:'.$mail_2.'">'.$mail_2.'</a></span></small></p>
            	</div>
            	<div class="col-md-3 ml-lg-5 ">
            		<img src="'.$bgimg_3.'">
            		<p class="text-center mt-3">'.$heading_3.'<br><small><span class="text-muted">'.$subheading_3.'</span></small><br><small><span class="text-muted"><a href="mailto:'.$mail_3.'">'.$mail_3.'</a></span></small></p>
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