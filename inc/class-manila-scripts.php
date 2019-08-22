<?php
/**
 * Manila Scripts
 *
 * @package   Manila
 * @author    Easy WP Hotelier
 * @copyright Copyright (c) 2019, Easy WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'Manila_Scripts' ) ) :

/**
 * Manila_Scripts Class
 */
class Manila_Scripts {

	/**
	 * Construct.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts' ) );
		add_action( 'wp_head', array( $this, 'javascript_detection' ), 0 );
	}

	/**
	 * Enqueue styles
	 */
	public function frontend_styles() {
		wp_enqueue_style( 'manila-style', get_stylesheet_uri(), null, MANILA_THEME_VERSION );

		// Hotelier specific scripts and styles
		if ( manila_is_hotelier_active() ) {
			wp_enqueue_style( 'manila-hotelier', get_template_directory_uri() . '/assets/css/hotelier.css', array(), MANILA_THEME_VERSION );
		}

		// Google Fonts
		$google_fonts_url = manila_google_fonts_url();

		if ( $google_fonts_url ) {
			wp_enqueue_style( 'manila-google-fonts', manila_google_fonts_url(), array(), null );
		}

		// Gutenberg specific scripts and styles
		if ( manila_is_gutenberg_active() ) {
			wp_enqueue_style( 'manila-gutenberg', get_template_directory_uri() . '/assets/css/gutenberg.css', array(), MANILA_THEME_VERSION );
		}
	}

	/**
	 * Enqueue scripts
	 *
	 * @access public
	 * @return void
	 */
	public function frontend_scripts() {
		wp_enqueue_script( 'manila-main', MANILA_THEME_URI . 'assets/js/main.js', array(), MANILA_THEME_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Homepage template specific scripts
		if ( ! is_home() && is_front_page() ) {
			// Flexslider
			wp_register_script( 'flexslider', get_template_directory_uri() . '/assets/js/vendor/flexslider.js', array(), '2.7.0', true );

			$home_slides             = manila_get_option( 'homepage-slider' );
			$home_slider_has_slides  = is_array( $home_slides ) && ! empty( $home_slides ) ? true : false;

			// Homepage template specific scripts
			if ( $home_slider_has_slides ) {
				wp_enqueue_script( 'flexslider' );
			}
		}

		// Hotelier specific scripts and styles
		if ( manila_is_hotelier_active() ) {
			// if ( is_room() ) {
			// 	// Flexslider
			// 	wp_enqueue_script( 'flexslider' );
			// }
		}
	}

	/**
	 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
	 */
	public function javascript_detection() {
		echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
	}
}

endif;

return new Manila_Scripts();
