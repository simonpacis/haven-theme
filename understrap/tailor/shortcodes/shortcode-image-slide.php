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
		    'setting_3'         =>  '',
		    'setting_4'			=>	'',
		    'setting_5'         =>  '',
		    'setting_6'			=>	'',
		    'bgimg'				=>	'',
		    'style'				=>	'',
	    ), $atts, $tag );
	    $id = $atts['id'];
	    //$id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';

	    if ( ! empty( $atts['setting_1'] ) ) {
		    $inner_html .=  '' . esc_attr( $atts['setting_1'] ) . '';
	    }
	    if ( ! empty( $atts['setting_2'] ) ) {
		    $setting_2 =  '' . esc_attr( $atts['setting_2'] ) . '';
	    }
	    if ( ! empty( $atts['setting_3'] ) ) {
		    $setting_3 =  '' . esc_attr( $atts['setting_3'] ) . '';
	    }
	    if ( ! empty( $atts['setting_4'] ) ) {
		    $setting_4 =  '' . esc_attr( $atts['setting_4'] ) . '';
		    if (strpos($setting_4, 'js:') !== false) {
		    	$setting_4 = 'javascript:void(0)" onclick="openModal(\''.substr($setting_4, 3).'\');"';
		    }
	    }
	    if ( ! empty( $atts['setting_5'] ) ) {
		    $setting_5 =  '' . esc_attr( $atts['setting_5'] ) . '';
	    }
	    if ( ! empty( $atts['setting_6'] ) ) {
		    $setting_6 =  '' . esc_attr( $atts['setting_6'] ) . '';
		    if (strpos($setting_6, 'js:') !== false) {
		    	$setting_6 = 'javascript:void(0)" onclick="openModal(\''.substr($setting_6, 3).'\');"';
		    }
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

	    $outer_html .= '
<div class="fluid-container '.$class.' h-100 fill-vh bg" style="border-bottom: 1px solid rgba(170,170,170,0.5); z-index:1; background-image: url('.$bgimg.') !important;">
  <div class="row h-100 d-none d-lg-block">
    <div class="col-md-12 h-100">
      <div class="container h-100">
        <div class="row h-100">
          <div'; 
		  if($corner == "box-right-bottom")
		  {
		  	$outer_html .= ' style="margin-bottom: -16px;"';
		  }
          $outer_html .= '  style="z-index:300;" class="col-md-5 position-absolute box ' . $corner . ' text-center pt-5 pl-5 pr-5">
            <h2  id="' . $id . 'header">'.$setting_2.'</h2>
            <p style="font-weight: 300;" id="' . $id . 'text" class="pt-3 pb-5">'.$inner_html;
            if($setting_3 != "")
            {
            	$outer_html .= '<br>&nbsp;<br><small><strong><a class="wide-text text-muted" href="'.$setting_4.'" >'.$setting_3.'</a></strong></small>';
            }
            if($setting_5 != "")
            {
            	$outer_html .= '&nbsp; &nbsp; <small><strong><a class="wide-text text-muted" href="'.$setting_6.'" >'.$setting_5.'</a></strong></small>';
            }
            if($setting_3 != "" || $setting_5 != "")
            {
            	$outer_html .= "</p>";
            }
            if($corner == "box-right-bottom" || $corner == "box-left-bottom")
            {
            	$outer_html .= "<hr>";
            }
          $outer_html .= '</div>
        </div>
      </div>
    </div>
  </div>
</div>
';
if($corner == "box-right-bottom" || $corner == "box-left-bottom")
{
$outer_html .= '<div class="test fluid-container">
	<div class="row d-lg-none">
		<div class="col-10 offset-1 p-5">
			<h2 id="' . $id . 'header">'.$setting_2.'</h2>
			<p style="font-weight: 300;" id="'.$id.'text" class="pt-3">'.$inner_html.'</p>
		</div>
	</div>
</div>
';
}

if($corner == "box-right-top" || $corner == "box-left-top")
{
$outer_html .= '<div class="fluid-container">
	<div class="row  d-lg-none p-5">
		<div class="col-10 offset-1">
			<h2>'.$setting_2.'</h2>
			<p style="font-weight: 300;" class="pt-3">'.$inner_html.'</p>
		</div>
	</div>
</div>
';
}

$outer_html .= '<script>jQuery("#'.$id.'text").fitText(2.5);jQuery("#'.$id.'header").fitText(1.5);</script>';

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