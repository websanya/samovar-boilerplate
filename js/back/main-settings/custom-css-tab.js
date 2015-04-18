/**
 * Add Tab Key for Custom CSS Textarea in Theme Settings.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

jQuery(document).delegate( '.admin-custom-css', 'keydown', function(e) {
  var keyCode = e.keyCode || e.which;

	//* Check if Tab key
  if (keyCode == 9) {
    e.preventDefault();
    var start = jQuery(this).get(0).selectionStart;
    var end = jQuery(this).get(0).selectionEnd;

    //* Set textarea value to: text before caret + tab + text after caret
    jQuery(this).val(jQuery(this).val().substring(0, start)
      + " " + " "
      + jQuery(this).val().substring(end));

    //* Put caret at right position again
    jQuery(this).get(0).selectionStart =
    jQuery(this).get(0).selectionEnd = start + 2;
  }
} );