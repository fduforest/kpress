<?php
/**
 * Template Name: Home
 *
 * @package Stay
 */

get_header(); ?>

	<?php get_template_part( 'slider' ); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( '' != get_the_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>

				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'stay' ) ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		<?php edit_post_link( __( 'Edit', 'stay' ), '<div class="entry-meta"><span class="edit-link">', '</span></div>' ); ?>

		<?php get_sidebar( 'home' ); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>