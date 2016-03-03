<?php
/**
 * List of available shortcodes
 */
 
function su_shortcodes( $shortcode = false ) {
	global $shortcodes;
	$shortcodes = array(
		# basic shortcodes - start
		'basic-shortcodes-open' => array(
			'name' => __( 'Theme Shortcodes', THEMO_TEXT_DOMAIN ),
			'type' => 'opengroup'
		),


/*
==========================================================
Accordion Group
==========================================================
*/
		'accordion_group' => array(
			'name' => 'Accordion Group',
			'type' => 'wrap',
			'atts' => array( ),
			'usage' => 'Content is optional.',
			'content' => '',
			'desc' => __( 'Accordion Group', THEMO_TEXT_DOMAIN ),
			'help' => __( 'Multiple Accordions are grouped with this shortcode.', THEMO_TEXT_DOMAIN ),
		),
		
/*
==========================================================
Accordion
==========================================================
*/
		'accordion' => array(
			'name' => 'Accordion',
			'type' => 'wrap',
			'atts' => array(
					'title' => array(
						'values' => array( ),
						'default' => 'Box Title here',
						'desc' => __( 'Box Title', THEMO_TEXT_DOMAIN ),
					),
					'icon-help' => __( '<strong>Icons:</strong> Use any Glyphicon, Halfling, Social or Filetype. Add the icon name (e.g.: glyphicons-camera, halflings-user, social-facebook) in the appropriate text field below. Find the <a href="http://glyphicons.com/" target="_blank">full list here</a>.', THEMO_TEXT_DOMAIN ),
					'icon' => array(
						'values' => array( ),
						'default' => '',
						'desc' => __( 'Glyphicon', THEMO_TEXT_DOMAIN )
					),
					'icon_halflings' => array(
						'values' => array( ),
						'default' => '',
						'desc' => __( 'Halfling', THEMO_TEXT_DOMAIN )
					),
					'icon_social' => array(
						'values' => array( ),
						'default' => '',
						'desc' => __( 'Social', THEMO_TEXT_DOMAIN )
					),
					'icon_filetype' => array(
						'values' => array( ),
						'default' => '',
						'desc' => __( 'Filetype', THEMO_TEXT_DOMAIN )
					),
			),
			'content' => __( 'Content goes here', THEMO_TEXT_DOMAIN ),
			'textarea' => 'on',
			'desc' => __( 'Collapsible content areas.', THEMO_TEXT_DOMAIN ),
			'help' => __( 'Multiple Accordions should be grouped with the Accordion Group shortcode first.', THEMO_TEXT_DOMAIN ),
		),

 
/*
==========================================================
Alert
==========================================================
*/			
		'alert' => array(
			'name' => 'Alert',
			'type' => 'wrap',
			'atts' => array(
			
				'heading' => array(
					'values' => array( ),
					'default' => 'Alert Heading',
					'desc' => __( 'Alert Heading', THEMO_TEXT_DOMAIN )
				),
				'type' => array(
					'values' => array(
						'alert-success',
						'alert-info',
						'alert-error',
						'alert-danger',
					),
					'default' => 'alert-info',
					'desc' => __( 'Alert Style', THEMO_TEXT_DOMAIN )
				),
				'block' => array(
					'values' => array(
						'true',
						'false'
					),
					'default' => 'false',
					'desc' => __( 'Block Padding', THEMO_TEXT_DOMAIN )
				),
				'close' => array(
					'values' => array(
						'true',
						'false'
					),
					'default' => 'true',
					'desc' => __( 'Close Button', THEMO_TEXT_DOMAIN )
				)
			),
			//'usage' => '[alert type="alert-info" heading="Alert Heading" block="false" close="false"]Content[/alert]',
			'content' => __( 'Content goes here', THEMO_TEXT_DOMAIN ),
			'desc' => __( 'Alert box with optional padding and close button', THEMO_TEXT_DOMAIN )
		),

/*
==========================================================
Blockquote
==========================================================
*/			
		'blockquote' => array(
			'name' => 'Blockquote',
			'type' => 'wrap',
			'atts' => array(
			
				'cite' => array(
					'values' => array( ),
					'default' => 'Cite Title',
					'desc' => __( 'Cite Title', THEMO_TEXT_DOMAIN )
				),
				'name' => array(
					'values' => array( ),
					'default' => 'Cite Name',
					'desc' => __( 'Cite Name', THEMO_TEXT_DOMAIN )
				),
				'align' => array(
					'values' => array(
						'left',
						'right',
					),
					'default' => 'left',
					'desc' => __( 'Blockquote Alignment', THEMO_TEXT_DOMAIN )
				),
				'reverse' => array(
					'values' => array(
						'on',
						'off'
					),
					'default' => 'off',
					'desc' => __( 'Reverse Display', THEMO_TEXT_DOMAIN )
				),
				
			),
			//'usage' => "[blockquote name='R Labelle' cite='Themovation' ]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.[/blockquote]",
			'content' => __( 'Content goes here', THEMO_TEXT_DOMAIN ),
			'desc' => __( 'For quoting blocks of content from another source within your document.', THEMO_TEXT_DOMAIN )
		),		

/*
==========================================================
Theme Buttons
==========================================================
*/			
		'themo_button' => array(
			'name' => 'Button',
			'type' => 'single',
			'atts' => array(
				'text' => array(
					'values' => array( ),
					'default' => 'Button Text',
					'desc' => __( 'Button Text', THEMO_TEXT_DOMAIN )
				),
				'url' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Button Link', THEMO_TEXT_DOMAIN )
				),
				'type' => array(
					'values' => array(
						'standard',
						'ghost',
						'cta',
					),
					'default' => 'standard',
					'desc' => __( 'Button Style', THEMO_TEXT_DOMAIN )
				),
				'target' => array(
					'values' => array(
						'',
						'_self',
						'_blank'
					),
					'default' => '',
					'desc' => __( 'Button Link Target', THEMO_TEXT_DOMAIN )
				),
			),
			'usage' => '',
			'desc' => __( 'Theme Buttons in 3 Styles: Standard, Ghost and Call to Action', THEMO_TEXT_DOMAIN ),
		),		

/*
==========================================================
Bootstrap Button Group
==========================================================
*/
		'button_group' => array(
			'name' => 'Bootstrap | Button Group',
			'type' => 'wrap',
			'atts' => array(
				'variation' => array(
					'values' => array(
						'none',
						'justified',
					),
					'default' => 'none',
					'desc' => __( 'Button Group Justified', THEMO_TEXT_DOMAIN )
				),
			),
			'usage' => 'Optional: Add button shortcode to content field or use the Button Shortcode Generator.',
			'content' => '',
			'desc' => __( 'Button Group', THEMO_TEXT_DOMAIN ),
			'help' => __( 'Group multiple buttons with this shortcode.', THEMO_TEXT_DOMAIN ),
		),
		
/*
==========================================================
Bootstrap Buttons
==========================================================
*/			
		'button' => array(
			'name' => 'Bootstrap | Button',
			'type' => 'wrap',
			'atts' => array(
				'text' => array(
					'values' => array( ),
					'default' => 'Button Text',
					'desc' => __( 'Button Text', THEMO_TEXT_DOMAIN )
				),
				'url' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Button Link', THEMO_TEXT_DOMAIN )
				),
				'size' => array(
					'values' => array(
						'',
						'xs',
						'sm',
						'default',
						'large'
					),
					'default' => 'default',
					'desc' => __( 'Button Size', THEMO_TEXT_DOMAIN )
				),
				'type' => array(
					'values' => array(
						'',
						'primary',
						'default',
						'info',
						'success',
						'danger',
						'warning',
						'inverse'
					),
					'default' => 'default',
					'desc' => __( 'Button Style (color)', THEMO_TEXT_DOMAIN )
				),
				'target' => array(
					'values' => array(
						'',
						'_self',
						'_blank'
					),
					'default' => '',
					'desc' => __( 'Button Link Target', THEMO_TEXT_DOMAIN )
				),
				'dropdown-help' => __( '<strong>Dropdowns:</strong> Use the shortcode generator to add dropdown buttons after you add at least one button.', THEMO_TEXT_DOMAIN ),
				'dropdown' => array(
					'values' => array(
						'no',
						'yes',
					),
					'default' => 'no',
					'desc' => __( 'Is this the top of a button dropdown?', THEMO_TEXT_DOMAIN )
				),
				'split' => array(
					'values' => array(
						'no',
						'yes',
					),
					'default' => 'no',
					'desc' => __( 'Button dropdown split style?', THEMO_TEXT_DOMAIN )
				),
				'icon-help' => __( '<strong>Icons:</strong> Use any Glyphicon, Halfling, Social or Filetype. Add the icon name (e.g.: glyphicons-camera, halflings-user, social-facebook) in the appropriate text field below. Find the <a href="http://glyphicons.com/" target="_blank">full list here</a>.', THEMO_TEXT_DOMAIN ),
				'icon' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Glyphicon', THEMO_TEXT_DOMAIN )
				),
				'icon_halflings' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Halfling', THEMO_TEXT_DOMAIN )
				),
				'icon_social' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Social', THEMO_TEXT_DOMAIN )
				),
				'icon_filetype' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Filetype', THEMO_TEXT_DOMAIN )
				),
			),
			'content' => '',
			'usage' => '',
			'desc' => __( '4 sizes, 7 colors and 500+ icons', THEMO_TEXT_DOMAIN ),
			'help' => __( 'Multiple buttons need to be wrapped in a [button_group][/button_group], single buttons do not.', THEMO_TEXT_DOMAIN ),
		),

