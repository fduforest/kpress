<?php
/**
 * Stay functions and definitions
 *
 * @package Stay
 * @since Stay 1.0
 */

/**
 * Set the content width based on the theme's design, stylesheet, and template.
 *
 * @since Stay 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 890; /* pixels */

function stay_set_content_width() {
	global $content_width;

	if (   ( is_active_sidebar( 'sidebar-2') && is_page() && ! is_page_template( 'page-templates/full-width-page.php' ) && ! is_page_template( 'page-templates/home-page.php' ) )
		|| ( is_active_sidebar( 'sidebar-7') && ( is_home() || is_singular( 'post' ) || is_archive() || is_search() ) )
	) {
		$content_width = 610;
	} elseif ( ( ! is_active_sidebar( 'sidebar-7') && ( is_home() || is_singular( 'post' ) || is_archive() || is_search() ) )
			|| ( ! is_active_sidebar( 'sidebar-2') && is_page() && ! is_page_template( 'page-templates/full-width-page.php' ) && ! is_page_template( 'page-templates/home-page.php' ) )
	) {
		$content_width = 920;
	} elseif ( is_page_template( 'page-templates/full-width-page.php' ) || is_page_template( 'page-templates/home-page.php' ) ) {
		$content_width = 1200;
	}
}
add_action( 'template_redirect', 'stay_set_content_width' );

/**
 * Load Jetpack compatibility file.
 */
if ( file_exists( get_template_directory() . '/inc/jetpack.php' ) )
	require get_template_directory() . '/inc/jetpack.php';


if ( ! function_exists( 'stay_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Stay 1.0
 */
function stay_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Stay, use a find and replace
	 * to change 'stay' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'stay', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'slider-img', 1200, 500, true );
	add_image_size( 'feat-img', 920, 383, true );
	add_image_size( 'feat-img-full', 1200, 383, true );
	add_image_size( 'room-thumbnail', 200, 133, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'stay' ),
		'secondary' => __( 'Top Menu', 'stay' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Enable support for Room Post Type
	 */
	require( get_template_directory() . '/inc/cpt/rooms.php' );

	/**
	 * Enable support for Testimonial Post Type
	 */
	require( get_template_directory() . '/inc/cpt/testimonials.php' );
}
endif; // stay_setup
add_action( 'after_setup_theme', 'stay_setup' );

/* Flush rewrite rules for Testimonial and Room CPTs on theme switch */
function stay_flush_rewrite_rules() {
     flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'stay_flush_rewrite_rules' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Hooks into the after_setup_theme action.
 */
function stay_register_custom_background() {
	add_theme_support( 'custom-background', apply_filters( 'stay_custom_background_args', array(
		'default-color' => 'f6f6f6',
		'default-image' => '',
	) ) );
}
add_action( 'after_setup_theme', 'stay_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Stay 1.0
 */
function stay_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'stay' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'stay' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home First Widget Area', 'stay' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Second Widget Area', 'stay' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Third Widget Area', 'stay' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Blog Primary Sidebar', 'stay' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Blog Secondary Sidebar', 'stay' ),
		'id'            => 'sidebar-7',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Widget Area', 'stay' ),
		'id'            => 'sidebar-8',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'stay_widgets_init' );

/**
 * Enqueue Google Fonts
 */
function stay_fonts() {

	$protocol = is_ssl() ? 'https' : 'http';

	/*	translators: If there are characters in your language that are not supported
		by Source Sans or Gilda Display, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Source Sans font: on or off', 'stay' ) ) {
		wp_register_style( 'stay-source-sans', "$protocol://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" );
	}
	if ( 'off' !== _x( 'on', 'Gilda Display font: on or off', 'stay' ) ) {
		wp_register_style( 'stay-gilda-display', "$protocol://fonts.googleapis.com/css?family=Gilda+Display" );
	}

}
add_action( 'init', 'stay_fonts' );

/**
 * Enqueue font styles in custom header admin
 */
function stay_admin_fonts( $hook_suffix ) {

	if ( 'appearance_page_custom-header' != $hook_suffix )
		return;

	wp_enqueue_style( 'stay-source-sans' );
	wp_enqueue_style( 'stay-gilda-display' );

}
add_action( 'admin_enqueue_scripts', 'stay_admin_fonts' );

/**
 * Enqueue scripts and styles
 */
function stay_scripts() {
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );
	wp_enqueue_style( 'stay-style', get_stylesheet_uri() );
	wp_enqueue_style( 'stay-source-sans' );
	wp_enqueue_style( 'stay-gilda-display' );

	wp_enqueue_script( 'stay-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'stay-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'stay-script', get_template_directory_uri() . '/js/stay.js', array( 'jquery' ), '20130301', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

	if ( is_page_template( 'page-templates/home-page.php' ) ) {
		wp_enqueue_style( 'stay-flex-slider-style', get_template_directory_uri() . '/js/flex-slider/flexslider.css' );
		wp_enqueue_script( 'stay-flex-slider', get_template_directory_uri() . '/js/flex-slider/jquery.flexslider-min.js', array( 'jquery' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'stay_scripts' );

/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );


// updater for WordPress.com themes
if ( is_admin() )
	include dirname( __FILE__ ) . '/inc/updater.php';
