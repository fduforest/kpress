<?php

if ( ! class_exists( 'WPIU_Settings' ) ) {

	/**
	 * Handles plugin settings and user profile meta fields
	 */
	class WPIU_Settings extends WPIU_Module {
		protected $settings;
		protected static $default_settings;
		protected static $readable_properties = array( 'settings' );
		protected static $writeable_properties = array( 'settings' );

		const REQUIRED_CAPABILITY = 'manage_options';


		/*
		 * General methods
		 */

		/**
		 * Constructor
		 *
		 * @mvc Controller
		 */
		protected function __construct() {
			$this->register_hook_callbacks();
		}

		/**
		 * Public setter for protected variables
		 *
		 * Updates settings outside of the Settings API or other subsystems
		 *
		 * @mvc Controller
		 *
		 * @param string $variable
		 * @param array $value This will be merged with WPIU_Settings->settings, so it should mimic the structure of the WPIU_Settings::$default_settings. It only needs the contain the values that will change, though. See WordPress_Image_Utils->upgrade() for an example.
		 */
		public function __set( $variable, $value ) {
			// Note: WPIU_Module::__set() is automatically called before this

			if ( $variable != 'settings' ) {
				return;
			}

			$this->settings = self::validate_settings( $value );
			update_option( 'wpiu_settings', $this->settings );
		}

		/**
		 * Register callbacks for actions and filters
		 *
		 * @mvc Controller
		 */
		public function register_hook_callbacks() {
			add_action( 'admin_menu', array( $this, 'register_settings_pages' ) );
			add_action( 'init', array( $this, 'init' ) );
			add_action( 'admin_init', array( $this, 'register_settings' ) );

			add_filter( 'plugin_action_links_' . plugin_basename( dirname( __DIR__ ) ) . '/bootstrap.php', array(
				$this,
				'add_plugin_action_links'
			) );
		}

		/**
		 * Prepares site to use the plugin during activation
		 *
		 * @mvc Controller
		 *
		 * @param bool $network_wide
		 */
		public
		function activate(
			$network_wide
		) {
		}

		/**
		 * Rolls back activation procedures when de-activating the plugin
		 *
		 * @mvc Controller
		 */
		public
		function deactivate() {
		}

		/**
		 * Initializes variables
		 *
		 * @mvc Controller
		 */
		public
		function init() {
			self::$default_settings = self::get_default_settings();
			$this->settings         = self::get_settings();
		}

		/**
		 * Executes the logic of upgrading from specific older versions of the plugin to the current version
		 *
		 * @mvc Model
		 *
		 * @param string $db_version
		 */
		public
		function upgrade(
			$db_version = 0
		) {
			/*
			if( version_compare( $db_version, 'x.y.z', '<' ) )
			{
				// Do stuff
			}
			*/
		}

		/**
		 * Checks that the object is in a correct state
		 *
		 * @mvc Model
		 *
		 * @param string $property An individual property to check, or 'all' to check all of them
		 *
		 * @return bool
		 */
		protected
		function is_valid(
			$property = 'all'
		) {
			// Note: __set() calls validate_settings(), so settings are never invalid

			return true;
		}


		/*
		 * Plugin Settings
		 */

		/**
		 * Establishes initial values for all settings
		 *
		 * @mvc Model
		 *
		 * @return array
		 */
		protected
		static function get_default_settings() {
			$rename = array(
				"post-slug"      => false,
				"accents"        => false,
				"lowercase"      => false,
				"special-chars"  => false,
				"non-ascii"      => false,
				"md5"            => false,
				"current-date"   => false,
				"site-url"       => false,
				"remove-port"    => false,
				"remove-dir"     => false,
				"remove-tlds"    => false,
				"tlds-to-remove" => "",
				"extensions"     => "",
			);

			$featured = array(
				"first-image"    => false,
				"auto-category"  => array(),
				"auto-tag"       => array(),
				"auto-user"      => array(),
				"auto-post-type" => array(),
			);

			return array(
				'db-version' => '0',
				'rename'     => $rename,
				'featured'   => $featured,
			);
		}

		/**
		 * Retrieves all of the settings from the database
		 *
		 * @mvc Model
		 *
		 * @return array
		 */
		protected function get_settings() {
			$settings = shortcode_atts(
				self::$default_settings,
				get_option( 'wpiu_settings', array() )
			);

			return $settings;
		}

		/**
		 * Adds links to the plugin's action link section on the Plugins page
		 *
		 * @mvc Model
		 *
		 * @param array $links The links currently mapped to the plugin
		 *
		 * @return array
		 */
		public function add_plugin_action_links( $links ) {
			array_unshift( $links, '<a href="http://wordpress.org/extend/plugins/wp-image-utils/faq/">' . __( 'Help', 'wpiu_domain' ) . '</a>' );
			array_unshift( $links, '<a href="options-general.php?page=wpiu_settings">' . __( 'Settings', 'wpiu_domain' ) . '</a>' );

			return $links;
		}

		/**
		 * Adds pages to the Admin Panel menu
		 *
		 * @mvc Controller
		 */
		public function register_settings_pages() {
			add_submenu_page(
				'options-general.php',
				sprintf( __( '%s Settings', 'wpiu_domain' ), WPIU_NAME ),
				WPIU_NAME,
				self::REQUIRED_CAPABILITY,
				'wpiu_settings',
				array( $this, 'markup_settings_page' )
			);
		}

		/**
		 * Creates the markup for the Settings page
		 *
		 * @mvc Controller
		 */
		public function markup_settings_page() {
			if ( current_user_can( self::REQUIRED_CAPABILITY )
			) {
				echo self::render_template( 'wpiu-settings/page-settings.php' );
			} else {
				wp_die( __( 'Access denied.', 'wpiu_domain' ) );
			}
		}

		private function add_settings_field( $id, $title, $section ) {
			add_settings_field(
				$id,
				$title,
				array( $this, 'markup_fields' ),
				'wpiu_settings',
				$section,
				array( 'label_for' => $id )
			);
		}

		private function add_settings_field_rename( $id, $title ) {
			$this->add_settings_field( $id, $title, 'wpiu_section-rename' );
		}

		private function add_settings_field_featured( $id, $title ) {
			$this->add_settings_field( $id, $title, 'wpiu_section-featured' );
		}

		private function add_settings_section( $id, $title ) {
			add_settings_section(
				$id,
				$title,
				array( $this, 'markup_section_headers' ),
				'wpiu_settings'
			);
		}

		/**
		 * Registers settings sections, fields and settings
		 *
		 * @mvc Controller
		 */
		public function register_settings() {
			/*
			 * Rename Section
			 */
			$this->add_settings_section( 'wpiu_section-rename', __( 'File renaming on upload', 'wpiu_domain' ) );

			$this->add_settings_field_rename( 'wpiu_accents', __( 'Remove accents', 'wpiu_domain' ) );
			$this->add_settings_field_rename( 'wpiu_special-chars', __( 'Remove special characters', 'wpiu_domain' ) );
			$this->add_settings_field_rename( 'wpiu_non-ascii', __( 'Removes non-ascii characters', 'wpiu_domain' ) );
			$this->add_settings_field_rename( 'wpiu_lowercase', __( 'Convert filename to lowercase', 'wpiu_domain' ) );
			$this->add_settings_field_rename( 'wpiu_md5', __( 'Replace base name by MD5', 'wpiu_domain' ) );
			$this->add_settings_field_rename( 'wpiu_post-slug', __( 'Add post slug to filename', 'wpiu_domain' ) );
			$this->add_settings_field_rename( 'wpiu_current-date', __( 'Add current date to filename', 'wpiu_domain' ) );
			$this->add_settings_field_rename( 'wpiu_site-url', __( 'Add site URL to filename', 'wpiu_domain' ) );
			$this->add_settings_field_rename( 'wpiu_remove-port', __( 'Remove custom port number', 'wpiu_domain' ) );
			$this->add_settings_field_rename( 'wpiu_remove-dir', __( 'Only domain', 'wpiu_domain' ) );
			$this->add_settings_field_rename( 'wpiu_remove-tlds', __( 'Remove TLDs', 'wpiu_domain' ) );
			$this->add_settings_field_rename( 'wpiu_tlds-to-remove', __( 'TLDs to remove', 'wpiu_domain' ) );
			$this->add_settings_field_rename( 'wpiu_extensions', __( 'Extensions of files to rename', 'wpiu_domain' ) );

			/*
			 * Featured Section
			*/
			$this->add_settings_section( 'wpiu_section-featured', __( 'Featured image', 'wpiu_domain' ) );

			$this->add_settings_field_featured( 'wpiu_first-image', __( 'Feature first image in post on save', 'wpiu_domain' ) );
			$this->add_settings_field_featured( 'wpiu_auto-category', __( 'Categories', 'wpiu_domain' ) );
			$this->add_settings_field_featured( 'wpiu_auto-tag', __( 'Tags', 'wpiu_domain' ) );
			$this->add_settings_field_featured( 'wpiu_auto-user', __( 'Authors', 'wpiu_domain' ) );
			$this->add_settings_field_featured( 'wpiu_auto-post-type', __( 'Post Types', 'wpiu_domain' ) );

			// The settings container
			register_setting( 'wpiu_settings', 'wpiu_settings', array( $this, 'validate_settings' ) );
		}

		/**
		 * Adds the section introduction text to the Settings page
		 *
		 * @mvc Controller
		 *
		 * @param array $section
		 */
		public function markup_section_headers( $section ) {
			echo self::render_template( 'wpiu-settings/page-settings-section-headers.php', array( 'section' => $section ), 'always' );
		}


		/**
		 * Delivers the markup for settings fields
		 *
		 * @mvc Controller
		 *
		 * @param array $field
		 */
		public function markup_fields( $field ) {
			echo self::render_template( 'wpiu-settings/page-settings-fields.php', array(
				'settings' => $this->settings,
				'field'    => $field
			), 'always' );
		}

		private function setting_default_if_not_set( $new_settings, $section, $id, $value ) {
			if ( ! isset( $new_settings[ $section ][ $id ] ) ) {
				$new_settings[ $section ][ $id ] = $value;
			}
		}

		private function setting_empty_string_if_not_set( $new_settings, $section, $id ) {
			$this->setting_default_if_not_set( $new_settings, $section, $id, '' );
		}

		private function setting_empty_array_if_not_set( $new_settings, $section, $id ) {
			$this->setting_default_if_not_set( $new_settings, $section, $id, array() );
		}

		private function setting_zero_if_not_set( $new_settings, $section, $id ) {
			$this->setting_default_if_not_set( $new_settings, $section, $id, '0' );
		}

		/**
		 * Validates submitted setting values before they get saved to the database. Invalid data will be overwritten with defaults.
		 *
		 * @mvc Model
		 *
		 * @param array $new_settings
		 *
		 * @return array
		 */
		public function validate_settings( $new_settings ) {
			$new_settings = shortcode_atts( $this->settings, $new_settings );

			/*
			 * Rename Settings
			 */

			if ( ! isset( $new_settings['rename'] ) ) {
				$new_settings['rename'] = array();
			}

			$this->setting_zero_if_not_set( $new_settings, 'rename', 'post-slug' );
			$this->setting_zero_if_not_set( $new_settings, 'rename', 'accents' );
			$this->setting_zero_if_not_set( $new_settings, 'rename', 'lowercase' );
			$this->setting_zero_if_not_set( $new_settings, 'rename', 'special-chars' );
			$this->setting_zero_if_not_set( $new_settings, 'rename', 'non-ascii' );
			$this->setting_zero_if_not_set( $new_settings, 'rename', 'md5' );
			$this->setting_zero_if_not_set( $new_settings, 'rename', 'current-date' );
			$this->setting_zero_if_not_set( $new_settings, 'rename', 'site-url' );
			$this->setting_zero_if_not_set( $new_settings, 'rename', 'remove-port' );
			$this->setting_zero_if_not_set( $new_settings, 'rename', 'remove-dir' );
			$this->setting_zero_if_not_set( $new_settings, 'rename', 'remove-tlds' );
			$this->setting_empty_string_if_not_set( $new_settings, 'rename', 'tlds-to-remove' );
			$this->setting_empty_string_if_not_set( $new_settings, 'rename', 'extensions' );

			/*
			 * Featured Settings
			 */

			if ( ! isset( $new_settings['featured'] ) ) {
				$new_settings['featured'] = array();
			}

			$this->setting_zero_if_not_set( $new_settings, 'featured', 'first-image' );
			$this->setting_empty_array_if_not_set( $new_settings, 'featured', 'auto-category' );
			$this->setting_empty_array_if_not_set( $new_settings, 'featured', 'auto-tag' );
			$this->setting_empty_array_if_not_set( $new_settings, 'featured', 'auto-user' );
			$this->setting_empty_array_if_not_set( $new_settings, 'featured', 'auto-post-type' );

			if ( ! is_string( $new_settings['db-version'] ) ) {
				$new_settings['db-version'] = WordPress_Image_Utils::VERSION;
			}

			return $new_settings;
		}
	} // end WPIU_Settings
}
