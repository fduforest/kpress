<?php
/*
Plugin Name: Bellevue Custom Post Types
Plugin URI: http://themovation.com
Description: This is a plugin for the Bellevue theme. It adds the custom post types required to run this theme.
Version: 1.2
Author: Themovation
Author URI: http://themovation.com
Text Domain: BELLEVUE
Domain Path: /lang/
License: GPL2
*/

if (!defined('THEMO_TEXT_DOMAIN')) { define('THEMO_TEXT_DOMAIN', 'BELLEVUE'); }

function bellevue_custom_post_types_load_textdomain() {
    load_plugin_textdomain( THEMO_TEXT_DOMAIN, FALSE, basename( dirname( __FILE__ ) ) . '/lang' );
}

add_action( 'plugins_loaded', 'bellevue_custom_post_types_load_textdomain' );

//-----------------------------------------------------
// themo_rooms_custom_post_type
// Create a Custom Post Type for the Rooms
//-----------------------------------------------------

if ( ! function_exists('themo_rooms_custom_post_type') ) {

// Register Custom Post Type
    function themo_rooms_custom_post_type() {

        $labels = array(
            'name'                => _x( 'Rooms', 'Post Type General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'       => _x( 'Room', 'Post Type Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'           => __( 'Rooms', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'   => __( 'Parent Room:', THEMO_TEXT_DOMAIN ),
            'all_items'           => __( 'All Rooms', THEMO_TEXT_DOMAIN ),
            'view_item'           => __( 'View Room', THEMO_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New Room', THEMO_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New', THEMO_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit Room', THEMO_TEXT_DOMAIN ),
            'update_item'         => __( 'Update Room', THEMO_TEXT_DOMAIN ),
            'search_items'        => __( 'Search Room', THEMO_TEXT_DOMAIN ),
            'not_found'           => __( 'Not found', THEMO_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', THEMO_TEXT_DOMAIN ),
        );

        $custom_slug = 'rooms';
        if ( function_exists( 'ot_get_option' ) ) {
            $custom_slug = ot_get_option( 'themo_rooms_rewrite_slug', 'rooms' );
        }else{
            $custom_slug = 'rooms';
        }
        //$custom_slug = null;
        $rewrite = array(
            'slug'                => $custom_slug,
            'with_front'          => false,
            'pages'               => true,
            'feeds'               => true,
        );
        $args = array(
            'label'               => __( 'themo_rooms', THEMO_TEXT_DOMAIN ),
            'description'         => __( 'Rooms', THEMO_TEXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
            'taxonomies'          => array( 'themo_room_type' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 99,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'rewrite'             => $rewrite,
            'capability_type'     => 'post',
        );
        register_post_type( 'themo_rooms', $args );

    }

// Hook into the 'init' action
    add_action( 'init', 'themo_rooms_custom_post_type', 0 );

}

//-----------------------------------------------------
// themo_Room_type
// Create a Taxonomy for the Rooms
//-----------------------------------------------------

if ( ! function_exists( 'themo_room_type' ) ) {

// Register Custom Taxonomy
    function themo_room_type() {

        $labels = array(
            'name'                       => _x( 'Room Types', 'Taxonomy General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'              => _x( 'Room Type', 'Taxonomy Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'                  => __( 'Room Types', THEMO_TEXT_DOMAIN ),
            'all_items'                  => __( 'All Room Types', THEMO_TEXT_DOMAIN ),
            'parent_item'                => __( 'Parent Room Type', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'          => __( 'Parent Room Type:', THEMO_TEXT_DOMAIN ),
            'new_item_name'              => __( 'New Room Type Name', THEMO_TEXT_DOMAIN ),
            'add_new_item'               => __( 'Add New Room Type', THEMO_TEXT_DOMAIN ),
            'edit_item'                  => __( 'Edit Room Type', THEMO_TEXT_DOMAIN ),
            'update_item'                => __( 'Update Room Type', THEMO_TEXT_DOMAIN ),
            'separate_items_with_commas' => __( 'Separate Room Type with commas', THEMO_TEXT_DOMAIN ),
            'search_items'               => __( 'Search Room Types', THEMO_TEXT_DOMAIN ),
            'add_or_remove_items'        => __( 'Add or remove room type', THEMO_TEXT_DOMAIN ),
            'choose_from_most_used'      => __( 'Choose from the most room types', THEMO_TEXT_DOMAIN ),
            'not_found'                  => __( 'Not Found', THEMO_TEXT_DOMAIN ),
        );
        $rewrite = array(
            'slug'                       => 'room-type',
            'with_front'                 => true,
            'hierarchical'               => false,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );
        register_taxonomy( 'themo_room_type', array( 'themo_rooms' ), $args );

    }

// Hook into the 'init' action
    add_action( 'init', 'themo_room_type', 0 );

}


//-----------------------------------------------------
// themo_accordion_custom_post_type
// Create a Custom Post Type for the Accordion
//-----------------------------------------------------

if ( ! function_exists('themo_accordion_custom_post_type') ) {

// Register Custom Post Type
    function themo_accordion_custom_post_type() {

        $labels = array(
            'name'                => _x( 'Accordions', 'Post Type General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'       => _x( 'Accordion', 'Post Type Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'           => __( 'Accordion', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'   => __( 'Parent Item:', THEMO_TEXT_DOMAIN ),
            'all_items'           => __( 'All Items', THEMO_TEXT_DOMAIN ),
            'view_item'           => __( 'View Item', THEMO_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New Item', THEMO_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New', THEMO_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit Item', THEMO_TEXT_DOMAIN ),
            'update_item'         => __( 'Update Item', THEMO_TEXT_DOMAIN ),
            'search_items'        => __( 'Search Item', THEMO_TEXT_DOMAIN ),
            'not_found'           => __( 'Not found', THEMO_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', THEMO_TEXT_DOMAIN ),
        );
        $args = array(
            'label'               => __( 'themo_accordion', THEMO_TEXT_DOMAIN ),
            'description'         => __( 'Accordion Box', THEMO_TEXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes', ),
            'taxonomies'          => array( 'themo_cpt_group' ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => false,
            'menu_position'       => 99,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'themo_accordion', $args );

    }

// Hook into the 'init' action
    add_action( 'init', 'themo_accordion_custom_post_type', 0 );

}

if ( ! function_exists('themo_brands_custom_post_type') ) {

// Register Custom Post Type
    function themo_brands_custom_post_type() {

        $labels = array(
            'name'                => _x( 'Brands', 'Post Type General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'       => _x( 'Brand', 'Post Type Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'           => __( 'Brand', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'   => __( 'Parent Item:', THEMO_TEXT_DOMAIN ),
            'all_items'           => __( 'All Items', THEMO_TEXT_DOMAIN ),
            'view_item'           => __( 'View Item', THEMO_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New Item', THEMO_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New', THEMO_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit Item', THEMO_TEXT_DOMAIN ),
            'update_item'         => __( 'Update Item', THEMO_TEXT_DOMAIN ),
            'search_items'        => __( 'Search Item', THEMO_TEXT_DOMAIN ),
            'not_found'           => __( 'Not found', THEMO_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', THEMO_TEXT_DOMAIN ),
        );
        $args = array(
            'label'               => __( 'themo_brands', THEMO_TEXT_DOMAIN ),
            'description'         => __( 'Brand', THEMO_TEXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'thumbnail', 'revisions', 'page-attributes', ),
            'taxonomies'          => array( 'themo_cpt_group' ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => false,
            'menu_position'       => 99,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'themo_brands', $args );

    }

// Hook into the 'init' action
    add_action( 'init', 'themo_brands_custom_post_type', 0 );
}


//-----------------------------------------------------
// themo_faq_custom_post_type
// Create a Custom Post Type for the Faq
//-----------------------------------------------------

if ( ! function_exists('themo_faq_custom_post_type') ) {

// Register Custom Post Type
    function themo_faq_custom_post_type() {

        $labels = array(
            'name'                => _x( 'Faqs', 'Post Type General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'       => _x( 'Faq', 'Post Type Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'           => __( 'Faq', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'   => __( 'Parent Item:', THEMO_TEXT_DOMAIN ),
            'all_items'           => __( 'All Items', THEMO_TEXT_DOMAIN ),
            'view_item'           => __( 'View Item', THEMO_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New Item', THEMO_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New', THEMO_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit Item', THEMO_TEXT_DOMAIN ),
            'update_item'         => __( 'Update Item', THEMO_TEXT_DOMAIN ),
            'search_items'        => __( 'Search Item', THEMO_TEXT_DOMAIN ),
            'not_found'           => __( 'Not found', THEMO_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', THEMO_TEXT_DOMAIN ),
        );
        $args = array(
            'label'               => __( 'themo_faq', THEMO_TEXT_DOMAIN ),
            'description'         => __( 'Faq Box', THEMO_TEXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes', ),
            'taxonomies'          => array( 'themo_cpt_group' ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => false,
            'menu_position'       => 99,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'themo_faq', $args );

    }

// Hook into the 'init' action
    add_action( 'init', 'themo_faq_custom_post_type', 0 );

}

//-----------------------------------------------------
// themo_featured_custom_post_type
// Create a Custom Post Type for the featured
//-----------------------------------------------------

if ( ! function_exists('themo_featured_custom_post_type') ) {

// Register Custom Post Type
    function themo_featured_custom_post_type() {

        $labels = array(
            'name'                => _x( 'Featured', 'Post Type General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'       => _x( 'Featured', 'Post Type Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'           => __( 'Featured', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'   => __( 'Parent Item:', THEMO_TEXT_DOMAIN ),
            'all_items'           => __( 'All Items', THEMO_TEXT_DOMAIN ),
            'view_item'           => __( 'View Item', THEMO_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New Item', THEMO_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New', THEMO_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit Item', THEMO_TEXT_DOMAIN ),
            'update_item'         => __( 'Update Item', THEMO_TEXT_DOMAIN ),
            'search_items'        => __( 'Search Item', THEMO_TEXT_DOMAIN ),
            'not_found'           => __( 'Not found', THEMO_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', THEMO_TEXT_DOMAIN ),
        );
        $args = array(
            'label'               => __( 'themo_featured', THEMO_TEXT_DOMAIN ),
            'description'         => __( 'Featured Box', THEMO_TEXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', ),
            'taxonomies'          => array( 'themo_cpt_group' ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => false,
            'menu_position'       => 99,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'themo_featured', $args );

    }

// Hook into the 'init' action
    add_action( 'init', 'themo_featured_custom_post_type', 0 );

}

//-----------------------------------------------------
// themo_pricing_plans_custom_post_type
// Create a Custom Post Type for the Pricing Plans
//-----------------------------------------------------

if ( ! function_exists('themo_pricing_plans_custom_post_type') ) {

// Register Custom Post Type
    function themo_pricing_plans_custom_post_type() {

        $labels = array(
            'name'                => _x( 'Pricing Plans', 'Post Type General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'       => _x( 'Pricing Plan', 'Post Type Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'           => __( 'Pricing Plan', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'   => __( 'Parent Item:', THEMO_TEXT_DOMAIN ),
            'all_items'           => __( 'All Items', THEMO_TEXT_DOMAIN ),
            'view_item'           => __( 'View Item', THEMO_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New Item', THEMO_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New', THEMO_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit Item', THEMO_TEXT_DOMAIN ),
            'update_item'         => __( 'Update Item', THEMO_TEXT_DOMAIN ),
            'search_items'        => __( 'Search Item', THEMO_TEXT_DOMAIN ),
            'not_found'           => __( 'Not found', THEMO_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', THEMO_TEXT_DOMAIN ),
        );
        $args = array(
            'label'               => __( 'themo_pricing_plans', THEMO_TEXT_DOMAIN ),
            'description'         => __( 'Pricing Plan Box', THEMO_TEXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'revisions', 'page-attributes', ),
            'taxonomies'          => array( 'themo_cpt_group' ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => false,
            'menu_position'       => 99,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'themo_pricing_plans', $args );

    }

// Hook into the 'init' action
    add_action( 'init', 'themo_pricing_plans_custom_post_type', 0 );

}

//-----------------------------------------------------
// themo_slider_custom_post_type
// Create a Custom Post Type for the slider
//-----------------------------------------------------

if ( ! function_exists('themo_slider_custom_post_type') ) {

// Register Custom Post Type
    function themo_slider_custom_post_type() {

        $labels = array(
            'name'                => _x( 'Sliders', 'Post Type General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'       => _x( 'Slider', 'Post Type Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'           => __( 'Slider', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'   => __( 'Parent Item:', THEMO_TEXT_DOMAIN ),
            'all_items'           => __( 'All Items', THEMO_TEXT_DOMAIN ),
            'view_item'           => __( 'View Item', THEMO_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New Item', THEMO_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New', THEMO_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit Item', THEMO_TEXT_DOMAIN ),
            'update_item'         => __( 'Update Item', THEMO_TEXT_DOMAIN ),
            'search_items'        => __( 'Search Item', THEMO_TEXT_DOMAIN ),
            'not_found'           => __( 'Not found', THEMO_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', THEMO_TEXT_DOMAIN ),
        );
        $args = array(
            'label'               => __( 'themo_slider', THEMO_TEXT_DOMAIN ),
            'description'         => __( 'Slider Box', THEMO_TEXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', ),
            'taxonomies'          => array( 'themo_cpt_group' ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => false,
            'menu_position'       => 99,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'themo_slider', $args );

    }

// Hook into the 'init' action
    add_action( 'init', 'themo_slider_custom_post_type', 0 );

}

//-----------------------------------------------------
// themo_team_custom_post_type
// Create a Custom Post Type for the Team
//-----------------------------------------------------

if ( ! function_exists('themo_team_custom_post_type') ) {

// Register Custom Post Type
    function themo_team_custom_post_type() {

        $labels = array(
            'name'                => _x( 'Teams', 'Post Type General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'       => _x( 'Team', 'Post Type Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'           => __( 'Team', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'   => __( 'Parent Item:', THEMO_TEXT_DOMAIN ),
            'all_items'           => __( 'All Items', THEMO_TEXT_DOMAIN ),
            'view_item'           => __( 'View Item', THEMO_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New Item', THEMO_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New', THEMO_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit Item', THEMO_TEXT_DOMAIN ),
            'update_item'         => __( 'Update Item', THEMO_TEXT_DOMAIN ),
            'search_items'        => __( 'Search Item', THEMO_TEXT_DOMAIN ),
            'not_found'           => __( 'Not found', THEMO_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', THEMO_TEXT_DOMAIN ),
        );
        $args = array(
            'label'               => __( 'themo_team', THEMO_TEXT_DOMAIN ),
            'description'         => __( 'Team Box', THEMO_TEXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes', 'thumbnail',),
            'taxonomies'          => array( 'themo_cpt_group' ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => false,
            'menu_position'       => 99,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'themo_team', $args );

    }

// Hook into the 'init' action
    add_action( 'init', 'themo_team_custom_post_type', 0 );

}


//-----------------------------------------------------
// themo_testimonials_custom_post_type
// Create a Custom Post Type for the Testimonial
//-----------------------------------------------------

if ( ! function_exists('themo_testimonials_custom_post_type') ) {

// Register Custom Post Type
    function themo_testimonials_custom_post_type() {

        $labels = array(
            'name'                => _x( 'Testimonials', 'Post Type General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'           => __( 'Testimonial', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'   => __( 'Parent Item:', THEMO_TEXT_DOMAIN ),
            'all_items'           => __( 'All Items', THEMO_TEXT_DOMAIN ),
            'view_item'           => __( 'View Item', THEMO_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New Item', THEMO_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New', THEMO_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit Item', THEMO_TEXT_DOMAIN ),
            'update_item'         => __( 'Update Item', THEMO_TEXT_DOMAIN ),
            'search_items'        => __( 'Search Item', THEMO_TEXT_DOMAIN ),
            'not_found'           => __( 'Not found', THEMO_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', THEMO_TEXT_DOMAIN ),
        );
        $args = array(
            'label'               => __( 'themo_testimonials', THEMO_TEXT_DOMAIN ),
            'description'         => __( 'Testimonial Box', THEMO_TEXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'revisions', 'page-attributes', 'thumbnail',),
            'taxonomies'          => array( 'themo_cpt_group' ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => false,
            'menu_position'       => 99,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'themo_testimonials', $args );

    }

// Hook into the 'init' action
    add_action( 'init', 'themo_testimonials_custom_post_type', 0 );

}


//-----------------------------------------------------
// themo_thumb_slider_custom_post_type
// Create a Custom Post Type for the Testimonial
//-----------------------------------------------------

if ( ! function_exists('themo_thumb_slider_custom_post_type') ) {

// Register Custom Post Type
    function themo_thumb_slider_custom_post_type() {

        $labels = array(
            'name'                => _x( 'Thumbnail Sliders', 'Post Type General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'       => _x( 'Thumbnail Slider', 'Post Type Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'           => __( 'Thumbnail Slider', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'   => __( 'Parent Item:', THEMO_TEXT_DOMAIN ),
            'all_items'           => __( 'All Items', THEMO_TEXT_DOMAIN ),
            'view_item'           => __( 'View Item', THEMO_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New Item', THEMO_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New', THEMO_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit Item', THEMO_TEXT_DOMAIN ),
            'update_item'         => __( 'Update Item', THEMO_TEXT_DOMAIN ),
            'search_items'        => __( 'Search Item', THEMO_TEXT_DOMAIN ),
            'not_found'           => __( 'Not found', THEMO_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', THEMO_TEXT_DOMAIN ),
        );
        $args = array(
            'label'               => __( 'themo_thumb_slider', THEMO_TEXT_DOMAIN ),
            'description'         => __( 'Thumbnail Slider Box', THEMO_TEXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'revisions', 'page-attributes', 'thumbnail',),
            'taxonomies'          => array( 'themo_cpt_group' ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => false,
            'menu_position'       => 99,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'themo_thumb_slider', $args );




    }

// Hook into the 'init' action
    add_action( 'init', 'themo_thumb_slider_custom_post_type', 0 );

}


//-----------------------------------------------------
// themo_tour_custom_post_type
// Create a Custom Post Type for the Testimonial
//-----------------------------------------------------

if ( ! function_exists('themo_tour_custom_post_type') ) {

// Register Custom Post Type
    function themo_tour_custom_post_type() {

        $labels = array(
            'name'                => _x( 'Tours', 'Post Type General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'       => _x( 'Tour', 'Post Type Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'           => __( 'Tour', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'   => __( 'Parent Item:', THEMO_TEXT_DOMAIN ),
            'all_items'           => __( 'All Items', THEMO_TEXT_DOMAIN ),
            'view_item'           => __( 'View Item', THEMO_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New Item', THEMO_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New', THEMO_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit Item', THEMO_TEXT_DOMAIN ),
            'update_item'         => __( 'Update Item', THEMO_TEXT_DOMAIN ),
            'search_items'        => __( 'Search Item', THEMO_TEXT_DOMAIN ),
            'not_found'           => __( 'Not found', THEMO_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', THEMO_TEXT_DOMAIN ),
        );
        $args = array(
            'label'               => __( 'themo_tour', THEMO_TEXT_DOMAIN ),
            'description'         => __( 'Tour Box', THEMO_TEXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'revisions', 'page-attributes', 'thumbnail', 'editor'),
            'taxonomies'          => array( 'themo_cpt_group' ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => false,
            'menu_position'       => 99,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'themo_tour', $args );




    }

// Hook into the 'init' action
    add_action( 'init', 'themo_tour_custom_post_type', 0 );

}


//-----------------------------------------------------
// themo_service_block_custom_post_type
// Create a Custom Post Type for the Testimonial
//-----------------------------------------------------

if ( ! function_exists('themo_service_block_custom_post_type') ) {

// Register Custom Post Type
    function themo_service_block_custom_post_type() {

        $labels = array(
            'name'                => _x( 'Service Block & Showcase', 'Post Type General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'       => _x( 'Service Block & Showcase', 'Post Type Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'           => __( 'Service Block & Showcase', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'   => __( 'Parent Item:', THEMO_TEXT_DOMAIN ),
            'all_items'           => __( 'All Items', THEMO_TEXT_DOMAIN ),
            'view_item'           => __( 'View Item', THEMO_TEXT_DOMAIN ),
            'add_new_item'        => __( 'Add New Item', THEMO_TEXT_DOMAIN ),
            'add_new'             => __( 'Add New', THEMO_TEXT_DOMAIN ),
            'edit_item'           => __( 'Edit Item', THEMO_TEXT_DOMAIN ),
            'update_item'         => __( 'Update Item', THEMO_TEXT_DOMAIN ),
            'search_items'        => __( 'Search Item', THEMO_TEXT_DOMAIN ),
            'not_found'           => __( 'Not found', THEMO_TEXT_DOMAIN ),
            'not_found_in_trash'  => __( 'Not found in Trash', THEMO_TEXT_DOMAIN ),
        );
        $args = array(
            'label'               => __( 'themo_service_block', THEMO_TEXT_DOMAIN ),
            'description'         => __( 'Service Block & Showcase Box', THEMO_TEXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'revisions', 'page-attributes', 'editor'),
            'taxonomies'          => array( 'themo_cpt_group' ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => false,
            'menu_position'       => 99,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'themo_service_block', $args );
    }

// Hook into the 'init' action
    add_action( 'init', 'themo_service_block_custom_post_type', 0 );

}

if ( ! function_exists( 'themo_custom_post_type_group' ) ) {

// Register Custom Taxonomy
    function themo_custom_post_type_group() {

        $labels = array(
            'name'                       => _x( 'Groups', 'Taxonomy General Name', THEMO_TEXT_DOMAIN ),
            'singular_name'              => _x( 'Group', 'Taxonomy Singular Name', THEMO_TEXT_DOMAIN ),
            'menu_name'                  => __( 'Groups', THEMO_TEXT_DOMAIN ),
            'all_items'                  => __( 'All Groups', THEMO_TEXT_DOMAIN ),
            'parent_item'                => __( 'Parent Group', THEMO_TEXT_DOMAIN ),
            'parent_item_colon'          => __( 'Parent Group:', THEMO_TEXT_DOMAIN ),
            'new_item_name'              => __( 'New Group Name', THEMO_TEXT_DOMAIN ),
            'add_new_item'               => __( 'Add New Group', THEMO_TEXT_DOMAIN ),
            'edit_item'                  => __( 'Edit Group', THEMO_TEXT_DOMAIN ),
            'update_item'                => __( 'Update Group', THEMO_TEXT_DOMAIN ),
            'separate_items_with_commas' => __( 'Separate group with commas', THEMO_TEXT_DOMAIN ),
            'search_items'               => __( 'Search groups', THEMO_TEXT_DOMAIN ),
            'add_or_remove_items'        => __( 'Add or remove group', THEMO_TEXT_DOMAIN ),
            'choose_from_most_used'      => __( 'Choose from the most used groups', THEMO_TEXT_DOMAIN ),
            'not_found'                  => __( 'Not Found', THEMO_TEXT_DOMAIN ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => false,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => false,
            'show_tagcloud'              => false,
            'rewrite'                    => false,
        );

        register_taxonomy( 'themo_cpt_group', array( 'themo_accordion', 'themo_brands', 'themo_slider', 'themo_faq',
            'themo_pricing_plans', 'themo_team', 'themo_testimonials', 'themo_thumb_slider', 'themo_tour',
            'themo_service_block', 'themo_featured' ), $args );

    }

// Hook into the 'init' action
    add_action( 'init', 'themo_custom_post_type_group', 0 );

}

// Hook for adding admin menus
add_action('admin_menu', 'mt_add_pages');

function mt_add_pages()
{
// Add a new top-level menu (ill-advised):
    add_menu_page(__('Bellevue', THEMO_TEXT_DOMAIN), __('Bellevue', THEMO_TEXT_DOMAIN), 'manage_options', 'themo-top-level-handle', 'themo_toplevel_page','dashicons-welcome-add-page', 99);

    // Add a submenu to the custom top-level menu:
    add_submenu_page('themo-top-level-handle', __('Accordions', THEMO_TEXT_DOMAIN), __('Accordions', THEMO_TEXT_DOMAIN), 'manage_options', 'edit.php?post_type=themo_accordion');
    add_submenu_page('themo-top-level-handle', __('Brands', THEMO_TEXT_DOMAIN), __('Brands', THEMO_TEXT_DOMAIN), 'manage_options', 'edit.php?post_type=themo_brands');
    add_submenu_page('themo-top-level-handle', __('FAQs', THEMO_TEXT_DOMAIN), __('FAQs', THEMO_TEXT_DOMAIN), 'manage_options', 'edit.php?post_type=themo_faq');
    add_submenu_page('themo-top-level-handle', __('Featured', THEMO_TEXT_DOMAIN), __('Featured', THEMO_TEXT_DOMAIN), 'manage_options', 'edit.php?post_type=themo_featured');
    add_submenu_page('themo-top-level-handle', __('Pricing Plans', THEMO_TEXT_DOMAIN), __('Pricing Plans', THEMO_TEXT_DOMAIN), 'manage_options', 'edit.php?post_type=themo_pricing_plans');
    add_submenu_page('themo-top-level-handle', __('Sliders', THEMO_TEXT_DOMAIN), __('Sliders', THEMO_TEXT_DOMAIN), 'manage_options', 'edit.php?post_type=themo_slider');
    add_submenu_page('themo-top-level-handle', __('Teams', THEMO_TEXT_DOMAIN), __('Teams', THEMO_TEXT_DOMAIN), 'manage_options', 'edit.php?post_type=themo_team');
    add_submenu_page('themo-top-level-handle', __('Testimonials', THEMO_TEXT_DOMAIN), __('Testimonials', THEMO_TEXT_DOMAIN), 'manage_options', 'edit.php?post_type=themo_testimonials');
    add_submenu_page('themo-top-level-handle', __('Thumbnail Sliders', THEMO_TEXT_DOMAIN), __('Thumbnail Sliders', THEMO_TEXT_DOMAIN), 'manage_options', 'edit.php?post_type=themo_thumb_slider');
    add_submenu_page('themo-top-level-handle', __('Tours', THEMO_TEXT_DOMAIN), __('Tours', THEMO_TEXT_DOMAIN), 'manage_options', 'edit.php?post_type=themo_tour');
    add_submenu_page('themo-top-level-handle', __('Service Block & Showcase', THEMO_TEXT_DOMAIN), __('Service Block & Showcase', THEMO_TEXT_DOMAIN), 'manage_options', 'edit.php?post_type=themo_service_block');
    add_submenu_page('themo-top-level-handle', __('Groups', THEMO_TEXT_DOMAIN), __('Groups', THEMO_TEXT_DOMAIN), 'manage_options', 'edit-tags.php?taxonomy=themo_cpt_group');
}

// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function themo_toplevel_page() {
    // generate url path to Theme Options.
    $theme_options_url = admin_url( 'themes.php?page=ot-theme-options');

    echo "<h1>" . __( 'Welcome to Bellevue', THEMO_TEXT_DOMAIN ) . "</h1>";

    echo "<h2>" . __( 'Theme Options', THEMO_TEXT_DOMAIN ) . "</h2>";
    echo "<p><a href='$theme_options_url'>Theme Options</a></p>";

    echo "<h2>" . __( 'Add / Manage Content', THEMO_TEXT_DOMAIN ) . "</h2>";
    echo "<ul>";
    echo "<li><a href='".admin_url('edit.php?post_type=themo_accordion')."'>Accordions</a></li>";
    echo "<li><a href='".admin_url('edit.php?post_type=themo_brands')."'>Brands</a></li>";
    echo "<li><a href='".admin_url('edit.php?post_type=themo_faq')."'>FAQs</a></li>";
    echo "<li><a href='".admin_url('edit.php?post_type=themo_featured')."'>Featured</a></li>";
    echo "<li><a href='".admin_url('edit.php?post_type=themo_pricing_plans')."'>Pricing Plans</a></li>";
    echo "<li><a href='".admin_url('edit.php?post_type=themo_slider')."'>Sliders</a></li>";
    echo "<li><a href='".admin_url('edit.php?post_type=themo_team')."'>Teams</a></li>";
    echo "<li><a href='".admin_url('edit.php?post_type=themo_testimonials')."'>Testimonials</a></li>";
    echo "<li><a href='".admin_url('edit.php?post_type=themo_thumb_slider')."'>Thumbnail Sliders</a></li>";
    echo "<li><a href='".admin_url('edit.php?post_type=themo_tour')."'>Tours</a></li>";
    echo "<li><a href='".admin_url('edit.php?post_type=themo_service_block')."'>Service Block & Showcase</a></li>";
    echo "<li><a href='".admin_url('edit-tags.php?taxonomy=themo_cpt_group')."'>Content Groups</a></li>";
    echo "<ul>";

}

// Make sure subpages are shown expanded under their parent page.
function themo_content_group_menu_correction($parent_file) {
    global $current_screen;
    //echo $current_screen->id;
    $taxonomy = $current_screen->taxonomy;
    $post_type = $current_screen->post_type;
    if ($taxonomy == 'themo_cpt_group' || $taxonomy == 'future'){
        $parent_file = 'themo-top-level-handle';
    }
    if ($post_type == 'themo_accordion' || $post_type == 'themo_brands' || $post_type == 'themo_slider' ||
        $post_type == 'themo_faq' || $post_type == 'themo_featured' || $post_type == 'themo_pricing_plans' ||
        $post_type == 'themo_team' || $post_type == 'themo_testimonials' || $post_type == 'themo_thumb_slider'
        || $post_type == 'themo_tour' || $post_type == 'themo_service_block'){
        $parent_file = 'themo-top-level-handle';
    }
    return $parent_file;
}
add_action('parent_file', 'themo_content_group_menu_correction');

// Make Group Column Sortable

function themo_sortable_group_column( $columns ) {

    $columns['taxonomy-themo_cpt_group'] = 'Groups';
    return $columns;
}
add_filter( 'manage_edit-themo_accordion_sortable_columns', 'themo_sortable_group_column' );

// automatically create and apply filters from all taxonomies that apply to all custom post types which use them.
function todo_restrict_manage_posts() {
    global $typenow;
    $args=array();
    $post_types = get_post_types($args);
    if ( in_array($typenow, $post_types) ) {
        $filters = get_object_taxonomies($typenow);
        foreach ($filters as $tax_slug) {
            $tax_obj = get_taxonomy($tax_slug);
            wp_dropdown_categories(array(
                //'show_option_all' => __('Show All '.$tax_obj->label ),
                'show_option_all' => sprintf( __( 'Show All %1$s', THEMO_TEXT_DOMAIN ), $tax_obj->label ),
                'taxonomy' => $tax_slug,
                'name' => $tax_obj->name,
                'orderby' => 'term_order',
                'selected' => isset($_GET[$tax_obj->query_var]) ? $_GET[$tax_obj->query_var] : '',
                'hierarchical' => $tax_obj->hierarchical,
                'show_count' => false,
                'hide_empty' => true
            ));
        }
    }
}
function todo_convert_restrict($query) {
    global $pagenow;
    global $typenow;
    if ($pagenow=='edit.php') {
        $filters = get_object_taxonomies($typenow);
        foreach ($filters as $tax_slug) {
            $var = &$query->query_vars[$tax_slug];
            if ( isset($var) ) {
                $term = get_term_by('id',$var,$tax_slug);
                $var = $term->slug;
            }
        }
    }
    return $query;
}
add_action( 'restrict_manage_posts', 'todo_restrict_manage_posts' );
add_filter('parse_query','todo_convert_restrict');