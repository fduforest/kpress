<?php
/*
Plugin Name: WP Image Utils
Plugin URI:  https://wordpress.org/plugins/wp-image-utils/
Description: Easier handling of images in posts. Automatically rename image files, assign featured images and regenerate thumbnails.
Version:     0.3.4
Author:      Henri Benoit
Author URI:  http://benohead.com
*/

/*
 * This plugin was built on top of WordPress-Plugin-Skeleton by Ian Dunn.
 * See https://github.com/iandunn/WordPress-Plugin-Skeleton for details.
 */

if (!defined('ABSPATH')) {
    die('Access denied.');
}

/**
 *
 */
define('WPIU_NAME', 'WP Image Utils');
/**
 *
 */
define('WPIU_REQUIRED_PHP_VERSION', '5.3'); // because of get_called_class()
/**
 *
 */
define('WPIU_REQUIRED_WP_VERSION', '3.1'); // because of esc_textarea()

/**
 * Checks if the system requirements are met
 *
 * @return bool True if system requirements are met, false if not
 */
function wpiu_requirements_met()
{
    global $wp_version;

    if (version_compare(PHP_VERSION, WPIU_REQUIRED_PHP_VERSION, '<')) {
        return false;
    }

    if (version_compare($wp_version, WPIU_REQUIRED_WP_VERSION, '<')) {
        return false;
    }

    return true;
}

/**
 * Prints an error that the system requirements weren't met.
 */
function wpiu_requirements_error()
{
    global $wp_version;

    require_once(dirname(__FILE__) . '/views/requirements-error.php');
}

function load_wpiu_textdomain()
{
    load_plugin_textdomain('wpiu_domain', false, dirname(plugin_basename(__FILE__)) . '/languages');
}

/*
 * Check requirements and load main class
 * The main program needs to be in a separate file that only gets loaded if the plugin requirements are met. Otherwise older PHP installations could crash when trying to parse it.
 */
if (wpiu_requirements_met()) {
    require_once(__DIR__ . '/classes/wpiu-module.php');
    require_once(__DIR__ . '/classes/wpiu-image-table.php');
    require_once(__DIR__ . '/classes/wp-image-utils.php');
    require_once(__DIR__ . '/classes/wpiu-settings.php');

    add_action('init', 'load_wpiu_textdomain');

    if (class_exists('WordPress_Image_Utils')) {
        $GLOBALS['wpiu'] = WordPress_Image_Utils::get_instance();
        register_activation_hook(__FILE__, array($GLOBALS['wpiu'], 'activate'));
        register_deactivation_hook(__FILE__, array($GLOBALS['wpiu'], 'deactivate'));
    }
} else {
    add_action('admin_notices', 'wpiu_requirements_error');
}
