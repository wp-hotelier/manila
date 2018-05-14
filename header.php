<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Manila
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	/**
	 * Developers can hook into here.
	 */
	do_action( 'manila_before_site_wrapper' );
?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'manila' ); ?></a>

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_before_header' );
	?>

	<?php
	$manila_navigation_layout = manila_get_option( 'navigation-layout', 'default-menu' );
	get_template_part( 'template-parts/header/header', $manila_navigation_layout );
	?>

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_after_header' );
	?>

	<?php
	get_template_part( 'template-parts/header/slider' );
	?>

	<div id="content" <?php manila_site_content_classes(); ?>>
