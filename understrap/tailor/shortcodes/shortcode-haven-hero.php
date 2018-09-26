<?php

if ( ! function_exists( 'tailor_shortcode_haven_hero_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_haven_hero_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'setting_1'         =>  '',
		    'setting_2'			=>	'',
		    'setting_3'			=>	'',
		    'setting_4'			=>	'',
		    'setting_5'			=>	'',
		    'setting_6'			=>	'',
		    'bgimg'				=>	'',
		    'style'				=>	'',
	    ), $atts, $tag );
	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';

	    if ( ! empty( $atts['setting_1'] ) ) {
		    $setting_1 =  '' . esc_attr( $atts['setting_1'] ) . '';
	    }
	    if ( ! empty( $atts['setting_2'] ) ) {
		    $setting_2 =  '' . esc_attr( $atts['setting_2'] ) . '';
		    if (strpos($setting_2, 'js:') !== false) {
		    	$setting_2 = 'javascript:void(0)" onclick="openModal(\''.substr($setting_2, 3).'\');"';
		    }
	    }
	    if ( ! empty( $atts['setting_3'] ) ) {
		    $setting_3 =  '' . esc_attr( $atts['setting_3'] ) . '';
		    if (strpos($setting_3, 'js:') !== false) {
		    	$setting_3 = 'javascript:void(0)" onclick="openModal(\''.substr($setting_3, 3).'\');"';
		    }
	    }
	    if ( ! empty( $atts['setting_4'] ) ) {
		    $setting_4 =  '' . esc_attr( $atts['setting_4'] ) . '';
	    }
	    if ( ! empty( $atts['setting_5'] ) ) {
		    $setting_5 =  '' . esc_attr( $atts['setting_5'] ) . '';
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
	    $outer_html = '
<div '.$id.' class="jumbotron flex flex-center bg text-white '.$class.'" style="background-image: url('.$bgimg.') !important;">
  <div class="container text-left">
  	<div class="row">
  		<div class="col-md-8">
		    <p class="lead mb-3">'.$setting_1.'</p>  	
		    <a href="'.$setting_2.'" class="btn btn-outline-light no-rounded">'.$setting_4.'</a>';

		    if(empty($atts['setting_6']))
		    	{
		    		$outer_html .= '<a href="'.$setting_3.'" class="no-rounded ml-2 btn btn-outline-light">'.$setting_5.'</a>';
		    	}

      $outer_html .= '	    
  		</div>
  	</div>
  </div>
</div>
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

    add_shortcode( 'tailor_haven_hero', 'tailor_shortcode_haven_hero_element' );
}