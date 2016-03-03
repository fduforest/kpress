<?php
//======================================================================
// Page Header Template
//======================================================================

//-----------------------------------------------------
// Set Key
//-----------------------------------------------------
$key = 'themo_page_header';
$i = 1;
$key = 'themo_page_header_'.$i;

//-----------------------------------------------------
// Display On?
//-----------------------------------------------------
$themo_page_ID = $post->ID;

// Support for Woo Pages.
// Sometimes the page id isn't explicit so we have to go and look for it.
$themo_woo_page_ID = themo_return_woo_page_ID();
if($themo_woo_page_ID){
    $themo_page_ID = $themo_woo_page_ID;
}

$show = get_post_meta($themo_page_ID, $key.'_show', true );
$show_header = get_post_meta($themo_page_ID, $key.'_show_header', true );
$page_header_float = get_post_meta($themo_page_ID, $key.'_header_float', true );

// Animation
$themo_enable_animate = get_post_meta($themo_page_ID, $key.'_animate', true );
$themo_animation_style = get_post_meta($themo_page_ID, $key.'_animate_style', true );

// Anchor
if($key > ""){
    $anchor_id_markup = "";
    $anchor_key = sanitize_text_field(get_post_meta($themo_page_ID, $key.'_anchor', true ));
    if($anchor_key > ""){
        $anchor_id_markup = "id='$anchor_key'";
    }
};

// Return Icon Markup
$glyphicon_markup = false;
$glyphicon_markup = themo_do_glyphicons_markup(null,$themo_page_ID,$key,true);


if($page_header_float == ''){
    $page_header_float = "centered";
}

