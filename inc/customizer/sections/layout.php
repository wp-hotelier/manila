<?php
/**
 * Layout settings
 *
 * @package   Manila
 * @author    Easy WP Hotelier
 * @copyright Copyright (c) 2018, Easy WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$wp_customize->add_section( 'manila-section-site-layout',
	array(
		'title'      => esc_html__( 'Site Layout', 'manila' ),
		'description'=> '',
		'priority'   => 52
) );



$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[blog-layout]',
	array(
		'default'           => 'right-sidebar',
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_site_layout' ),
	)
);

$wp_customize->add_control(
	'blog-layout',
	array(
		'label'       => esc_html__( 'Blog page layout', 'manila' ),
		'description' => esc_html__( 'Select the layout of the blog page', 'manila' ),
		'section'     => 'manila-section-site-layout',
		'settings'    => MANILA_THEME_SETTINGS . '[blog-layout]',
		'type'        => 'radio',
		'priority'	  => 1,
		'choices'     => array(
			'right-sidebar'      => esc_html__( 'Right sidebar', 'manila' ),
			'left-sidebar'       => esc_html__( 'Left sidebar', 'manila' ),
			'no-sidebar'         => esc_html__( 'No sidebar', 'manila' ),
		)
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[category-layout]',
	array(
		'default'           => 'right-sidebar',
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_site_layout' ),
	)
);

$wp_customize->add_control(
	'category-layout',
	array(
		'label'       => esc_html__( 'Category page layout', 'manila' ),
		'description' => esc_html__( 'Select the layout of the category page', 'manila' ),
		'section'     => 'manila-section-site-layout',
		'settings'    => MANILA_THEME_SETTINGS . '[category-layout]',
		'type'        => 'radio',
		'priority'	  => 2,
		'choices'     => array(
			'right-sidebar'      => esc_html__( 'Right sidebar', 'manila' ),
			'left-sidebar'       => esc_html__( 'Left sidebar', 'manila' ),
			'no-sidebar'         => esc_html__( 'No sidebar', 'manila' ),
		)
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[tag-layout]',
	array(
		'default'           => 'right-sidebar',
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_site_layout' ),
	)
);

$wp_customize->add_control(
	'tag-layout',
	array(
		'label'       => esc_html__( 'Tag page layout', 'manila' ),
		'description' => esc_html__( 'Select the layout of the tag page', 'manila' ),
		'section'     => 'manila-section-site-layout',
		'settings'    => MANILA_THEME_SETTINGS . '[tag-layout]',
		'type'        => 'radio',
		'priority'	  => 3,
		'choices'     => array(
			'right-sidebar'      => esc_html__( 'Right sidebar', 'manila' ),
			'left-sidebar'       => esc_html__( 'Left sidebar', 'manila' ),
			'no-sidebar'         => esc_html__( 'No sidebar', 'manila' ),
		)
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[archive-layout]',
	array(
		'default'           => 'right-sidebar',
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_site_layout' ),
	)
);

$wp_customize->add_control(
	'archive-layout',
	array(
		'label'       => esc_html__( 'Archive pages layout', 'manila' ),
		'description' => esc_html__( 'Select the layout of the archive pages', 'manila' ),
		'section'     => 'manila-section-site-layout',
		'settings'    => MANILA_THEME_SETTINGS . '[archive-layout]',
		'type'        => 'radio',
		'priority'	  => 4,
		'choices'     => array(
			'right-sidebar'      => esc_html__( 'Right sidebar', 'manila' ),
			'left-sidebar'       => esc_html__( 'Left sidebar', 'manila' ),
			'no-sidebar'         => esc_html__( 'No sidebar', 'manila' ),
		)
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[search-layout]',
	array(
		'default'           => 'right-sidebar',
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_site_layout' ),
	)
);

$wp_customize->add_control(
	'search-layout',
	array(
		'label'       => esc_html__( 'Search page layout', 'manila' ),
		'description' => esc_html__( 'Select the layout of the search page', 'manila' ),
		'section'     => 'manila-section-site-layout',
		'settings'    => MANILA_THEME_SETTINGS . '[search-layout]',
		'type'        => 'radio',
		'priority'	  => 5,
		'choices'     => array(
			'right-sidebar'      => esc_html__( 'Right sidebar', 'manila' ),
			'left-sidebar'       => esc_html__( 'Left sidebar', 'manila' ),
			'no-sidebar'         => esc_html__( 'No sidebar', 'manila' ),
		)
	)
);

// *************************************************************** //
$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[post-layout]',
	array(
		'default'           => 'right-sidebar',
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_site_layout' ),
	)
);

$wp_customize->add_control(
	'post-layout',
	array(
		'label'       => esc_html__( 'Post page layout', 'manila' ),
		'description' => esc_html__( 'Select the layout of the post page', 'manila' ),
		'section'     => 'manila-section-site-layout',
		'settings'    => MANILA_THEME_SETTINGS . '[post-layout]',
		'type'        => 'radio',
		'priority'	  => 6,
		'choices'     => array(
			'right-sidebar'      => esc_html__( 'Right sidebar', 'manila' ),
			'left-sidebar'       => esc_html__( 'Left sidebar', 'manila' ),
			'no-sidebar'         => esc_html__( 'No sidebar', 'manila' ),
		)
	)
);

// *************************************************************** //

if ( manila_is_hotelier_active() ) {

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[listing-layout]',
	array(
		'default'           => 'left-sidebar',
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_site_layout' ),
	)
);

$wp_customize->add_control(
	'listing-layout',
	array(
		'label'       => esc_html__( 'Listing page layout', 'manila' ),
		'description' => esc_html__( 'Select the layout of the listing page', 'manila' ),
		'section'     => 'manila-section-site-layout',
		'settings'    => MANILA_THEME_SETTINGS . '[listing-layout]',
		'type'        => 'radio',
		'priority'	  => 7,
		'choices'     => array(
			'right-sidebar'      => esc_html__( 'Right sidebar', 'manila' ),
			'left-sidebar'       => esc_html__( 'Left sidebar', 'manila' ),
			'no-sidebar'         => esc_html__( 'No sidebar', 'manila' ),
		)
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[booking-layout]',
	array(
		'default'           => 'left-sidebar',
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_site_layout' ),
	)
);

$wp_customize->add_control(
	'booking-layout',
	array(
		'label'       => esc_html__( 'Booking page layout', 'manila' ),
		'description' => esc_html__( 'Select the layout of the booking page', 'manila' ),
		'section'     => 'manila-section-site-layout',
		'settings'    => MANILA_THEME_SETTINGS . '[booking-layout]',
		'type'        => 'radio',
		'priority'	  => 8,
		'choices'     => array(
			'right-sidebar'      => esc_html__( 'Right sidebar', 'manila' ),
			'left-sidebar'       => esc_html__( 'Left sidebar', 'manila' ),
			'no-sidebar'         => esc_html__( 'No sidebar', 'manila' ),
		)
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[room-layout]',
	array(
		'default'           => 'right-sidebar',
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_site_layout' ),
	)
);

$wp_customize->add_control(
	'room-layout',
	array(
		'label'       => esc_html__( 'Room page layout', 'manila' ),
		'description' => esc_html__( 'Select the layout of the room page', 'manila' ),
		'section'     => 'manila-section-site-layout',
		'settings'    => MANILA_THEME_SETTINGS . '[room-layout]',
		'type'        => 'radio',
		'priority'	  => 9,
		'choices'     => array(
			'right-sidebar'      => esc_html__( 'Right sidebar', 'manila' ),
			'left-sidebar'       => esc_html__( 'Left sidebar', 'manila' ),
			'no-sidebar'         => esc_html__( 'No sidebar', 'manila' ),
		)
	)
);

// *************************************************************** //

$wp_customize->add_setting(
	MANILA_THEME_SETTINGS . '[room-archive-layout]',
	array(
		'default'           => 'no-sidebar',
		'sanitize_callback' => array( 'Manila_Customizer_Sanitizes', 'sanitize_site_layout' ),
	)
);

$wp_customize->add_control(
	'room-archive-layout',
	array(
		'label'       => esc_html__( 'Room archive pages layout', 'manila' ),
		'description' => esc_html__( 'Select the layout of the room archive pages', 'manila' ),
		'section'     => 'manila-section-site-layout',
		'settings'    => MANILA_THEME_SETTINGS . '[room-archive-layout]',
		'type'        => 'radio',
		'priority'	  => 10,
		'choices'     => array(
			'right-sidebar'      => esc_html__( 'Right sidebar', 'manila' ),
			'left-sidebar'       => esc_html__( 'Left sidebar', 'manila' ),
			'no-sidebar'         => esc_html__( 'No sidebar', 'manila' ),
		)
	)
);

}
