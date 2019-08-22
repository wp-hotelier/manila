<?php
/**
 * Slider options
 *
 * @package   Manila
 * @author    WP Hotelier
 * @copyright Copyright (c) 2019, WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$wp_customize->add_section( 'manila-section-slider',
	array(
		'title'      => esc_html__( 'Home Slider', 'manila' ),
		'description'=> '',
		'priority'   => 51
) );



$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[homepage-slider]',
	array(
		'default' => array(),
		'sanitize_callback' => 'wp_parse_id_list',
	)
);

$wp_customize->add_control(
	new Manila_Customizer_Slider_Control(
		$wp_customize,
		'homepage-slider',
		array(
			'label'    => esc_html__( 'Slider', 'manila' ),
			'section'  => 'manila-section-slider',
			'settings' => MANILA_THEME_SETTINGS . '[homepage-slider]',
			'type'     => 'slider',
			'priority' => 1
		)
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[homepage-slider-text]',
	array(
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_textarea' ),
	)
);

$wp_customize->add_control(
	'homepage-slider-text',
	array(
		'label'       => esc_html__( 'Slider text', 'manila' ),
		'section'     => 'manila-section-slider',
		'settings'    => MANILA_THEME_SETTINGS . '[homepage-slider-text]',
		'type'        => 'textarea',
		'priority'	  => 2,
	)
);

// *************************************************************** //

if ( manila_is_hotelier_active() ) {

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[homepage-slider-show-datepicker]',
	array(
		'default'           => true,
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);

$wp_customize->add_control(
	'homepage-slider-show-datepicker',
	array(
		'label'       => esc_html__( 'Show datepicker', 'manila' ),
		'section'     => 'manila-section-slider',
		'settings'    => MANILA_THEME_SETTINGS . '[homepage-slider-show-datepicker]',
		'type'        => 'checkbox',
		'priority'	  => 3
	)
);

}
