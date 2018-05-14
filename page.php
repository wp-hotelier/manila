<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Manila
 */

get_header();
?>

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_before_main' );
	?>

	<main id="main" <?php manila_site_main_classes(); ?>>

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_after_main' );
	?>

<?php
/* Check if Hotelier is active and if we are viewing the booking or the listing page */
if ( manila_is_hotelier_active() && is_booking() && manila_get_option( 'booking-layout', 'left-sidebar' ) != 'no-sidebar' ) {
	get_sidebar();
} else if ( manila_is_hotelier_active() && is_listing() && manila_get_option( 'listing-layout', 'left-sidebar' ) != 'no-sidebar' ) {
	get_sidebar();
}

get_footer();
