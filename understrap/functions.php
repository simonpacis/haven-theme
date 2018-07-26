<?php

/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';


register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'understrap' ),
) );

/* Tailor changes */


/****************************
    Tailor related changes
 ****************************/



/**
 * Loads the custom Tailor elements.
 */
function tailor_load_custom_element() {
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-three-image.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-three-image.php';

	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-haven-button.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-haven-button.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-heading.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-heading.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-haven-content.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-haven-content.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-submenu.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-submenu.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-youtube-embed.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-youtube-embed.php';

	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-image-with-text-slide.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-image-with-text-slide.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-submenu-container.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-submenu-container.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-submenu-child.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-submenu-child.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-haven-hero.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-haven-hero.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-transparent-navbar.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-transparent-navbar.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-image-slide.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-image-slide.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-custom-content.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-custom-wrapper.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-custom-container.php';
	include trailingslashit( get_template_directory() ) . 'tailor/elements/class-custom-child.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-custom-content.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-custom-wrapper.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-custom-container.php';
	include trailingslashit( get_template_directory() ) . 'tailor/shortcodes/shortcode-custom-child.php';
}

add_action( 'tailor_load_elements', 'tailor_load_custom_element', 20 );



/**
 * Registers the custom Tailor elements.
 *
 * @param Tailor_Elements $element_manager
 */
function tailor_register_custom_element( $element_manager ) {

	// The element PHP class is derived from the element tag.  To specify a custom class name, use 'class_name'
	// The element type can be specified using 'type'.  Possible values are 'container', 'wrapper', 'child' and 'content'
	$element_manager->add_element(
		'tailor_custom_content',                                        // Shortcode tag
		array(
			'label'             =>  __( 'Full-width large text' ),             // Label displayed in the element list
			'description'       =>  __( 'A blockquote like full-width text element.' ),   // Description displayed in the element list
			'badge'             =>  __( 'Haven' ),                     // Badge displayed in the element list
		)
	);

	$element_manager->add_element(
		'tailor_image_slide',
		array(
			'label'             =>  __( 'Image cornerbox' ),             // Label displayed in the element list
			'description'       =>  __( 'A background images with a textbox in one of the four corners.' ),   // Description displayed in the element list
			'badge'             =>  __( 'Haven' ),                     // Badge displayed in the element list
		)
	);

	$element_manager->add_element(
		'tailor_haven_hero',
		array(
			'label'             =>  __( 'Hero' ),             // Label displayed in the element list
			'description'       =>  __( 'Element for top of page with text and CTA-buttons.' ),   // Description displayed in the element list
			'badge'             =>  __( 'Haven' ),                     // Badge displayed in the element list
		)
	);

	$element_manager->add_element(
		'tailor_transparent_navbar',
		array(
			'label'             =>  __( 'Transparent navbar' ),             // Label displayed in the element list
			'description'       =>  __( 'Add this element to make the navbar transparent when it is at the top of the page, and solid when it\'s not.' ),   // Description displayed in the element list
			'badge'             =>  __( 'Haven' ),                     // Badge displayed in the element list
		)
	);

	$element_manager->add_element(
		'tailor_image_with_text_slide',
		array(
			'label'             =>  __( 'Image and text' ),             // Label displayed in the element list
			'description'       =>  __( 'An image with a full-height text box next to it.' ),   // Description displayed in the element list
			'badge'             =>  __( 'Haven' ),                     // Badge displayed in the element list
		)
	);

	$element_manager->add_element(
		'tailor_submenu',
		array(
			'label'             =>  __( 'Submenu' ),             // Label displayed in the element list
			'description'       =>  __( 'A menu with links to scroll to specific elements on the same page.' ),   // Description displayed in the element list
			'badge'             =>  __( 'Haven' ),                     // Badge displayed in the element list
		)
	);
	$element_manager->add_element(
		'tailor_youtube_embed',
		array(
			'label'             =>  __( 'YouTube video embed' ),             // Label displayed in the element list
			'description'       =>  __( 'Embed a YouTube video.' ),   // Description displayed in the element list
			'badge'             =>  __( 'Haven' ),                     // Badge displayed in the element list
		)
	);

	$element_manager->add_element(
		'tailor_heading',
		array(
			'label'             =>  __( 'Heading' ),             // Label displayed in the element list
			'description'       =>  __( 'A text heading.' ),   // Description displayed in the element list
			'badge'             =>  __( 'Haven' ),                     // Badge displayed in the element list
		)
	);

	$element_manager->add_element(
		'tailor_haven_content',
		array(
			'label'             =>  __( 'Text content' ),             // Label displayed in the element list
			'description'       =>  __( 'Body text.' ),   // Description displayed in the element list
			'badge'             =>  __( 'Haven' ),                     // Badge displayed in the element list
		)
	);

	$element_manager->add_element(
		'tailor_haven_button',
		array(
			'label'             =>  __( 'Button' ),             // Label displayed in the element list
			'description'       =>  __( 'A button.' ),   // Description displayed in the element list
			'badge'             =>  __( 'Haven' ),                     // Badge displayed in the element list
		)
	);

	$element_manager->add_element(
		'tailor_three_image',
		array(
			'label'             =>  __( 'Three images' ),             // Label displayed in the element list
			'description'       =>  __( 'Three images with heading underneath each.' ),   // Description displayed in the element list
			'badge'             =>  __( 'Haven' ),                     // Badge displayed in the element list
		)
	);


	// If your custom wrapper, container or child has a custom child view container, you will need to create extend
	// the default
	/*$element_manager->add_element( 'tailor_custom_wrapper', array(
		'label'             =>  __( 'Custom wrapper' ),
		'description'       =>  __( 'A custom wrapper element' ),
		'badge'             =>  __( 'Custom' ),
		'type'              =>  'wrapper',
	) );

	$element_manager->add_element( 'tailor_custom_container', array(
		'label'             =>  __( 'Custom container' ),
		'description'       =>  __( 'A custom container element' ),
		'badge'             =>  __( 'Custom' ),
		'type'              =>  'container',
		'child'             =>  'tailor_custom_child',
	) );

	$element_manager->add_element( 'tailor_custom_child', array(
		'label'             =>  __( 'Custom child' ),
		'type'              =>  'child',
	) );

	$element_manager->add_element( 'tailor_submenu_child', array(
		'label'             =>  __( 'Submenu child' ),
		'type'              =>  'child',
	) );*/
}

