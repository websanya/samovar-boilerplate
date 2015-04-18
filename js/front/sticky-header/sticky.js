/**
 * Make the header stick on scroll.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
 
(function($) {
	var header_container = $( '.samovar-sticky-header .site-header' );
	
	if ( ! header_container[0] ) {
		return;
	}

	$(window).on( 'scroll', function() {
	
		if ( $(this).scrollTop() > ( header_container.outerHeight() ) ) {
			header_container.addClass( 'scrolled' );
	  } else {
	    header_container.removeClass( 'scrolled' );
	  }
	
	});
})(jQuery);