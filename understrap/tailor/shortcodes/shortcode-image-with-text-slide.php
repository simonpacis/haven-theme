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
		    'setting_3'         =>  '',
		    'setting_4'			=>	'',
		    'setting_5'         =>  '',
		    'setting_6'			=>	'',
		    'bgimg'				=>	'',
		    'style'				=>	'',
	    ), $atts, $tag );
	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';

	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );

	    $inner_html = '';
	    $outer_html = '<div>';

	    if ( ! empty( $atts['setting_1'] ) ) {
		    $setting_1 .=  '' . esc_attr( $atts['setting_1'] ) . '';
	    }
	    if ( ! empty( $atts['setting_2'] ) ) {
		    $setting_2 =  '' . esc_attr( $atts['setting_2'] ) . '';
	    }
	    if ( ! empty( $atts['setting_3'] ) ) {
		    $setting_3 .=  '' . esc_attr( $atts['setting_3'] ) . '';
	    }
	    if ( ! empty( $atts['setting_4'] ) ) {
		    $setting_4 =  '' . esc_attr( $atts['setting_4'] ) . '';
		    if (strpos($setting_4, 'js:') !== false) {
		    	$substr_setting_4 = substr($setting_4, 3);
		    	/*$outer_html .= "<script>
		    		if((jQuery('#".$substr_setting_4." .modal-body .".$substr_setting_4."contact').length) == 0)
		    		{
		    			setTimeout(function()
		    				{
		    					jQuery('.".$substr_setting_4."contact').appendTo('#".$substr_setting_4." .modal-body');
		    				},
		    			500);
						jQuery('.".$substr_setting_4."contact').removeClass('d-none');
		    		}</script>";*/
		    	$setting_4 = 'javascript:void(0)" onclick="openModal(\''.substr($setting_4, 3).'\');"';

		    }

	    }
	    if ( ! empty( $atts['setting_5'] ) ) {
		    $setting_5 =  '' . esc_attr( $atts['setting_5'] ) . '';
		    if (strpos($setting_5, 'js:') !== false) {
		    	$substr_setting_5 = substr($setting_5, 3);

		    	$setting_5 = 'javascript:void(0)" onclick="openModal(\''.substr($setting_5, 3).'\');"';

		    }
	    }
	    if ( ! empty( $atts['setting_6'] ) ) {
		    $setting_6 =  '' . esc_attr( $atts['setting_6'] ) . '';
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
	    
	    // Do something with the element settings
	    $inner_html = '';


if($text == "right")
{
	$outer_html .= '<div '.$id.' class="'.$class.'"></div><div class="'.$atts['id'].' d-md-none d-lg-none d-xl-none fluid-container h-100 fill-50-vh-fixed '.$class.'">
	<div class="row h-100">
		<div class="col-md-8 h-lg-100 h-min-50  bg bg-center " style="background-image: url('.$bgimg.') !important;"></div>
		</div>
	</div>
	<div class="d-md-none d-lg-none d-xl-none fluid-container">
	<div class="row">
		<div class="col-md-4 h-lg-100 h-min-50 h-lg-100 p-5 text-left">
		<h2 id="'.$atts['id'].'headingmobile">'.$setting_2.'</h2>
		<p  style="font-weight:300;"  id="'.$atts['id'].'textmobile" class=" w-100 imgtext text-justify pt-3">'.$setting_1.'</p>
';
if($setting_3 != "")
{
	$outer_html .=
'<a href="'.$setting_4.'" class="wide-text text-muted">'.$setting_3.'</a>';
}
if($setting_5 != "")
{
	$outer_html .=
'<a href="'.$setting_5.'" class="wide-text text-muted">'.$setting_6.'</a>';
}
$outer_html .= '
	</div>
	</div>
	</div>
	
<div style="border-top: 1px solid #888888; border-bottom: 1px solid #888888;" class="'.$atts['id'].' d-none d-md-block fluid-container h-100 fill-vh-fixed '.$class.'">
	<div class="row h-100">
		<div class="col-md-8 h-lg-100 h-min-50  bg bg-center " style="background-image: url('.$bgimg.') !important;"></div>
		<div class="col-md-4 h-lg-100 h-min-50 h-lg-100 p-5 text-left">
		<h2 id="'.$atts['id'].'headingdesktop">'.$setting_2.'</h2>
		<p id="'.$atts['id'].'textdesktop" style="font-weight:300;" class="flexFont w-100 imgtext text-justify pt-3">'.$setting_1.'</p>
';
if($setting_3 != "")
{
	$outer_html .=
'<a href="'.$setting_4.'" class="wide-text text-muted">'.$setting_3.'</a>';
}
if($setting_5 != "")
{
	$outer_html .=
'<a href="'.$setting_5.'" class="wide-text text-muted">'.$setting_6.'</a>';
}
$outer_html .= '	</div>
	</div>
';

$outer_html .= '		</div>
	</div>
</div>';
} else {
	$outer_html .= '
<div '.$id.' class="'.$class.'"></div>
<div class="'.$atts['id'].' d-md-none d-lg-none d-xl-none fluid-container h-vh-50 fill-50-vh-fixed '.$class.'">
	<div class="row h-100">
		<div class="col-md-8 h-lg-100 h-min-50  bg bg-center " style="background-image: url('.$bgimg.') !important;"></div>
		</div>
	</div>
	<div class="d-md-none d-lg-none d-xl-none fluid-container">
	<div class="row">
		<div class="col-md-4 h-lg-100 h-min-50 h-lg-100 p-5 text-left">
		<h2 id="'.$atts['id'].'headingmobile">'.$setting_2.'</h2>
		<p  style="font-weight:300;" id="'.$atts['id'].'textmobile" class=" w-100 imgtext text-justify pt-3">'.$setting_1.'</p>
';
if($setting_3 != "")
{
	$outer_html .=
'<a href="'.$setting_4.'" class="wide-text text-muted">'.$setting_3.'</a>';
}
if($setting_5 != "")
{
	$outer_html .=
'<a href="'.$setting_5.'" class="wide-text text-muted">'.$setting_6.'</a>';
}
$outer_html .= '
	</div>
	</div>	</div>
<div class=" '.$atts['id'].' d-none d-md-block  fluid-container h-100 fill-vh-fixed '.$class.'">
<div class="row h-100">
<div class="col-md-4 h-lg-100 h-min-50 p-5 text-left">
<h2 id="'.$atts['id'].'headingdesktop">'.$setting_2.'</h2>
<p  style="font-weight:300;"  id="'.$atts['id'].'textdesktop" class="flexFont w-100 imgtext text-justify pt-3">'.$setting_1.'</p>
';
if($setting_3 != "")
{
	$outer_html .=
'<a href="'.$setting_4.'" class="wide-text text-muted">'.$setting_3.'</a>';
}
if($setting_5 != "")
{
	$outer_html .=
'<a href="'.$setting_5.'" class="wide-text text-muted">'.$setting_6.'</a>';
}
$outer_html .= '
</div>
<div class="col-md-8 h-lg-100 h-min-50 bg bg-center" style="background-image: url('.$bgimg.') !important;"></div>
</div>
</div>';
}

$outer_html .= "
<script>
	jQuery('#".$atts['id']."textmobile').fitText(1.9);
	jQuery('#".$atts['id']."textdesktop').fitText(1.9);
	jQuery('#".$atts['id']."headingmobile').fitText(1);
	jQuery('#".$atts['id']."headingdesktop').fitText(1);

		    		if((jQuery('#".$substr_setting_4." .modal-body .".$substr_setting_4."contact').length) == 0)
		    		{
		    			setTimeout(function()
		    				{
		    					jQuery('.".$substr_setting_4."contact').appendTo('#".$substr_setting_4." .modal-body');
		    				},
		    			500);
						jQuery('.".$substr_setting_4."contact').removeClass('d-none');
		    		}

		    		if((jQuery('#".$substr_setting_5." .modal-body .".$substr_setting_5."contact').length) == 0)
		    		{
		    			setTimeout(function()
		    				{
		    					jQuery('.".$substr_setting_5."contact').appendTo('#".$substr_setting_5." .modal-body');
		    				},
		    			500);
						jQuery('.".$substr_setting_5."contact').removeClass('d-none');
		    		}
</script></div>
";
	

	    /**
	     * Filter the HTML for the element.
	     *
	     * @param string $outer_html
	     * @param string $inner_html
	     * @param array $atts
	     */
	    //$html = apply_filters( 'tailor_shortcode_custom_content_html', sprintf( $outer_html, $inner_html ), $outer_html, $inner_html, $atts );
	    return $outer_html;
    }

    add_shortcode( 'tailor_image_with_text_slide', 'tailor_shortcode_image_with_text_slide_element' );
}