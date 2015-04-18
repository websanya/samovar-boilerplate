/**
 * Some postMessage magic into Customizer.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
 
//* Change meta text I guess.
(function($){
	
	wp.customize( 'samovar_test_meta_setting', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '#samovar-test-meta' ).hide();
			} else {
				$( '#samovar-test-meta' ).show();
				$( '#samovar-test-meta' ).text( to );
			}
		});
	});
	
})(jQuery);