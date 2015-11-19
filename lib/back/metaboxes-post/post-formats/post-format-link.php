<?php
/**
 * Callback for link post format meta box.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

//* The callback itself.
function samovar_link_post_format_box() {
	wp_nonce_field( 'samovar_link_post_format_save', 'samovar_link_post_format_nonce' );
	?>
	<p>
		<b><label for="samovar_link_url"><?php _e( 'Link URL', 'samovar' ); ?></label></b>
	</p>
	<p>
		<input type="text" class="large-text" name="samovar_link_format[_samovar_link_url]" id="samovar_link_url" value="<?php echo esc_url( genesis_get_custom_field( '_samovar_link_url' ) ); ?>" /></label>
	</p>
	<?php
}

//* Save custom fields into database.
add_action( 'save_post', 'samovar_link_post_format_save', 1, 2 );
function samovar_link_post_format_save( $post_id, $post ) {

	if ( ! isset( $_POST['samovar_link_format'] ) )
		return;

	$data = wp_parse_args( $_POST['samovar_link_format'], array(
		'_samovar_link_url' 		=> '',
	) );
	
	//* Sanitize the fields
	samovar_sanitize_text_array( $data, array( '_samovar_link_url' ) );

	genesis_save_custom_fields( $data, 'samovar_link_post_format_save', 'samovar_link_post_format_nonce', $post );

}

//* Output Link Shortcode markup.
add_action( 'genesis_entry_content', 'samovar_link_post_format_markup', 6 );
function samovar_link_post_format_markup() {
	if ( get_post_format() != 'link' ) {
		return;
	}
	
	$link_url = esc_url( genesis_get_custom_field( '_samovar_link_url' ) );
	
	if ( ! empty($link_url) ) {
		echo "<div class=\"link-format-container\"><i class=\"fa fa-external-link\"></i> <a href=\"$link_url\">$link_url</a></div>";
	}
}
