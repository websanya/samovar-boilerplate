<?php
/**
 * Samovar customizer reordering & additions.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

//* Create Logo Upload section.
samovar_customizer_require( 'samovar-upload-logo.php' );

//* Customize the customizer :).
add_action( 'customize_register', 'samovar_customizer', 20 );
function samovar_customizer( $wp_customize ) {
	
	//* Create custom panels.
	$wp_customize->add_panel( 'general_settings', array(
		'priority' => 10,
		'theme_supports' => '',
		'title' => __( 'General Settings', 'samovar' ),
		'description' => __( 'Controls the basic settings for the website.', 'samovar' )
	) );
	$wp_customize->add_panel( 'theme_settings', array(
		'priority' => 20,
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'samovar' ),
		'description' => __( 'Controls the basic settings for the theme.', 'samovar' )
	) );
	
	//* Customize title & tagline sections and labels.
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Name and Description', 'samovar' );
	$wp_customize->get_control( 'blogname' )->label = __( 'Site Name', 'samovar' );
	$wp_customize->get_control( 'blogdescription' )->label = __( 'Site Description', 'samovar' );
	
	//* Customize the front page settings.
	$wp_customize->get_section( 'static_front_page' )->title = __( 'Homepage Settings', 'samovar' );
	$wp_customize->get_section( 'static_front_page' )->priority = 20;
	$wp_customize->get_control( 'show_on_front' )->label = __( 'Choose Homepage Preference', 'samovar' );
	$wp_customize->get_control( 'page_on_front' )->label = __( 'Select Homepage', 'samovar' );
	$wp_customize->get_control( 'page_for_posts' )->label = __( 'Select Blog Homepage', 'samovar' );
	
	//* Customize background settings.
	$wp_customize->get_section( 'background_image' )->title = __( 'Background Styles', 'samovar' );
	$wp_customize->get_section( 'background_image' )->priority = 10;
	$wp_customize->get_control( 'background_color' )->section = 'background_image';
	
	//* Move default sections into panels.
	$wp_customize->get_section( 'title_tagline' )->panel = 'general_settings';
	$wp_customize->get_section( 'static_front_page' )->panel = 'general_settings';
	$wp_customize->get_section( 'nav' )->panel = 'general_settings';
	$wp_customize->get_section( 'nav' )->priority = 150;
	$wp_customize->get_section( 'background_image' )->panel = 'theme_settings';
	
	//* Move custom sections into panels & remove some default Genesis sections.
	$wp_customize->get_section( 'samovar_logo_section' )->panel = 'theme_settings';
	$wp_customize->get_section( 'genesis_layout' )->panel = 'general_settings';
	$wp_customize->get_section( 'genesis_layout' )->priority = 30;
	$wp_customize->remove_section( 'genesis_breadcrumbs' );
	$wp_customize->remove_section( 'genesis_comments' );
	$wp_customize->remove_section( 'genesis_archives' );
	
}

//* Add some Test Meta into Customizer.
add_action( 'customize_register', 'samovar_customizer_test', 21 );
function samovar_customizer_test() {
	
	global $wp_customize;
	
  $wp_customize->add_section( 'samovar_test_meta_section' , array(
    'title'       => __( 'Test Meta Information', 'samovar' ),
    'priority'		=> 21,
    'description' => __( 'Write some stuff over here for testing purposes.', 'samovar' ),
	) );

	$wp_customize->add_setting( 'samovar_test_meta_setting', array(
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'samovar_test_meta_setting', array(
    'label'    	=> __( 'An actual text', 'samovar' ),
    'section'  	=> 'samovar_test_meta_section',
    'settings' 	=> 'samovar_test_meta_setting',
	) ) );
	
}

//* Output actual markup for the Test Meta.
add_action( 'genesis_before_loop', 'samovar_customizer_test_output', 20 );
function samovar_customizer_test_output() {
	$samovar_test_meta = get_theme_mod( 'samovar_test_meta_setting' );
	if ( $samovar_test_meta ) {
		echo '<div id="samovar-test-meta" class="breadcrumb">' . $samovar_test_meta . '</div>';	
	}
}

//* Enqueue script for transporting Test Meta.
add_action( 'customize_preview_init', 'samovar_customizer_test_script' );
function samovar_customizer_test_script() {
	wp_enqueue_script( 'samovar_test', get_stylesheet_directory_uri() . '/js/_min/samovar-customizer-min.js', array( 'jquery', 'customize-preview' ), '', true );
}