<?php
/**
 * Some functions for entry hooks.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
 
//* Display Featured Image everywhere.
if ( genesis_get_option( 'content_archive_thumbnail' ) ) {
	remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
	add_action( 'genesis_entry_header', 'samovar_do_post_image', 8 );
	function samovar_do_post_image() {
		if ( get_post_format() == 'video' ) {
			return;	
		}
		
		$img = genesis_get_image( array(
			'format'  => 'html',
			'size'    => genesis_get_option( 'image_size' ),
			'context' => 'archive',
			'attr'    => genesis_parse_attr( 'entry-image' ),
		) );

		if ( ! empty( $img ) && get_post_format() != 'image' ) {
			printf( '<a href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $img );	
		}
	}	
}

//* Customize the author box title.
add_filter( 'genesis_author_box_title', 'custom_author_box_title' );
function custom_author_box_title() {
	$title = 'About '. get_the_author();
	$title .= '<ul class="author-box-social-links">';
	if ( get_the_author_meta( 'user_url' ) ) {
		$title .= '<li class="author-box-social-website"><a href="' . get_the_author_meta( 'user_url' ) . '"></a></li>';
	}
	if ( get_the_author_meta( 'samovar_gplus' ) ) {
		$title .= '<li class="author-box-social-google"><a href="' . get_the_author_meta( 'samovar_gplus' ) . '"></a></li>';
	}
	if ( get_the_author_meta( 'samovar_twitter' ) ) {
		$title .= '<li class="author-box-social-twitter"><a href="' . esc_url( get_the_author_meta( 'samovar_twitter' ) ) . '"></a></li>';
	}
	if ( get_the_author_meta( 'samovar_facebook' ) ) {
		$title .= '<li class="author-box-social-facebook"><a href="' . esc_url( get_the_author_meta( 'samovar_facebook' ) ) . '"></a></li>';
	}
	if ( get_the_author_meta( 'samovar_vk' ) ) {
		$title .= '<li class="author-box-social-vk"><a href="' . esc_url( get_the_author_meta( 'samovar_vk' ) ) . '"></a></li>';
	}
	$title .= '</ul>';
	return $title;
}

//* Add Favorites Button if plugin activated.
if ( function_exists( 'the_favorites_button' ) ) {
	add_action( 'genesis_entry_footer', 'samovar_favorite_button_markup', 5 );
	function samovar_favorite_button_markup() {
		the_favorites_button();
	}
}

//* Add Progress Bar on single pages and posts.
add_action( 'genesis_before_header', 'samovar_progress_bar_markup' );
function samovar_progress_bar_markup() {
	if ( is_singular() ) {
		echo '<progress class="reading-progress" value="0"></progress>';	
	}
}

//* Remove comments link from all the posts
add_filter( 'genesis_post_comments_shortcode', 'samovar_remove_comments_link' );
function samovar_remove_comments_link() {
	return;
}

//* Add Scroll to Top button.
add_action( 'genesis_after', 'samovar_scroll_top_button_markup' );
function samovar_scroll_top_button_markup() {
	echo '<div class="scroll-top-button"></div>';
}