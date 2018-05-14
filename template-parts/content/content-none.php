<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Manila
 */

?>

<?php
	/**
	 * Developers can hook into here.
	 */
	do_action( 'manila_before_post_none_wrapper' );
?>

<section class="no-results not-found page__not-found">
	<header class="page-header page__header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'manila' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content page__content page__content--not-found">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p class="no-results no-results--first-post">' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'manila' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p class="no-results no-results--search"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'manila' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p class="no-results"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'manila' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->

<?php
	/**
	 * Developers can hook into here.
	 */
	do_action( 'manila_after_post_none_wrapper' );
?>
