<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Stay
 * @since Stay 1.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since Stay 1.0
 */
function stay_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'stay_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Stay 1.0
 */
function stay_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() )
		$classes[] = 'group-blog';

	// three-col class when optional sidebars are active
	if (    is_active_sidebar( 'sidebar-7' )
			&& ( is_home() || is_singular( 'post' ) || is_archive() || is_search() )
	) {
		$classes[] = 'three-column';
	} elseif (   is_active_sidebar( 'sidebar-2' )
			&& ! is_page_template( 'page-templates/full-width-page.php' )
			&& ! is_page_template( 'page-templates/home-page.php' )
			&& ! is_home()
			&& ! is_singular( 'post' )
	) {
		$classes[] = 'three-column';
	}

	return $classes;
}
add_filter( 'body_class', 'stay_body_classes' );

/**
 * Count the number of home sidebars to enable dynamic classes for the widget area
 */
function stay_home_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
	}

	if ( $class )
		echo ' ' . $class;
}

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since Stay 1.0
 */
function stay_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'stay_enhanced_image_navigation', 10, 2 );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @since Stay 1.0
 */
function stay_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'stay' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'stay_wp_title', 10, 2 );