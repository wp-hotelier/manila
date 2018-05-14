<?php
/**
 * Manila Setup Theme
 *
 * @package   Manila
 * @author    Easy WP Hotelier
 * @copyright Copyright (c) 2018, Easy WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'Manila_Setup_Theme' ) ) :

/**
 * Manila_Setup_Theme Class
 */
class Manila_Setup_Theme {

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
		add_action( 'after_setup_theme', array( $this, 'setup_theme' ), 2 );
	}

	/**
	 * Setup theme.
	 */
	public function setup_theme() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Manila, use a find and replace
		 * to change 'manila' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'manila', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Set Post Thumbnail size.
		 *
		 * @link https://developer.wordpress.org/reference/functions/set_post_thumbnail_size/
		 */
		set_post_thumbnail_size( 770, 435, true );

		// Additional image sizes
		add_image_size( 'manila_home_slider_image_size', 1440, 768, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Navigation', 'manila' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo' );

		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'manila_content_width', 770 );
	}
}

endif;

Manila_Setup_Theme::instance();
