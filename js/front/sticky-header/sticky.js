/**
 * Make the header stick on scroll.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

//* Make the header stick on scroll.
(function($) {
	var header_container = $( '.samovar-sticky-header .site-header' );
	
	if ( ! header_container[0] ) {
		return;
	}

	if ( $(window).width() < 961 ) {
		return;
	}

	$(window).on( 'scroll', function() {
	
		if ( $(this).scrollTop() > ( header_container.outerHeight() - 50 ) ) {
			header_container.addClass( 'scrolled' );
			if ( $("body.samovar-fullscreen-header")[0] ) {
				header_container.removeClass( 'transparent' );
				$(".site-inner").css("margin-top", $(window).height() + 42 );
			}
	  } else {
	    header_container.removeClass( 'scrolled' );
	    if ( $("body.samovar-fullscreen-header")[0] ) {
		    header_container.addClass( 'transparent' );
		    $(".site-inner").css("margin-top", $(window).height() - 84 );
	    }
	  }
	
	});
})(jQuery);

//* Make scroll to top button.
(function($){
	$(".scroll-top-button").css("opacity", 0);
	$(window).on( 'scroll', function() {
		if ( $(this).scrollTop() > 150 ) {
			$(".scroll-top-button").css("opacity", 1);
		} else {
			$(".scroll-top-button").css("opacity", 0);
		}
	});
	$(".scroll-top-button").click(function() {
    $('html, body').animate({
        scrollTop: 0
    }, 1000);
	});
})(jQuery);