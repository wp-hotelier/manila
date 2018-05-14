<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

		get_template_part( 'template-parts/content/content', 'single' );

		the_post_navigation();

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
/* Don't display the sidebar if the option is not selected */
if ( manila_get_option( 'post-layout', 'right-sidebar' ) != 'no-sidebar' ) {
	get_sidebar();
}

get_footer();
