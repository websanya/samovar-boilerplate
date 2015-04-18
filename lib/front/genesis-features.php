<?php
/**
 * Activate some Genesis & WordPress features.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
	
//* Add HTML5 markup structure.
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

//* Customize Viewport meta tag for mobile browsers.
remove_action( 'genesis_meta','genesis_responsive_viewport' );
add_action( 'genesis_meta', 'samovar_viewport_markup' );
function samovar_viewport_markup() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>';
}

//* Add support for custom background.
add_theme_support( 'custom-background' );

//* Remove default meta box for custom header in Genesis Settings page.
add_action( 'genesis_theme_settings_metaboxes', 'samovar_remove_custom_header_metabox' );
function samovar_remove_custom_header_metabox( $_genesis_theme_settings_pagehook ) {
	remove_meta_box( 'genesis-theme-settings-header', $_genesis_theme_settings_pagehook, 'main' );
}

//* Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

//* Remove Primary & Secondary navigations.
remove_theme_support( 'genesis-menus' );

//* Remove Some unnecessary Genesis Layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

//* Remove Secondary Sidebar & Header Right Sidebar.
unregister_sidebar( 'sidebar-alt' );
unregister_sidebar( 'header-right' );

//* Rename Primary Sidebar to just Sidebar.
unregister_sidebar( 'sidebar' );
genesis_register_widget_area(
	array(
		'id'               => 'sidebar',
		'name'             => __( 'Sidebar', 'samovar' ),
		'description'      => __( 'This is the sidebar if you are using a two column site layout option.', 'samovar' ),
		'_genesis_builtin' => true,
	)
);

//* Remove default favicon.
remove_action('wp_head', 'genesis_load_favicon');