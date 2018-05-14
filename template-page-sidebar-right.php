<?php
/**
 * Template Name: Right Sidebar
 *
 * The template for displaying a page with a right sidebar.
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
get_sidebar();
get_footer();
