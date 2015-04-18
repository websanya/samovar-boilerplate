<?php
/**
 * Callback for video post format meta box.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

//* The callback itself.
function samovar_video_post_format_box() {
	wp_nonce_field( 'samovar_video_post_format_save', 'samovar_video_post_format_nonce' );
	?>
	<p>
		<label for="samovar_video_mp4"><?php _e( 'MP4 URL:', 'samovar' ); ?> <input type="text" name="samovar_video_format[_samovar_video_mp4]" id="samovar_video_mp4" value="<?php echo esc_url( genesis_get_custom_field( '_samovar_video_mp4' ) ); ?>" size="80" /></label>
	</p>
	<p>
		<label for="samovar_video_ogv"><?php _e( 'OGV URL:', 'samovar' ); ?> <input type="text" name="samovar_video_format[_samovar_video_ogv]" id="samovar_video_ogv" value="<?php echo esc_url( genesis_get_custom_field( '_samovar_video_ogv' ) ); ?>" size="80" /></label>
	</p>
	<p>
		<label for="samovar_video_mov"><?php _e( 'MOV URL:', 'samovar' ); ?> <input type="text" name="samovar_video_format[_samovar_video_mov]" id="samovar_video_mov" value="<?php echo esc_url( genesis_get_custom_field( '_samovar_video_mov' ) ); ?>" size="80" /></label>
	</p>
	<p>
		<label for="samovar_video_embed"><?php _e( 'Embed URL:', 'samovar' ); ?> <input type="text" name="samovar_video_format[_samovar_video_embed]" id="samovar_video_embed" value="<?php echo esc_url( genesis_get_custom_field( '_samovar_video_embed' ) ); ?>" size="80" /></label>
	</p>
	<?php
}

//* Save custom fields into database.
add_action( 'save_post', 'samovar_video_post_format_save', 1, 2 );
function samovar_video_post_format_save( $post_id, $post ) {

	if ( ! isset( $_POST['samovar_video_format'] ) )
		return;

	$data = wp_parse_args( $_POST['samovar_video_format'], array(
		'_samovar_video_mp4' 		=> '',
		'_samovar_video_ogv'		=> '',
		'_samovar_video_mov'		=> '',
		'_samovar_video_embed'	=> '',
	) );
	
	//* Sanitize the fields
	samovar_sanitize_text_array( $data, array( '_samovar_video_mp4', '_samovar_video_ogv', '_samovar_video_mov' , '_samovar_video_embed' ) );

	genesis_save_custom_fields( $data, 'samovar_video_post_format_save', 'samovar_video_post_format_nonce', $post );

}

//* Output video Shortcode markup.
add_action( 'genesis_before_entry', 'samovar_video_post_format_output' );
function samovar_video_post_format_output() {
	if ( get_post_format() != 'video' ) {
		return;
	}
	
	$video_url_mp4 = esc_url( genesis_get_custom_field( '_samovar_video_mp4' ) );
	$video_url_ogv = esc_url( genesis_get_custom_field( '_samovar_video_ogv' ) );
	$video_url_mov = esc_url( genesis_get_custom_field( '_samovar_video_mov' ) );
	$video_url_embed = esc_url( genesis_get_custom_field( '_samovar_video_embed' ) );
	
	if ( ! empty($video_url_embed) ) {
		global $wp_embed;
		echo $wp_embed->run_shortcode( '[embed]' . trim($video_url_embed) . '[/embed]' );
	} else {
		$atts = array();
		if ( ! empty($video_url_mp4) ) {
			$atts['mp4'] = $video_url_mp4;
		}
		if ( ! empty($video_url_mp4) ) {
			$atts['ogv'] = $video_url_ogv;
		}
		if ( ! empty($video_url_mp4) ) {
			$atts['mov'] = $video_url_mov;
		}
		echo do_shortcode('[video ' . samovar_get_attributes( $atts ) . ']');
	}
}
