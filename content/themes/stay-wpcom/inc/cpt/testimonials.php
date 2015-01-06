<?php

/*
 * Plugin Name: Hotels - Testimonial CPT
 * Plugin URI:
 * Author: Automattic
 * Version: 0.1
 * License: GPL2+
 * Text Domain: hotels-testimonial
 * Domain Path: /languages/
 */

class Hotels_Testimonials {
	const TESTIMONIAL_POST_TYPE = 'hotels_testimonial';

	var $version = '0.1';

	static function init() {
		static $instance = false;

		if ( !$instance ) {
			$instance = new Hotels_Testimonials;
		}

		return $instance;
	}

	function __construct() {
		$this->register_post_types();

		add_action( 'wp_insert_post', array( $this, 'add_post_meta' ) );
	}

/* Setup */

	function register_post_types() {
		register_post_type( self::TESTIMONIAL_POST_TYPE, array(
			'description' => __( "Rooms your hotel offers", 'hotels-testimonial' ),

			'labels' => array(
				'name'               => __( 'Testimonials', 'hotels-testimonial' ),
				'singular_name'      => __( 'Testimonial', 'hotels-testimonial' ),
				'menu_name'          => __( 'Testimonials', 'hotels-testimonial' ),
				'all_items'          => __( 'All Testimonials', 'hotels-testimonial' ),
				'add_new'            => __( 'Add a Testimonial', 'hotels-testimonial' ),
				'add_new_item'       => __( 'Add a Testimonial', 'hotels-testimonial' ),
				'edit_item'          => __( 'Edit Testimonial', 'hotels-testimonial' ),
				'new_item'           => __( 'New Testimonial', 'hotels-testimonial' ),
				'view_item'          => __( 'View Testimonial', 'hotels-testimonial' ),
				'search_items'       => __( 'Search Testimonials', 'hotels-testimonial' ),
				'not_found'          => __( 'No Testimonials found', 'hotels-testimonial' ),
				'not_found_in_trash' => __( 'No Testimonials found in Trash', 'hotels-testimonial' ),
			),
			'supports' => array(
				'title',
				'editor',
				'excerpt',
			),
			'rewrite' => array(
				'slug'       => 'testimonial',
				'with_front' => false,
				'feeds'      => false,
				'pages'      => false,
			),
			'register_meta_box_cb' => array( $this, 'register_testimonial_meta_boxes' ),

			'public'          => true,
			'show_ui'         => true, // set to false to replace with custom UI
			'menu_position'   => 20, // below Pages
			'capability_type' => 'page',
			'map_meta_cap'    => true,
			'has_archive'     => false,
			'query_var'       => 'testimonial',
		) );
	}

/* Edit One Item */

	function register_testimonial_meta_boxes() {
		add_meta_box( 'testimonial_cite', __( 'Citation', 'hotels-testimonial' ), array( $this, 'testimonial_cite_meta_box' ), null, 'side', 'high' );
	}

	function testimonial_cite_meta_box( $post, $meta_box ) {
		$testimonial = $this->get_testimonial( $post->ID );
?>
	<label for="hotels-testimonial-<?php echo (int) $post->ID; ?>" class="screen-reader-text"><?php esc_html_e( 'Citation', 'hotels-testimonial' ); ?></label>
	<input type="text" id="hotels-testimonial-<?php echo (int) $post->ID; ?>" class="widefat" name="hotels_testimonial[<?php echo (int) $post->ID; ?>]" value="<?php echo esc_attr( $testimonial ); ?>" />
<?php
	}

	function add_post_meta( $post_id ) {
		if ( !isset( $_POST['hotels_testimonial'][$post_id] ) ) {
			return;
		}

		$this->set_testimonial( $post_id, stripslashes( $_POST['hotels_testimonial'][$post_id] ) );
	}

/* Data */

	function set_testimonial( $post_id = 0, $testimonial = '' ) {
		$post = get_post( $post_id );

		return update_post_meta( $post->ID, 'hotels_testimonial', $testimonial );
	}

	function get_testimonial( $post_id = 0 ) {
		$post = get_post( $post_id );

		return get_post_meta( $post->ID, 'hotels_testimonial', true );
	}

	function display_testimonial( $post_id = 0 ) {
		echo esc_html( $this->get_testimonial( $post_id ) );
	}
}

add_action( 'init', array( 'Hotels_Testimonials', 'init' ) );
