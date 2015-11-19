/**
 * Make the header fullscreen if needed.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
 
(function($) {
	
	//* Move some stuff for fullscreen header.
	if ( $(".samovar-fullscreen-header")[0] && $("body.single")[0] && ! $("body.single-format-video")[0] ) {
		if ( $(".entry-header img").attr("src") ) {
			$(".entry-header").css("background-image", "url(" + $(".entry-header img").attr("src") + ")");	
		} else {
			return;
		}
		$(".entry-header").addClass("samovar-entry-fullscreen").detach().prependTo(".site-inner");
		$(".entry-header > a").detach();
		$(".entry-header .entry-title").wrap('<div class="fullscreen-header-group"></div>');
		$(".entry-header .entry-meta").detach().appendTo(".fullscreen-header-group");
		$(".entry-header .samovar-fullscreen-button").detach().appendTo(".fullscreen-header-group");
		
		//* Configure the initial margin for fullscreen header on different devices.
		if ( $(window).width() < 769 ) {
			$(".site-inner").css("margin-top", $(window).height() - 84 );
		} else if ( $(window).width() < 961 ) {
			$(".site-inner").css("margin-top", $(window).height() - 126 );
		} else {
			$(".site-inner").css("margin-top", $(window).height() - 84 );
		}
		
		$(".entry-header img").detach();
		$(".entry-comments-link").detach();
		$(".samovar-fullscreen-overlay").css("opacity", $(".samovar-fullscreen-overlay").attr("data-opacity"));
		$(".site-header").addClass("transparent")
	}
	
	//* Event handler for "scroll down" button.
	$(".samovar-fullscreen-arrow").click(function() {
    $('html, body').animate({
        scrollTop: $(".site-inner").offset().top - 280
    }, 1000);
	});
	
})(jQuery);