/*
==========================================================
Bootstrap Button Dropdown
==========================================================
*/			
		'dropdown' => array(
			'name' => 'Bootstrap | Button Dropdown',
			'type' => 'wrap',
			'atts' => array(
				'link' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Dropdown Link', THEMO_TEXT_DOMAIN )
				),
				'target' => array(
					'values' => array(
						'',
						'_self',
						'_blank'
					),
					'default' => '',
					'desc' => __( 'Dropdown Target', THEMO_TEXT_DOMAIN )
				),
				'divder' => array(
					'values' => array(
						'no',
						'yes',
					),
					'default' => 'no',
					'desc' => __( 'Dropdown Divder', THEMO_TEXT_DOMAIN )
				),
				
				'help' => __( '<strong>Icons:</strong> Use any Glyphicon, Halfling, Social or Filetype. Add the icon name (e.g.: glyphicons-camera, halflings-user, social-facebook) in the appropriate text field below. Find the <a href="http://glyphicons.com/" target="_blank">full list here</a>.', THEMO_TEXT_DOMAIN ),
				'icon' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Glyphicon', THEMO_TEXT_DOMAIN )
				),
				'icon_halflings' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Halfling', THEMO_TEXT_DOMAIN )
				),
				'icon_social' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Social', THEMO_TEXT_DOMAIN )
				),
				'icon_filetype' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Filetype', THEMO_TEXT_DOMAIN )
				),
			),
			'content' => 'Button Text',
			'usage' => "",
			'desc' => __( '4 sizes, 7 colors and 500+ icons', THEMO_TEXT_DOMAIN ),
			'help' => __( 'Used in conjunction with the Button Shortcode and Button Group Shortcode.<br>This Shortcode requires a Button Shortcode AND a Button Group Shortcode Wrapper', THEMO_TEXT_DOMAIN ),
		),

