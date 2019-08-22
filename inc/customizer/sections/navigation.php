<?php
/**
 * Navigation options
 *
 * @package   Manila
 * @author    Easy WP Hotelier
 * @copyright Copyright (c) 2019, Easy WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$wp_customize->add_section( 'manila-section-navigation',
	array(
		'title'      => esc_html__( 'Navigation', 'manila' ),
		'description'=> '',
		'priority'   => 50
) );



$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[navigation-layout]',
	array(
		'default'           => 'default-menu',
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_navigation_layout' ),
	)
);

$wp_customize->add_control(
	'navigation-layout',
	array(
		'label'       => esc_html__( 'Navigation layout', 'manila' ),
		'section'     => 'manila-section-navigation',
		'settings'    => MANILA_THEME_SETTINGS . '[navigation-layout]',
		'type'        => 'radio',
		'priority'	  => 1,
		'choices'     => array(
			'default-menu'    => esc_html__( 'Default menu', 'manila' ),
			'off-canvas-menu' => esc_html__( 'Off canvas menu', 'manila' ),
			'top-menu'        => esc_html__( 'Top menu', 'manila' ),
		)
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[navigation-show-book-button]',
	array(
		'default'           => false,
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);

$wp_customize->add_control(
	'navigation-show-book-button',
	array(
		'label'       => esc_html__( 'Show book button', 'manila' ),
		'section'     => 'manila-section-navigation',
		'settings'    => MANILA_THEME_SETTINGS . '[navigation-show-book-button]',
		'type'        => 'checkbox',
		'priority'	  => 2
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[navigation-show-language-switcher]',
	array(
		'default'           => false,
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);

$wp_customize->add_control(
	'navigation-show-language-switcher',
	array(
		'label'       => esc_html__( 'Show language switcher', 'manila' ),
		'description' => esc_html__( 'You need to install and activate WPML', 'manila' ),
		'section'     => 'manila-section-navigation',
		'settings'    => MANILA_THEME_SETTINGS . '[navigation-show-language-switcher]',
		'type'        => 'checkbox',
		'priority'	  => 3
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[navigation-off-canvas-show-logo]',
	array(
		'default'           => true,
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);

$wp_customize->add_control(
	'navigation-off-canvas-show-logo',
	array(
		'label'       => esc_html__( 'Show logo on off-canvas navigation', 'manila' ),
		'section'     => 'manila-section-navigation',
		'settings'    => MANILA_THEME_SETTINGS . '[navigation-off-canvas-show-logo]',
		'type'        => 'checkbox',
		'priority'	  => 4
	)
);
