<?php
/**
 * Callback for header layout meta box.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

//* The callback iteself.	
function samovar_post_header_layout_box() {
	wp_nonce_field( 'samovar_post_header_layout_save', 'samovar_post_header_layout_nonce' );
	?>
	<p>
		<label for="samovar_enable_fullscreen"><?php _e( 'Enable fullscreen header w/ featured image:', 'samovar' ); ?> <input type="checkbox" name="samovar_fullscreen[_samovar_enable_fullscreen]" id="samovar_enable_fullscreen" value="1" <?php checked( genesis_get_custom_field( '_samovar_enable_fullscreen' ) ); ?> /></label>
	</p>
	<p><?php _e( 'Fullscreen Overlay Opacity:', 'samovar' ); ?>
		<select name="samovar_fullscreen[_samovar_fullscreen_opacity]">
			<option value="0.1"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_opacity' ), '0.1' ); ?>><?php _e( '0.1', 'samovar' ); ?></option>
			<option value="0.2"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_opacity' ), '0.2' ); ?>><?php _e( '0.2', 'samovar' ); ?></option>
			<option value="0.3"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_opacity' ), '0.3' ); ?>><?php _e( '0.3', 'samovar' ); ?></option>
			<option value="0.4"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_opacity' ), '0.4' ); ?>><?php _e( '0.4', 'samovar' ); ?></option>
			<option value="0.5"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_opacity' ), '0.5' ); ?>><?php _e( '0.5', 'samovar' ); ?></option>
			<option value="0.6"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_opacity' ), '0.6' ); ?>><?php _e( '0.6', 'samovar' ); ?></option>
			<option value="0.7"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_opacity' ), '0.7' ); ?>><?php _e( '0.7', 'samovar' ); ?></option>
			<option value="0.8"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_opacity' ), '0.8' ); ?>><?php _e( '0.8', 'samovar' ); ?></option>
			<option value="0.9"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_opacity' ), '0.9' ); ?>><?php _e( '0.9', 'samovar' ); ?></option>
			<option value="1.0"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_opacity' ), '1.0' ); ?>><?php _e( '1.0', 'samovar' ); ?></option>
		</select>
	</p>
	<p><?php _e( 'Fullscreen Heading Layout:', 'samovar' ); ?>
		<select name="samovar_fullscreen[_samovar_fullscreen_heading]">
			<option value="left"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_heading' ), 'left' ); ?>><?php _e( 'Left', 'samovar' ); ?></option>
			<option value="center"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_heading' ), 'center' ); ?>><?php _e( 'Center', 'samovar' ); ?></option>
			<option value="right"<?php selected( genesis_get_custom_field( '_samovar_fullscreen_heading' ), 'right' ); ?>><?php _e( 'Right', 'samovar' ); ?></option>
		</select>
	</p>
	<p>
		<label for="samovar_enable_parallax"><?php _e( 'Enable parallax on fullscreen header:', 'samovar' ); ?> <input type="checkbox" name="samovar_fullscreen[_samovar_enable_parallax]" id="samovar_enable_parallax" value="1" <?php checked( genesis_get_custom_field( '_samovar_enable_parallax' ) ); ?> /></label>
	</p>
	<?php
}

//* Save custom fields into database.
add_action( 'save_post', 'samovar_post_header_layout_save', 1, 2 );
function samovar_post_header_layout_save( $post_id, $post ) {

	if ( ! isset( $_POST['samovar_fullscreen'] ) )
		return;

	$data = wp_parse_args( $_POST['samovar_fullscreen'], array(
		'_samovar_enable_fullscreen' 	=> 0,
		'_samovar_fullscreen_opacity'	=> '',
		'_samovar_fullscreen_heading'	=> '',
		'_samovar_enable_parallax'		=> 0,
	) );
	
	//* Sanitize the fields.
	foreach ( (array) $data as $key => $value ) {
		if ( in_array( $key, array( '_samovar_fullscreen_opacity', '_samovar_fullscreen_heading' ) ) ) {
			$data[ $key ] = strip_tags( $value );	
		}
	}

	genesis_save_custom_fields( $data, 'samovar_post_header_layout_save', 'samovar_post_header_layout_nonce', $post );

}

//* Add fullscreen header body class.
add_filter( 'body_class', 'samovar_fullscreen_header_body_class' );
function samovar_fullscreen_header_body_class( $classes ) {
	if ( genesis_get_custom_field( '_samovar_enable_fullscreen' ) && is_single() ) {
		$classes[] = 'samovar-fullscreen-header';
	} else {
		$classes[] = '';
	}
	return $classes;
}

//* Output fullscreen header overlay markup.
add_action( 'genesis_entry_header', 'samovar_fullscreen_header_overlay_markup', 12 );
function samovar_fullscreen_header_overlay_markup() {
	if ( genesis_get_custom_field( '_samovar_enable_fullscreen' ) && genesis_get_custom_field( '_samovar_fullscreen_opacity' ) ) {
		echo '<div class="samovar-fullscreen-overlay" data-opacity="' . esc_html( genesis_get_custom_field( '_samovar_fullscreen_opacity' ) ) . '"></div>';
	}
}

//* Add fullscreen heading layout body class.
add_filter( 'body_class', 'samovar_fullscreen_heading_layout_body_class' );
function samovar_fullscreen_heading_layout_body_class( $classes ) {
	if ( genesis_get_custom_field( '_samovar_enable_fullscreen' ) && genesis_get_custom_field( '_samovar_fullscreen_heading' ) && is_single() ) {
		$classes[] = 'samovar-fullscreen-header-' . esc_html( genesis_get_custom_field( '_samovar_fullscreen_heading' ) );
	} else {
		$classes[] = '';
	}
	return $classes;
}

//* Add fullscreen header parallax body class.
add_filter( 'body_class', 'samovar_fullscreen_parallax_body_class' );
function samovar_fullscreen_parallax_body_class( $classes ) {
	if ( genesis_get_custom_field( '_samovar_enable_fullscreen' ) && genesis_get_custom_field( '_samovar_enable_parallax' ) && is_single() ) {
		$classes[] = 'samovar-fullscreen-header-parallax';
	} else {
		$classes[] = '';
	}
	return $classes;
}