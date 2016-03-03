<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php $header_image = get_header_image();
	if ( ! empty( $header_image ) ) { ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		</a>
	<?php } // if ( ! empty( $header_image ) ) ?>

 *
 * @package Stay
 * @since Stay 1.0
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Rework this function to remove WordPress 3.4 support when WordPress 3.6 is released.
 *
 * @uses stay_header_style()
 * @uses stay_admin_header_style()
 * @uses stay_admin_header_image()
 *
 * @package Stay
 */
function stay_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'stay_custom_header_args', array(
		'default-text-color'     => '000',
		'width'                  => 300,
		'height'                 => 100,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'stay_header_style',
		'admin-head-callback'    => 'stay_admin_header_style',
		'admin-preview-callback' => 'stay_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'stay_custom_header_setup' );

if ( ! function_exists( 'stay_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see stay_custom_header_setup().
 *
 * @since Stay 1.0
 */
function stay_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // stay_header_style

if ( ! function_exists( 'stay_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see stay_custom_header_setup().
 *
 * @since Stay 1.0
 */
function stay_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: 1px solid #ddd;
		width: 95%;
		max-width: 600px;
		padding: 10px;
	}
	#headimg h1 {
		font-size: 24px;
		font-weight: 300;
		line-height: 1em;
		margin: 0;
		padding: 0;
		text-transform: uppercase;
	}
	#headimg h1 a {
		color: #262626;
		font-family: "Gilda Display", serif;
		text-decoration: none;
	}
	#desc {
		font-family: "Source Sans Pro", sans-serif;
		font-size: 14px;
		font-weight: 300;
		margin: 0;
		padding: 0;
	}
	#headimg img {
		max-width: 100%;
	}
	</style>
<?php
}
endif; // stay_admin_header_style

if ( ! function_exists( 'stay_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see stay_custom_header_setup().
 *
 * @since Stay 1.0
 */
function stay_admin_header_image() {
	$style        = sprintf( ' style="color:#%s;"', get_header_textcolor() );
	$header_image = get_header_image();
 ?>
	<div id="headimg">
		<?php if ( ! empty( $header_image ) ) : ?>
		<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
	</div>
<?php
}
endif; // stay_admin_header_image