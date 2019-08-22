<?php
/**
 * Manila Theme Customizer
 *
 * @package   Manila
 * @author    Easy WP Hotelier
 * @copyright Copyright (c) 2019, Easy WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'Manila_Customizer' ) ) :

/**
 * Manila_Customizer Class
 */
class Manila_Customizer {

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
	public function __construct() {
		$this->includes();

		add_action( 'customize_register', array( $this, 'customize_register' ) );
	}

	/**
	 * Include helper files.
	 */
	public function includes() {
		require MANILA_THEME_DIR . 'inc/customizer/class-manila-customizer-sanitizes.php';
	}

	/**
	 * Add Customzer settings.
	 */
	public function customize_register( $wp_customize ) {
		require MANILA_THEME_DIR . 'inc/customizer/custom-controls/slider/class-manila-control-slider.php';

		$wp_customize->register_control_type( 'Manila_Customizer_Slider_Control' );

		require MANILA_THEME_DIR . 'inc/customizer/sections/navigation.php';
		require MANILA_THEME_DIR . 'inc/customizer/sections/slider.php';
		require MANILA_THEME_DIR . 'inc/customizer/sections/layout.php';
		require MANILA_THEME_DIR . 'inc/customizer/sections/footer.php';
		require MANILA_THEME_DIR . 'inc/customizer/sections/typography.php';
		require MANILA_THEME_DIR . 'inc/customizer/sections/room-archive.php';
	}
}

endif;

Manila_Customizer::instance();
