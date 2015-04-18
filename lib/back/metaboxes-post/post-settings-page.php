<?php
/**
 * Samovar post settings page.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

/**
 * Register some metaboxes for post settings.
 *
 * @see metaboxes-post/post-formats/* for callbacks.
 */
add_action( 'admin_menu', 'samovar_add_post_header_layout_box' );
function samovar_add_post_header_layout_box() {
	foreach ( (array) get_post_types( array( 'public' => true ) ) as $type ) {
		
		//* New metaboxes for each post format type.
		add_meta_box( 'samovar_link_post_format_box', __( 'Link Post Format Settings', 'genesis' ), 'samovar_link_post_format_box', $type, 'normal', 'high' );
		add_meta_box( 'samovar_quote_post_format_box', __( 'Quote Post Format Settings', 'genesis' ), 'samovar_quote_post_format_box', $type, 'normal', 'high' );
		add_meta_box( 'samovar_video_post_format_box', __( 'Video Post Format Settings', 'genesis' ), 'samovar_video_post_format_box', $type, 'normal', 'high' );
		add_meta_box( 'samovar_audio_post_format_box', __( 'Audio Post Format Settings', 'genesis' ), 'samovar_audio_post_format_box', $type, 'normal', 'high' );
		
		//* A new meta box to the post or page edit screen, so that the user can set fullscreen header layout options.
		add_meta_box( 'samovar_post_header_layout_box', __( 'Header Settings', 'genesis' ), 'samovar_post_header_layout_box', $type, 'normal', 'high' );
		
	}
}

//* Post Format settings callback and front end hooks
samovar_back_require( 'metaboxes-post/post-formats/post-format-audio.php' );
samovar_back_require( 'metaboxes-post/post-formats/post-format-image.php' );
samovar_back_require( 'metaboxes-post/post-formats/post-format-link.php' );
samovar_back_require( 'metaboxes-post/post-formats/post-format-quote.php' );
samovar_back_require( 'metaboxes-post/post-formats/post-format-video.php' );

//* Header settings callback and front end hooks
samovar_back_require( 'metaboxes-post/fullscreen-header/fullscreen-header-settings.php' );