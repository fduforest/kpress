<?php
/**
 * The Sidebar containing the tertiary widget area.
 *
 * @package Stay
 * @since Stay 1.0
 */

if ( ! is_active_sidebar( 'sidebar-2' ) )
	return;
?>

	<div id="tertiary" class="widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- #tertiary -->
