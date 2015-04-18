<?php
/**
 * Helper functions for all the project.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov <http://websanya.ru/>
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
	
/**
 * Define a constant if not already defined.
 *
 * @param string $key The constant name.
 * @param string $value The constant value.
 * @return void
 */
if( !function_exists('samovar_define') ) {
	function samovar_define( $key, $value ) {
		if( !defined($key) ) {
			define( $key, $value );
		}
	}
}

/**
 * Require a back end file.
 *
 * @param string $file
 * @return void
 */
if ( !function_exists( 'samovar_back_require' ) ) {
	function samovar_back_require( $file ) {
		$path = locate_template( 'lib/back/' . $file );

		if ( ! empty( $path ) ) {
			require_once $path;
		}
	}
}

/**
 * Require a front end file.
 *
 * @param string $file
 * @return void
 */
if ( !function_exists( 'samovar_front_require' ) ) {
	function samovar_front_require( $file ) {
		$path = locate_template( 'lib/front/' . $file );

		if ( ! empty( $path ) ) {
			require_once $path;
		}
	}
}

/**
 * Require a customizer file.
 *
 * @param string $file
 * @return void
 */
if ( !function_exists( 'samovar_customizer_require' ) ) {
	function samovar_customizer_require( $file ) {
		$path = locate_template( 'lib/customizer/' . $file );

		if ( ! empty( $path ) ) {
			require_once $path;
		}
	}
}

/**
 * Concat a list of HTML attributes.
 *
 * @param array $atts The element attributes.
 * @return string Concatted string with the attributes.
 */
function samovar_get_attributes( $atts = array() ) {
	$attributes = '';
	foreach( $atts as $key => $value ) {
		$attributes .= ' ' . $key . '="' . esc_attr( $value ) . '"';
	}
	return $attributes;
}

/**
 * Sanitize text inside associative array.
 *
 * @param array $data Associative array data.
 * @param array $set Set with some stuff to be checked.
 * @return void
 */
function samovar_sanitize_text_array( $data, $set ) {
	foreach ( (array) $data as $key => $value ) {
		if ( in_array( $key, $set ) ) {
			$data[ $key ] = strip_tags( $value );	
		}
	}	
}