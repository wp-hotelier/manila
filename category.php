<?php
/**
 * The category template file
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
	if ( have_posts() ) : ?>

		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_before_page_header' );
		?>

		<header class="page-header page__header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description page__description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_after_page_header' );
		?>

		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content/content', get_post_type() );

		endwhile;

		manila_pagination();

	else :

		get_template_part( 'template-parts/content/content', 'none' );

	endif;
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
if ( manila_get_option( 'category-layout', 'right-sidebar' ) != 'no-sidebar' ) {
	get_sidebar();
}

get_footer();
