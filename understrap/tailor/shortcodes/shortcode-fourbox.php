<?php

if ( ! function_exists( 'tailor_shortcode_fourbox_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_fourbox_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'logo_1'			=>	'',
		    'heading_1'			=>	'',
		    'body_1'			=>	'',
		    'url_1'				=>	'',
		    'logo_2'			=>	'',
		    'heading_2'			=>	'',
		    'body_2'			=>	'',
		    'url_2'				=>	'',
		    'style'				=>	'',
	    ), $atts, $tag );
	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';
	    $logo_1 = wp_get_attachment_url( $atts['logo_1'] );
	    $heading_1 = $atts['heading_1'];
	    $body_1 = $atts['body_1'];
	    $url_1 = $atts['url_1'];
	    $logo_2 = wp_get_attachment_url( $atts['logo_2'] );
	    $heading_2 = $atts['heading_2'];
	    $body_2 = $atts['body_2'];
	    $url_2 = $atts['url_2'];

	    $outer_html = '
<div '.$id.' class="'.$class.' row col-12 offset-0 col-md-8 offset-md-2 partnerbox">
  <a href="'.$url_1.'" target="_blank" style="background-color: rgb(200,200,200);" class="fourboxa offset-1 col-11 col-md-5 offset-md-0 pt-5 pb-5 pb-md-3 text-center">
    <img style=" width:auto; max-height:100px;" src="'.$logo_1.'">
    <h3 style="color: #fff !important; margin-top:30px;">'.$heading_1.'</h3>
    <!--<p style="color: #fff !important;">'.$body_1.'</p>-->
  </a>';
  if($heading_2 != "")
  {
  $outer_html .= '
  <a href="'.$url_2.'" target="_blank" style="background-color: rgb(200,200,200);" class="fourboxa mt-4 mt-md-0 offset-1 col-11 col-md-5 offset-md-2 pb-5 pb-md-3 pt-5 text-center">
    <img style="width:auto; max-height:100px;" src="'.$logo_2.'">
    <h3 style="color: #fff !important; margin-top:30px;">'.$heading_2.'</h3>
    <!--<p style="color: #fff !important;">'.$body_2.'</p>-->
  </a>
';
}

$outer_html .= "</div>";

	    /**
	     * Filter the HTML for the element.
	     *
	     * @param string $outer_html
	     * @param string $inner_html
	     * @param array $atts
	     */
	    $html = apply_filters( 'tailor_shortcode_custom_content_html', $outer_html, $outer_html, $inner_html, $atts );
	    return $html;
    }

    add_shortcode( 'tailor_fourbox', 'tailor_shortcode_fourbox_element' );
}