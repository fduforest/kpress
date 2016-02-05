<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Stay
 * @since Stay 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="msvalidate.01" content="5E28DDD7F56C0D1EDE3C58CE1F3D2CE4" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>

	<header id="masthead" class="site-header" role="banner">

<span style="font-size: 10px">
	<h1 style="display: inline; font-size: 10px"><a href="/location-val-joly-tarifs-reservation">Location Val Joly (Nord 59)</a></h1>, 
	<h1 style="display: inline; font-size: 10px"><a href="/location-gite-val-joly-ferme">Location Gîte Val Joly Ferme</a></h1>, 
	<h1 style="display: inline; font-size: 10px"><a href="/location-chambres-hotes-val-joly"> Location Chambres d'Hôtes Val Joly</a></h1>. 
	Découvrez le Nord-Pas de Calais, 
	<a href="/parc-naturel-regional-avesnois">le Parc de l'Avesnois</a>, 
	<a href="/la-station-touristique-du-val-joly">le Val Joly</a> 
	et Solre-le-Château avec notre <h1 style="display: inline; font-size: 10px"><a href="/location-maison-hotes-val-joly"> Maison d'hôtes de charme</a></h1>.
</span>
		<hgroup>
		
			<?php
			$header_image = get_header_image();
			if ( ! empty( $header_image ) ) { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
				</a>
			<?php } ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<?php get_sidebar( 'header' ); ?>

		<?php if ( has_nav_menu( 'secondary' ) ) : ?>
		<nav role="navigation" class="site-navigation secondary-navigation">

			<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>

		</nav>
		<?php endif; ?>

		<nav id="site-navigation" class="navigation-main" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'stay' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'stay' ); ?>"><?php _e( 'Skip to content', 'stay' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id' => 'primary-nav-container' ) ); ?>

			<?php
			//Repeat top navigation to be displayed in mobile dropdown
			wp_nav_menu( array( 'theme_location' => 'secondary', 'fallback_cb' => false, 'container_id' => 'mobile-top-nav-container' ) );
			?>
		</nav><!-- #site-navigation -->
		<div class="clear"></div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
