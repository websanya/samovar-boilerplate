<?php
/**
 * Add Some User Settings.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

//* Add Contact Fields
add_action( 'show_user_profile', 'samovar_user_settings', 9 );
add_action( 'edit_user_profile', 'samovar_user_settings', 9 );
function samovar_user_settings( $user ) {
	?>
	<h3><?php _e( 'Samovar Contact Fields', 'samovar' ); ?></h3>
	<p><span class="description"><?php _e( 'Specify these for links in Author Box on various pages.', 'samovar' ); ?></span></p>
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row" valign="top"><label for="samovar_facebook"><?php _e( 'Facebook URL', 'samovar' ); ?></label></th>
				<td>
					<input name="samovar[samovar_facebook]" id="samovar_facebook" type="text" value="<?php echo esc_attr( get_the_author_meta( 'samovar_facebook', $user->ID ) ); ?>" class="regular-text" /><br />
				</td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="samovar_twitter"><?php _e( 'Twitter URL', 'samovar' ); ?></label></th>
				<td>
					<input name="samovar[samovar_twitter]" id="samovar_twitter" type="text" value="<?php echo esc_attr( get_the_author_meta( 'samovar_twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				</td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="samovar_gplus"><?php _e( 'Google+ URL', 'samovar' ); ?></label></th>
				<td>
					<input name="samovar[samovar_gplus]" id="samovar_gplus" type="text" value="<?php echo esc_attr( get_the_author_meta( 'samovar_gplus', $user->ID ) ); ?>" class="regular-text" /><br />
				</td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="samovar_vk"><?php _e( 'VKontakte URL', 'samovar' ); ?></label></th>
				<td>
					<input name="samovar[samovar_vk]" id="samovar_vk" type="text" value="<?php echo esc_attr( get_the_author_meta( 'samovar_vk', $user->ID ) ); ?>" class="regular-text" /><br />
				</td>
			</tr>
		</tbody>
	</table>
	<?php
}

add_action( 'personal_options_update',  'samovar_user_settings_save' );
add_action( 'edit_user_profile_update', 'samovar_user_settings_save' );
function samovar_user_settings_save( $user_id ) {
	if ( ! current_user_can( 'edit_users', $user_id ) ) {
		return false;
	}
	
	if ( ! isset( $_POST['samovar'] ) || ! is_array( $_POST['samovar'] ) )
		return;

	$defaults = array(
		'samovar_facebook' => '',
		'samovar_twitter'  => '',
		'samovar_gplus'    => '',
		'samovar_vk'       => '',
	);

	/**
	 * Filter the user meta defaults array.
	 *
	 * Allows developer to filter the default array of user meta key => value pairs.
	 *
	 * @since 2.1.0
	 * 
	 * @param array $defaults Default user meta array.
	 */
	$defaults = apply_filters( 'samovar_user_meta_defaults', $defaults );

	$meta = wp_parse_args( $_POST['samovar'], $defaults );

	$meta['samovar_facebook'] = esc_url( $meta['samovar_facebook'] );
	$meta['samovar_twitter']  = esc_url( $meta['samovar_twitter'] );
	$meta['samovar_gplus']    = esc_url( $meta['samovar_gplus'] );
	$meta['samovar_vk']       = esc_url( $meta['samovar_vk'] );

	foreach ( $meta as $key => $value ) {
		update_user_meta( $user_id, $key, $value );	
	}
}