add_action( 'tailor_register_elements', 'tailor_register_custom_element' );



/**
 * Removes some default elements.
 *
 * @param Tailor_Elements $element_manager
 */
function tailor_remove_default_elements( $element_manager ) {
	$element_manager->remove_element( 'tailor_box' );
	$element_manager->remove_element( 'tailor_hero' );
	$element_manager->remove_element( 'tailor_user' );
	$element_manager->remove_element( 'tailor_button' );
	$element_manager->remove_element( 'tailor_card' );
	$element_manager->remove_element( 'tailor_button' );

}

add_action( 'tailor_register_elements', 'tailor_remove_default_elements' );


/**
 * Loads the custom panel definition.
 */
function tailor_load_custom_panel() {
	include trailingslashit( get_template_directory() ) . 'tailor/panels/class-panel-custom.php';
	include trailingslashit( get_template_directory() ) . 'tailor/panels/class-haven-settings-panel.php';
}

add_action( 'tailor_load_panels', 'tailor_load_custom_panel', 20 );

/**
 * Registers the custom panel.
 *
 * @param $panel_manager Tailor_Panels
 */
function tailor_register_custom_panel( $panel_manager ) {
    /*$panel_manager->add_section( 'haven', array(
        'title'                 =>  __( 'Haven Settings', 'tailor' ),
        'priority'              =>  10,
        'panel'                 =>  'settings',
    ) );
	$panel_manager->add_panel( new Tailor_Custom_Panel( 'custom_panel', array(
		'title'                 =>  __( 'Haven Settingss', 'tailor' ),
		'description'           =>  __( 'Haven specific settings.', 'tailor' ),
		'priority'              =>  12,
	) ) );
	$panel_manager->add_panel( new Tailor_Haven_Settings_Panel( 'haven_settings_panel', array(
		'title'                 =>  __( 'Haven Settings', 'tailor' ),
		'description'           =>  __( 'Haven specific settings.', 'tailor' ),
		'priority'              =>  11,
	) ) );
    $panel_manager->add_setting( '_tailor_page_trans', array(
        'default'               =>  "",
        'sanitize_callback'     =>  'tailor_sanitize_text',
    ) );
    $panel_manager->add_control( '_tailor_page_trans', array(
        'label'                 =>  __( 'Transparent navbar at top', 'tailor' ),
        'description'           =>  __( 'When at the top of the page, make the navbar transparent. Further down, make it solid.', 'tailor' ),
		 'type' => 'checkbox',
		 'section'               =>  'haven',
		 'choices' => array(
		   'make-trans' => __( 'Make transparent' ),
		 ),
		 'priority'              =>  10,
    ) );*/
}
add_action( 'tailor_register_panels', 'tailor_register_custom_panel', 20 );

