<?php
/**
 * Template Name: Testimonials Template
 * The template for displaying rooms.
 *
 * @package Stay
 * @since Stay 1.0
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

				<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'content', 'page' );
					endwhile;

					// Display rooms
					$hotels_testimonials = new WP_Query( array( 'post_type' => 'hotels_testimonial' ) );
					while ( $hotels_testimonials->have_posts() ) : $hotels_testimonials->the_post();
						get_template_part( 'content', 'testimonial' );
					endwhile;
					wp_reset_postdata();

					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_sidebar( 'tertiary' ); ?>
<?php get_footer(); ?>
