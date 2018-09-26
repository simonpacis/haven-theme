<?php

if ( ! function_exists( 'tailor_shortcode_youtube_embed_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_youtube_embed_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'youtube_id'         =>  '',
		    'width'				=>	'',
		    'height'			=>	'',
		    'style'				=>	'',
	    ), $atts, $tag );
	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';
	    $youtube_id = $atts['youtube_id'];

	    $height = $atts['height'];
	    $width = $atts['width'];
	    
	    /*$outer_html = '
<div '.$id.' class="'.$class.' container" style="display: flex; flex-direction: column;">
	<div class="row w-md-50 offset-md-3" style="flex: 1;">
		<iframe width="100vw" height="'.$height.'" src="https://www.youtube.com/embed/'.$youtube_id.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	</div>
</div>';*/

$outer_html = '
<div '.$id.' class="'.$class.' col-md-8 offset-md-2 youtube-embed" style="position:relative;min-height:500px;">
	<iframe src="https://www.youtube.com/embed/'.$youtube_id.'" frameborder="0" allowfullscreen
    style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
</div>
';

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

    add_shortcode( 'tailor_youtube_embed', 'tailor_shortcode_youtube_embed_element' );
}