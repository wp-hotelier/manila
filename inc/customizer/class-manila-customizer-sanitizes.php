<?php
/**
 * Manila Theme Customizer Sanitizes
 *
 * @package   Manila
 * @author    Easy WP Hotelier
 * @copyright Copyright (c) 2019, Easy WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'Manila_Customizer_Sanitizes' ) ) :

/**
 * Manila_Customizer_Sanitizes Class
 */
class Manila_Customizer_Sanitizes {

	/**
	 * The single instance of the class
	 */
	private static $_instance = null;

	/**
	 * Insures that only one instance of the class exists in memory at any one time.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Get things going
	 */
	public function __construct() {}

	/**
	 * Sanitize checkbox.
	 */
	public static function sanitize_checkbox( $val ) {
		return ( 1 == $val ) ? 1 : '';
	}

	/**
	 * Sanitize textarea.
	 */
	public static function sanitize_textarea( $val ) {
		return wp_kses_post( $val );
	}

	/**
	 * Sanitize navigation layout.
	 */
	public static function sanitize_navigation_layout( $val ) {
		$whitelist = array(
			'default-menu',
			'off-canvas-menu',
			'top-menu',
		);

		if ( in_array( $val, $whitelist ) ) {
			return $val;
		} else {
			return 'default-menu';
		}
	}

	/**
	 * Sanitize site layout.
	 */
	public static function sanitize_site_layout( $val ) {
		$whitelist = array(
			'right-sidebar',
			'left-sidebar',
			'no-sidebar',
			'right-sidebar-full',
			'left-sidebar-full',
			'no-sidebar-full',
		);

		if ( in_array( $val, $whitelist ) ) {
			return $val;
		} else {
			return 'right-sidebar';
		}
	}
}

endif;

Manila_Customizer_Sanitizes::instance();
