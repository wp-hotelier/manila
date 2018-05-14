<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Manila
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function manila_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class when showing logo on off-canvas navigation.
	$show_logo_off_canvas = manila_get_option( 'navigation-off-canvas-show-logo', true );

	if ( $show_logo_off_canvas ) {
		$classes[] = 'off-canvas-show-logo';
	}

	// Adds a custom class when the sticky header is enabled
	if ( manila_get_option( 'navigation-sticky-header', true ) ) {
		$classes[] = 'sticky-header-enabled';
	}

	return $classes;
}
add_filter( 'body_class', 'manila_body_classes' );

/**
 * Add `post__item` and `page__item` classes.
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function manila_post_classes( $classes ) {
	if ( 'page' === get_post_type() ) {
		$classes[] = 'page__item';
	}

	if ( 'post' === get_post_type() ) {
		$classes[] = 'post__item';
	}

	return $classes;
}
add_filter( 'post_class', 'manila_post_classes' );

/**
 * Adds custom classes to the `content` div.
 *
 * @return string
 */
function manila_site_content_classes() {
	echo 'class="' . join( ' ', manila_get_site_content_classes()) . '"'; // WPCS: XSS ok, sanitization ok.
}

/**
 * Retrieves the classes for the `content` div as an array.
 *
 * @return array Array of classes.
 */
function manila_get_site_content_classes() {
	$layout = manila_get_site_layout();

	$classes = array(
		'site-content',
	);

	if ( $layout == 'left-sidebar' || $layout == 'right-sidebar' || $layout == 'no-sidebar' ) {
		$classes[] = 'wrapper';
	}

	// Filter for developers
	$classes = apply_filters( 'manila_site_content_class', $classes );

	// Sanitize classes
	$classes = array_map( 'esc_attr', $classes );

	return array_unique( $classes );
}

/**
 * Adds custom classes to the `site-main` div.
 *
 * @return string
 */
function manila_site_main_classes() {
	echo 'class="' . join( ' ', manila_get_site_main_classes()) . '"'; // WPCS: XSS ok, sanitization ok.
}

/**
 * Retrieves the classes for the `site-main` div as an array.
 *
 * @return array Array of classes.
 */
function manila_get_site_main_classes() {
	$layout = manila_get_site_layout();
	$layout = str_replace( '-full', '', $layout );

	$classes = array(
		'site-main',
		'site-main--' . $layout
	);

	// Filter for developers
	$classes = apply_filters( 'manila_site_main_class', $classes );

	// Sanitize classes
	$classes = array_map( 'esc_attr', $classes );

	return array_unique( $classes );
}

/**
 * Adds custom classes to the `site-sidebar` div.
 *
 * @return string
 */
function manila_site_sidebar_classes() {
	echo 'class="' . join( ' ', manila_get_site_sidebar_classes()) . '"'; // WPCS: XSS ok, sanitization ok.
}

/**
 * Retrieves the classes for the `site-sidebar` div as an array.
 *
 * @return array Array of classes.
 */
function manila_get_site_sidebar_classes() {
	$layout = manila_get_site_layout();
	$layout = str_replace( '-full', '', $layout );

	$classes = array(
		'site-sidebar',
		'site-sidebar--' . $layout
	);

	// Filter for developers
	$classes = apply_filters( 'manila_site_sidebar_class', $classes );

	// Sanitize classes
	$classes = array_map( 'esc_attr', $classes );

	return array_unique( $classes );
}

/**
 * Gets site layout option.
 *
 * @return string
 */
function manila_get_site_layout() {
	$layout = 'right-sidebar';

	if ( is_home() ) {
		$layout = manila_get_option( 'blog-layout', 'right-sidebar' );
	} else if ( is_search() ) {
		if ( manila_is_hotelier_active() && is_room_archive() ) {
			$layout = manila_get_option( 'room-archive-layout', 'no-sidebar' );
		} else {
			$layout = manila_get_option( 'search-layout', 'right-sidebar' );
		}
	} else if ( is_category() ) {
		$layout = manila_get_option( 'category-layout', 'right-sidebar' );
	} else if ( is_tag() ) {
		$layout = manila_get_option( 'tag-layout', 'right-sidebar' );
	} else if ( is_archive() ) {
		if ( manila_is_hotelier_active() && ( is_room_archive() || is_room_category() ) ) {
			$layout = manila_get_option( 'room-archive-layout', 'no-sidebar' );
		} else {
			$layout = manila_get_option( 'archive-layout', 'right-sidebar' );
		}
	} else if ( is_single() ) {
		if ( manila_is_hotelier_active() && is_room() ) {
			$layout = manila_get_option( 'room-layout', 'right-sidebar' );
		} else {
			$layout = manila_get_option( 'post-layout', 'right-sidebar' );
		}
	} else if ( is_page() ) {
		if ( manila_is_hotelier_active() && is_booking() ) {
			$layout = manila_get_option( 'booking-layout', 'left-sidebar' );
		} else if ( manila_is_hotelier_active() && is_listing() ) {
			$layout = manila_get_option( 'listing-layout', 'left-sidebar' );
		} else if ( is_page_template( 'template-page-sidebar-left.php' ) ) {
			$layout = 'left-sidebar';
		} else if ( is_page_template( 'template-page-sidebar-left-full.php' ) ) {
			$layout = 'left-sidebar-full';
		} else if ( is_page_template( 'template-page-sidebar-right.php' ) ) {
			$layout = 'right-sidebar';
		} else if ( is_page_template( 'template-page-sidebar-right-full.php' ) ) {
			$layout = 'right-sidebar-full';
		} else if ( is_page_template( 'template-page-no-sidebar-full.php' ) ) {
			$layout = 'no-sidebar-full';
		} else {
			$layout = 'no-sidebar';
		}
	}

	return $layout;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function manila_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'manila_pingback_header' );

/**
 * Allowed tags in the language switcher.
 */
function manila_language_list_allowed_html() {
	return array(
		'span' => array(
			'class' => array()
		),
		'ul' => array(
			'id'    => array(),
			'class' => array()
		),
		'li' => array(
			'id'    => array(),
			'class' => array()
		),
		'a' => array(
			'id'    => array(),
			'class' => array(),
			'href'  => array(),
			'title' => array()
		),
	);
}

if ( ! function_exists( 'manila_disable_srcset' ) ) :
/**
 * Remove srcset from images
 */
function manila_disable_srcset() {

	return false;
}
endif;
