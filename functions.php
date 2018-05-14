<?php
/**
 * Manila functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Manila
 */

/**
 * Define Constants
 */
define( 'MANILA_THEME_VERSION', '1.0.0' );
define( 'MANILA_THEME_SETTINGS', 'manila-settings' );
define( 'MANILA_THEME_DIR', get_template_directory() . '/' );
define( 'MANILA_THEME_URI', get_template_directory_uri() . '/' );

/**
 * Setup theme.
 */
require MANILA_THEME_DIR . 'inc/class-manila-setup-theme.php';

/**
 * Core functions.
 */
require MANILA_THEME_DIR . 'inc/core/core-functions.php';

/**
 * Enqueue scripts.
 */
require MANILA_THEME_DIR . 'inc/class-manila-scripts.php';

/**
 * Custom template tags for this theme.
 */
require MANILA_THEME_DIR . 'inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require MANILA_THEME_DIR . 'inc/template-functions.php';

/**
 * Widgets.
 */
require MANILA_THEME_DIR . 'inc/class-manila-register-widgets.php';

/**
 * Customizer additions.
 */
require MANILA_THEME_DIR . 'inc/customizer/class-manila-customizer.php';
require MANILA_THEME_DIR . 'inc/customizer/class-manila-customizer-styles.php';

/**
 * Third-party related functions.
 */
require MANILA_THEME_DIR . 'inc/compatibility/compatibility.php';