/*
==========================================================
Carousel
==========================================================
*/			
		'slider_gallery' => array(
			'name' => 'Carousel / Slider Gallery',
			'type' => 'single',
			'atts' => array(
				'ids' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Include specific image IDs', THEMO_TEXT_DOMAIN )
				),
				'width' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Carousel width e.g. 600', THEMO_TEXT_DOMAIN )
				),
			),
			'help' => __( 'Simular to the <a href="http://codex.wordpress.org/Gallery_Shortcode" target="_blank">WordPress [gallery] shortcode</a>. Takes image IDs and converts into a carousel gallery.', THEMO_TEXT_DOMAIN ),
			'desc' => __( 'A Carousel of your gallery\'s images', THEMO_TEXT_DOMAIN )
		),

/*
==========================================================
Code
==========================================================
*/	
		'code' => array(
			'name' => 'Code',
			'type' => 'wrap',
			'atts' => array(
				'scroll' => array(
					'values' => array(
						'on',
						'off'
					),
					'default' => 'off',
					'desc' => __( 'Scroll - for large blocks', THEMO_TEXT_DOMAIN )
				),
				'inline' => array(
					'values' => array(
						'on',
						'off'
					),
					'default' => 'off',
					'desc' => __( 'Inline with text', THEMO_TEXT_DOMAIN )
				)
			),
			'content' => __( 'Code goes here', THEMO_TEXT_DOMAIN ),
			'textarea' => 'on',
			'desc' => __( 'Code box for showing code.', THEMO_TEXT_DOMAIN )
		),

/*
==========================================================
Column
==========================================================
*/
		'column' => array(
			'name' => 'Column',
			'type' => 'wrap',
			'atts' => array(
				'span' => array(
					'values' => array(
						'1',
						'2',
						'3',
						'4',
						'5',
						'6',
						'7',
						'8',
						'9',
						'10',
						'11',
						'12'
					),
					'default' => '',
					'desc' => __( 'Column Span.', THEMO_TEXT_DOMAIN )
				)
			),
			'help' => __( 'The column shortcode is a grid of up to 12 columns. If you want two equal columns, create two columns, with a span of 6 each.', THEMO_TEXT_DOMAIN ),
			'content' => __( 'Content goes here', THEMO_TEXT_DOMAIN ),
			'textarea' => 'on',
			'desc' => __( 'Grid systems are used for creating page layouts through a series of rows and columns that house your content.', THEMO_TEXT_DOMAIN )
		),

