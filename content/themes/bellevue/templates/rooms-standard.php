<?php
/*
Template Name: Rooms - Standard
Template for the rooms index page. So far we have 1 layout - standard.
*/
global $post;

include( locate_template( 'templates/page-layout.php' ) );

echo '<div class="inner-container">';

include( locate_template( 'templates/meta-slider-flex.php' ) );
include( locate_template( 'templates/page-header.php' ) ); // Page Header Template

//-----------------------------------------------------
// OPEN | OUTER Container + Row
//-----------------------------------------------------
echo wp_kses_post($outer_container_open) . wp_kses_post($outer_row_open); // Outer Tag Open

//-----------------------------------------------------
// OPEN | Wrapper Class - Support for sidebar
//-----------------------------------------------------
echo wp_kses_post($main_class_open);

//-----------------------------------------------------
// OPEN | Section + INNER Container
//-----------------------------------------------------

// Set Image Size
$image_size = 'themo_rooms_standard';

$key = 'rooms_content';

echo '<section id="'.$key.'" class="rooms">';
echo wp_kses_post($inner_container_open);

//-----------------------------------------------------
// LOOP
//-----------------------------------------------------

// args
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type' => 'themo_rooms',
    'post_status' => 'publish',
    'paged' => $paged,
);


    // Check for Options
    if ( function_exists( 'ot_get_option' ) ) {
        $filter_bar = get_post_meta($post->ID, 'themo_rooms_filter_bar');
        $filter_by_room_type = get_post_meta($post->ID, 'themo_filter_by_type');
        $rooms_per_page = get_post_meta($post->ID, 'themo_rooms_per_page');
        $rooms_columns = get_post_meta($post->ID, 'themo_cols_per_page');
        $rooms_order = get_post_meta($post->ID, 'themo_orderby');

        if(isset($filter_by_room_type[0]) && $filter_by_room_type[0] == 1) {
            $filter_room_type_ids = get_post_meta($post->ID, 'themo_filter_room_type_ids');
        }
    }

    // Columns
    if(isset($rooms_columns) && is_array($rooms_columns)) {
        switch ($rooms_columns[0]) {
            case 4:
                $col_item_class = "col-lg-3 col-md-3 col-sm-6";
                $col_row_class = "five-columns";
                break;
            case 5:
                $col_item_class = "col-lg-2 col-md-2 col-sm-6";
                $col_row_class = "five-columns";
                break;
            default:
                $col_item_class = "col-lg-4 col-md-4 col-sm-6";
                $col_row_class = "three-columns";
        }
    }

    // Custom Post Per Page
    if(isset($rooms_per_page[0]) && $rooms_per_page[0] > 0) {
        $args = array_merge($args, array( 'showposts' => $rooms_per_page[0]));
    }


    // If Term ID's are specified
    if (isset($filter_room_type_ids) && is_array($filter_room_type_ids) && !empty($filter_room_type_ids)) {

        $termIDs = explode(',', $filter_room_type_ids[0]);

        $args = array_merge($args, array('tax_query' => array(

            array(
                'taxonomy' => 'themo_room_type',
                'field' => 'id',
                'terms' => $termIDs,
                'include_children' => true,
                'operator' => 'IN',
            ))));
    }



    //Order
    if(isset($rooms_order) && is_array($rooms_order)) {
        if($rooms_order[0] == 'menu_order'){
            global $orderby_menu;
            $orderby_menu = true;
            $args = array_merge($args, array( 'orderby' => $rooms_order[0]));
            $args = array_merge($args, array( 'order' => 'ASC'));
        }
    }

    // WP Query
    $loop = new WP_Query( $args );

    //-----------------------------------------------------
    // Build Filter Navigation
    // Get all room types for the posts on this page.
    //-----------------------------------------------------
    if(isset($filter_bar[0]) && $filter_bar[0] == 1) {

        $room_type_terms = array();

        while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php
            $terms = get_the_terms($post->ID, 'themo_room_type');

            if ($terms && !is_wp_error($terms)) :

                foreach ($terms as $term) {
                    $room_type_terms[$term->slug] = $term->slug;
                    $room_type_terms[$term->slug] = $term->name;

                }
            endif;

        endwhile;

        // Sort ascending by key.
        ksort($room_type_terms); // SORT / or krsort() for reverse order

        // Loop though room types and build navigation for filtering.
        $room_type_links  = false;
        foreach ($room_type_terms as $room_type_slug => $room_type_name) {
            $room_type_links .= "<a href='#' data-filter='#".$key." .p-" . $room_type_slug . "'>" . $room_type_name . "</a>";
        }

        echo '<div id="filters" class="rooms-filters">';
        echo '<span>'. esc_html__('Sort:', 'BELLEVUE') . '</span><a href="#" data-filter="*" class="current">All</a>'. $room_type_links;
        echo '</div>';

    }
    ?>


    <?php
    //-----------------------------------------------------
    // Output Rooms Index.
    //-----------------------------------------------------

    echo '<div id="rooms-row" class="rooms-row row '.$key .' '. $col_row_class.'">';
		if (!$loop->have_posts()) {
            echo '<div class="alert">';
            esc_html_e('Sorry, no results were found.', 'BELLEVUE');
            echo '</div>';
            get_search_form();
        }
            
		while ($loop->have_posts()){
            $loop->the_post();
		    $format = get_post_format();
            if ( false === $format ) {
                $format = '';
            }

            // Get Room Type Terms for each post and include them as a class.
            $terms = get_the_terms( $post->ID, 'themo_room_type' );
            $room_type_classes = "";

            if ( $terms && ! is_wp_error( $terms ) ) {
                $room_type_slugs = array();
                foreach ($terms as $term) {
                    $room_type_slugs[] = "p-".$term->slug;
                }
                $room_type_classes = join(" ", $room_type_slugs);
            }
            echo '<div id=post-'."$post->ID".' class="'. implode(' ',get_post_class('themo_rooms type-themo_rooms rooms-item item '. $col_item_class . ' '. $room_type_classes)).'">';

            get_template_part('templates/rooms', $format);

			echo '</div><!-- /.col-md -->';
         }
    echo '</div><!-- /.row -->'
    ?>

    
    <div class="row">
		<?php if ($loop->max_num_pages > 1) : ?>
            <nav class="post-nav">
                <ul class="pager">
                    <li class="previous"><?php next_posts_link(esc_html__('&larr; Previous', 'BELLEVUE'), $loop->max_num_pages); ?></li>
                    <li class="next"><?php previous_posts_link(esc_html__('Next &rarr;', 'BELLEVUE'), $loop->max_num_pages); ?></li>
                </ul>
            </nav>
        <?php endif; ?>
	</div>
    <?php wp_reset_postdata() ?>
	<?php
	//-----------------------------------------------------
	// CLOSE | Section + INNER Container
	//----------------------------------------------------- ?>
	<?php echo wp_kses_post($inner_container_close);?>
	</section>

	<?php 
    //-----------------------------------------------------
	// CLOSE | Main Class
	//-----------------------------------------------------
    echo wp_kses_post($main_class_close); ?>
    
    <?php
    //-----------------------------------------------------
	// INCLUDE | Sidebar
	//-----------------------------------------------------
    include themo_sidebar_path(); ?>
    
    <?php
	//-----------------------------------------------------
	// CLOSE | OUTER Container + Row
	//----------------------------------------------------- 
    echo wp_kses_post($outer_container_close) . wp_kses_post($outer_row_close); // Outer Tag Close ?>
</div><!-- /.inner-container -->