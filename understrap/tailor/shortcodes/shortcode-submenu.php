<?php

if ( ! function_exists( 'tailor_shortcode_submenu_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_submenu_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'link_1_1'			=>	'',
		    'link_1_2'			=>	'',
		    'link_2_1'			=>	'',
		    'link_2_2'			=>	'',
		    'link_3_1'			=>	'',
		    'link_3_2'			=>	'',
		    'link_4_1'			=>	'',
		    'link_4_2'			=>	'',
		    'link_5_1'			=>	'',
		    'link_5_2'			=>	'',
		    'link_6_1'			=>	'',
		    'link_6_2'			=>	'',
		    'link_7_1'			=>	'',
		    'link_7_2'			=>	'',
		    'link_8_1'			=>	'',
		    'link_8_2'			=>	'',
	    ), $atts, $tag );
	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '';
	    $submenu_content = "";
	    $subcount = 0;
	    for ($i=1; $i < 9; $i++) { 
	    		if(!empty($atts['link_'.$i.'_1']))
	    		{
	    			$submenu_content .= '<a class="pt-3 pt-lg-0 pt-xl-0 d-lg-inline d-xl-inline d-block d-sm-block d-md-block" href="#'.str_replace("#", "", $atts['link_'.$i.'_2']).'"><h4 class="d-none d-block d-lg-none d-xl-none">'.$atts['link_'.$i.'_1'].'</h4><span class="d-none d-lg-inline d-xl-inline">'.$atts['link_'.$i.'_1'].'</span></a>';
	    			$subcount++;
	    		}
	    }
	    if($subcount == 0)
	    {
	    	$submenu_content = "No submenu links added yet.";
	    }

	    $outer_html = '
		<div '. $id .' class="'.$class.' row mb-5 pb-4">
	    	<div class="col-md-8 offset-md-2">
	    		<div class="d-lg-flex text-center flex-row justify-content-around" id="mininav">
	    			'.$submenu_content.'
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

    add_shortcode( 'tailor_submenu', 'tailor_shortcode_submenu_element' );
}