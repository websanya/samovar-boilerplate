/**
 * Some postMessage magic into Customizer.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
!function($){wp.customize("samovar_test_meta_setting",function(t){t.bind(function(t){""==t?$("#samovar-test-meta").hide():($("#samovar-test-meta").show(),$("#samovar-test-meta").text(t))})})}(jQuery);