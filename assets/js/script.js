import './wp/navigation';
import './wp/skip-link-focus-fix';

import './lib/tabs';
import './lib/accordion';

( function( $ ) {
	$( document ).ready( () => {
		$( 'select' ).each( function() {
			if ( $( this ).attr( 'data-allow_null' ) === '1' ) {
				$( this ).prop( 'required', true );
				var option = $( this ).find( 'option[value=""]' ).text().replace( '– ', '' ).replace( ' –', '' );
				$( this ).find( 'option[value=""]' ).text( option );
			}
		} );
	} );
} ( jQuery ) );
