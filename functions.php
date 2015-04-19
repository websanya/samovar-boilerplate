<?php
/**
 * Aggregate all the files.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
	
//* Start the Genesis engine.
require_once( get_template_directory() . '/lib/init.php' );

//* Helper functions
require_once( CHILD_DIR . '/lib/_helpers/helper-functions.php' );
//* TGM_Plugin_Activation class.
require_once( CHILD_DIR . '/lib/_helpers/tgm-plugin-activation/tgm-plugin-activation.php' );

//* Child theme constants.
samovar_define( 'CHILD_THEME_NAME', 'Samovar Boilerplate' );
samovar_define( 'CHILD_THEME_URL', '' );
samovar_define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Register menu locations and place necessary markup.
samovar_back_require( 'menu-locations.php' );
//* Get our settings page.
samovar_back_require( 'metaboxes-settings/settings-page.php' );
//* Add links to admin bar.
samovar_back_require( 'admin-menu-bar.php' );
//* Post settings meta boxes.
samovar_back_require( 'metaboxes-post/samovar-post-settings.php' );
//* Enqueue Admin scripts.
samovar_back_require( 'admin-scripts.php' );
//* Add Some User Settings.
samovar_back_require( 'user-settings.php' );
//* Recommend certain plugins.
samovar_back_require( 'recommend-plugins.php' );

//* Activate Theme Supports Features.
samovar_front_require( 'theme-supports-features.php' );
//* Activate some Genesis & WordPress features.
samovar_front_require( 'genesis-features.php' );
//* Some additional markup for different entry actions.
samovar_front_require( 'entry-actions.php' );
//* Enqueue Theme scripts.
samovar_front_require( 'front-scripts.php' );

//* Add some Customizer magic
samovar_customizer_require( 'samovar-customizer.php' );