/**
 * Establishing baseline for images, iframes & twitter embeds.
 *
 * @uses keeptherhythm.js (http://www.gayadesign.com/diy/keep-the-rhythm-vertical-rhythm-on-objects-having-dynamic-heights)
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
 
// @codekit-prepend "jquery.keeptherhythm.js";

(function($) {
	setTimeout(function() {
		$("img").keepTheRhythm({ baseLine: 14 });
		$("iframe").keepTheRhythm({ baseLine: 14, spacing: "margin" });
		$(".wp-video").keepTheRhythm({ baseLine: 14 });
	}, 500);
	$("iframe").parent('p').addClass("iframe-container");
	setTimeout(function() {
		$("div[data-twttr-id]").keepTheRhythm({ baseLine: 14 });
		$(".twitter-tweet").keepTheRhythm({ baseLine: 14 });
		$("#disqus_thread").keepTheRhythm({ baseLine: 14 });
	}, 2500);
	setTimeout(function() {
		$("iframe.twitter-tweet-rendered + p").remove();
	}, 1750);
})(jQuery);