/**
 * Footer Social script reveals links if Footer Menu is checked.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

(function($) {
	if ( $(".footer_menu_checkbox").attr("checked") ) {
		$(".footer-menu-reveal").show();
	} else {
		$(".footer-menu-reveal").hide();
	}
	$(".footer_menu_checkbox").change(function() {
		if ( $(".footer_menu_checkbox").attr("checked") ) {
			$(".footer-menu-reveal").show();
		} else {
			$(".footer-menu-reveal").hide();
		}
	});
})(jQuery);