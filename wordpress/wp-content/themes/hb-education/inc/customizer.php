<?php
/**
 * HB Education Theme Customizer
 *
 * @package HB_Education
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hb_education_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* Load dropdown-category.php */
	require get_template_directory() . '/hummingbird/customizer/dropdown-category.php';

	/* Load sanitize.php */
	require get_template_directory() . '/hummingbird/customizer/sanitize.php';

	/* Load customizer-front.php */
	require get_template_directory() . '/hummingbird/customizer/customizer-front.php';

	/* Load customizer-header.php */
	require get_template_directory() . '/hummingbird/customizer/customizer-header.php';

	/* Load customizer-footer.php */
	require get_template_directory() . '/hummingbird/customizer/customizer-footer.php';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'hb_education_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'hb_education_customize_partial_blogdescription',
		) );
	}


	// Load Upgrade to Pro control.
	 require get_template_directory() . '/inc/upgrade-to-pro/control.php';

	// Register custom section types.
	$wp_customize->register_section_type( 'hb_education_customize_section_upsell' );
	// Register sections.
	$wp_customize->add_section(
		new hb_education_customize_section_upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'HB Education', 'hb-education' ),
				'pro_text' => esc_html__( 'Buy Pro', 'hb-education' ),
				'pro_url'  => 'https://wpfactory.com/item/hb-education-wordpress-theme/',
				'priority'  => 1,
			)
		)
	);

}
add_action( 'customize_register', 'hb_education_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function hb_education_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function hb_education_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hb_education_customize_preview_js() {
	wp_enqueue_script( 'hb-education-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hb_education_customize_preview_js' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.7
 */
function hb_education_customizer_control_scripts() {

  wp_enqueue_script( 'hb-education-customize-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.js', array( 'customize-controls' ) );

  wp_enqueue_style( 'hb-education-customize-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.css' );

}

add_action( 'customize_controls_enqueue_scripts', 'hb_education_customizer_control_scripts', 0 );