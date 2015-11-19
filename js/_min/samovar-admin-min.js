/**
 * Footer Social script reveals links if Footer Menu is checked.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
!function($){$(".footer_menu_checkbox").attr("checked")?$(".footer-menu-reveal").show():$(".footer-menu-reveal").hide(),$(".footer_menu_checkbox").change(function(){$(".footer_menu_checkbox").attr("checked")?$(".footer-menu-reveal").show():$(".footer-menu-reveal").hide()})}(jQuery),/**
 * Add Tab Key for Custom CSS Textarea in Theme Settings.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
jQuery(document).delegate(".admin-custom-css","keydown",function(o){var t=o.keyCode||o.which;if(9==t){o.preventDefault();var e=jQuery(this).get(0).selectionStart,a=jQuery(this).get(0).selectionEnd;jQuery(this).val(jQuery(this).val().substring(0,e)+"  "+jQuery(this).val().substring(a)),jQuery(this).get(0).selectionStart=jQuery(this).get(0).selectionEnd=e+2}}),/**
 * Reveal Post Edit Metaboxes for various formats.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
function($){$("#samovar_link_post_format_box").hide(),$("#samovar_quote_post_format_box").hide(),$("#samovar_audio_post_format_box").hide(),$("#samovar_video_post_format_box").hide(),$("#post-format-audio").attr("checked")?$("#samovar_audio_post_format_box").show():$("#post-format-video").attr("checked")?$("#samovar_video_post_format_box").show():$("#post-format-link").attr("checked")?$("#samovar_link_post_format_box").show():$("#post-format-quote").attr("checked")&&$("#samovar_quote_post_format_box").show(),$("#post-formats-select input[type=radio]").change(function(){$("#post-format-audio").attr("checked")?$("#samovar_audio_post_format_box").show():$("#samovar_audio_post_format_box").hide(),$("#post-format-video").attr("checked")?$("#samovar_video_post_format_box").show():$("#samovar_video_post_format_box").hide(),$("#post-format-link").attr("checked")?$("#samovar_link_post_format_box").show():$("#samovar_link_post_format_box").hide(),$("#post-format-quote").attr("checked")?$("#samovar_quote_post_format_box").show():$("#samovar_quote_post_format_box").hide()})}(jQuery);