/*
==========================================================
Column Row
==========================================================
*/
		'row' => array(
			'name' => 'Column Row',
			'type' => 'wrap',
			'atts' => array( ),
			//'usage' => '[row][/row]',
			'content' => '',
			'desc' => __( 'Row', THEMO_TEXT_DOMAIN ),
			'help' => __( 'For each column row, use this row shortcode generator to wrap.', THEMO_TEXT_DOMAIN ),
		),

/*
==========================================================
Dropcaps
==========================================================
*/
		'dropcaps' => array(
			'name' => 'Dropcaps',
			'type' => 'wrap',
			'atts' => array(
				'style' => array(
					'values' => array(
						'box',
						'circle',
						'book',
					),
					'default' => 'book',
					'desc' => __( 'Style', THEMO_TEXT_DOMAIN )
				),
			),
			'content' => '',
		),
		
/*
==========================================================
Google Map
==========================================================
*/			
		'google_map' => array(
			'name' => 'Google Map',
			'type' => 'single',
			'atts' => array(
				'title' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Title', THEMO_TEXT_DOMAIN )
				),
				'location' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Location', THEMO_TEXT_DOMAIN )
				),
				'width' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Width', THEMO_TEXT_DOMAIN )
				),
				'height' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Height', THEMO_TEXT_DOMAIN )
				),
				'zoom' => array(
					'values' => range(1,19),
					'default' => 8,
					'desc' => __( 'Zoom level', THEMO_TEXT_DOMAIN )
				),
				'align' => array(
					'values' => array(
						'default',
						'left',
						'center',
						'right'
					),
					'default' => '',
					'desc' => __( 'Alignment', THEMO_TEXT_DOMAIN )
				),
				'class' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Class', THEMO_TEXT_DOMAIN )
				),
			),
		),




/*
==========================================================
Highlight
==========================================================
*/			
		'highlight' => array(
			'name' => 'Highlight',
			'type' => 'wrap',
			'atts' => array(
				'color' => array(
					'values' => array(
						'primary',
						'info',
						'success',
						'danger',
						'warning',
					),
					'default' => 'default',
					'desc' => __( 'Color', THEMO_TEXT_DOMAIN )
				),
				'class' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Class', THEMO_TEXT_DOMAIN )
				),
				
			),
			'content' => '',
		),


/*
==========================================================
Horizontal Description Group
==========================================================
*/
		'hr_list_wrap' => array(
			'name' => 'Horizontal Description Group',
			'type' => 'wrap',
			'atts' => array( ),
			'content' => '',
			//'desc' => __( 'Make terms and descriptions line up side-by-side.', THEMO_TEXT_DOMAIN ),
			'help' => __( 'Group / wrap a horizontal description list together.', THEMO_TEXT_DOMAIN ),
		),

/*
==========================================================
Horizontal Description List
==========================================================
*/
		'hr_list' => array(
			'name' => 'Horizontal Description List',
			'type' => 'wrap',
			'atts' => array(
					'title' => array(
						'values' => array( ),
						'default' => 'Enter title here',
						'desc' => __( 'List Title', THEMO_TEXT_DOMAIN ),
					),
			),
			'content' => '',
			'textarea' => 'on',
			'help' => __( 'Make terms and descriptions line up side-by-side.', THEMO_TEXT_DOMAIN ),
		),