/*function add_trans_meta() {
$my_file = trailingslashit( get_template_directory() ) . "log_2.txt";
file_put_contents($my_file, get_the_ID());
}*/

//add_action( 'tailor_save_settings', 'add_trans_meta', 20);

//add_post_meta($post_id, $meta_key, $meta_value, $unique);

/**
 * Registers custom views and behaviors
 */
function tailor_add_custom_views() {
	wp_enqueue_script(
		'tailor-custom-scripts',
		get_template_directory_uri() . '/tailor/assets/js/dist/canvas' . ( SCRIPT_DEBUG ? '.js' : '.min.js' ),
		array( 'tailor-canvas' ),
		null,
		true
	);
}

add_action( 'tailor_canvas_enqueue_scripts', 'tailor_add_custom_views', 99 );

/**
 * Registers custom styles
 */
function tailor_add_custom_styles() {
	wp_enqueue_style(
		'tailor-custom-styles',
		get_template_directory_uri() . '/tailor/assets/css/frontend' . ( SCRIPT_DEBUG ? '.css' : '.min.css' ),
		array(),
		null
	);

}

add_action( 'wp_enqueue_scripts', 'tailor_add_custom_styles' );

/**
 * Modifies default button elements.
 *
 * @param Tailor_Button_Element $button_element
 */
function tailor_modify_button( $button_element ) {

	// Get the button element's and style setting
	$style_setting = $button_element->get_setting( 'style' );

	// Set the default value to primary
	$style_setting->default = 'primary';

	// Remove the style control
	$button_element->remove_control( 'style' );
}

add_action( 'tailor_element_register_controls_tailor_button', 'tailor_modify_button' );



/**
 * Adds a new control to the Tailor button.
 *
 * @param Tailor_Button_Element $button_element
 */
function tailor_add_button_control( $button_element ) {

	$button_element->add_setting( 'show_icon', array(
		'sanitize_callback'     =>  'tailor_sanitize_text',
	) );

	$button_element->add_control( 'show_icon', array(
		'label'                 =>  __( 'Show icon?' ),
		'type'                  =>  'switch',
		'priority'              =>  45, // Position before icon control
		'section'               =>  'general',
	) );
}

add_action( 'tailor_element_register_controls_tailor_button', 'tailor_add_button_control' );



/**
 * Modify the default control arguments for the Button element.
 *
 * @param array $control_args
 * @param Tailor_Button_Element $button_element
 *
 * @return array $control_args
 */
function tailor_modify_button_icon_control( $control_args, $button_element ) {
	$control_args['dependencies'] = array(
		'show_icon'             => array(
			'condition'             =>  'not',
			'value'                 =>  '',
		),
	);
	return $control_args;
}

add_action( 'tailor_control_args_tailor_button_icon', 'tailor_modify_button_icon_control', 10, 2 );


/**
 * Modifies the default colorpicker palettes.
 *
 * @param array $control_args
 *
 * @return array $control_args
 */


add_action( 'tailor_control_args_colorpicker', 'tailor_modify_colorpicker' );

// Save post content as shortcodes instead of HTML
add_filter( 'tailor_save_content_as_html', '__return_false' );
