<?php
/**
 * Typography options
 *
 * @package   Manila
 * @author    WP Hotelier
 * @copyright Copyright (c) 2019, WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$manila_google_fonts = apply_filters( 'manila_google_fonts_families', array(
	'Abel'                => 'Abel',
	'Arimo'               => 'Arimo',
	'Arvo'                => 'Arvo',
	'Asap'                => 'Asap',
	'Bitter'              => 'Bitter',
	'Bree Serif'          => 'Bree Serif',
	'Cabin Condensed'     => 'Cabin Condensed',
	'Cabin'               => 'Cabin',
	'Chivo'               => 'Chivo',
	'Cormorant'           => 'Cormorant',
	'Cormorant Garamond'  => 'Cormorant Garamond',
	'Cormorant Infant'    => 'Cormorant Infant',
	'Cuprum'              => 'Cuprum',
	'Dosis'               => 'Dosis',
	'Droid Sans'          => 'Droid Sans',
	'Droid Serif'         => 'Droid Serif',
	'Exo'                 => 'Exo',
	'Francois One'        => 'Francois One',
	'Inconsolata'         => 'Inconsolata',
	'Josefin Sans'        => 'Josefin Sans',
	'Karla'               => 'Karla',
	'Lato'                => 'Lato',
	'Lora'                => 'Lora',
	'Maven Pro'           => 'Maven Pro',
	'Merriweather'        => 'Merriweather',
	'Montserrat'          => 'Montserrat',
	'Mr De Haviland'      => 'Mr De Haviland',
	'Muli'                => 'Muli',
	'Nunito'              => 'Nunito',
	'Open Sans Condensed' => 'Open Sans Condensed',
	'Open Sans'           => 'Open Sans',
	'Oswald'              => 'Oswald',
	'Playfair Display'    => 'Playfair Display',
	'PT Sans Narrow'      => 'PT Sans Narrow',
	'PT Sans'             => 'PT Sans',
	'PT Serif Caption'    => 'PT Serif Caption',
	'PT Serif'            => 'PT Serif',
	'Questrial'           => 'Questrial',
	'Quicksand'           => 'Quicksand',
	'Raleway'             => 'Raleway',
	'Roboto'              => 'Roboto',
	'Roboto Condensed'    => 'Roboto Condensed',
	'Roboto Slab'         => 'Roboto Slab',
	'Rokkitt'             => 'Rokkitt',
	'Signika'             => 'Signika',
	'Slabo'               => 'Slabo',
	'Source Sans Pro'     => 'Source Sans Pro',
	'Ubuntu Condensed'    => 'Ubuntu Condensed',
	'Ubuntu'              => 'Ubuntu',
	'Varela Round'        => 'Varela Round',
	'Vollkorn'            => 'Vollkorn'
) );

$manila_font_weights = array(
	'300' => '300',
	'400' => '400',
	'500' => '500',
	'600' => '600',
	'700' => '700'
);

$wp_customize->add_section( 'manila-section-typography',
	array(
		'title'      => esc_html__( 'Typography', 'manila' ),
		'description'=> '',
		'priority'   => 54
) );


$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[font-main]',
	array(
		'default'           => 'Playfair Display',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'font-main',
	array(
		'label'       => esc_html__( 'Main font', 'manila' ),
		'section'     => 'manila-section-typography',
		'settings'    => MANILA_THEME_SETTINGS . '[font-main]',
		'type'        => 'select',
		'priority'	  => 1,
		'choices'     => $manila_google_fonts
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[font-main-custom]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'font-main-custom',
	array(
		'label'       => esc_html__( 'Main font - Custom font family', 'manila' ),
		'section'     => 'manila-section-typography',
		'settings'    => MANILA_THEME_SETTINGS . '[font-main-custom]',
		'type'        => 'text',
		'priority'	  => 2
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[font-main-regular-weight]',
	array(
		'default'           => '400',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'font-main-regular-weight',
	array(
		'label'       => esc_html__( 'Regular weight', 'manila' ),
		'section'     => 'manila-section-typography',
		'settings'    => MANILA_THEME_SETTINGS . '[font-main-regular-weight]',
		'type'        => 'select',
		'priority'	  => 3,
		'choices'     => $manila_font_weights
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[font-main-bold-weight]',
	array(
		'default'           => '700',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'font-main-bold-weight',
	array(
		'label'       => esc_html__( 'Bold weight', 'manila' ),
		'section'     => 'manila-section-typography',
		'settings'    => MANILA_THEME_SETTINGS . '[font-main-bold-weight]',
		'type'        => 'select',
		'priority'	  => 4,
		'choices'     => $manila_font_weights
	)
);

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[font-secondary]',
	array(
		'default'           => 'Open Sans',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'font-secondary',
	array(
		'label'       => esc_html__( 'Secondary font', 'manila' ),
		'section'     => 'manila-section-typography',
		'settings'    => MANILA_THEME_SETTINGS . '[font-secondary]',
		'type'        => 'select',
		'priority'	  => 5,
		'choices'     => $manila_google_fonts
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[font-secondary-custom]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'font-secondary-custom',
	array(
		'label'       => esc_html__( 'Secondary font - Custom font family', 'manila' ),
		'section'     => 'manila-section-typography',
		'settings'    => MANILA_THEME_SETTINGS . '[font-secondary-custom]',
		'type'        => 'text',
		'priority'	  => 6
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[font-secondary-regular-weight]',
	array(
		'default'           => '400',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'font-secondary-regular-weight',
	array(
		'label'       => esc_html__( 'Regular weight', 'manila' ),
		'section'     => 'manila-section-typography',
		'settings'    => MANILA_THEME_SETTINGS . '[font-secondary-regular-weight]',
		'type'        => 'select',
		'priority'	  => 7,
		'choices'     => $manila_font_weights
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[font-secondary-medium-weight]',
	array(
		'default'           => '600',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'font-secondary-medium-weight',
	array(
		'label'       => esc_html__( 'Medium weight', 'manila' ),
		'section'     => 'manila-section-typography',
		'settings'    => MANILA_THEME_SETTINGS . '[font-secondary-medium-weight]',
		'type'        => 'select',
		'priority'	  => 8,
		'choices'     => $manila_font_weights
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[font-secondary-bold-weight]',
	array(
		'default'           => '700',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'font-secondary-bold-weight',
	array(
		'label'       => esc_html__( 'Bold weight', 'manila' ),
		'section'     => 'manila-section-typography',
		'settings'    => MANILA_THEME_SETTINGS . '[font-secondary-bold-weight]',
		'type'        => 'select',
		'priority'	  => 9,
		'choices'     => $manila_font_weights
	)
);
