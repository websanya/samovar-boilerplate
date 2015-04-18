<?php
/**
 * Enqueue front end styles and scripts.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

//* Remove jQuery scripts loading.
add_action( 'wp_enqueue_scripts', 'samovar_jquery_remove' );
function samovar_jquery_remove() {
  wp_deregister_script( 'jquery' );
}

//* Load proper jQuery from Google.
add_action( 'wp_enqueue_scripts', 'samovar_jquery_new' );
function samovar_jquery_new() {
  wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js' );
}

//* Enqueue theme script.
add_action( 'wp_enqueue_scripts', 'samovar_front_script' );
function samovar_front_script() {
  wp_enqueue_script( 'samovar-front', get_stylesheet_directory_uri() . '/js/_min/samovar-front-min.js', array( 'jquery' ), '', true );
}

//* Enqueue dashicons (inside WordPress) and font awesome icons.
add_action( 'wp_enqueue_scripts', 'samovar_icons_enqueue' );
function samovar_icons_enqueue() {
	wp_enqueue_style( 'font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'dashicons' );
}

//* Remove WP version param from any enqueued scripts & styles.
function vd_remove_wp_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}
add_filter( 'style_loader_src', 'vd_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vd_remove_wp_ver_css_js', 9999 );

//* Add defer and async attributes to all script tags.
add_filter( 'script_loader_tag', function ( $tag, $handle ) {
  return str_replace( ' src', ' defer="defer" async="async" src', $tag );
}, 10, 2 );