/*
==========================================================
Icons
==========================================================
*/			
		'glyphicon' => array(
			'name' => 'Icon',
			'type' => 'single',
			'atts' => array(
				/*'type' => array(
					'values' => array(
						'none','glass','music','search','envelope','heart','star','star-empty','user','film','th-large','th','th-list','ok','remove','zoom-in','zoom-out','off','signal','cog','trash','home','file','time','road','download-alt','download','upload','inbox','play-circle','repeat','refresh','list-alt','lock','flag','headphones','volume-off','volume-down','volume-up','qrcode','barcode','tag','tags','book','bookmark','print','camera','icon-font','bold','italic','text-height','text-width','align-left','align-center','align-right','align-justify','list','indent-left','indent-right','facetime-video','picture','pencil','map-marker','adjust','tint','edit','share','check','move','step-backward','fast-backward','backward','play','pause','stop','forward','fast-forward','step-forward','eject','chevron-left','chevron-right','plus-sign','minus-sign','remove-sign','ok-sign','question-sign','info-sign','screenshot','remove-circle','ok-circle','ban-circle','arrow-left','arrow-right','arrow-up','arrow-down','share-alt','resize-full','resize-small','plus','minus','asterisk','exclamation-sign','gift','leaf','fire','eye-open','eye-close','warning-sign','plane','calendar','random','comment','magnet','chevron-up','chevron-down','retweet','shopping-cart','folder-close','folder-open','resize-vertical','resize-horizontal','hdd','bullhorn','bell','certificate','thumbs-up','thumbs-down','hand-right','hand-left','hand-up','hand-down','circle-arrow-right','circle-arrow-left','circle-arrow-up','circle-arrow-down','globe','wrench','tasks','filter','briefcase','fullscreen'
					),
					'default' => 'default',
					'desc' => __( 'Icon', THEMO_TEXT_DOMAIN )
				),*/
				
				'size' => array(
					'values' => array(
						'med-icon',
					),
					'default' => 'med-icon',
					'desc' => __( 'Size', THEMO_TEXT_DOMAIN )
				),
				'wrapper' => array(
					'values' => array(
						'i',
						'button',
						'span',
					),
					'default' => 'i',
					'desc' => __( 'Wrapper', THEMO_TEXT_DOMAIN )
				),
				'style' => array(
					'values' => array(
						'accent',
					),
					'default' => 'accent',
					'desc' => __( 'Style', THEMO_TEXT_DOMAIN )
				),
				'help' => __( '<strong>Icons:</strong> Use any Glyphicon, Halfling, Social or Filetype. Add the icon name (e.g.: glyphicons-camera, halflings-user, social-facebook) in the appropriate text field below. Find the <a href="http://glyphicons.com/" target="_blank">full list here</a>.', THEMO_TEXT_DOMAIN ),
				'icon' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Glyphicon', THEMO_TEXT_DOMAIN )
				),
				'icon_halflings' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Halfling', THEMO_TEXT_DOMAIN )
				),
				'icon_social' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Social', THEMO_TEXT_DOMAIN )
				),
				'icon_filetype' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Filetype', THEMO_TEXT_DOMAIN )
				),
				
			),
			//'usage' => '[icon type="music" size="24"]',
			//'desc' => __( '210 icons', THEMO_TEXT_DOMAIN )
		),

/*
==========================================================
Image shapes
==========================================================
*/
		'shape' => array(
			'name' => 'Image Shapes',
			'type' => 'wrap',
			'atts' => array(
				'src' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Image src', THEMO_TEXT_DOMAIN ),
				),
				'shape' => array(
					'values' => array(
						'thumbnail',
						'rounded',
						'circle'
					),
					'default' => 'img-circle',
					'desc' => __( 'Image shape', THEMO_TEXT_DOMAIN )
				),
				'link' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Image link', THEMO_TEXT_DOMAIN ),
				),
				'target' => array(
					'values' => array(
						'',
						'_self',
						'_blank'
					),
					'default' => '',
					'desc' => __( 'Image link target', THEMO_TEXT_DOMAIN )
				),
				'class' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Image class', THEMO_TEXT_DOMAIN ),
				),
				'alt' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Image alt text', THEMO_TEXT_DOMAIN ),
				),
				'width' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Image width', THEMO_TEXT_DOMAIN ),
				),
				'height' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Image height', THEMO_TEXT_DOMAIN ),
				),
			),
			'content' => '',
			'help' => __( 'Apply mages styles: rounded, circle or thumbnail.', THEMO_TEXT_DOMAIN ),
		),

/*
==========================================================
Jumbotron
==========================================================
*/
		'jumbotron' => array(
			'name' => 'Jumbotron',
			'type' => 'wrap',
			'atts' => array(
					'background' => array(
						'values' => array( ),
						'default' => '#f6f6f6',
						'desc' => __( 'Background color', THEMO_TEXT_DOMAIN ),
						'type' => 'color'
					),
					'color' => array(
						'values' => array( ),
						'default' => '#000',
						'desc' => __( 'Text Color', THEMO_TEXT_DOMAIN ),
						'type' => 'color'
					)
			),
			'content' => __( 'Content goes here', THEMO_TEXT_DOMAIN ),
			'textarea' => 'on',
			'desc' => __( 'A lightweight, flexible component that can optionally extend the entire viewport to showcase key content on your site.', THEMO_TEXT_DOMAIN )
		),

