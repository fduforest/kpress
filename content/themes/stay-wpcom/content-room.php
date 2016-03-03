<?php
/**
 * The template used for displaying rooms
 *
 * @package Stay
 * @since Stay 1.0
 */

if ( is_single() ) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
			if ( '' != get_the_post_thumbnail( get_the_ID() ) ) :
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'feat-img' );

				// If the image is greater than or equal to 920 with 2 sidebars, or 640 with 1 sidebar, show it
				if ( ( ! is_active_sidebar( 'sidebar-2' ) && $image[1] >= 920 ) || ( is_active_sidebar( 'sidebar-2' ) && $image[1] >= 640 ) ) :
					the_post_thumbnail( 'feat-img' );
				endif;
			endif;

			the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
		?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'stay' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php
				echo get_the_term_list( get_the_ID(), 'hotels_room_amenities', sprintf( '<span class="room-amenities">%s ', __( 'Amenities:', 'stay' ) ), ', ', '</span>' );
				edit_post_link( __( 'Edit', 'stay' ), '<span class="edit-link">', '</span>' );
			?>
		</footer><!-- .entry-meta -->
	</article><!-- #post-## -->

<?php
else :

$classes = array(
	'hotels-listing',
	'room',
);

if ( '' != get_the_post_thumbnail() )
	$classes[] = 'thumbnail';
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="room-thumbnail">
			<?php the_post_thumbnail( 'room-thumbnail' ); ?>
		</div>
		<?php endif; ?>

		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<span class="room-price"><?php echo esc_html( get_post_meta( get_the_ID(), 'hotels_price', true ) ); ?></span>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				if ( is_page_template( 'page-templates/room-page.php' ) ) :
					the_excerpt();
				else :
					the_content();
				endif;
			?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php
				echo get_the_term_list( get_the_ID(), 'hotels_room_amenities', sprintf( '<span class="room-amenities">%s ', __( 'Amenities:', 'stay' ) ), ', ', '</span>' );
				edit_post_link( __( 'Edit', 'stay' ), '<span class="edit-link">', '</span>' );
			?>
		</footer><!-- .entry-meta -->
	</article><!-- #post-## -->
<?php
endif;
