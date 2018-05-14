<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

	<?php if ( have_posts() ) : ?>

		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_before_page_header' );
		?>

		<header class="page-header page__header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'manila' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
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

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content/content', 'search' );

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
if ( manila_get_option( 'search-layout', 'right-sidebar' ) != 'no-sidebar' ) {
	get_sidebar();
}

get_footer();