/*
==========================================================
Labels
==========================================================
*/			
		'label' => array(
			'name' => 'Label',
			'type' => 'single',
			'atts' => array(
				'type' => array(
					'values' => array(
						'',
						'primary',
						'default',
						'info',
						'success',
						'danger',
						'warning',
						'inverse'
					),
					'default' => '',
					'desc' => __( 'Label Style (color)', THEMO_TEXT_DOMAIN )
				),
				'text' => array(
					'values' => array( ),
					'default' => 'Label Text',
					'desc' => __( 'Label Text', THEMO_TEXT_DOMAIN )
				),
			),
			'desc' => __( 'Text surrounded by a solid color for importance.', THEMO_TEXT_DOMAIN )
		),				

/*
==========================================================
Lead
==========================================================
*/
		'lead' => array(
			'name' => 'Lead Paragraph',
			'type' => 'wrap',
			'atts' => array(
				'align' => array(
					'values' => array(
						'default',
						'left',
						'center',
						'right'
					),
					'default' => '',
					'desc' => __( 'text alignment', THEMO_TEXT_DOMAIN )
				),
			),
			'content' => __( 'Content goes here', THEMO_TEXT_DOMAIN ),
			'desc' => __( 'Lead Paragraph', THEMO_TEXT_DOMAIN )
		),

/*
==========================================================
Modals
==========================================================
*/
		'modal' => array(
			'name' => 'Modal Window',
			'type' => 'wrap',
			'atts' => array(
				'title' => array(
						'values' => array( ),
						'default' => 'Modal Title here',
						'desc' => __( 'Modal', THEMO_TEXT_DOMAIN ),
					),
				'button_type' => array(
					'values' => array(
						'',
						'primary',
						'default',
						'info',
						'success',
						'danger',
						'warning',
						'inverse'
					),
					'default' => 'default',
					'desc' => __( 'Button Style (color)', THEMO_TEXT_DOMAIN )
				),
				'button_text' => array(
					'values' => array( ),
					'default' => 'Button Text',
					'desc' => __( 'Button Text', THEMO_TEXT_DOMAIN )
				),
				'button_size' => array(
					'values' => array(
						'',
						'xs',
						'sm',
						'default',
						'large'
					),
					'default' => 'default',
					'desc' => __( 'Button Size', THEMO_TEXT_DOMAIN )
				),
				
				'footer' => array(
					'values' => array(
						'on',
						'off'
					),
					'default' => 'off',
					'desc' => __( 'Display footer', THEMO_TEXT_DOMAIN )
				),
				
			),
			'content' => __( 'Content goes here', THEMO_TEXT_DOMAIN ),
			'textarea' => 'on',
			'desc' => __( 'Lead Paragraph', THEMO_TEXT_DOMAIN )
		),		


/*
==========================================================
Page Header
==========================================================
*/			
		'header' => array(
			'name' => 'Page Header',
			'type' => 'single',
			'atts' => array(
				'text' => array(
					'values' => array( ),
					'default' => 'Heading Text',
					'desc' => __( 'Heading Text', THEMO_TEXT_DOMAIN )
				),
				'subtext' => array(
					'values' => array( ),
					'default' => 'Sub Text',
					'desc' => __( 'Sub Text', THEMO_TEXT_DOMAIN ),
				),
			),
			'desc' => __( 'Page Header.', THEMO_TEXT_DOMAIN )
		),

/*
==========================================================
Panel with Heading
==========================================================
*/			
		'panel' => array(
			'name' => 'Panel with Heading',
			'type' => 'wrap',
			'atts' => array(
				'type' => array(
					'values' => array(
						'',
						'primary',
						'default',
						'info',
						'success',
						'danger',
						'warning',
						'inverse'
					),
					'default' => 'default',
					'desc' => __( 'Style (color)', THEMO_TEXT_DOMAIN )
				),
				'heading' => array(
					'values' => array( ),
					'default' => 'Heading',
					'desc' => __( 'Heading', THEMO_TEXT_DOMAIN ),
				),
			),
			'content' => __( 'Content goes here', THEMO_TEXT_DOMAIN ),
			'textarea' => 'on',
			'desc' => __( 'Page Header.', THEMO_TEXT_DOMAIN )
		),


