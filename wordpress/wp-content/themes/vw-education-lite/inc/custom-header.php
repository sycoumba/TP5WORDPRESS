<?php
/**
 * @package VW Education Lite
 * @subpackage vw-education-lite
 * @since vw-education-lite 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses vw_education_lite_header_style()
*/

function vw_education_lite_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'vw_education_lite_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 67,
		'flex-width'             => true,
		'flex-height'            => true,
		'admin-preview-callback' => 'vw_education_lite_admin_header_image',
	) ) );
}

add_action( 'after_setup_theme', 'vw_education_lite_custom_header_setup' );

if ( ! function_exists( 'vw_education_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see vw_education_lite_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'vw_education_lite_header_style' );
function vw_education_lite_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'vw-education-lite-basic-style', $custom_css );
	endif;
}
endif; // vw_education_lite_header_style
