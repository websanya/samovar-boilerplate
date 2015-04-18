<?php
/**
 * Callback for image post format meta box.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
	
//* Output Image Post Format markup.
add_action( 'genesis_before_entry', 'samovar_image_post_format_markup' );
function samovar_image_post_format_markup() {
	
	if ( get_post_format() != 'image' ) {
		return;
	}
	
	$img = genesis_get_image( array(
		'format'  => 'html',
		'size'    => esc_html( genesis_get_option( 'image_size' ) ),
	) );

	if ( ! empty( $img ) ) {
		echo $img;	
	}
	
}