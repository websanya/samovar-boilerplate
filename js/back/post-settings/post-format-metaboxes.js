/**
 * Reveal Post Edit Metaboxes for various formats.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

(function($){
	
	//* Hide all the boxes by default.
	$("#samovar_link_post_format_box").hide();
	$("#samovar_quote_post_format_box").hide();
	$("#samovar_audio_post_format_box").hide();
	$("#samovar_video_post_format_box").hide();
	
	//* Show the one if selected by default.
	if ( $("#post-format-audio").attr("checked") ) {
		$("#samovar_audio_post_format_box").show();
	} else if ( $("#post-format-video").attr("checked") ) {
		$("#samovar_video_post_format_box").show();
	} else if ( $("#post-format-link").attr("checked") ) {
		$("#samovar_link_post_format_box").show();
	} else if ( $("#post-format-quote").attr("checked") ) {
		$("#samovar_quote_post_format_box").show();
	}
	
	//* Show the one if selected while editing.
	$("#post-formats-select input[type=radio]").change(function() {
		if ( $("#post-format-audio").attr("checked") ) {
			$("#samovar_audio_post_format_box").show();
		} else {
			$("#samovar_audio_post_format_box").hide();
		}
		if ( $("#post-format-video").attr("checked") ) {
			$("#samovar_video_post_format_box").show();
		} else {
			$("#samovar_video_post_format_box").hide();
		}
		if ( $("#post-format-link").attr("checked") ) {
			$("#samovar_link_post_format_box").show();
		} else {
			$("#samovar_link_post_format_box").hide();
		}
		if ( $("#post-format-quote").attr("checked") ) {
			$("#samovar_quote_post_format_box").show();
		} else {
			$("#samovar_quote_post_format_box").hide();
		}
	});
	
})(jQuery);