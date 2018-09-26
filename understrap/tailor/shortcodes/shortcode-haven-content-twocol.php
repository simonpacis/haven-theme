<?php

if ( ! function_exists( 'tailor_shortcode_haven_content_twocol_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_haven_content_twocol_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'heading_1'			=>	'',
		    'button_1_text'			=>	'',
		    'button_1_url'			=>	'',
		    'heading_2'			=>	'',
		    'button_2_text'			=>	'',
		    'button_2_url'			=>	'',
		    'html_content'			=>	'',
		    'html_content_coltwo'			=>	'',
		    'style'				=>	'',
	    ), $atts, $tag );
	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';
	    $html_content = htmlspecialchars_decode(esc_attr($atts['html_content']));
	    $html_content_coltwo = htmlspecialchars_decode(esc_attr($atts['html_content_coltwo']));
	    $heading_1 = $atts['heading_1'];
	    $heading_2 = $atts['heading_2'];
	    $button_1_text = $atts['button_1_text'];
	    $button_1_url = $atts['button_1_url'];
	    if (strpos($button_1_url, 'js:') !== false) {
	    	$button_1_url = 'javascript:void(0)" onclick="openModal(\''.substr($button_1_url, 3).'\');"';
	    }
	    $button_2_text = $atts['button_2_text'];
	    $button_2_url = $atts['button_2_url'];
	    if (strpos($button_2_url, 'js:') !== false) {
	    	$button_2_url = 'javascript:void(0)" onclick="openModal(\''.substr($button_2_url, 3).'\');"';
	    }	    
	    $outer_html = '
<div '.$id.' class="'.$class.' row">
  <div style="border: 1px solid #AAAAAA" class="col-10 offset-1 col-md-5 offset-md-1 pb-2 pr-5 pl-5 pt-5 text-left">
    <div class="mb-5">'.$html_content.'</div>';
if($button_1_text !== "")
{
	$outer_html .=
'<p style="position:absolute; bottom:10px;"><a href="'.$button_1_url.'" class="wide-text text-muted">'.$button_1_text.'</a></p>';
}
$outer_html .= '
  </div>
  <div style="border: 1px solid #AAAAAA; border-left: none;"  class="left-border-small col-10 offset-1 col-md-5 offset-md-0 mt-3 mt-md-0 col-md-5 pb-2 pr-5 pl-5 pt-5 text-left">
     <div style="margin-bottom:90px;">'.$html_content_coltwo.'</div>';
if($button_1_text !== "")
{
	$outer_html .=
'<p style="position:absolute; bottom:10px;"><a href="'.$button_2_url.'" class="wide-text text-muted">'.$button_2_text.'</a></p>';
}
$outer_html .= '</div>  
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

    add_shortcode( 'tailor_haven_content_twocol', 'tailor_shortcode_haven_content_twocol_element' );
}