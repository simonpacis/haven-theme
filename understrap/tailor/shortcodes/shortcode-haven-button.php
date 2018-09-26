<?php

if ( ! function_exists( 'tailor_shortcode_haven_button_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_haven_button_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'wrapper_class'		=>	'',
		    'button_text'			=>	'',
		    'external'			=>	'',
		    'put_in_wrapper'	=>	'',
		    'button_link'			=>	'',
		    'style'				=>	'',
	    ), $atts, $tag );
	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';
	    if(!empty($atts['button_text']))
	    {
	    	$button_text = $atts['button_text'];
	    } else {
	    	$button_text = "No text added";
	    }
	    $button_link = $atts['button_link'];
		    if (strpos($button_link, 'js:') !== false) {
		    	$button_link = 'javascript:void(0)" onclick="openModal(\''.substr($button_link, 3).'\');"';
		    }

	    $button_text = $atts['button_text'];
	    $wrapper_class = $atts['wrapper_class'];
	    $outer_html = "";
	    if(!empty($atts['put_in_wrapper']))
	    {
	    	$outer_html .= '<div class="row"><div class="'.$wrapper_class.'">';
		}
$outer_html .= '
<a '.$id.' class="'.$class.' btn btn-outline-dark no-rounded" href="'.$button_link.'"';
		    if(!empty($atts['external']))
		    	{
		    		$outer_html .= 'target="_blank"';
		    	}
$outer_html .= '>'.$button_text.'</a>';
	    if(!empty($atts['put_in_wrapper']))
	    {
	    	$outer_html .= '</div></div>';
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

    add_shortcode( 'tailor_haven_button', 'tailor_shortcode_haven_button_element' );
}