/*
==========================================================
Popovers
==========================================================
*/			
		'popover' => array(
			'name' => 'Popover',
			'type' => 'wrap',
			'atts' => array(
				'popover_title' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Popover Title', THEMO_TEXT_DOMAIN )
				),
				'popover_placement' => array(
					'values' => array(
						'left',
						'top',
						'right',
						'bottom'
					),
					'default' => 'top',
					'desc' => __( 'Popover Placement', THEMO_TEXT_DOMAIN )
				),
				'button_text' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Button Text', THEMO_TEXT_DOMAIN )
				),
				'button_type' => array(
					'values' => array(
						'primary',
						'default',
						'info',
						'success',
						'danger',
						'warning',
						'inverse'
					),
					'default' => '1',
					'desc' => __( 'Button Style (color)', THEMO_TEXT_DOMAIN )
				),
				'button_size' => array(
					'values' => array(
						'',
						'xs',
						'sm',
						'default',
						'large'
					),
					'default' => 'default',
					'desc' => __( 'Button Size', THEMO_TEXT_DOMAIN )
				),
				'link' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Link Url', THEMO_TEXT_DOMAIN )
				),
				'target' => array(
					'values' => array(
						'_self',
						'_blank'
					),
					'default' => '_self',
					'desc' => __( 'Link Target', THEMO_TEXT_DOMAIN )
				),
				
			),
			'content' => __( 'Content goes here', THEMO_TEXT_DOMAIN ),
			'textarea' => 'on',
		),

/*
==========================================================
Popover Text
==========================================================
*/			
		'popover_text' => array(
			'name' => 'Popover Text',
			'type' => 'wrap',
			'atts' => array(
				'popover_title' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Popover Title', THEMO_TEXT_DOMAIN )
				),
				'popover_content' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Popover Text', THEMO_TEXT_DOMAIN ),
					'textarea' => 'on'
				),
				'popover_placement' => array(
					'values' => array(
						'left',
						'top',
						'right',
						'bottom'
					),
					'default' => 'top',
					'desc' => __( 'Popover Placement', THEMO_TEXT_DOMAIN )
				),
				'link' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Link Url', THEMO_TEXT_DOMAIN )
				),
				'target' => array(
					'values' => array(
						'_self',
						'_blank'
					),
					'default' => '_self',
					'desc' => __( 'Link Target', THEMO_TEXT_DOMAIN )
				),
			),
			'content' => __( 'Content goes here', THEMO_TEXT_DOMAIN ),
			'usage' => __( 'The content you enter above will activate the popover text and will be displayed inline.', THEMO_TEXT_DOMAIN ),
		),

/*
==========================================================
Progress Bar
==========================================================
*/			
		'progress' => array(
			'name' => 'Progress Bar',
			'type' => 'single',
			'atts' => array(
				'label' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Label', THEMO_TEXT_DOMAIN )
				),
				'type' => array(
					'values' => array(
						'primary',
						'info',
						'success',
						'warning',
						'danger'
					),
					'default' => 'info',
					'desc' => __( 'Style (color)', THEMO_TEXT_DOMAIN )
				),
				'progress' => array(
					'values' => array( ),
					'default' => '25',
					'desc' => __( 'Percentage of Progress', THEMO_TEXT_DOMAIN )
				),
				'striped' => array(
					'values' => array(
						'on',
						'off'
					),
					'default' => 'off',
					'desc' => __( 'Striped', THEMO_TEXT_DOMAIN )
				),
				'animate' => array(
					'values' => array(
						'on',
						'off'
					),
					'default' => 'off',
					'desc' => __( 'Animate (requires striped)', THEMO_TEXT_DOMAIN )
				),
				
			),
			
		),


/*
==========================================================
Tabs / Wrap
==========================================================
*/			
		'tabwrap' => array(
			'name' => 'Tab Wrap / Group',
			'type' => 'wrap',
			'atts' => array( ),
			'usage' => 'Content is optional, however you can place a [tab][/tab] shortcode in here. We will wrap it for you.',
			'content' => '',
			'help' => __( 'Togglable Tabs need to be wrapped in [tabwrap][/tabwrap] tags. Use this shortcode to output the wrapper tags.', THEMO_TEXT_DOMAIN ),
		),

/*
==========================================================
Tabs / Togglable
==========================================================
*/			
		'tab' => array(
			'name' => 'Tab',
			'type' => 'wrap',
			'atts' => array(
				'title' => array(
					'values' => array( ),
					'default' => 'Tab label goes here',
					'desc' => __( 'Tab Label', THEMO_TEXT_DOMAIN )
				),
			),
			'content' => __( 'Tab content goes here', THEMO_TEXT_DOMAIN ),
			'textarea' => 'on',
		),

