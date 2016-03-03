<?php
/**
 * The template used for displaying rooms
 *
 * @package Stay
 * @since Stay 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'hotels-listing testimonial' ); ?>>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'stay' ) ); ?>
		<?php
		if ( '' != get_post_meta( $post->ID, 'hotels_testimonial', true ) )
			echo '<span class="testimonial-cite">' . esc_html( get_post_meta( $post->ID, 'hotels_testimonial', true ) ) . '</span>';
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'stay' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
