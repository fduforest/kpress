<?php
/**
 * Display home page slider
 * Requires slider pages to be set in customizer with featured images greater than 960
 *
 * @package Stay
 * @since Stay 1.0
 */

$home_slider = get_theme_mod( 'stay_home_slider' );

if ( ! empty( $home_slider ) ) :
	$home_slider_pages = array_values( $home_slider );

	$slider_args = array(
		'post__in'       => $home_slider_pages,
		'post_type'      => 'page',
		'post_status'    => 'publish',
		'posts_per_page' => 6,
		'no_found_rows'  => true,
		'orderby'        => 'post__in'
	);
	$slider = new WP_Query( $slider_args );

	if ( $slider->have_posts() ) :
?>
		<div id="featured-content" class="flexslider">
			<ul class="featured-posts slides">
			<?php
			while ( $slider->have_posts() ) : $slider->the_post();

				if ( '' != get_the_post_thumbnail( $post->ID ) ) :
					// Now let's check the image.
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-img' );

					// If it is greater than 960 in width, let's skip
					if ( $image[1] >= 960 ) :
			?>
						<li class="featured">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'stay' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail( 'slider-img' ); ?></a>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-header">
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'stay' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
								</div><!-- .entry-header -->
							</div><!-- #post-<?php the_ID(); ?> -->
						</li>
			<?php
					endif;
				endif;
			endwhile;
			wp_reset_postdata();
			?>
			</ul><!-- .featured-posts -->
		</div><!-- #featured-content -->
<?php
	endif;
endif;
?>