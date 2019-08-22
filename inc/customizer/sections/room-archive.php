<?php
/**
 * Layout settings
 *
 * @package   Manila
 * @author    Easy WP Hotelier
 * @copyright Copyright (c) 2019, Easy WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$wp_customize->add_section( 'manila-section-room-archive',
	array(
		'title'      => esc_html__( 'Room Archive', 'manila' ),
		'description'=> '',
		'priority'   => 55
) );



$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[room-archive-title]',
	array(
		'default'           => esc_html__( 'Rooms Archive', 'manila' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'room-archive-title',
	array(
		'label'       => esc_html__( 'Page title', 'manila' ),
		'section'     => 'manila-section-room-archive',
		'settings'    => MANILA_THEME_SETTINGS . '[room-archive-title]',
		'type'        => 'text',
		'priority'	  => 1,
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[room-archive-description]',
	array(
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_textarea' ),
	)
);

$wp_customize->add_control(
	'room-archive-description',
	array(
		'label'       => esc_html__( 'Page description (leave empty to disable)', 'manila' ),
		'section'     => 'manila-section-room-archive',
		'settings'    => MANILA_THEME_SETTINGS . '[room-archive-description]',
		'type'        => 'textarea',
		'priority'	  => 2,
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[room-archive-columns]',
	array(
		'default'           => 3,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'room-archive-columns',
	array(
		'label'       => esc_html__( 'Number of columns', 'manila' ),
		'section'     => 'manila-section-room-archive',
		'settings'    => MANILA_THEME_SETTINGS . '[room-archive-columns]',
		'type'        => 'select',
		'priority'	  => 3,
		'choices'  => array(
			2 => esc_html__( '2 columns', 'manila' ),
			3 => esc_html__( '3 columns', 'manila' ),
			4 => esc_html__( '4 columns', 'manila' ),
		)
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[room-archive-per_page]',
	array(
		'default'           => 9,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'room-archive-per_page',
	array(
		'label'       => esc_html__( 'Number of rooms per page', 'manila' ),
		'section'     => 'manila-section-room-archive',
		'settings'    => MANILA_THEME_SETTINGS . '[room-archive-per_page]',
		'type'        => 'number',
		'priority'	  => 4,
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[room-archive-loop-description]',
	array(
		'default'           => false,
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);

$wp_customize->add_control(
	'room-archive-loop-description',
	array(
		'label'       => esc_html__( 'Hide room description from loops', 'manila' ),
		'section'     => 'manila-section-room-archive',
		'settings'    => MANILA_THEME_SETTINGS . '[room-archive-loop-description]',
		'type'        => 'checkbox',
		'priority'	  => 5,
	)
);
