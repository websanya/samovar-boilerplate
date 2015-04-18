<?php
/**
 * Callback for quote post format meta box.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

//* The callback itself.
function samovar_quote_post_format_box() {
	wp_nonce_field( 'samovar_quote_post_format_save', 'samovar_quote_post_format_nonce' );
	?>
	<p>
		<label for="samovar_quote_text"><?php _e( 'Quote Text:', 'samovar' ); ?></label>
		<textarea name="samovar_quote_format[_samovar_quote_text]" class="large-text admin-custom-css" id="samovar_quote_text" cols="78" rows="8"><?php echo esc_textarea( genesis_get_custom_field( '_samovar_quote_text' ) ); ?></textarea>
	</p>
	<p>
		<label for="samovar_quote_author"><?php _e( 'Quote Author:', 'samovar' ); ?> <input type="text" name="samovar_quote_format[_samovar_quote_author]" id="samovar_quote_author" value="<?php echo esc_attr( genesis_get_custom_field( '_samovar_quote_author' ) ); ?>" size="80" /></label>
	</p>
	<?php
}

//* Save custom fields into database.
add_action( 'save_post', 'samovar_quote_post_format_save', 1, 2 );
function samovar_quote_post_format_save( $post_id, $post ) {

	if ( ! isset( $_POST['samovar_quote_format'] ) )
		return;

	$data = wp_parse_args( $_POST['samovar_quote_format'], array(
		'_samovar_quote_text' 		=> '',
		'_samovar_quote_author'	=> '',
	) );
	
	//* Sanitize the fields
	samovar_sanitize_text_array( $data, array( '_samovar_quote_text', '_samovar_quote_author' ) );

	genesis_save_custom_fields( $data, 'samovar_quote_post_format_save', 'samovar_quote_post_format_nonce', $post );

}

//* Output quote Shortcode markup.
add_action( 'genesis_before_entry', 'samovar_quote_post_format_output' );
function samovar_quote_post_format_output() {
	if ( get_post_format() != 'quote' ) {
		return;
	}
	
	$quote_text = esc_textarea( genesis_get_custom_field( '_samovar_quote_text' ) );
	$quote_author = esc_attr( genesis_get_custom_field( '_samovar_quote_author' ) );
	
	if ( ! empty($quote_text) ) {
		?>
		<blockquote>
			<?php
				echo $quote_text;
				if ( ! empty($quote_author) ) {
					?>
					<cite><?php echo $quote_author; ?></cite>
					<?php
				}
			?>
		</blockquote>
		<?php
	}
}
