<?php

if ( ! function_exists( 'tailor_shortcode_transparent_navbar_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_transparent_navbar_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'setting_1'                =>  '',
	    ), $atts, $tag );

	    $inner_html = "";
	    $outer_html = '
<div id="information" style="padding: 50px;">Transparent navbar enabled. Remove this element to disable.</div>
<script>
jQuery(document).ready(function(){
	setTimeout(function() {
		jQuery(".navbar").addClass("navbar-trans");
		jQuery(".navbar").removeClass("bg-dark");  
		enable_scroll();
		jQuery("#extrapad").remove();
		var enable_transparent = true;
	}, 100);
	setTimeout(function() {
		jQuery("#extrapad").remove();
		jQuery(".navbar").addClass("navbar-trans");
		jQuery(".navbar").removeClass("bg-dark");  
	}, 300);

});
jQuery("#information").hide();
if(Tailor.Components == undefined)
{
	jQuery("#information").show();
}
</script>';

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

    add_shortcode( 'tailor_transparent_navbar', 'tailor_shortcode_transparent_navbar_element' );
}