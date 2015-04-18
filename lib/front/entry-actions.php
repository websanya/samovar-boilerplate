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
	if ( get_the_author_meta( 'googleplus' ) ) {
		$title .= '<li class="author-box-social-google"><a href="' . get_the_author_meta( 'googleplus' ) . '"></a></li>';
	}
	if ( get_the_author_meta( 'twitter' ) ) {
		$title .= '<li class="author-box-social-twitter"><a href="http://twitter.com/' . get_the_author_meta( 'twitter' ) . '"></a></li>';
	}
	if ( get_the_author_meta( 'facebook' ) ) {
		$title .= '<li class="author-box-social-facebook"><a href="' . get_the_author_meta( 'facebook' ) . '"></a></li>';
	}
	$title .= '</ul>';
	return $title;
}

//* Add post format icons for posts.
add_action( 'genesis_entry_header', 'samovar_post_formats', 5 );
function samovar_post_formats() {
	if ( has_post_format( 'aside' ) ) {
	  echo '<span class="post-format dashicons dashicons-format-aside"></span>';
	} elseif ( has_post_format( 'link' ) ) {
	  echo '<span class="post-format dashicons dashicons-admin-links"></span>';
	} elseif ( has_post_format( 'image' ) ) {
	  echo '<span class="post-format dashicons dashicons-format-image"></span>';
	} elseif ( has_post_format( 'quote' ) ) {
	  echo '<span class="post-format dashicons dashicons-format-quote"></span>';
	} elseif ( has_post_format( 'video' ) ) {
	  echo '<span class="post-format dashicons dashicons-format-video"></span>';
	} elseif ( has_post_format( 'audio' ) ) {
	  echo '<span class="post-format dashicons dashicons-format-audio"></span>';
	} else {
		echo '<span class="post-format dashicons dashicons-admin-post"></span>';
	}
}