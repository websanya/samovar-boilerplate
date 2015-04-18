<?php
/**
 * Add Header Logo Uploader into Customizer.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

//* Adds the uploader.
add_action('customize_register', 'samovar_logo_uploader');
function samovar_logo_uploader( $wp_customize ) {
    
  if ( current_theme_supports( 'custom-header' ) ) {
		return;
	}
    
  //* Add the section to the theme customizer in WP.
  $wp_customize->add_section( 'samovar_logo_section' , array(
    'title'       => __( 'Upload Header Logo', 'samovar' ),
    'priority'		=> 20,
    'description' => __( 'Upload your logo to the header of the site.', 'samovar' ),
	) );

	//* Register the new setting.
	$wp_customize->add_setting( 'samovar_logo' );

	//* Tell WP to use an image uploader using WP_Customize_Image_Control class.
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'samovar_logo', array(
	    'label'    	=> __( 'Logo', 'samovar' ),
	    'section'  	=> 'samovar_logo_section',
	    'settings' 	=> 'samovar_logo',
	) ) );

}

//* Apply the uploaded image to the genesis_site_title hook.
add_action( 'genesis_site_title', 'samovar_replace_logo', 9 );
function samovar_replace_logo() {
	$samovar_get_logo = get_theme_mod( 'samovar_logo' );
	if ( $samovar_get_logo ) {
		echo '<div class="site-logo"><a href="' . site_url() . '"><img src="' . $samovar_get_logo .'"></a></div>';	
	}
}