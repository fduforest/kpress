<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Stay
 * @since Stay 1.0
 */
?>

		<div class="clear"></div>
	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'stay_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'stay' ); ?>" rel="generator"><?php printf( __( '', 'stay' ), '' ); ?></a>
			<span class="sep"> </span>
			<?php printf( __( '%1$s %2$s.', 'stay' ), '', '<a href="" rel="designer">Keynetic</a>' ); ?>
<p>www.valjoly.com - www.tourisme-avesnois.com - ot.solrezis.free.fr - www.tourisme-nord.fr</p>
<p>Mots clés relatifs: location valjolylocation valjoly, location val joly, location val joli, location val jolie, location vacances valjoly, location vacances val joly, week end val joly, hebergement val joly, bed & breakfast val joly, b&b val joly, hotel solre le château, chambre nord pas de calais , chambres d'hôtes nord pas de calais , gites nord pas de calais, maison d’hotes nord  pas de calais, hotel de charme nord pas de calais, restaurant val joly, restaurant valjoly, restaurant solre le château, chambre chez l habitant. </p>
		</div><!-- .site-info -->

		<?php
		$social_links = get_theme_mod( 'stay_social_links' );
		if ( false != $social_links )
			$social_links = array_filter( $social_links );

		if ( ! empty( $social_links ) ) {
		?>

		<ul class="social-links clearfix">
			<?php if ( isset( $social_links['email'] ) ) : ?>
			<li class="email-link">
				<a href="mailto:<?php echo antispambot( sanitize_email( $social_links['email'] ) ); ?>" class="genericon" title="<?php esc_attr_e( 'Email', 'stay' ); ?>" target="_blank">
					<?php _e( 'Email', 'stay' ); ?>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( isset( $social_links['twitter'] ) ) : ?>
			<li class="twitter-link">
				<a href="<?php echo esc_url( $social_links['twitter'] ); ?>" class="genericon" title="<?php esc_attr_e( 'Twitter', 'stay' ); ?>" target="_blank">
					<?php _e( 'Twitter', 'stay' ); ?>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( isset( $social_links['facebook'] ) ) : ?>
			<li class="facebook-link">
				<a href="<?php echo esc_url( $social_links['facebook'] ); ?>" class="genericon" title="<?php esc_attr_e( 'Facebook', 'stay' ); ?>" target="_blank">
					<?php _e( 'Facebook', 'stay' ); ?>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( isset( $social_links['pinterest'] ) ) : ?>
			<li class="pinterest-link">
				<a href="<?php echo esc_url( $social_links['pinterest'] ); ?>" class="genericon" title="<?php esc_attr_e( 'Pinterest', 'stay' ); ?>" target="_blank">
					<?php _e( 'Pinterest', 'stay' ); ?>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( isset( $social_links['google_plus'] ) ) : ?>
			<li class="google-link">
				<a href="<?php echo esc_url( $social_links['google_plus'] ); ?>" class="genericon" title="<?php esc_attr_e( 'Google Plus', 'stay' ); ?>" target="_blank">
					<?php _e( 'Google Plus', 'stay' ); ?>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( isset( $social_links['vimeo'] ) ) : ?>
			<li class="vimeo-link">
				<a href="<?php echo esc_url( $social_links['vimeo'] ); ?>" class="genericon" title="<?php esc_attr_e( 'Vimeo', 'stay' ); ?>" target="_blank">
					<?php _e( 'Vimeo', 'stay' ); ?>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( isset( $social_links['youtube'] ) ) : ?>
			<li class="youtube-link">
				<a href="<?php echo esc_url( $social_links['youtube'] ); ?>" class="genericon" title="<?php esc_attr_e( 'YouTube', 'stay' ); ?>" target="_blank">
					<?php _e( 'YouTube', 'stay' ); ?>
				</a>
			</li>
			<?php endif; ?>
		</ul>
		<?php } ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>