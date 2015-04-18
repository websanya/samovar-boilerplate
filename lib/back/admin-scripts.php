<?php
/**
 * Enqueue admin styles and scripts.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

//* Enqueue script file.
add_action( 'admin_init', 'samovar_admin_scripts_enqueue' );
function samovar_admin_scripts_enqueue() {
	wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri() . '/admin.css' );
	wp_enqueue_script( 'admin-script', get_stylesheet_directory_uri() . '/js/_min/samovar-admin-min.js', array( 'jquery' ), '', true );
}