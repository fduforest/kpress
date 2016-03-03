<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'themo_general',
        'title'       => esc_html__( 'General', 'BELLEVUE' ),
      ),
	  array(
        'id'          => 'themo_color',
        'title'       => esc_html__( 'Colors', 'BELLEVUE' ),
      ),
      array(
        'id'          => 'themo_typography',
        'title'       => esc_html__( 'Typography', 'BELLEVUE' ),
      ),
      array(
        'id'          => 'themo_info',
        'title'       => esc_html__( 'Business Info', 'BELLEVUE' ),
      ),
      array(
        'id'          => 'themo_style_layout',
        'title'       => esc_html__( 'Site Layout', 'BELLEVUE' ),
      ),
      array(
        'id'          => 'themo_footer',
        'title'       => esc_html__( 'Footer', 'BELLEVUE' ),
      ),
      array(
        'id'          => 'themo_slider_config',
        'title'       => 'Slider'
      ),
      array(
        'id'          => 'blog__amp__posts_settings',
        'title'       => esc_html__( 'Header &amp; Sidebar', 'BELLEVUE' ),
      ),
        array(
            'id'          => 'themo_rooms',
            'title'       => esc_html__( 'Rooms', 'BELLEVUE' ),
        ),
        array(
            'id'          => 'themo_top_nav',
            'title'       => esc_html__( 'Top Navigation', 'BELLEVUE' ),
        ),
        array(
            'id'          => 'themo_woo',
            'title'       => esc_html__( 'Shopping Cart / WooCommerce', 'BELLEVUE' ),
        ),
      /*array(
        'id'          => 'meta_stuff',
        'title'       => esc_html__( 'Page Templates', 'BELLEVUE' ),
      )*/
    ),
    'settings'        => array(
      array(
        'id'          => 'themo_logo_height',
        'label'       => esc_html__( 'Logo Height', 'BELLEVUE' ),
        'desc'        => esc_html__( 'The theme will automatically re-size logos to a maximum 100px high. If you would like a specific height, please enter it here. <strong>Please \'Save Changes\' before uploading your logo. This effects the retina support.</strong>', 'BELLEVUE' ),'',
        'std'         => '100',
        'type'        => 'numeric-slider',
        'section'     => 'themo_general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '10,300',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_logo',
        'label'       => esc_html__( 'Logo with Retina Support', 'BELLEVUE' ),
        'desc'        => '<p>' . esc_html__( 'For Retina Support to work, upload a logo that is at least x2 the size of your non-retina logo.', 'BELLEVUE' ) . '</p><p>'. esc_html__( 'E.G.: If you want a 200 x 60 logo, you need to upload it at 400 x 120 for retina support. If you DON\'T want retina support, upload the logo at whatever size you wish.', 'BELLEVUE' ) .'</p>',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'themo_general',
      ),
	  array(
        'id'          => 'themo_logo_transparent_header_enable',
        'label'       => esc_html__( 'Enable Transparent Header Logo', 'BELLEVUE' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'themo_general',
		'desc' 		  => 'This will be used when the header is transparent before the user scrolls. (If nothing is uploaded, the default logo will be used)'
      ),
	  array(
        'id'          => 'themo_logo_transparent_header',
        'label'       => esc_html__( 'Upload Logo for Transparent Header (Retina Support Automatically Included)', 'BELLEVUE' ),
        'desc'        => '<p>' . esc_html__( 'For Retina Support to work, upload a logo that is at least x2 the size of your non-retina logo.', 'BELLEVUE' ) . '</p><p>'. esc_html__( 'E.G.: If you want a 200 x 60 logo, you need to upload it at 400 x 120 for retina support. If you DON\'T want retina support, upload the logo at whatever size you wish.', 'BELLEVUE' ) .'</p>',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'themo_general',
		'condition'   => "themo_logo_transparent_header_enable:is(on)",
      ),
	  array(
        'id'          => 'themo_nav_top_margin',
        'label'       => esc_html__( 'Navigation Top Margin', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Set top margin value for the navigation bar', 'BELLEVUE' ),'',
        'std'         => '19',
        'type'        => 'numeric-slider',
        'section'     => 'themo_general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '0,300',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
            'id'          => 'themo_header_dark_style',
            'label'       => esc_html__( 'Enable Dark Style Header', 'BELLEVUE' ),
            'std'         => 'off',
            'type'        => 'on-off',
            'section'     => 'themo_general',
        ),
        array(
            'id'          => 'themo_enable_rounded_buttons',
            'label'       => esc_html__( 'Enable Rounded Button Style', 'BELLEVUE' ),
            'std'         => 'off',
            'type'        => 'on-off',
            'section'     => 'themo_general',
        ),
      array(
        'id'          => 'themo_custom_css',
        'label'       => esc_html__( 'Custom CSS', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Add custom CSS to your website.', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'css',
        'section'     => 'themo_general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      
	   array(
        'id'          => 'themo_meta_box_builder_meta_box_manual_sort_order',
        'label'       => esc_html__( 'Enable Manual Meta Box Sort Order', 'BELLEVUE' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'themo_general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	   array(
        'id'          => 'themo_meta_box_builder_meta_box_max_quantity',
        'label'       => esc_html__( 'Set the maximum times you can use a metabox on a single page', 'BELLEVUE' ),
        'std'         => '5',
        'type'        => 'numeric-slider',
        'section'     => 'themo_general',
   		'min_max_step'=> '1,20,1',
      ),
	  array(
        'id'          => 'themo_automatic_post_excerpts',
        'label'       => esc_html__( 'Enable Automatic Post Excerpts', 'BELLEVUE' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'themo_general',
		'description' => 'This will create automatic excerpts for your posts, placing a read more link after.',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	   array(
        'id'          => 'themo_smooth_scroll',
        'label'       => esc_html__( 'Smooth Scroll', 'BELLEVUE' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'themo_general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
        array(
            'id'          => 'themo_preloader',
            'label'       => esc_html__( 'Content Preloader', 'BELLEVUE' ),
            'std'         => 'on',
            'type'        => 'on-off',
            'section'     => 'themo_general',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
        ),
	  array(
        'id'          => 'themo_color_primary',
        'label'       => esc_html__( 'Primary Color', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Change this color to alter the primary color globally.', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'themo_color',
      ),

        array(
        'id'          => 'themo_color_accent',
        'label'       => esc_html__( 'Accent Color', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Change this color to alter the accent color globally.', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'themo_color',
      ),
      array(
          'id'          => 'themo_typography_heading',
          'label'       => esc_html__( 'Demo Font Settings', 'BELLEVUE' ),
          'desc'        => 	sprintf(esc_html__('Documentation: %1$s%2$sRustic / Chalet%7$s | %1$s%3$sLakeshore / Cabin%7$s | %1$s%4$sParksville / Countryside%7$s | %1$s%5$sLong Beach / Beachhouse%7$s | %1$s%6$sYaletown / Guesthouse%7$s   ', 'BELLEVUE'), '<a target="_blank" href=http://docs.themovation.com/bellevue/','#fonts_chalet>','#fonts_cabin>','#fonts_countryside>','#fonts_beachhouse>','#fonts_guesthouse>','</a>') ,
          'std'         => '',
          'type'        => 'textblock-titled',
          'section'     => 'themo_typography',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'min_max_step'=> '',
          'class'       => '',
          'condition'   => '',
          'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_body_font',
        'label'       => esc_html__( 'Body Font', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Options for Body Font', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'themo_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_menu_font',
        'label'       => esc_html__( 'Menu Font', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Menu / Navigation Font Options', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'themo_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_headings_font',
        'label'       => esc_html__( 'Headings Font', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Headings Font Options', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'themo_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'themo_google_fonts',
        'label'       => esc_html__( 'Google Fonts', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Add or remove Google Fonts', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'themo_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'themo_google_font_family',
            'label'       => esc_html__( 'Google Font Name / Font Family', 'BELLEVUE' ),
            'desc'        => '<p>'.esc_html__( 'Add or remove Google Fonts. In the "Font Name / Font Family" field add the name of the font or a font family where the fonts are separated with commas.', 'BELLEVUE' ).'</p><p>'.esc_html__( 'Example values:', 'BELLEVUE' ). '\'Open Sans\', sans-serif. <a href="http://www.google.com/fonts" target="_blank">Google Fonts Online</a></p>',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'themo_google_font_url',
            'label'       => esc_html__( 'Google Font URL', 'BELLEVUE' ),
            'desc'        => '<p>'. esc_html__( 'Insert the URL of the font file.', 'BELLEVUE' ). '</p><p>'. esc_html__( 'Example values: ', 'BELLEVUE' ). 'http://fonts.googleapis.com/css?family=Open+Sans:400,600</P>'. esc_html__( 'Find the URL here: ', 'BELLEVUE' ) . '<a href="http://www.google.com/fonts" target="_blank">Google Fonts Online</a>',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
      array(
        'id'          => 'themo_social_media_accounts',
        'label'       => esc_html__( 'Social Media Accounts', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Add your social media account here', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'themo_info',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'themo_social_font_icon',
            'label'       => esc_html__( 'Social Icon', 'BELLEVUE' ),
            'desc'        => esc_html__( 'Use any', 'BELLEVUE' ). ' <a href="http://glyphicons.com/" target="_blank">SOCIAL</a> icon(e.g.: twitter). <a href="http://glyphicons.com/" target="_blank">'.esc_html__( 'Full List Here', 'BELLEVUE' ).'</a>',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'themo_social_url',
            'label'       => esc_html__( 'Social URL', 'BELLEVUE' ),
            'desc'        => esc_html__( 'URL to your social media profile', 'BELLEVUE' ),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
        array(
            'id'          => 'themo_payments_accepted',
            'label'       => esc_html__( 'Payments Accepted', 'BELLEVUE' ),
            'desc'        => esc_html__( 'Add all payment accepted logos here', 'BELLEVUE' ),
            'std'         => '',
            'type'        => 'list-item',
            'section'     => 'themo_info',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'settings'    => array(
                array(
                    'id'          => 'themo_payments_accepted_logo',
                    'label'       => esc_html__( 'Upload Logo', 'BELLEVUE' ),
                    'type'        => 'upload',
                ),
                array(
                    'id'          => 'themo_payment_url',
                    'label'       => esc_html__( 'Payment Merchant URL', 'BELLEVUE' ),
                    'desc'        => esc_html__( 'URL to your merchant provider', 'BELLEVUE' ),
                    'type'        => 'text',
                ),
                array(
                    'id'          => 'themo_payment_url_target',
                    'label'       => esc_html__( 'Link Target', 'BELLEVUE' ),
                    'desc'        => '',
                    'type'        => 'checkbox',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'min_max_step'=> '',
                    'class'       => '',
                    'condition'   => '',
                    'operator'    => 'and',
                    'choices'     => array(
                        array(
                            'value'       => '_blank',
                            'label'       => 'Open Link in New Window',
                        ),
                    )
                )
            )
        ),
        array(
            'id'          => 'themo_contact_icons',
            'label'       => esc_html__( 'Contact Details', 'BELLEVUE' ),
            'desc'        => esc_html__( 'Add your contact details here.', 'BELLEVUE' ),
            'std'         => '',
            'type'        => 'list-item',
            'section'     => 'themo_info',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'operator'    => 'and',
            'settings'    => array(
                array(
                    'id'          => 'themo_contact_icon',
                    'label'       => esc_html__( 'Icon', 'BELLEVUE' ),
                    'desc'        => esc_html__( 'Use any', 'BELLEVUE' ). ' <a href="http://glyphicons.com/" target="_blank">glyphicon</a> (e.g.: social-twitter or glyphicons-leaf). <a href="http://glyphicons.com/" target="_blank">'.esc_html__( 'Full List Here', 'BELLEVUE' ).'</a>',
                    'std'         => '',
                    'type'        => 'text',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'min_max_step'=> '',
                    'class'       => '',
                    'condition'   => '',
                    'operator'    => 'and'
                ),
                array(
                    'id'          => 'themo_contact_icon_url',
                    'label'       => esc_html__( 'Link', 'BELLEVUE' ),
                    'desc'        => esc_html__( 'e.g. mailto:stay@bellevue.com, /contact, http://google.com:', 'BELLEVUE' ),
                    'std'         => '',
                    'type'        => 'text',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'min_max_step'=> '',
                    'class'       => '',
                    'condition'   => '',
                    'operator'    => 'and'
                ),
                array(
                    'id'          => 'themo_contact_icon_url_target',
                    'label'       => esc_html__( 'Link Target', 'BELLEVUE' ),
                    'desc'        => '',
                    'type'        => 'checkbox',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'min_max_step'=> '',
                    'class'       => '',
                    'condition'   => '',
                    'operator'    => 'and',
                    'choices'     => array(
                        array(
                            'value'       => "_blank",
                            'label'       => 'Open Link in New Window',
                        ),
                    )
                ),
            )
        ),
      array(
        'id'          => 'themo_sticky_header',
        'label'       => esc_html__( 'Sticky Header', 'BELLEVUE' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'themo_style_layout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'themo_transparent_header',
        'label'       => esc_html__( 'Transparent Header When Applicable', 'BELLEVUE' ),
        'std'         => 'on',
		'desc' 		  => 'Enable transparent header before the user scrolls. Works with Page Headers and Sliders.',
        'type'        => 'on-off',
        'section'     => 'themo_style_layout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'themo_wide_layout',
        'label'       => esc_html__( 'Full Width Layout', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Full Width vs Boxed Layout.', 'BELLEVUE' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'themo_style_layout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	   
	  array(
        'id'          => 'themo_boxed_layout_background',
        'label'       => esc_html__( 'Boxed Layout Background', 'BELLEVUE' ),
        'desc'        => 	sprintf(esc_html__('%1$s %3$sFor a Full Width Background%4$s : Upload your image and "Save Changes". (Color and custom background settings are optional). %2$s', 'BELLEVUE'), '<p>','</p>', '<strong>','</strong>') .
							sprintf(esc_html__('%1$s %3$sFor a Tiled / Pattern Background%4$s :  Upload your tile, select "Repeat All" from the "background-repeat" select list, "Save Changes". %2$s', 'BELLEVUE'), '<p>','</p>', '<strong>','</strong>').
							sprintf(esc_html__('%1$s %3$sFor a Solid Background Color%4$s :  Select your colour from the color picker, "Save Changes".%2$s', 'BELLEVUE'), '<p>','</p>', '<strong>','</strong>').
							sprintf(esc_html__('%1$s %3$sFor Custom CSS%4$s : Use the CSS options to custom your background (optional), "Save Changes". You may also wish to also "Disable Backstretch JS"%2$s', 'BELLEVUE'), '<p>','</p>', '<strong>','</strong>'),
        'type'        => 'background',
        'section'     => 'themo_style_layout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => 'ot-upload-attachment-id-removed',
        'condition'   => 'themo_wide_layout:is(off)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'themo_backstretch',
        'label'       => esc_html__( 'Backstretch JS', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Required for Full Width Images. Turn this off ONLY if you know what you are doing with the custom CSS opitons under the "Boxed Layout Background" area.', 'BELLEVUE' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'themo_style_layout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'themo_wide_layout:is(off)',
        'operator'    => 'and'
      ),
      
	  array(
        'id'          => 'themo_retina_support',
        'label'       => esc_html__( 'Automatically Create Retina Images', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Enable or disable the feature to automatically create retina images.', 'BELLEVUE' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'themo_style_layout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'id'          => 'themo_footer_copyright',
        'label'       => esc_html__( 'Footer Copyright', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Your copyright statement', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'themo_footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_footer_credit',
        'label'       => esc_html__( 'Footer Credit', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Your footer credit. \'website by...\'', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'themo_footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_footer_widget_switch',
        'label'       => esc_html__( 'Footer Widget', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Enable / disable footer widget area.', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'themo_footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_footer_columns',
        'label'       => esc_html__( 'Footer Columns', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Select the number of columns you would like in your footer.', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'themo_footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'themo_footer_widget_switch:is(on)',
        'operator'    => 'and',
        'choices'     => array(
            array(
                'value'       => '1',
                'label'       => '1 ' . esc_html__( 'Column', 'BELLEVUE' ),
                'src'         => 'OT_THEME_URL/assets/images/themo_footer_1_columns.png'
            ),
            array(
            'value'       => '2',
            'label'       => '2 ' . esc_html__( 'Columns', 'BELLEVUE' ),
            'src'         => 'OT_THEME_URL/assets/images/themo_footer_2_columns.png'
          ),
          array(
            'value'       => '3',
            'label'       => '3 ' . esc_html__( 'Columns', 'BELLEVUE' ),
            'src'         => 'OT_THEME_URL/assets/images/themo_footer_3_columns.png'
          ),
          array(
            'value'       => '4',
            'label'       => '4 ' . esc_html__( 'Columns', 'BELLEVUE' ),
            'src'         => 'OT_THEME_URL/assets/images/themo_footer_4_columns.png'
          )
        )
      ),
        array(
            'id'          => 'themo_footer_logo',
            'label'       => esc_html__( 'Footer Logo', 'BELLEVUE' ),
            'desc'        => '<p>' . esc_html__( 'Upload the logo you would like to use in your footer widget.', 'BELLEVUE' ) . '</p>' ,
            'std'         => '',
            'type'        => 'upload',
            'section'     => 'themo_footer',
        ),


        array(
            'id'          => 'themo_footer_logo_url',
            'label'       => esc_html__( 'Footer Logo Link', 'BELLEVUE' ),
            'desc'        => esc_html__( 'e.g. mailto:stay@bellevue.com, /contact, http://google.com:', 'BELLEVUE' ),
            'type'        => 'text',
            'section'     => 'themo_footer',
        ),
        array(
            'id'          => 'themo_footer_logo_url_target',
            'label'       => esc_html__( 'Link Target', 'BELLEVUE' ),
            'type'        => 'checkbox',
            'operator'    => 'and',
            'section'     => 'themo_footer',
            'choices'     => array(
                array(
                    'value'       => '_blank',
                    'label'       => 'Open Link in New Window',
                ),
            )
        ),

      array(
        'id'          => 'themo_flex_animation',
        'label'       => esc_html__( 'Animation', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Controls the animation type, "fade" or "slide".', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'themo_slider_config',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'fade',
            'label'       => esc_html__( 'Fade', 'BELLEVUE' ),
            'src'         => ''
          ),
          array(
            'value'       => 'slide',
            'label'       => esc_html__( 'Slide', 'BELLEVUE' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'themo_flex_easing',
        'label'       => esc_html__( 'Easing', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Determines the easing method used in jQuery transitions.', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'themo_slider_config',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'swing',
            'label'       => esc_html__( 'Swing', 'BELLEVUE' ),
            'src'         => ''
          ),
          array(
            'value'       => 'linear',
            'label'       => esc_html__( 'Linear', 'BELLEVUE' ),
            'src'         => ''
          )
        )
      ),
      
      array(
        'id'          => 'themo_flex_animationloop',
        'label'       => esc_html__( 'Animation Loop', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Gives the slider a seamless infinite loop.', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'themo_slider_config',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_flex_smoothheight',
        'label'       => esc_html__( 'Smooth Height', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Animate the height of the slider smoothly for slides of varying height.', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'themo_slider_config',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_flex_slideshowspeed',
        'label'       => esc_html__( 'Slideshow Speed', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Set the speed of the slideshow cycling, in milliseconds', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'numeric-slider',
        'section'     => 'themo_slider_config',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '0,15000,100',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_flex_animationspeed',
        'label'       => esc_html__( 'Animation Speed', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Set the speed of animations, in milliseconds', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'numeric-slider',
        'section'     => 'themo_slider_config',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '0,1200,50',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_flex_randomize',
        'label'       => esc_html__( 'Randomize', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Randomize slide order, on load', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'themo_slider_config',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_flex_pauseonhover',
        'label'       => esc_html__( 'Pause On Hover', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Pause the slideshow when hovering over slider, then resume when no longer hovering.', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'themo_slider_config',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_flex_touch',
        'label'       => esc_html__( 'Touch', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Allow touch swipe navigation of the slider on enabled devices', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'themo_slider_config',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'themo_flex_directionnav',
        'label'       => esc_html__( 'Direction Nav', 'BELLEVUE' ),
        'desc'        => esc_html__( 'Create previous/next arrow navigation.', 'BELLEVUE' ),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'themo_slider_config',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
        array(
            'id'          => 'themo_flex_controlNav',
            'label'       => esc_html__( 'Paging Control', 'BELLEVUE' ),
            'desc'        => esc_html__( 'Create navigation for paging control of each slide.', 'BELLEVUE' ),
            'std'         => 'on',
            'type'        => 'on-off',
            'section'     => 'themo_slider_config',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
        ),
      
		
		//-----------------------------------------------------
		// Blog Homepage
		//-----------------------------------------------------
		
	  	/* Tab */
		return_tab_option('themo_blog_index_layout','blog__amp__posts_settings','Blog homepage'),
		
		
		/* Header */
		list($show_header,$header_float) = return_header_options('themo_blog_index_layout','blog__amp__posts_settings'),
		$show_header,$header_float,
		
		/* Sidebar */
		return_sidebar_options('themo_blog_index_layout','blog__amp__posts_settings'),
		
		
		//-----------------------------------------------------
		// Single Post
		//-----------------------------------------------------
		
		/* Tab */
		return_tab_option('themo_single_post_layout','blog__amp__posts_settings','Single Post'),
		
		
		/* Header */
		list($show_header,$header_float) = return_header_options('themo_single_post_layout','blog__amp__posts_settings'),
		$show_header,$header_float,
	   
		/* Sidebar */
		return_sidebar_options('themo_single_post_layout','blog__amp__posts_settings'),

        //-----------------------------------------------------
        // Rooms Index
        //-----------------------------------------------------

        /* Tab
        return_tab_option('themo_rooms_layout','blog__amp__posts_settings','Rooms'), */


        /* Header
        list($show_header,$header_float) = return_header_options('themo_rooms_layout','blog__amp__posts_settings'),
        $show_header,$header_float,*/

        /* Sidebar
        return_sidebar_options('themo_rooms_layout','blog__amp__posts_settings'), */
		
		//-----------------------------------------------------
		// Search, 404, Archive
		//-----------------------------------------------------
		
		/* Tab */
		return_tab_option('themo_woo_layout','blog__amp__posts_settings','Search, Archives, 404, etc..'),
		
		/* Header */
		//list($show_header,$header_float) = return_header_options('themo_default_layout','blog__amp__posts_settings'),
		//$show_header,$header_float,
	   
		/* Sidebar */
		return_sidebar_options('themo_default_layout','blog__amp__posts_settings'),

        array(
            'id'          => 'themo_rooms_home_link',
            'label'       => esc_html__( 'Rooms Home', 'BELLEVUE' ),
            'desc'        => esc_html__( 'Choose your rooms home page.', 'BELLEVUE' ),
            'std'         => '',
            'type'        => 'page_select',
            'section'     => 'themo_rooms',
        ),
        array(
            'id'          => 'themo_rooms_home_link_anchor',
            'label'       => esc_html__( 'Rooms Home Anchor Link', 'BELLEVUE' ),
            'type'        => 'text',
            'section'     => 'themo_rooms',
            'desc'        => esc_html__( 'e.g. #schedule will be appended to home link selected above', 'BELLEVUE' ),
        ),
        array(
            'id'          => 'themo_rooms_rewrite_slug',
            'label'       => esc_html__( 'Rooms Custom Slug', 'BELLEVUE' ),
            'type'        => 'text',
            'section'     => 'themo_rooms',
        ),
        array(
            'id'          => 'themo_room_addthis_toolbox',
            'label'       => esc_html__( 'Room AddThis Toolbox', 'BELLEVUE' ),
            'desc'        => esc_html__( 'Enable AddThis Toolbox for rooms.', 'BELLEVUE' ),
            'std'         => 'on',
            'type'        => 'on-off',
            'section'     => 'themo_rooms',
        ),
        array(
            'id'          => 'themo_room_icons',
            'label'       => esc_html__( 'Room Icons', 'BELLEVUE' ),
            'desc'        => esc_html__( 'Turn Room Icons on or off globally', 'BELLEVUE' ),
            'std'         => 'on',
            'type'        => 'on-off',
            'section'     => 'themo_rooms',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
        ),
        array(
            'id'          => 'themo_room_nav',
            'label'       => esc_html__( 'Room Navigation Control', 'BELLEVUE' ),
            'desc'        => esc_html__( 'Turn prev / next links on or off', 'BELLEVUE' ),
            'std'         => 'on',
            'type'        => 'on-off',
            'section'     => 'themo_rooms',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
        ),

        array(
            'id'          => 'themo_top_nav_switch',
            'label'       => esc_html__( 'Top Navigation', 'BELLEVUE' ),
            'desc'        => esc_html__( 'Enable / disable.', 'BELLEVUE' ),
            'std'         => 'on',
            'type'        => 'on-off',
            'section'     => 'themo_top_nav',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
        ),
        array(
            'id'          => 'themo_top_nav_text',
            'label'       => esc_html__( 'Top Nav Text', 'BELLEVUE' ),
            'type'        => 'text',
            'section'     => 'themo_top_nav',
            'desc'        => esc_html__( 'e.g. Welcome to our B&B', 'BELLEVUE' ),
            'condition'   => "themo_top_nav_switch:is(on)",
        ),

        array(
            'id'          => 'themo_top_nav_icon_blocks',
            'label'       => esc_html__( 'Top Nav Icon Blocks', 'BELLEVUE' ),
            'desc'        => esc_html__( 'Add your top navigation icons here.', 'BELLEVUE' ),
            'std'         => '',
            'type'        => 'list-item',
            'section'     => 'themo_top_nav',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => "themo_top_nav_switch:is(on)",
            'operator'    => 'and',
            'settings'    => array(
                array(
                    'id'          => 'themo_top_nav_icon',
                    'label'       => esc_html__( 'Icon', 'BELLEVUE' ),
                    'desc'        => esc_html__( 'Use any', 'BELLEVUE' ). ' <a href="http://glyphicons.com/" target="_blank">glyphicon</a> (e.g.: social-twitter or glyphicons-leaf). <a href="http://glyphicons.com/" target="_blank">'.esc_html__( 'Full List Here', 'BELLEVUE' ).'</a>',
                    'std'         => '',
                    'type'        => 'text',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'min_max_step'=> '',
                    'class'       => '',
                    'condition'   => '',
                    'operator'    => 'and'
                ),
                array(
                    'id'          => 'themo_top_nav_icon_url',
                    'label'       => esc_html__( 'Link', 'BELLEVUE' ),
                    'desc'        => esc_html__( 'e.g. mailto:stay@bellevue.com, /contact, http://google.com:', 'BELLEVUE' ),
                    'std'         => '',
                    'type'        => 'text',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'min_max_step'=> '',
                    'class'       => '',
                    'condition'   => '',
                    'operator'    => 'and'
                ),
                array(
                    'id'          => 'themo_top_nav_icon_url_target',
                    'label'       => esc_html__( 'Link Target', 'BELLEVUE' ),
                    'desc'        => '',
                    'type'        => 'checkbox',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'min_max_step'=> '',
                    'class'       => '',
                    'condition'   => '',
                    'operator'    => 'and',
                    'choices'     => array(
                        array(
                            'value'       => '_blank',
                            'label'       => 'Open Link in New Window',
                        ),
                    )
                )
            )
        ),
        /*array(
            'id'          => 'themo_woo_header_switch',
            'label'       => __( 'Cart indicator in header', 'BELLEVUE' ),
            //'desc'        => __( 'Show / Hide.', 'BELLEVUE' ),
            'std'         => 'on',
            'type'        => 'on-off',
            'section'     => 'themo_woo',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
        ),*/
        /*array(
            'id'          => 'themo_woo_header_switch',
            'label'       => esc_html__( 'Header', 'BELLEVUE' ),
            'desc'        => __( 'Show / Hide header for woo categories, tags, taxonomies', 'BELLEVUE' ),
            'std'         => 'on',
            'type'        => 'on-off',
            'section'     => 'themo_woo',
        ),*/
        array(
            'id'          => 'themo_woo_show_cart_icon',
            'label'       => esc_html__( 'Show Cart Icon', 'BELLEVUE' ),
            'desc'        => __( 'Show / Hide shopping cart icon', 'BELLEVUE' ),
            'std'         => 'on',
            'type'        => 'on-off',
            'section'     => 'themo_woo',
        ),
        array(
            'id'          => 'themo_woo_cart_icon',
            'label'       => esc_html__( 'Cart Icon', 'BELLEVUE' ),
            'desc'        => esc_html__( 'Choose your shopping cart icon', 'BELLEVUE' ),
            'std'         => '',
            'type'        => 'select',
            'section'     => 'themo_woo',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => "themo_woo_show_cart_icon:is(on)",
            'operator'    => 'and',
            'choices'     => array(
                array(
                    'value'       => 'th-i-cart',
                    'label'       => esc_html__( 'Bag', 'BELLEVUE' ),
                    'src'         => ''
                ),
                array(
                    'value'       => 'th-i-cart2',
                    'label'       => esc_html__( 'Cart', 'BELLEVUE' ),
                    'src'         => ''
                ),
                array(
                    'value'       => 'th-i-cart3',
                    'label'       => esc_html__( 'Cart 2', 'BELLEVUE' ),
                    'src'         => ''
                ),
                array(
                    'value'       => 'th-i-card',
                    'label'       => esc_html__( 'Card', 'BELLEVUE' ),
                    'src'         => ''
                ),
                array(
                    'value'       => 'th-i-card2',
                    'label'       => esc_html__( 'Card 2', 'BELLEVUE' ),
                    'src'         => ''
                ),

            )
        ),
    array(
        'id'          => "themo_woo_header_float",
        'label'       => esc_html__( 'Align Header', 'BELLEVUE' ),
        'std'         => 'left',
        'type'        => 'radio-image',
        'class'       => 'meta-child',
        'condition'   => "themo_woo_show_header:is(on)",
        'section'     => 'themo_woo',
        'choices'     => array(
            array(
                'value'       => 'left',
                'label'       => esc_html__( 'Left', 'BELLEVUE' ),
                'src'         => 'OT_THEME_URL/assets/images/header_left.png'
            ),
            array(
                'value'       => 'centered',
                'label'       => esc_html__( 'Center', 'BELLEVUE' ),
                'src'         => 'OT_THEME_URL/assets/images/header_center.png'
            ),
            array(
                'value'       => 'right',
                'label'       => esc_html__( 'Right', 'BELLEVUE' ),
                'src'         => 'OT_THEME_URL/assets/images/header_right.png'
            )
        )
    ),
        array(
            'id'          => 'themo_woo_sidebar',
            'label'       => esc_html__( 'Sidebar Layout', 'BELLEVUE' ),
            'desc'        => '',
            'std'         => 'right',
            'type'        => 'radio-image',
            'section'     => 'themo_woo',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'choices'     => array(
                array(
                    'value'       => 'left',
                    'label'       => esc_html__( 'Left Sidebar', 'BELLEVUE' ),
                    'src'         => 'OT_THEME_URL/assets/images/side_bar_left.png'
                ),
                array(
                    'value'       => 'full',
                    'label'       => esc_html__( 'Full Width', 'BELLEVUE' ),
                    'src'         => 'OT_THEME_URL/assets/images/side_bar_none.png'
                ),
                array(
                    'value'       => 'right',
                    'label'       => esc_html__( 'Right Sidebar', 'BELLEVUE' ),
                    'label'       => esc_html__( 'Right Sidebar', 'BELLEVUE' ),
                    'src'         => 'OT_THEME_URL/assets/images/side_bar_right.png'
                )
            )
        )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}


//-----------------------------------------------------
// Tab
//-----------------------------------------------------
function return_tab_option($key,$section,$name){

$tab = array(
        'id'          => $key.'_tab',
        'label'       => $name,
        'desc'        => '',
        'std'         => '',
        'type'        => 'tab',
        'section'     => $section,
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      );
return $tab;
}

//-----------------------------------------------------
// Header Options
//-----------------------------------------------------
function return_header_options($key,$section ){

$show_header = array(
				'id'          => $key.'_show_header',
				'label'       => esc_html__( 'Header', 'BELLEVUE' ),
				'std'         => 'off',
				'type'        => 'on-off',
				'section'     => $section,
			  );
$header_float = array(
				'id'          => $key."_header_float",
				'label'       => esc_html__( 'Align Header', 'BELLEVUE' ),
				'std'         => 'left',
				'type'        => 'radio-image',
				'class'       => 'meta-child',
				'condition'   => $key."_show_header:is(on)",
				'section'     => $section,	
				'choices'     => array( 
					  array(
						'value'       => 'left',
						'label'       => esc_html__( 'Left', 'BELLEVUE' ),
						'src'         => 'OT_THEME_URL/assets/images/header_left.png'
					  ),
					  array(
						'value'       => 'centered',
						'label'       => esc_html__( 'Center', 'BELLEVUE' ),
						'src'         => 'OT_THEME_URL/assets/images/header_center.png'
					  ),
					  array(
						'value'       => 'right',
						'label'       => esc_html__( 'Right', 'BELLEVUE' ),
						'src'         => 'OT_THEME_URL/assets/images/header_right.png'
					  )
					)
				);
return array($show_header,$header_float);
}

//-----------------------------------------------------
// Sidebar Options
//-----------------------------------------------------
function return_sidebar_options($key,$section ){

$sidebar_options = array(
        'id'          => $key.'_sidebar',
        'label'       => esc_html__( 'Sidebar Layout', 'BELLEVUE' ),
        'desc'        => '',
        'std'         => 'right',
        'type'        => 'radio-image',
        'section'     => $section,
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'left',
            'label'       => esc_html__( 'Left Sidebar', 'BELLEVUE' ),
            'src'         => 'OT_THEME_URL/assets/images/side_bar_left.png'
          ),
          array(
            'value'       => 'full',
            'label'       => esc_html__( 'Full Width', 'BELLEVUE' ),
            'src'         => 'OT_THEME_URL/assets/images/side_bar_none.png'
          ),
          array(
            'value'       => 'right',
            'label'       => esc_html__( 'Right Sidebar', 'BELLEVUE' ),
            'label'       => esc_html__( 'Right Sidebar', 'BELLEVUE' ),
            'src'         => 'OT_THEME_URL/assets/images/side_bar_right.png'
          )
        )
      );
return $sidebar_options;
}