<?php
/**
 * The sidebar containing the home widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package Stay
 * @since Stay 1.0
 */

if ( ! is_active_sidebar( 'sidebar-3' ) && ! is_active_sidebar( 'sidebar-4' ) && ! is_active_sidebar( 'sidebar-5' ) )
	return;
?>
<div id="home-widgets" class="widget-area<?php stay_home_sidebar_class(); ?>" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div class="home-widgets">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div class="home-widgets">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
	<div class="home-widgets">
		<?php dynamic_sidebar( 'sidebar-5' ); ?>
	</div>
	<?php endif; ?>
</div><!-- #home-widgets -->