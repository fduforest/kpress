jQuery( function ( $ ) {
	$( '#masthead .widget_reservations ' ).find( '.widget-title, .widgettitle' ).click( function () {
		$( this )
			.toggleClass( 'toggle-on' )
			.parent( '.widget_reservations' )
				.find( '.contact-form' )
					.slideToggle( 'fast' );
	} );
} );