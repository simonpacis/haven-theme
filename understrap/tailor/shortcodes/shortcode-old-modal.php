<?php

if ( ! function_exists( 'tailor_shortcode_modal_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_modal_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'heading'			=>	'',
		    'body'			=>	'',
		    'style'				=>	'',
	    ), $atts, $tag );
	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';
	    $heading = $atts['heading'];
	    $body = htmlspecialchars_decode(esc_attr($atts['body']));
	    $outer_html = '
<div class="modal" tabindex="-1" role="dialog" '.$id.'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title col-md-6 offset-md-3">'.$heading.'</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-md-6 offset-md-3">
        '.$body.'
      </div>
      </div>
    </div>
  </div>
</div>
<div id="showinedditor"  class="'.$class.'">Click to edit modal';

if(!empty($atts['id']))
{
	$outer_html .= " with id " . $atts['id'];
}

$outer_html .= '</div>
';

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

    add_shortcode( 'tailor_modal', 'tailor_shortcode_modal_element' );
}