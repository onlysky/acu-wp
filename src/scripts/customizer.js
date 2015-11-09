/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-info .site-title a' ).text( to );
			$( '.site-title a' ).attr('title', to);
			$( '.site-logo' ).attr('alt', to);
		} );

	// Site Description
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	/*Custom Customizer Fields*/
	
	// Site Address
	wp.customize( 'address', function( value ) {
		value.bind( function( to ) {
			$( '.site-info .site-address' ).text( to );
		} );
	} );

	// Site Telephone Number
	wp.customize( 'telephone', function( value ) {
		value.bind( function( to ) {
			
			var tel = to.replace(/\-/g, '.');
			var telhref = 'tel:+' + to.replace(/\-/g, '');

			$( '.site-tel' ).text( tel ).attr('href', telhref);
		} );
	} );

	// Site Alternate Telephone Number
	wp.customize( 'telephone_alt', function( value ) {
		value.bind( function( to ) {
			
			var tel = to.replace(/\-/g, '.');
			var telhref = 'tel:+' + to.replace(/\-/g, '');

			$( '.site-tel-alt' ).text( tel ).attr('href', telhref);
		} );
	} );
	
	// Header text color.
	/*
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	*/

} )( jQuery );
