<?php
class Hotels_Rooms {
	const ROOM_POST_TYPE = 'hotels_room';
	const ROOM_AMENITY_TAX = 'hotels_room_amenities';

	var $version = '0.1';

	static function init() {
		static $instance = false;

		if ( !$instance ) {
			$instance = new Hotels_Rooms;
		}

		return $instance;
	}

	function __construct() {
		$this->register_taxonomies();
		$this->register_post_types();

		add_action( 'parse_query',    array( $this, 'sort_room_queries_by_menu_order' ) );
		add_action( 'wp_insert_post', array( $this, 'add_post_meta' ) );
	}

/* Setup */

	function register_taxonomies() {
		register_taxonomy( self::ROOM_AMENITY_TAX, self::ROOM_POST_TYPE, array(
			'labels' => array(
				'name'                       => __( 'Amenities', 'hotels-room' ),
				'singular_name'              => __( 'Amenity', 'hotels-room' ),
				'search_items'               => __( 'Search Amenities', 'hotels-room' ),
				'popular_items'              => __( 'Popular Amenities', 'hotels-room' ),
				'all_items'                  => __( 'All Amenities', 'hotels-room' ),
				'edit_item'                  => __( 'Edit Amenity', 'hotels-room' ),
				'view_item'                  => __( 'View Amenity', 'hotels-room' ),
				'update_item'                => __( 'Update Amenity', 'hotels-room' ),
				'add_new_item'               => __( 'Add New Amenity', 'hotels-room' ),
				'new_item_name'              => __( 'New Amenity Name', 'hotels-room' ),
				'separate_items_with_commas' => __( 'Separate Amenities with commas', 'hotels-room' ),
				'add_or_remove_items'        => __( 'Add or remove Amenities', 'hotels-room' ),
				'choose_from_most_used'      => __( 'Choose from the most used Amenities', 'hotels-room' ),
			),
			'no_tagcloud' => __( 'No Amenities found', 'hotels-room' ),

			'hierarchical'  => false,
		) );
	}

	function register_post_types() {
		register_post_type( self::ROOM_POST_TYPE, array(
			'description' => __( "Rooms your hotel offers", 'hotels-room' ),

			'labels' => array(
				'name'               => __( 'Rooms', 'hotels-room' ),
				'singular_name'      => __( 'Room', 'hotels-room' ),
				'menu_name'          => __( 'Rooms', 'hotels-room' ),
				'all_items'          => __( 'All Rooms', 'hotels-room' ),
				'add_new'            => __( 'Add a Room', 'hotels-room' ),
				'add_new_item'       => __( 'Add a Room', 'hotels-room' ),
				'edit_item'          => __( 'Edit Room', 'hotels-room' ),
				'new_item'           => __( 'New Room', 'hotels-room' ),
				'view_item'          => __( 'View Room', 'hotels-room' ),
				'search_items'       => __( 'Search Rooms', 'hotels-room' ),
				'not_found'          => __( 'No Rooms found', 'hotels-room' ),
				'not_found_in_trash' => __( 'No Rooms found in Trash', 'hotels-room' ),
			),
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'page-attributes',
			),
			'register_meta_box_cb' => array( $this, 'register_room_meta_boxes' ),

			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => 'room',
			'rewrite'            => array( 'slug' => 'room' ),
			'has_archive'        => false,
			'menu_position'      => 20, // below Pages
			'capability_type'    => 'page',
			'hierarchical'       => false,
			'map_meta_cap'       => true,

		) );
	}

/* Admin */

	function is_room_query( $query ) {
		if ( ( isset( $query->query_vars['taxonomy'] ) ) || ( isset( $query->query_vars['post_type'] ) && self::ROOM_POST_TYPE == $query->query_vars['post_type'] ) ) {
			return true;
		}

		return false;
	}

	function sort_room_queries_by_menu_order( $query ) {
	    if ( !$this->is_room_query( $query ) ) {
	            return;
	    }

		$query->query_vars['orderby'] = 'menu_order';
		$query->query_vars['order'] = 'ASC';

		// For now, just turn off paging so we can sort by taxonmy later
		// If we want paging in the future, we'll need to add the taxonomy sort here (or at least before the DB query is made)
		$query->query_vars['posts_per_page'] = -1;
	}


/* Edit One Item */

	function register_room_meta_boxes() {
		add_meta_box( 'room_price', __( 'Price', 'hotels-room' ), array( $this, 'room_price_meta_box' ), null, 'side', 'high' );
	}

	function room_price_meta_box( $post, $meta_box ) {
		$price = $this->get_price( $post->ID );
?>
	<label for="hotels-price-<?php echo (int) $post->ID; ?>" class="screen-reader-text"><?php esc_html_e( 'Price', 'hotels-room' ); ?></label>
	<input type="text" id="hotels-price-<?php echo (int) $post->ID; ?>" class="widefat" name="hotels_price[<?php echo (int) $post->ID; ?>]" value="<?php echo esc_attr( $price ); ?>" />
<?php
	}

	function add_post_meta( $post_id ) {
		if ( !isset( $_POST['hotels_price'][$post_id] ) ) {
			return;
		}

		$this->set_price( $post_id, stripslashes( $_POST['hotels_price'][$post_id] ) );
	}

/* Data */

	function get_rooms( $args = array() ) {
		$args = wp_parse_args( $args, array(
			'hide_empty' => false,
		) );

		$terms = get_terms( self::MENU_TAX, $args );
		if ( !$terms || is_wp_error( $terms ) ) {
			return array();
		}

		$terms_by_id = array();
		foreach ( $terms as $term ) {
			$terms_by_id["{$term->term_id}"] = $term;
		}

		$term_order = get_option( 'hotels_menu_order', array() );

		$return = array();
		foreach ( $term_order as $term_id ) {
			if ( isset( $terms_by_id["$term_id"] ) ) {
				$return[] = $terms_by_id["$term_id"];
				unset( $terms_by_id["$term_id"] );
			}
		}

		foreach ( $terms_by_id as $term_id => $term ) {
			$return[] = $term;
		}

		return $return;
	}

	function set_price( $post_id = 0, $price = '' ) {
		$post = get_post( $post_id );

		return update_post_meta( $post->ID, 'hotels_price', $price );
	}

	function get_price( $post_id = 0 ) {
		$post = get_post( $post_id );

		return get_post_meta( $post->ID, 'hotels_price', true );
	}

	function display_price( $post_id = 0 ) {
		echo esc_html( $this->get_price( $post_id ) );
	}
}

add_action( 'init', array( 'Hotels_Rooms', 'init' ) );