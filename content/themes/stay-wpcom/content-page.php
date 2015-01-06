<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Stay
 * @since Stay 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( '' != get_the_post_thumbnail( get_the_ID() ) ) :
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'feat-img' );

		// If the image is greater than or equal to 920 with 2 sidebars, or 640 with 1 sidebar, show it
		if ( ( ! is_active_sidebar( 'sidebar-2' ) && $image[1] >= 920 ) || ( is_active_sidebar( 'sidebar-2' ) && $image[1] >= 640 ) ) :
			the_post_thumbnail( 'feat-img' );
		endif;
	endif;
	?>

	<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'stay' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'stay' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
