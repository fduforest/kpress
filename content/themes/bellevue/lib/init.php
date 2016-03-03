<?php
/**
 * Initial setup and constants
 *
 * @author     @retlehs
 * @link 	   http://roots.io
 * @editor     Themovation <themovation@gmail.com>
 * @version    1.0
 */

//-----------------------------------------------------
// after_setup_theme
// Perform basic setup, registration, and init actions
// for this theme.
//-----------------------------------------------------


add_action('after_setup_theme', 'themo_setup');
 
function themo_setup() {
	// Make theme available for translation
	load_theme_textdomain('BELLEVUE', get_template_directory() . '/lang');

	// Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
	register_nav_menus(array(
	'primary_navigation' => esc_html__('Primary Navigation', 'BELLEVUE'),
	));

	// title tag support
	add_theme_support( 'title-tag' );

	// Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);

	if ( function_exists( 'add_image_size' ) ) { 
		// Set Image Size for Logo
		if ( function_exists( 'ot_get_option' ) ) {
			$logo_height = ot_get_option( 'themo_logo_height', 100 );
			add_image_size('themo-logo', 9999, $logo_height); //  (unlimited width, user set height)	
		}else{
			add_image_size('themo-logo', 9999, 100); // (unlimited width, 100px high)	
		}	
		
		// Set our custom images sizes
		add_image_size('themo_full_width', 1140, 900); // General Full Width Images - 1140 wide
		add_image_size('themo_thumb_slider', 255, 170, array( 'center', 'center' )); // Thumbnail Slider - 255 wide, 170 high, cropped center by center.
		add_image_size('themo_thumb_slider_portrait', 255, 0); // Thumbnail Slider Portrait - 255 wide, unlimited height.
		add_image_size('themo_brands', 0, 80); // Brands - 80 high
		add_image_size('themo_mini_brands', 0, 40); // Brands - 80 high
		add_image_size('themo_testimonials', 60, 60, array( 'center', 'top' ) ); // Testimonial Headshot - 60 wide, 60 high, cropped center and top.
		add_image_size('themo_featured', 555, 290, array( 'center', 'center' ) ); // Featured image - 440 wide, 300 high, cropped center by center.
		add_image_size('themo_team', 480); // Meet the Team - 360 wide.
		add_image_size('themo_showcase', 500); // Showcase - 500 wide.
		add_image_size('themo_page_header', 1920); // Page Header / BG - 1920 wide.
		add_image_size('themo_blog_standard', 750); // Blog for Standard post with Sidebar - 750 wide.
		add_image_size('themo_blog_masonry', 360); // Blog for Masonry - 360 wide.
        add_image_size('themo_rooms_standard', 380, 380, true); // Standard Rooms Size - 380 x 380, hard crop
		
	}

	
  
	// Add post formats (http://codex.wordpress.org/Post_Formats)
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

}

