<?php
/**
 * Footer settings
 *
 * @package   Manila
 * @author    Easy WP Hotelier
 * @copyright Copyright (c) 2018, Easy WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$wp_customize->add_section( 'manila-section-footer-settings',
	array(
		'title'      => esc_html__( 'Footer Settings', 'manila' ),
		'description'=> '',
		'priority'   => 53
) );



$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[footer-layout]',
	array(
		'default'           => 4,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'footer-layout',
	array(
		'label'       => esc_html__( 'Footer layout', 'manila' ),
		'description' => esc_html__( 'Select the number of columns', 'manila' ),
		'section'     => 'manila-section-footer-settings',
		'settings'    => MANILA_THEME_SETTINGS . '[footer-layout]',
		'type'        => 'radio',
		'priority'	  => 1,
		'choices'     => array(
			2 => esc_html__( '2 columns', 'manila' ),
			3 => esc_html__( '3 columns', 'manila' ),
			4 => esc_html__( '4 columns', 'manila' ),
			5 => esc_html__( '5 columns', 'manila' ),
		)
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[footer-copyright]',
	array(
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_textarea' ),
	)
);

$wp_customize->add_control(
	'footer-copyright',
	array(
		'label'       => esc_html__( 'Footer copyright', 'manila' ),
		'section'     => 'manila-section-footer-settings',
		'settings'    => MANILA_THEME_SETTINGS . '[footer-copyright]',
		'type'        => 'textarea',
		'priority'	  => 2,
	)
);
