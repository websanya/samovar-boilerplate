<?php
/**
 * Callback for audio post format meta box.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

//* The callback iteself.
function samovar_audio_post_format_box() {
	wp_nonce_field( 'samovar_audio_post_format_save', 'samovar_audio_post_format_nonce' );
	?>
	<p>
		<label for="samovar_audio_mp3"><?php _e( 'MP3 URL:', 'samovar' ); ?> <input type="text" name="samovar_audio_format[_samovar_audio_mp3]" id="samovar_audio_mp3" value="<?php echo esc_url( genesis_get_custom_field( '_samovar_audio_mp3' ) ); ?>" size="80" /></label>
	</p>
	<p>
		<label for="samovar_audio_ogg"><?php _e( 'OGG URL:', 'samovar' ); ?> <input type="text" name="samovar_audio_format[_samovar_audio_ogg]" id="samovar_audio_ogg" value="<?php echo esc_url( genesis_get_custom_field( '_samovar_audio_ogg' ) ); ?>" size="80" /></label>
	</p>
	<p>
		<label for="samovar_audio_wav"><?php _e( 'WAV URL:', 'samovar' ); ?> <input type="text" name="samovar_audio_format[_samovar_audio_wav]" id="samovar_audio_wav" value="<?php echo esc_url( genesis_get_custom_field( '_samovar_audio_wav' ) ); ?>" size="80" /></label>
	</p>
	<p>
		<label for="samovar_audio_embed"><?php _e( 'Embed URL:', 'samovar' ); ?> <input type="text" name="samovar_audio_format[_samovar_audio_embed]" id="samovar_audio_embed" value="<?php echo esc_url( genesis_get_custom_field( '_samovar_audio_embed' ) ); ?>" size="80" /></label>
	</p>
	<?php
}

//* Save custom fields into database.
add_action( 'save_post', 'samovar_audio_post_format_save', 1, 2 );
function samovar_audio_post_format_save( $post_id, $post ) {

	if ( ! isset( $_POST['samovar_audio_format'] ) )
		return;

	$data = wp_parse_args( $_POST['samovar_audio_format'], array(
		'_samovar_audio_mp3' 		=> '',
		'_samovar_audio_ogg'		=> '',
		'_samovar_audio_wav'		=> '',
		'_samovar_audio_embed'	=> '',
	) );
	
	//* Sanitize the fields.
	samovar_sanitize_text_array( $data, array( '_samovar_audio_mp3', '_samovar_audio_ogg', '_samovar_audio_wav' , '_samovar_audio_embed' ) );

	genesis_save_custom_fields( $data, 'samovar_audio_post_format_save', 'samovar_audio_post_format_nonce', $post );

}

//* Output Audio Shortcode markup.
add_action( 'genesis_before_entry', 'samovar_audio_post_format_markup' );
function samovar_audio_post_format_markup() {
	
	if ( get_post_format() != 'audio' ) {
		return;
	}
	
	$audio_url_mp3 = esc_url( genesis_get_custom_field( '_samovar_audio_mp3' ) );
	$audio_url_ogg = esc_url( genesis_get_custom_field( '_samovar_audio_ogg' ) );
	$audio_url_wav = esc_url( genesis_get_custom_field( '_samovar_audio_wav' ) );
	$audio_url_embed = esc_url( genesis_get_custom_field( '_samovar_audio_embed' ) );
	
	if ( ! empty($audio_url_embed) ) {
		global $wp_embed;
		echo $wp_embed->run_shortcode( '[embed]' . trim($audio_url_embed) . '[/embed]' );
	} else {
		$atts = array();
		if ( ! empty($audio_url_mp3) ) {
			$atts['mp3'] = $audio_url_mp3;
		}
		if ( ! empty($audio_url_mp3) ) {
			$atts['ogg'] = $audio_url_ogg;
		}
		if ( ! empty($audio_url_mp3) ) {
			$atts['wav'] = $audio_url_wav;
		}
		
		echo do_shortcode('[audio ' . samovar_get_attributes( $atts ) . ']');
	}
	
}
