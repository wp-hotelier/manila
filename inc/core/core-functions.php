<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Manila
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! function_exists( 'manila_get_option' ) ) :

	/**
	 * Get customizer option.
	 */
	function manila_get_option( $option, $default = '' ) {
		$theme_options = get_theme_mod( MANILA_THEME_SETTINGS, array() );
		$value         = isset( $theme_options[ $option ] ) ? $theme_options[ $option ] : $default;

		return $value;
	}

endif;

if ( ! function_exists( 'manila_is_hotelier_active' ) ) :
/**
 * Check if Easy WP Hotelier is active
 */
function manila_is_hotelier_active() {
	if ( class_exists( 'Hotelier' ) ) {
		return true;
	}

	return false;
}
endif;

if ( ! function_exists( 'manila_google_fonts_url' ) ) :
/**
 * Get Google Web Fonts URL
 */
	function manila_google_fonts_url() {
		$fonts_url         = '';
		$primary_font      = manila_get_option( 'font-main-custom' ) ? 'custom' : manila_get_option( 'font-main', 'Playfair Display' );
		$secondary_font    = manila_get_option( 'font-secondary-custom' ) ? 'custom' : manila_get_option( 'font-secondary', 'Open Sans' );

		// Primary font weights
		$pf_regular_weight = manila_get_option( 'font-main-regular-weight', '400' );
		$pf_bold_weight    = manila_get_option( 'font-main-bold-weight', '700' );

		// Secondary font weights
		$sf_regular_weight = manila_get_option( 'font-secondary-regular-weight', '400' );
		$sf_medium_weight  = manila_get_option( 'font-secondary-regular-weight', '600' );
		$sf_bold_weight    = manila_get_option( 'font-secondary-regular-weight', '700' );

		if ( 'custom' !== $primary_font || 'custom' !== $secondary_font ) {
			$font_families = array();

			if ( 'custom' !== $primary_font ) {
				$font_families[] = $primary_font . ':' . $pf_regular_weight . ',' . $pf_bold_weight . ',' . $pf_regular_weight . 'italic,' . $pf_bold_weight . 'italic';
			}

			if ( 'custom' !== $secondary_font ) {
				$font_families[] = $secondary_font . ':' . $sf_regular_weight . ',' . $sf_medium_weight . ',' . $sf_bold_weight;
			}

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;

if ( ! function_exists( 'manila_is_gutenberg_active' ) ) :
/**
 * Check if Gutenberg is active
 */
function manila_is_gutenberg_active() {
	if ( function_exists( 'the_gutenberg_project' ) ) {
		return true;
	}

	return false;
}
endif;
