<?php

if ( ! function_exists( 'tailor_shortcode_image_slide_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_image_slide_element( $atts, $content = null, $tag ) {

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
		    $inner_html .=  '' . esc_attr( $atts['setting_1'] ) . '';
	    }
	    if ( ! empty( $atts['setting_2'] ) ) {
		    $setting_2 =  '' . esc_attr( $atts['setting_2'] ) . '';
	    }
	    if ( ! empty( $atts['style'] ) ) {
	    	if($atts['style'] == "bottom-left")
	    	{
	    		$corner = "box-left-bottom";
	    	} elseif($atts['style'] == "top-left")
	    	{
	    		$corner = "box-left-top";
	    	} elseif($atts['style'] == "top-right") {
				$corner = "box-right-top";
	    	}
	    } else {
	    	$corner = "box-right-bottom";
	    }
		$bgimg = wp_get_attachment_url( $atts['bgimg'] );
$outer_html = "";
if($corner == "box-right-top" || $corner == "box-left-top")
{
$outer_html .= '<div class="fluid-container">
	<div class="row  d-lg-none">
		<div class="col-10 offset-1 p-5">
			<h2>'.$setting_2.'</h2>
			<h4 class="pt-3">'.$inner_html.'</h4>
		</div>
	</div>
</div>
';
}
	    $outer_html .= '
<div '.$id.' class="fluid-container '.$class.' h-100 fill-vh bg" style="background-image: url('.$bgimg.') !important;">
  <div class="row h-100 d-none d-lg-block">
    <div class="col-md-12 h-100">
      <div class="container h-100">
        <div class="row h-100">
          <div  id=\"' . trim( "{$id}" ) . '" class="col-md-5 position-absolute box ' . $corner . ' text-center pt-3 pl-5 pr-5">
            <h2>'.$setting_2.'</h2>
            <h4 class="pt-3">%s</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
';
if($corner == "box-right-bottom" || $corner == "box-left-bottom")
{
$outer_html .= '<div class="fluid-container">
	<div class="row d-lg-none">
		<div class="col-10 offset-1 p-5">
			<h2>'.$setting_2.'</h2>
			<h4 class="pt-3">'.$inner_html.'</h4>
		</div>
	</div>
</div>
';
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

    add_shortcode( 'tailor_image_slide', 'tailor_shortcode_image_slide_element' );
}