// Backwards compatibility for older than PHP 5.3.0
if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }
if (!defined('THEMEO_OT_DEFAULTS')) {
	define('THEMEO_OT_DEFAULTS', 'YTo2NDp7czoxNzoidGhlbW9fbG9nb19oZWlnaHQiO3M6MzoiMTAwIjtzOjEwOiJ0aGVtb19sb2dvIjtzOjA6IiI7czozNjoidGhlbW9fbG9nb190cmFuc3BhcmVudF9oZWFkZXJfZW5hYmxlIjtzOjI6Im9uIjtzOjI5OiJ0aGVtb19sb2dvX3RyYW5zcGFyZW50X2hlYWRlciI7czowOiIiO3M6MjA6InRoZW1vX25hdl90b3BfbWFyZ2luIjtzOjI6IjExIjtzOjIzOiJ0aGVtb19oZWFkZXJfZGFya19zdHlsZSI7czoyOiJvbiI7czoyODoidGhlbW9fZW5hYmxlX3JvdW5kZWRfYnV0dG9ucyI7czoyOiJvbiI7czoxNjoidGhlbW9fY3VzdG9tX2NzcyI7czowOiIiO3M6NDk6InRoZW1vX21ldGFfYm94X2J1aWxkZXJfbWV0YV9ib3hfbWFudWFsX3NvcnRfb3JkZXIiO3M6Mzoib2ZmIjtzOjQ0OiJ0aGVtb19tZXRhX2JveF9idWlsZGVyX21ldGFfYm94X21heF9xdWFudGl0eSI7czoxOiI1IjtzOjI5OiJ0aGVtb19hdXRvbWF0aWNfcG9zdF9leGNlcnB0cyI7czoyOiJvbiI7czoxOToidGhlbW9fc21vb3RoX3Njcm9sbCI7czozOiJvZmYiO3M6MTU6InRoZW1vX3ByZWxvYWRlciI7czoyOiJvbiI7czoxOToidGhlbW9fY29sb3JfcHJpbWFyeSI7czowOiIiO3M6MTg6InRoZW1vX2NvbG9yX2FjY2VudCI7czowOiIiO3M6MTU6InRoZW1vX2JvZHlfZm9udCI7czowOiIiO3M6MTU6InRoZW1vX21lbnVfZm9udCI7czowOiIiO3M6MTk6InRoZW1vX2hlYWRpbmdzX2ZvbnQiO3M6MDoiIjtzOjI3OiJ0aGVtb19zb2NpYWxfbWVkaWFfYWNjb3VudHMiO2E6Mzp7aTowO2E6Mzp7czo1OiJ0aXRsZSI7czo4OiJGYWNlYm9vayI7czoyMjoidGhlbW9fc29jaWFsX2ZvbnRfaWNvbiI7czoxNToic29jaWFsLWZhY2Vib29rIjtzOjE2OiJ0aGVtb19zb2NpYWxfdXJsIjtzOjI0OiJodHRwczovL3d3dy5mYWNlYm9vay5jb20iO31pOjE7YTozOntzOjU6InRpdGxlIjtzOjc6IlR3aXR0ZXIiO3M6MjI6InRoZW1vX3NvY2lhbF9mb250X2ljb24iO3M6MTQ6InNvY2lhbC10d2l0dGVyIjtzOjE2OiJ0aGVtb19zb2NpYWxfdXJsIjtzOjE4OiJodHRwOi8vdHdpdHRlci5jb20iO31pOjI7YTozOntzOjU6InRpdGxlIjtzOjk6Ikluc3RhZ3JhbSI7czoyMjoidGhlbW9fc29jaWFsX2ZvbnRfaWNvbiI7czoxNjoic29jaWFsLWluc3RhZ3JhbSI7czoxNjoidGhlbW9fc29jaWFsX3VybCI7czoxOiIjIjt9fXM6MjM6InRoZW1vX3BheW1lbnRzX2FjY2VwdGVkIjthOjQ6e2k6MDthOjM6e3M6NToidGl0bGUiO3M6NDoiVmlzYSI7czoyODoidGhlbW9fcGF5bWVudHNfYWNjZXB0ZWRfbG9nbyI7czowOiIiO3M6MTc6InRoZW1vX3BheW1lbnRfdXJsIjtzOjA6IiI7fWk6MTthOjM6e3M6NToidGl0bGUiO3M6NjoiUGF5UGFsIjtzOjI4OiJ0aGVtb19wYXltZW50c19hY2NlcHRlZF9sb2dvIjtzOjA6IiI7czoxNzoidGhlbW9fcGF5bWVudF91cmwiO3M6MDoiIjt9aToyO2E6Mzp7czo1OiJ0aXRsZSI7czoxMDoiTWFzdGVyQ2FyZCI7czoyODoidGhlbW9fcGF5bWVudHNfYWNjZXB0ZWRfbG9nbyI7czowOiIiO3M6MTc6InRoZW1vX3BheW1lbnRfdXJsIjtzOjA6IiI7fWk6MzthOjM6e3M6NToidGl0bGUiO3M6NDoiQU1FWCI7czoyODoidGhlbW9fcGF5bWVudHNfYWNjZXB0ZWRfbG9nbyI7czowOiIiO3M6MTc6InRoZW1vX3BheW1lbnRfdXJsIjtzOjA6IiI7fX1zOjE5OiJ0aGVtb19jb250YWN0X2ljb25zIjthOjM6e2k6MDthOjM6e3M6NToidGl0bGUiO3M6MTY6InN0YXlAYmVsbHZ1ZS5jb20iO3M6MTg6InRoZW1vX2NvbnRhY3RfaWNvbiI7czoxOToiZ2x5cGhpY29ucy1lbnZlbG9wZSI7czoyMjoidGhlbW9fY29udGFjdF9pY29uX3VybCI7czoyNDoibWFpbHRvOnN0YXlAYmVsbGV2dWUuY29tIjt9aToxO2E6Mzp7czo1OiJ0aXRsZSI7czoxNDoiMS04MDAtMjIyLTQ1NDUiO3M6MTg6InRoZW1vX2NvbnRhY3RfaWNvbiI7czoxNzoiZ2x5cGhpY29ucy1pcGhvbmUiO3M6MjI6InRoZW1vX2NvbnRhY3RfaWNvbl91cmwiO3M6MTY6InRlbDo4MDAtMjIyLTQ1NDUiO31pOjI7YTozOntzOjU6InRpdGxlIjtzOjg6IlZpc2l0IFVzIjtzOjE4OiJ0aGVtb19jb250YWN0X2ljb24iO3M6MjI6ImdseXBoaWNvbnMtZ29vZ2xlLW1hcHMiO3M6MjI6InRoZW1vX2NvbnRhY3RfaWNvbl91cmwiO3M6MDoiIjt9fXM6MTk6InRoZW1vX3N0aWNreV9oZWFkZXIiO3M6Mjoib24iO3M6MjQ6InRoZW1vX3RyYW5zcGFyZW50X2hlYWRlciI7czoyOiJvbiI7czoxNzoidGhlbW9fd2lkZV9sYXlvdXQiO3M6Mjoib24iO3M6Mjk6InRoZW1vX2JveGVkX2xheW91dF9iYWNrZ3JvdW5kIjtzOjA6IiI7czoxNzoidGhlbW9fYmFja3N0cmV0Y2giO3M6Mjoib24iO3M6MjA6InRoZW1vX3JldGluYV9zdXBwb3J0IjtzOjM6Im9mZiI7czoyMjoidGhlbW9fZm9vdGVyX2NvcHlyaWdodCI7czoxODoiwqDCqSAyMDE2IEJlbGxldnVlIjtzOjE5OiJ0aGVtb19mb290ZXJfY3JlZGl0IjtzOjc0OiJUaGVtZSBieSA8YSB0YXJnZXQ9Il9ibGFuayIgaHJlZj0iaHR0cDovL3RoZW1vdmF0aW9uLmNvbS8iPlRoZW1vdmF0aW9uPC9hPiI7czoyNjoidGhlbW9fZm9vdGVyX3dpZGdldF9zd2l0Y2giO3M6Mjoib24iO3M6MjA6InRoZW1vX2Zvb3Rlcl9jb2x1bW5zIjtzOjE6IjQiO3M6MTc6InRoZW1vX2Zvb3Rlcl9sb2dvIjtzOjA6IiI7czoyMToidGhlbW9fZm9vdGVyX2xvZ29fdXJsIjtzOjA6IiI7czoyMDoidGhlbW9fZmxleF9hbmltYXRpb24iO3M6NDoiZmFkZSI7czoxNzoidGhlbW9fZmxleF9lYXNpbmciO3M6NToic3dpbmciO3M6MjQ6InRoZW1vX2ZsZXhfYW5pbWF0aW9ubG9vcCI7czoyOiJvbiI7czoyMzoidGhlbW9fZmxleF9zbW9vdGhoZWlnaHQiO3M6Mjoib24iO3M6MjU6InRoZW1vX2ZsZXhfc2xpZGVzaG93c3BlZWQiO3M6NDoiNDAwMCI7czoyNToidGhlbW9fZmxleF9hbmltYXRpb25zcGVlZCI7czozOiI1NTAiO3M6MjA6InRoZW1vX2ZsZXhfcmFuZG9taXplIjtzOjM6Im9mZiI7czoyMzoidGhlbW9fZmxleF9wYXVzZW9uaG92ZXIiO3M6Mjoib24iO3M6MTY6InRoZW1vX2ZsZXhfdG91Y2giO3M6Mjoib24iO3M6MjM6InRoZW1vX2ZsZXhfZGlyZWN0aW9ubmF2IjtzOjI6Im9uIjtzOjIxOiJ0aGVtb19mbGV4X2NvbnRyb2xOYXYiO3M6Mjoib24iO3M6MzU6InRoZW1vX2Jsb2dfaW5kZXhfbGF5b3V0X3Nob3dfaGVhZGVyIjtzOjI6Im9uIjtzOjM2OiJ0aGVtb19ibG9nX2luZGV4X2xheW91dF9oZWFkZXJfZmxvYXQiO3M6ODoiY2VudGVyZWQiO3M6MzE6InRoZW1vX2Jsb2dfaW5kZXhfbGF5b3V0X3NpZGViYXIiO3M6NToicmlnaHQiO3M6MzY6InRoZW1vX3NpbmdsZV9wb3N0X2xheW91dF9zaG93X2hlYWRlciI7czoyOiJvbiI7czozNzoidGhlbW9fc2luZ2xlX3Bvc3RfbGF5b3V0X2hlYWRlcl9mbG9hdCI7czo4OiJjZW50ZXJlZCI7czozMjoidGhlbW9fc2luZ2xlX3Bvc3RfbGF5b3V0X3NpZGViYXIiO3M6NToicmlnaHQiO3M6Mjg6InRoZW1vX2RlZmF1bHRfbGF5b3V0X3NpZGViYXIiO3M6NToicmlnaHQiO3M6MjE6InRoZW1vX3Jvb21zX2hvbWVfbGluayI7czowOiIiO3M6Mjg6InRoZW1vX3Jvb21zX2hvbWVfbGlua19hbmNob3IiO3M6MDoiIjtzOjI0OiJ0aGVtb19yb29tc19yZXdyaXRlX3NsdWciO3M6MDoiIjtzOjI2OiJ0aGVtb19yb29tX2FkZHRoaXNfdG9vbGJveCI7czoyOiJvbiI7czoxNjoidGhlbW9fcm9vbV9pY29ucyI7czoyOiJvbiI7czoxNDoidGhlbW9fcm9vbV9uYXYiO3M6Mjoib24iO3M6MjA6InRoZW1vX3RvcF9uYXZfc3dpdGNoIjtzOjI6Im9uIjtzOjE4OiJ0aGVtb190b3BfbmF2X3RleHQiO3M6MjA6IldlbGNvbWUgdG8gQmVsbGV2dWUhIjtzOjI1OiJ0aGVtb190b3BfbmF2X2ljb25fYmxvY2tzIjthOjQ6e2k6MDthOjM6e3M6NToidGl0bGUiO3M6MTc6InN0YXlAYmVsbGV2dWUuY29tIjtzOjE4OiJ0aGVtb190b3BfbmF2X2ljb24iO3M6MTk6ImdseXBoaWNvbnMtZW52ZWxvcGUiO3M6MjI6InRoZW1vX3RvcF9uYXZfaWNvbl91cmwiO3M6MjQ6Im1haWx0bzpzdGF5QGJlbGxldnVlLmNvbSI7fWk6MTthOjM6e3M6NToidGl0bGUiO3M6MTQ6IkhvdyB0byBGaW5kIFVzIjtzOjE4OiJ0aGVtb190b3BfbmF2X2ljb24iO3M6MjI6ImdseXBoaWNvbnMtZ29vZ2xlLW1hcHMiO3M6MjI6InRoZW1vX3RvcF9uYXZfaWNvbl91cmwiO3M6MToiIyI7fWk6MjthOjM6e3M6NToidGl0bGUiO3M6MTI6IjI1MC01NTUtNTU1NSI7czoxODoidGhlbW9fdG9wX25hdl9pY29uIjtzOjE3OiJnbHlwaGljb25zLWlwaG9uZSI7czoyMjoidGhlbW9fdG9wX25hdl9pY29uX3VybCI7czoxNjoidGVsOjI1MC01NTUtNTU1NSI7fWk6MzthOjQ6e3M6NToidGl0bGUiO3M6MDoiIjtzOjE4OiJ0aGVtb190b3BfbmF2X2ljb24iO3M6MTQ6InNvY2lhbC10d2l0dGVyIjtzOjIyOiJ0aGVtb190b3BfbmF2X2ljb25fdXJsIjtzOjE4OiJodHRwOi8vdHdpdHRlci5jb20iO3M6Mjk6InRoZW1vX3RvcF9uYXZfaWNvbl91cmxfdGFyZ2V0IjthOjE6e2k6MDtzOjY6Il9ibGFuayI7fX19czoyNDoidGhlbW9fd29vX3Nob3dfY2FydF9pY29uIjtzOjI6Im9uIjtzOjE5OiJ0aGVtb193b29fY2FydF9pY29uIjtzOjEwOiJ0aC1pLWNhcnQzIjtzOjIyOiJ0aGVtb193b29faGVhZGVyX2Zsb2F0IjtzOjQ6ImxlZnQiO3M6MTc6InRoZW1vX3dvb19zaWRlYmFyIjtzOjU6InJpZ2h0Ijt9');
	}
if (!defined('THEMO_COLOR_PRIMARY')) { define('THEMO_COLOR_PRIMARY', '#048c8c'); }
if (!defined('THEMO_COLOR_ACCENT')) { define('THEMO_COLOR_ACCENT', '#025e73'); }

