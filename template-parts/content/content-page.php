<?php
/**
 * Template part for displaying page content in page.php
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
	do_action( 'manila_before_post_wrapper' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( apply_filters( 'manila_show_page_title', true, get_the_ID() ) ) : ?>
		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_before_page_header' );
		?>

		<header class="entry-header page__header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_after_page_header' );
		?>
	<?php endif; ?>

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_after_page_header' );
	?>

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_before_post_thumbnail' );
	?>

	<?php manila_post_thumbnail(); ?>

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_after_post_thumbnail' );
	?>

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_before_post_content' );
	?>

	<div class="entry-content page__content">
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links__label">' . esc_html__( 'Pages:', 'manila' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span class="page-links__item">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_after_post_content' );
	?>

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_before_post_footer' );
	?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer page__footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'manila' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_after_post_footer' );
	?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
	/**
	 * Developers can hook into here.
	 */
	do_action( 'manila_after_post_wrapper' );
?>