/*
==========================================================
Tooltip
===========================================d===============
*/			
		'tooltip' => array(
			'name' => 'Tooltip',
			'type' => 'single',
			'atts' => array(
				'tooltip_text' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Tooltip Text', THEMO_TEXT_DOMAIN )
				),
				'tooltip_placement' => array(
					'values' => array(
						'left',
						'top',
						'right',
						'bottom'
					),
					'default' => 'top',
					'desc' => __( 'Popover Placement', THEMO_TEXT_DOMAIN )
				),
				'button_text' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Button Text', THEMO_TEXT_DOMAIN )
				),
				'button_type' => array(
					'values' => array(
						'primary',
						'default',
						'info',
						'success',
						'danger',
						'warning',
						'inverse'
					),
					'default' => '1',
					'desc' => __( 'Button Style (color)', THEMO_TEXT_DOMAIN )
				),
				'button_size' => array(
					'values' => array(
						'',
						'xs',
						'sm',
						'default',
						'large'
					),
					'default' => 'default',
					'desc' => __( 'Button Size', THEMO_TEXT_DOMAIN )
				),
				'link' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Link Url', THEMO_TEXT_DOMAIN )
				),
				'target' => array(
					'values' => array(
						'_self',
						'_blank'
					),
					'default' => '_self',
					'desc' => __( 'Link Target', THEMO_TEXT_DOMAIN )
				),
				
			),
		),

/*
==========================================================
Tooltip Text
==========================================================
*/			
		'tooltip_text' => array(
			'name' => 'Tooltip Text',
			'type' => 'wrap',
			'atts' => array(
				'tooltip_text' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Tooltip Text', THEMO_TEXT_DOMAIN ),
				),
				'tooltip_placement' => array(
					'values' => array(
						'left',
						'top',
						'right',
						'bottom'
					),
					'default' => 'top',
					'desc' => __( 'Tooltip Placement', THEMO_TEXT_DOMAIN )
				),
				'link' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Link Url', THEMO_TEXT_DOMAIN )
				),
				'target' => array(
					'values' => array(
						'_self',
						'_blank'
					),
					'default' => '_self',
					'desc' => __( 'Link Target', THEMO_TEXT_DOMAIN )
				),
			),
			'content' => __( 'Content goes here', THEMO_TEXT_DOMAIN ),
			'usage' => __( 'The content you enter above will activate the tooltip text and will be displayed inline.', THEMO_TEXT_DOMAIN ),
		),


		/*
==========================================================
Icons
==========================================================
*/
		'video_play' => array(
			'name' => 'Video Lighbox Button',
			'type' => 'single',
			'atts' => array(
				'src' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Video src e.g. http://www.youtube.com/embed/iUchUvXA8mk', THEMO_TEXT_DOMAIN ),
				),
				'width' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Video lighbox width e.g. 1280', THEMO_TEXT_DOMAIN )
				),
				'size' => array(
					'values' => array(
						'xs-icon',
						'sm-icon',
						'med-icon',
						'lrg-icon',
						'xl-icon',
					),
					'default' => 'xl-icon',
					'desc' => __( 'Size', THEMO_TEXT_DOMAIN )
				),
				'help' => __( '<strong>Icons:</strong> Use any Glyphicon, Halfling, Social or Filetype. Add the icon name (e.g.: glyphicons-camera, halflings-user, social-facebook) in the appropriate text field below. Find the <a href="http://glyphicons.com/" target="_blank">full list here</a>.', THEMO_TEXT_DOMAIN ),
				'icon' => array(
					'values' => array( ),
					'default' => 'glyphicons-play-button',
					'desc' => __( 'Glyphicon', THEMO_TEXT_DOMAIN )
				),
				'icon_halflings' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Halfling', THEMO_TEXT_DOMAIN )
				),
				'icon_social' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Social', THEMO_TEXT_DOMAIN )
				),
				'icon_filetype' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Filetype', THEMO_TEXT_DOMAIN )
				),

			),
			//'usage' => '[icon type="music" size="24"]',
			//'desc' => __( '210 icons', THEMO_TEXT_DOMAIN )
		),

/*
==========================================================
End Shortcodes
==========================================================
*/
				'basic-shortcodes-close' => array(
			'type' => 'closegroup'
		),
	);


do_action('add_to_shortcode_generator');
		
	if ( $shortcode )
		return $shortcodes[$shortcode];
	else
		return $shortcodes;
}


/*
==========================================================
Divider
==========================================================
*/
		/*'divider' => array(
			'name' => 'Divider',
			'type' => 'single',
			'atts' => array( ),
			'usage' => '[divider]',
			'content' => '',
			'desc' => __( 'Divider', THEMO_TEXT_DOMAIN )
		),*/
?>