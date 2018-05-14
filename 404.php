<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

	<main id="main" class="site-main">

		<section class="error-404 not-found page__error-404">
				<?php
				/**
				 * Developers can hook into here.
				 */
				do_action( 'manila_before_page_header' );
			?>

			<header class="page-header page__header page__header--404">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'manila' ); ?></h1>
			</header><!-- .page-header -->

			<?php
				/**
				 * Developers can hook into here.
				 */
				do_action( 'manila_after_page_header' );
			?>

			<div class="page-content page__content--error-404">
				<p class="no-results no-results--error-404"><?php esc_html_e( 'It looks like nothing was found at this location. Perhaps searching can help.', 'manila' ); ?></p>

				<?php get_search_form(); ?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_after_main' );
	?>

<?php
get_footer();
