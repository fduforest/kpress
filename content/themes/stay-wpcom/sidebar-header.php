<?php
/**
 * The Sidebar containing the header widget areas.
 *
 * @package Stay
 * @since Stay 1.0
 */

if ( ! is_active_sidebar( 'sidebar-8' ) )
	return;
?>

	<div class="widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php dynamic_sidebar( 'sidebar-8' ); ?>
	</div><!-- .widget-area -->
