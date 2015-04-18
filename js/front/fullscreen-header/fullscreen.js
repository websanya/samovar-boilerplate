/**
 * Make the header fullscreen if needed.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
 
(function($) {
	if ( $(".samovar-fullscreen-header")[0] && $("body.single")[0] ) {
		$(".entry-header").addClass("samovar-entry-fullscreen").detach().prependTo('.site-inner');
		$(".site-inner").css("margin-top", $(window).height() + 42 );
		$(".entry-header").css("background-image", "url(" + $('.entry-header img').attr('src') + ")");
		$(".entry-header img").detach();
		$(".entry-comments-link").detach();
		$(".samovar-fullscreen-overlay").css("opacity", $(".samovar-fullscreen-overlay").attr("data-opacity"));
	}
})(jQuery);