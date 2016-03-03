<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Stay
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function stay_infinite_scroll_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'stay_infinite_scroll_setup' );

/**
 * Add support for Site Logo.
 */
function stay_site_logo_setup() {
	add_image_size( 'stay-logo', 1200, 400 );
	add_theme_support( 'site-logo', array( 'size' => 'stay-logo' ) );
}
add_action( 'after_setup_theme', 'stay_site_logo_setup' );

/**
 * Return early if Site Logo is not available.
 */
function stay_the_site_logo() {
	if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
		return;
	} else {
		jetpack_the_site_logo();
	}
}