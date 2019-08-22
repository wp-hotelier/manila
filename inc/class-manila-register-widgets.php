<?php
/**
 * Manila Widgets
 *
 * @package   Manila
 * @author    WP Hotelier
 * @copyright Copyright (c) 2019, WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'Manila_Register_Widgets' ) ) :

/**
 * Manila_Register_Widgets Class
 */
class Manila_Register_Widgets {

	/**
	 * Construct.
	 */
	public function __construct() {
		add_action( 'widgets_init', array( $this, 'register_widgets' ) );
	}

	/**
	 * Register widgets
	 */
	public function register_widgets() {
		register_sidebar( array(
			'name'          => esc_html__( 'Main Sidebar', 'manila' ),
			'id'            => 'main-sidebar',
			'description'   => esc_html__( 'This is the main sidebar. Add widgets here.', 'manila' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title widget__title">',
			'after_title'   => '</h2>',
		) );

		if ( manila_is_hotelier_active() ) {

			register_sidebar( array(
				'name'          => esc_html__( 'Booking Sidebar', 'manila' ),
				'id'            => 'booking-sidebar',
				'description'   => esc_html__( 'This sidebar is visible only in the booking pages. Add widgets here.', 'manila' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title widget__title">',
				'after_title'   => '</h2>',
			) );

			register_sidebar( array(
				'name'          => esc_html__( 'Room Sidebar', 'manila' ),
				'id'            => 'room-sidebar',
				'description'   => esc_html__( 'This sidebar is visible only in the single room page. Add widgets here.', 'manila' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title widget__title">',
				'after_title'   => '</h2>',
			) );

			register_sidebar( array(
				'name'          => esc_html__( 'Room Archive Sidebar', 'manila' ),
				'id'            => 'room-archive-sidebar',
				'description'   => esc_html__( 'This sidebar is visible only in the room archive pages. Add widgets here.', 'manila' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title widget__title">',
				'after_title'   => '</h2>',
			) );
		}

		$manila_footer_columns = manila_get_option( 'footer-layout', 4 );

		for ( $i = 1; $i <= $manila_footer_columns; $i++ ) {
			register_sidebar( array(
				/* translators: %s: column number. */
				'name'          => sprintf( esc_html__( 'Footer %s', 'manila' ), $i ),
				'id'            => 'footer-' . $i,
				/* translators: %s: column number. */
				'description'   => sprintf( esc_html__( 'This is a footer column (No. %s). Add widgets here.', 'manila' ), $i ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title widget__title">',
				'after_title'   => '</h2>',
			) );
		}
	}
}

endif;

return new Manila_Register_Widgets();