if ($show == 1){ ?>

    <?php
    // Default Header Styling
    $page_subheader_default = '<div class="subheader"></div>';
    $page_subheader_default_show = true; // Show subheader by default
    $page_header_title = "<h1>" . roots_title() . "</h1>";

    $orderby_val = get_query_var('portorder',false);

    // Default Title Text
    $page_header_text = "";
	$orderby_val = get_query_var('portorder',false);


    /* Get Theme Option for Rooms home */
    if ( function_exists( 'ot_get_option' ) ) {
        $rooms_home_link_id = ot_get_option( 'themo_rooms_home_link');
        $rooms_home_link_anchor = ot_get_option( 'themo_rooms_home_link_anchor');
        $room_nav = ot_get_option( 'themo_room_nav');
    }

    if(isset($rooms_home_link_id) && $rooms_home_link_id > ""){
        $rooms_home_link = get_permalink($rooms_home_link_id) ;
    }else {
        /*
            If not avail, check for a page that uses the rooms template file.
            Get the first post id tha uses the rooms template file
        */
        $the_query = new WP_Query(array(
            'post_type'  => 'page',  /* overrides default 'post' */
            'meta_key'   => '_wp_page_template',
            'meta_value' => 'templates/rooms-standard.php',
            'post_status' => 'publish',
            'posts_per_page' => 1
        ));

        // The Loop
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $rooms_home_link = get_permalink() ;
            }
        } else {
            // no posts found
            // If not avail, get the archive link
            $rooms_home_link = get_home_url ();
        }
        /* Restore original Post Data */
        wp_reset_postdata();
    }

    if(isset($rooms_home_link_anchor) && $rooms_home_link_anchor > "") {
        $rooms_home_link = $rooms_home_link.  '#'. sanitize_title_with_dashes($rooms_home_link_anchor);
    }
    $href_open = "<a href='".$rooms_home_link."'>";
    $href_close = "</a>";

    $prev_post = get_adjacent_post(true, '', true,'themo_room_type');
    $next_post = get_adjacent_post(true, '', false,'themo_room_type');

    ?>

    <?php
    //-----------------------------------------------------
    // Header and Subtext
    //-----------------------------------------------------
    if($show_header == 1){ // Show header / subetext?
        $meta_box_heading = get_post_meta($themo_page_ID, $key.'_header', true ); // get heading
        $meta_box_subtext = get_post_meta($themo_page_ID, $key.'_subtext', true ); // get subtext


        $meta_box_float = get_post_meta($themo_page_ID, $key.'_header_float', true ); // get alignment

        $page_header_title = "<h1 class='page-title-h1 ".themo_return_entrance_animation_class($themo_enable_animate,$themo_animation_style,'#'.$key.' .page-title-h1')."'>" . $meta_box_heading. "</h1>"; // Returns Page header title
        $page_header_text = "";
        if($meta_box_subtext > ""){
            $page_header_text = "<h3 class='page-title-h3 ".themo_return_entrance_animation_class($themo_enable_animate,$themo_animation_style,'#'.$key.' .page-title-h3')."'>" . $meta_box_subtext. "</h4>"; // Returns Page header text
        }

        // Button
        $button = false;
        $button2 = false;
        $page_header_button = false;

        $button = themo_do_shortocde_button($themo_page_ID, $key, true);
        $button2 = themo_do_shortocde_button($themo_page_ID, $key, true,false,2);
        if ($button > "" || $button2 > "") {
            $page_header_button = "<div class='page-title-button ".themo_return_entrance_animation_class($themo_enable_animate,$themo_animation_style,'#'.$key.' .page-title-button')."'>".do_shortcode($button).do_shortcode($button2)."</div>";
        }

        ?>


        <?php
        //-----------------------------------------------------
        // Background
        //-----------------------------------------------------
        $background_show = get_post_meta($themo_page_ID, $key.'_show_background', true );

        if($background_show == 1){
            $page_subheader_default_show = false; // Don't show subheader, we'll replace with an image
            $partName = 'background';
            include( locate_template('templates/meta-part-' . $partName . '.php') );
            ?>
            <?php
            //-----------------------------------------------------
            // GET BORDER
            //-----------------------------------------------------
            $partName = 'border';
            include( locate_template('templates/meta-part-' . $partName . '.php') );
            // If there is a anchor link for one pager style, create output
            ?>
            <div <?php echo sanitize_text_field($anchor_id_markup); ?> class="preloader loading">
                <section <?php if($key > ""){echo 'id="'.$key.'"';} ?> class="<?php echo sanitize_text_field($parallax_classes) ; ?>" <?php echo sanitize_text_field($parallax_data) ; ?> >
                    <?php
                    echo '<div class="container">';
                    echo '<div class="room-header">';
                    echo '<div id="themo_room_single" class="page-title '.$page_header_float.'">';
					echo wp_kses_post($glyphicon_markup);
					echo wp_kses_post($page_header_title);
                    echo wp_kses_post($page_header_text);
                    echo wp_kses_post($page_header_button);
                    echo '<div class="p-mob-nav">';
                    if(isset($room_nav) && $room_nav == 'on') {
                        if($prev_post){
                            $prev_post_url = get_permalink($prev_post->ID);
                            echo "<a href='".esc_url_raw(add_query_arg("portorder",$orderby_val,$prev_post_url))."' class='p-mob-prev' rel='prev'><i class='room-nav-icon th-icon th-i-prev'></i></a>";
                        }
                    }
                    echo '<a class="p-mob-back" href="'.$rooms_home_link.'"><i class="room-nav-icon th-icon th-i-gallery"></i></a>';
                    if(isset($room_nav) && $room_nav == 'on') {
                        if($next_post){
                            $next_post_url = get_permalink($next_post->ID);
                            echo "<a href='".esc_url_raw(add_query_arg("portorder",$orderby_val,$next_post_url))."' class='p-mob-next' rel='next'><i class='room-nav-icon th-icon th-i-next'></i></a>";
                        }
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="room-nav">';
                    echo '<a class="room-back" href="'.$rooms_home_link.'"><i class="room-nav-icon th-icon th-i-gallery"></i></a>';
                    if(isset($room_nav) && $room_nav == 'on') {
                        echo '<div class="room-arrows">';
                        if($prev_post){
                            $prev_post_url = get_permalink($prev_post->ID);
                            echo "<a href='".esc_url_raw(add_query_arg("portorder",$orderby_val,$prev_post_url))."' class='room-prev' rel='prev'><i class='room-nav-icon th-icon th-i-prev'></i></a>";
                        }
                        if($next_post){
                            $next_post_url = get_permalink($next_post->ID);
                            echo "<a href='".esc_url_raw(add_query_arg("portorder",$orderby_val,$next_post_url))."' class='room-next' rel='next'><i class='room-nav-icon th-icon th-i-next'></i></a>";
                        }
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    ?>
                </section>
            </div>
            <?php
            //-----------------------------------------------------
            // GET BORDER CLOSE
            //-----------------------------------------------------
            $partName = 'border-close';
            include( locate_template('templates/meta-part-' . $partName . '.php') );
            ?>
            <?php
            // backstretch for mobile support
            if ($background_js > ""){ ?>
                <script>
                    jQuery(document).ready(function($) {
                        "use strict";
                        if (Modernizr.touch) {
                            <?php echo sanitize_text_field($background_js);  ?>
                        }
                    });
                </script>
            <?php } ?>
        <?php }elseif($show_header == 1){
            $page_subheader_default_show = false; // Don't show subheader, we'll replace with an image
            echo wp_kses_post($page_subheader_default);
            ?>
            <?php
            //-----------------------------------------------------
            // GET BORDER
            //-----------------------------------------------------
            $partName = 'border';
            include( locate_template('templates/meta-part-' . $partName . '.php') );
            ?>
            <div class="container">

                <section <?php if($key > ""){echo 'id="'.$key.'"';} ?> class="<?php echo sanitize_text_field($parallax_classes) ; ?>" <?php echo sanitize_text_field($parallax_data) ; ?> >

                        <?php

                        echo '<div class="room-header">';
                        echo '<div id="themo_room_single" class="page-title '.$page_header_float.'">';
                        echo wp_kses_post($page_header_title);
                        echo wp_kses_post($page_header_text);
                        echo wp_kses_post($page_header_button);
                        echo '<div class="p-mob-nav">';
                        if(isset($room_nav) && $room_nav == 'on') {
                            if($prev_post){
                                $prev_post_url = get_permalink($prev_post->ID);
                                echo "<a href='".esc_url_raw(add_query_arg("portorder",$orderby_val,$prev_post_url))."' class='p-mob-prev' rel='prev'><i class='room-nav-icon th-icon th-i-prev'></i></a>";
                            }
                        }
                        echo '<a class="p-mob-back" href="'.$rooms_home_link.'"><i class="room-nav-icon th-icon th-i-gallery"></i></a>';
                        if(isset($room_nav) && $room_nav == 'on') {
                            if($next_post){
                                $next_post_url = get_permalink($next_post->ID);
                                echo "<a href='".esc_url_raw(add_query_arg("portorder",$orderby_val,$next_post_url))."' class='p-mob-next' rel='next'><i class='room-nav-icon th-icon th-i-next'></i></a>";
                            }
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="room-nav">';
                        echo '<a class="room-back" href="'.$rooms_home_link.'"><i class="room-nav-icon th-icon th-i-gallery"></i></a>';
                        if(isset($room_nav) && $room_nav == 'on') {

                            echo '<div class="room-arrows">';
                            if($prev_post){
                                $prev_post_url = get_permalink($prev_post->ID);
                                echo "<a href='".esc_url_raw(add_query_arg("portorder",$orderby_val,$prev_post_url))."' class='room-prev' rel='prev'><i class='room-nav-icon th-icon th-i-prev'></i></a>";
                            }
                            if($next_post){
                                $next_post_url = get_permalink($next_post->ID);
                                echo "<a href='".esc_url_raw(add_query_arg("portorder",$orderby_val,$next_post_url))."' class='room-next' rel='next'><i class='room-nav-icon th-icon th-i-next'></i></a>";
                            }
                            echo '</div>';
                        }
                        echo '</div>';
                        echo '</div>';

                        ?>

                    </section>

            </div>
            <?php
            //-----------------------------------------------------
            // GET BORDER CLOSE
            //-----------------------------------------------------
            $partName = 'border-close';
            include( locate_template('templates/meta-part-' . $partName . '.php') );
            ?>
        <?php }
        // background ?>
    <?php } // Header = on ?>

<?php
// Output subheader if no map or image
    if ($page_subheader_default_show){
        echo wp_kses_post($page_subheader_default);
        ?>
        <?php
        //-----------------------------------------------------
        // GET BORDER
        //-----------------------------------------------------
        $partName = 'border';
        include( locate_template('templates/meta-part-' . $partName . '.php') );
        ?>
        <div class="container">
                <section <?php if($key > ""){echo 'id="'.$key.'"';} ?> class="<?php echo 'page-title ' ; ?>">

                    <?php
                    echo '<div class="room-header">';
                    echo '<div id="themo_room_single" class="page-title centered">';
                    echo '<h1 class="'. themo_return_entrance_animation_class($themo_enable_animate,$themo_animation_style,'#'.$key.'.page-title h1').'">'.roots_title().'</h1>';
                    echo '<div class="p-mob-nav">';
                    if(isset($room_nav) && $room_nav == 'on') {
                        if($prev_post){
                            $prev_post_url = get_permalink($prev_post->ID);
                            echo "<a href='".esc_url_raw(add_query_arg("portorder",$orderby_val,$prev_post_url))."' class='p-mob-prev' rel='prev'><i class='room-nav-icon th-icon th-i-prev'></i></a>";
                        }
                    }
                    echo '<a class="p-mob-back" href="'.$rooms_home_link.'"><i class="room-nav-icon th-icon th-i-gallery"></i></a>';
                    if(isset($room_nav) && $room_nav == 'on') {
                        if($next_post){
                            $next_post_url = get_permalink($next_post->ID);
                            echo "<a href='".esc_url_raw(add_query_arg("portorder",$orderby_val,$next_post_url))."' class='p-mob-next' rel='next'><i class='room-nav-icon th-icon th-i-next'></i></a>";
                        }
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="room-nav">';
                    echo '<a class="room-back" href="'.$rooms_home_link.'"><i class="room-nav-icon th-icon th-i-gallery"></i></a>';
                    if(isset($room_nav) && $room_nav == 'on') {

                        echo '<div class="room-arrows">';
                        if($prev_post){
                            $prev_post_url = get_permalink($prev_post->ID);
                            echo "<a href='".esc_url_raw(add_query_arg("portorder",$orderby_val,$prev_post_url))."' class='room-prev' rel='prev'><i class='room-nav-icon th-icon th-i-prev'></i></a>";
                        }
                        if($next_post){
                            $next_post_url = get_permalink($next_post->ID);
                            echo "<a href='".esc_url_raw(add_query_arg("portorder",$orderby_val,$next_post_url))."' class='room-next' rel='next'><i class='room-nav-icon th-icon th-i-next'></i></a>";
                        }
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                    ?>

                </section>
        </div>
        <?php
        //-----------------------------------------------------
        // GET BORDER CLOSE
        //-----------------------------------------------------
        $partName = 'border-close';
        include( locate_template('templates/meta-part-' . $partName . '.php') );
    }
}elseif($show == ''){
    $page_subheader_default = '<div class="subheader"></div>';
    $page_header_title = the_title( '<h1>', '</h1>', false );
    echo wp_kses_post($page_subheader_default);
    ?>
    <div class="container">
        <div class="row">
            <section class="page-title left">
                <?php echo wp_kses_post($page_header_title) ?>
            </section>
        </div>
    </div>
    <div class="meta-border content-width"></div>
<?php

} // Show = on?>

