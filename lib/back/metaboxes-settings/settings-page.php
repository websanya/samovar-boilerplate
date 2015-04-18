<?php
/**
 * Samovar Boilerplate settings page (Genesis section).
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
 
samovar_define( 'SAMOVAR_SETTINGS_FIELD', 'samovar-settings' );
 
//* Registers a new admin page, providing content and corresponding menu item for the Samovar Settings Page.
class Samovar_Theme_Settings extends Genesis_Admin_Boxes {
	
	//* Create an admin menu item and settings page.
	function __construct() {
		
		//* Specify a unique page ID. This will be used as URL parameter.
		$page_id = 'samovar_main';
		
		//* Set it as a child to Genesis Page, and define the menu and page titles.
		$menu_ops = array(
			'submenu' => array(
				'parent_slug' => 'genesis',
				'page_title'  => 'Genesis - Samovar Main Settings',
				'menu_title'  => 'Samovar Main Settings',
			)
		);
		
		//* Set up page options. These are optional, so only uncomment if you want to change the defaults.
		$page_ops = array(
		//	'error_notice_text' => 'Error saving settings',
		//	'save_button_text'  => 'Save Settings',
		//	'reset_button_text' => 'Reset Settings',
		//	'save_notice_text'  => 'Settings saved.',
		//	'reset_notice_text' => 'Settings reset.',
		);
		
		//* Give it a unique settings field. You'll access them from genesis_get_option( 'option_name', 'samovar-settings' );
		$settings_field = SAMOVAR_SETTINGS_FIELD;
		
		//* Set the default values.
		$default_settings = array(
			
			'header_menu'          => 'left',
			'sticky_header'        => 0,
			'always_mobile_header' => 0,
			'header_search'        => 0,
			
			'footer_text'          => '',
			'footer_menu'          => 0,
			
			'footer_facebook'      => '',
			'footer_twitter'       => '',
			'footer_gplus'         => '',
			'footer_vk'            => '',
			'footer_instagram'     => '',
			'footer_youtube'       => '',
			'footer_vimeo'         => '',
			'footer_dribbble'      => '',
			'footer_behance'       => '',
			'footer_skype'         => '',
			'footer_tumblr'        => '',
			'footer_pinterest'     => '',
			'footer_soundcloud'    => '',
			'footer_flickr'        => '',
			'footer_foursquare'    => '',
			'footer_rss'           => '',
						
			'favicon'              => '',
			'touch_icon'           => '',
		);
		
		//* Create the Admin Page.
		$this->create( $page_id, $menu_ops, $page_ops, $settings_field, $default_settings );

		/**
		 * Initialize the Sanitization Filter.
		 *
	 	 * @see Samovar_Theme_Settings::sanitization_filters() callback for field sanitization.
		 */
		add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitization_filters' ) );
			
	}

	//* Set up Sanitization Filters for fields.
	function sanitization_filters() {
		genesis_add_option_filter( 'no_html', $this->settings_field, array(
			'header_menu',
			'fonts_google',
			'fonts_typekit',
			'custom_css_markup',
			
			'footer_facebook',
			'footer_twitter',
			'footer_gplus',
			'footer_vk',
			'footer_instagram',
			'footer_youtube',
			'footer_vimeo',
			'footer_dribbble',
			'footer_behance',
			'footer_skype',
			'footer_tumblr',
			'footer_pinterest',
			'footer_soundcloud',
			'footer_flickr',
			'footer_foursquare',
			'footer_rss',
			
			'favicon',
			'touch_icon',
		) );
		genesis_add_option_filter( 'one_zero', $this->settings_field, array(
			'sticky_header',
			'footer_menu',
			'always_mobile_header',
			'header_search',
		) );
		genesis_add_option_filter( 'safe_html', $this->settings_field, array(
			'footer_text',
		) );
	}
	
	//* Set up Help Tab. Default Genesis function (http://wpdevel.wordpress.com/2011/12/06/help-and-screen-api-changes-in-3-3/).
	function help() {
		$screen = get_current_screen();
		$screen->add_help_tab( array(
			'id'      => 'sample-help', 
			'title'   => 'Sample Help',
			'content' => '<p>Help content goes here.</p>',
		) );
	}
	
	/**
	 * Register metaboxes on Samovar Settings page.
	 *
	 * @see Samovar_Theme_Settings::header_information_markup() callback for header information.
	 * @see Samovar_Theme_Settings::footer_information_markup() callback for footer information.
	 * @see Samovar_Theme_Settings::meta_information_markup() callback for meta information.
	 * @see Samovar_Theme_Settings::fonts_information_markup() callback for fonts information.
	 * @see Samovar_Theme_Settings::custom_css_markup() callback for custom css.
	 */
	function metaboxes() {
		add_meta_box( 'header-information', 'Header Settings', array( $this, 'header_information_markup' ), $this->pagehook, 'main', 'high' );
		add_meta_box( 'footer-information', 'Footer Settings', array( $this, 'footer_information_markup' ), $this->pagehook, 'main', 'high' );
		add_meta_box( 'meta-information', 'Meta Settings', array( $this, 'meta_information_markup' ), $this->pagehook, 'main', 'high' );
		add_meta_box( 'fonts-information', 'Fonts Settings', array( $this, 'fonts_information_markup' ), $this->pagehook, 'main', 'high' );
		add_meta_box( 'custom-css', 'Custom CSS', array( $this, 'custom_css_markup' ), $this->pagehook, 'main', 'high' );
	}
	
	//* Callback for Header Information metabox.
	function header_information_markup() {
		?>
		<p><?php _e( 'Header Menu Layout:', 'samovar' ); ?>
			<select name="<?php $this->field_name( 'header_menu' ); ?>">
				<option value="left"<?php selected( $this->get_field_value( 'header_menu' ), 'left' ); ?>><?php _e( 'Left', 'samovar' ); ?></option>
				<option value="center"<?php selected( $this->get_field_value( 'header_menu' ), 'center' ); ?>><?php _e( 'Center', 'samovar' ); ?></option>
				<option value="right"<?php selected( $this->get_field_value( 'header_menu' ), 'right' ); ?>><?php _e( 'Right', 'samovar' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php $this->field_id( 'sticky_header' ); ?>"><?php _e( 'Sticky Header: ', 'samovar' ); ?> <input type="checkbox" name="<?php $this->field_name( 'sticky_header' ); ?>" id="<?php $this->field_id( 'sticky_header' ); ?>" value="1"<?php checked( $this->get_field_value( 'sticky_header' ) ); ?> /></label>
		</p>
		<p>
			<label for="<?php $this->field_id( 'header_search' ); ?>"><?php _e( 'Show Search in Header: ', 'samovar' ); ?> <input type="checkbox" name="<?php $this->field_name( 'header_search' ); ?>" id="<?php $this->field_id( 'header_search' ); ?>" value="1"<?php checked( $this->get_field_value( 'header_search' ) ); ?> /></label>
		</p>
		<p>
			<label for="<?php $this->field_id( 'always_mobile_header' ); ?>"><?php _e( 'Always Mobile Header: ', 'samovar' ); ?> <input type="checkbox" name="<?php $this->field_name( 'always_mobile_header' ); ?>" id="<?php $this->field_id( 'always_mobile_header' ); ?>" value="1"<?php checked( $this->get_field_value( 'always_mobile_header' ) ); ?> /></label>
		</p>
		<?php
	}
	
	//* Callback for Footer Information metabox.
	function footer_information_markup() {
		echo '<p>Footer Text:<br />';
		echo '<input type="text" name="' . $this->get_field_name( 'footer_text' ) . '" id="' . $this->get_field_id( 'footer_text' ) . '" value="' . esc_attr( $this->get_field_value( 'footer_text' ) ) . '" size="80" />';
		echo '</p>';
		?>
		<p>
			<label for="<?php $this->field_id( 'footer_menu' ); ?>"><?php _e( 'Footer Social Menu: ', 'samovar' ); ?> <input type="checkbox" class="footer_menu_checkbox" name="<?php $this->field_name( 'footer_menu' ); ?>" id="<?php $this->field_id( 'footer_menu' ); ?>" value="1"<?php checked( $this->get_field_value( 'footer_menu' ) ); ?> /></label>
		</p>
		<p class="footer-menu-reveal">
			<label for="<?php $this->field_id( 'footer_facebook' ); ?>"><?php _e( 'Facebook URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_facebook' )?>" id="<?php $this->field_id( 'footer_facebook' )?>" value="<?php esc_attr( $this->field_value( 'footer_facebook' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_twitter' ); ?>"><?php _e( 'Twitter URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_twitter' )?>" id="<?php $this->field_id( 'footer_twitter' )?>" value="<?php esc_attr( $this->field_value( 'footer_twitter' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_gplus' ); ?>"><?php _e( 'Google+ URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_gplus' )?>" id="<?php $this->field_id( 'footer_gplus' )?>" value="<?php esc_attr( $this->field_value( 'footer_gplus' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_vk' ); ?>"><?php _e( 'VKontakte URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_vk' )?>" id="<?php $this->field_id( 'footer_vk' )?>" value="<?php esc_attr( $this->field_value( 'footer_vk' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_instagram' ); ?>"><?php _e( 'Instagram URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_instagram' )?>" id="<?php $this->field_id( 'footer_instagram' )?>" value="<?php esc_attr( $this->field_value( 'footer_instagram' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_youtube' ); ?>"><?php _e( 'YouTube URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_youtube' )?>" id="<?php $this->field_id( 'footer_youtube' )?>" value="<?php esc_attr( $this->field_value( 'footer_youtube' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_vimeo' ); ?>"><?php _e( 'Vimeo URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_vimeo' )?>" id="<?php $this->field_id( 'footer_vimeo' )?>" value="<?php esc_attr( $this->field_value( 'footer_vimeo' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_dribbble' ); ?>"><?php _e( 'Dribbble URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_dribbble' )?>" id="<?php $this->field_id( 'footer_dribbble' )?>" value="<?php esc_attr( $this->field_value( 'footer_dribbble' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_behance' ); ?>"><?php _e( 'Behance URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_behance' )?>" id="<?php $this->field_id( 'footer_behance' )?>" value="<?php esc_attr( $this->field_value( 'footer_behance' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_skype' ); ?>"><?php _e( 'Skype URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_skype' )?>" id="<?php $this->field_id( 'footer_skype' )?>" value="<?php esc_attr( $this->field_value( 'footer_skype' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_tumblr' ); ?>"><?php _e( 'Tumblr URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_tumblr' )?>" id="<?php $this->field_id( 'footer_tumblr' )?>" value="<?php esc_attr( $this->field_value( 'footer_tumblr' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_pinterest' ); ?>"><?php _e( 'Pinterest URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_pinterest' )?>" id="<?php $this->field_id( 'footer_pinterest' )?>" value="<?php esc_attr( $this->field_value( 'footer_pinterest' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_soundcloud' ); ?>"><?php _e( 'SoundCloud URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_soundcloud' )?>" id="<?php $this->field_id( 'footer_soundcloud' )?>" value="<?php esc_attr( $this->field_value( 'footer_soundcloud' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_flickr' ); ?>"><?php _e( 'Flickr URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_flickr' )?>" id="<?php $this->field_id( 'footer_flickr' )?>" value="<?php esc_attr( $this->field_value( 'footer_flickr' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_foursquare' ); ?>"><?php _e( 'Foursquare URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_foursquare' )?>" id="<?php $this->field_id( 'footer_foursquare' )?>" value="<?php esc_attr( $this->field_value( 'footer_foursquare' ) )?>" size="80" /></label>
			<label for="<?php $this->field_id( 'footer_rss' ); ?>"><?php _e( 'RSS URL: ', 'samovar' ); ?> <input type="text" name="<?php $this->field_name( 'footer_rss' )?>" id="<?php $this->field_id( 'footer_rss' )?>" value="<?php esc_attr( $this->field_value( 'footer_rss' ) )?>" size="80" /></label>
		</p>
		<?php
	}
	
	//* Callback for Meta Information metabox.
	function meta_information_markup() {
		?>
		<p><?php _e( 'Favicon URL: ', 'samovar' ); ?><br />
			<input type="text" name="<?php $this->field_name( 'favicon' ) ?>" id="<?php $this->field_id( 'favicon' ) ?>" value="<?php esc_attr( $this->field_value( 'favicon' ) ) ?>" size="80" />
		</p>
		<p><?php _e( 'Apple Touch Icon URL: ', 'samovar' ); ?><br />
			<input type="text" name="<?php $this->field_name( 'touch_icon' ) ?>" id="'<?php $this->field_id( 'touch_icon' ) ?>" value="<?php esc_attr( $this->field_value( 'touch_icon' ) ) ?>" size="80" />
		</p>
		<?php
	}
	
	//* Callback for Fonts Information metabox.
	function fonts_information_markup() {
		?>
		<p><?php _e( 'Google Fonts URL: ', 'samovar' ); ?><br />
			<input type="text" name="<?php $this->field_name( 'fonts_google' ) ?>" id="<?php $this->field_id( 'fonts_google' ) ?>" value="<?php esc_attr( $this->field_value( 'fonts_google' ) ) ?>" size="80" />
		</p>
		<p><?php _e( 'Typekit Kit ID: ', 'samovar' ); ?><br />
			<input type="text" name="<?php $this->field_name( 'fonts_typekit' ) ?>" id="'<?php $this->field_id( 'fonts_typekit' ) ?>" value="<?php esc_attr( $this->field_value( 'fonts_typekit' ) ) ?>" size="80" />
		</p>
		<?php
	}
	
	//* Callback for Custom CSS metabox.
	function custom_css_markup() {
		?>
		<p>
			<label for="<?php $this->field_id( 'custom_css_markup' ); ?>"><?php print ( __( 'Enter Custom CSS for your Theme:', 'samovar' ) ); ?></label>
		</p>
		<textarea name="<?php $this->field_name( 'custom_css_markup' ); ?>" class="large-text admin-custom-css" id="<?php $this->field_id( 'custom_css_markup' ); ?>" cols="78" rows="8"><?php echo esc_textarea( $this->get_field_value( 'custom_css_markup' ) ); ?></textarea>
		<?php
	}
	
}

//* Initialize Samovar Settings Page.
add_action( 'genesis_admin_menu', 'samovar_add_theme_settings' );
function samovar_add_theme_settings() {
	global $_samovar_theme_settings;
	$_samovar_theme_settings = new Samovar_Theme_Settings;	 	
}

//* Apply all the settingson front end.
samovar_back_require( 'metaboxes-settings/settings-apply.php' );