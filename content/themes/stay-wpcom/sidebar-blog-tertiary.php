<?php
/**
 * The Sidebar containing the blog tertiary widget area.
 *
 * @package Stay
 * @since Stay 1.0
 */

if ( ! is_active_sidebar( 'sidebar-7' ) )
	return;
?>

	<div id="tertiary" class="widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php dynamic_sidebar( 'sidebar-7' ); ?>
	</div><!-- #tertiary -->
