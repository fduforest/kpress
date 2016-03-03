<?php
/**
 * Stay Theme Customizer
 *
 * @package Stay
 * @since Stay 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @since Stay 1.0
 */
function stay_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'stay_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Stay 1.0
 */
function stay_customize_preview_js() {
	wp_enqueue_script( 'stay_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130304', true );
}
add_action( 'customize_preview_init', 'stay_customize_preview_js' );

/**
 * Add theme options in the Customizer
 */
function stay_options_register( $wp_customize ) {

	/**
	 * Home Options
	 */
	$wp_customize->add_section( 'stay_home_options', array(
		'title'         => __( 'Home Slider', 'stay' ),
		'priority'      => 35,
	) );

	$wp_customize->add_setting( 'stay_home_slider[1]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_home_slider[1]', array(
		'label'         => __( 'Featured Page 1', 'stay' ),
		'section'       => 'stay_home_options',
		'type'          => 'dropdown-pages',
		'priority'      => 1,
	) );

	$wp_customize->add_setting( 'stay_home_slider[2]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_home_slider[2]', array(
		'label'         => __( 'Featured Page 2', 'stay' ),
		'section'       => 'stay_home_options',
		'type'          => 'dropdown-pages',
		'priority'      => 2,
	) );

	$wp_customize->add_setting( 'stay_home_slider[3]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_home_slider[3]', array(
		'label'         => __( 'Featured Page 3', 'stay' ),
		'section'       => 'stay_home_options',
		'type'          => 'dropdown-pages',
		'priority'      => 3,
	) );

	$wp_customize->add_setting( 'stay_home_slider[4]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_home_slider[4]', array(
		'label'         => __( 'Featured Page 4', 'stay' ),
		'section'       => 'stay_home_options',
		'type'          => 'dropdown-pages',
		'priority'      => 4,
	) );

	$wp_customize->add_setting( 'stay_home_slider[5]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_home_slider[5]', array(
		'label'         => __( 'Featured Page 5', 'stay' ),
		'section'       => 'stay_home_options',
		'type'          => 'dropdown-pages',
		'priority'      => 5,
	) );

	$wp_customize->add_setting( 'stay_home_slider[6]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_home_slider[6]', array(
		'label'         => __( 'Featured Page 6', 'stay' ),
		'section'       => 'stay_home_options',
		'type'          => 'dropdown-pages',
		'priority'      => 6,
	) );

	/**
	 * Social Links
	 */
	$wp_customize->add_section( 'stay_social_options', array(
		'title'         => __( 'Social Links', 'stay' ),
		'priority'      => 36,
	) );

	$wp_customize->add_setting( 'stay_social_links[twitter]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_social_links[twitter]', array(
		'label'         => __( 'Twitter Link', 'stay' ),
		'section'       => 'stay_social_options',
		'type'          => 'text',
		'priority'      => 1,
	) );

	$wp_customize->add_setting( 'stay_social_links[facebook]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_social_links[facebook]', array(
		'label'         => __( 'Facebook Link', 'stay' ),
		'section'       => 'stay_social_options',
		'type'          => 'text',
		'priority'      => 2,
	) );

	$wp_customize->add_setting( 'stay_social_links[youtube]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_social_links[youtube]', array(
		'label'         => __( 'YouTube Link', 'stay' ),
		'section'       => 'stay_social_options',
		'type'          => 'text',
		'priority'      => 3,
	) );

	$wp_customize->add_setting( 'stay_social_links[google_plus]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_social_links[google_plus]', array(
		'label'         => __( 'Google Plus Link', 'stay' ),
		'section'       => 'stay_social_options',
		'type'          => 'text',
		'priority'      => 4,
	) );

	$wp_customize->add_setting( 'stay_social_links[pinterest]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_social_links[pinterest]', array(
		'label'         => __( 'Pinterest Link', 'stay' ),
		'section'       => 'stay_social_options',
		'type'          => 'text',
		'priority'      => 5,
	) );

	$wp_customize->add_setting( 'stay_social_links[vimeo]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_social_links[vimeo]', array(
		'label'         => __( 'Vimeo Link', 'stay' ),
		'section'       => 'stay_social_options',
		'type'          => 'text',
		'priority'      => 6,
	) );

	$wp_customize->add_setting( 'stay_social_links[email]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'stay_social_links[email]', array(
		'label'         => __( 'Email Address', 'stay' ),
		'section'       => 'stay_social_options',
		'type'          => 'text',
		'priority'      => 7,
	) );
}
add_action( 'customize_register', 'stay_options_register' );
