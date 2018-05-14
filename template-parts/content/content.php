<?php
/**
 * Template part for displaying posts
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

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_before_post_header' );
	?>

	<header class="entry-header post__header">
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta post__meta">
				<?php
				manila_posted_on();
				manila_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_after_post_header' );
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

	<div class="entry-content post__content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'manila' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
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

	<footer class="entry-footer post__footer">
		<?php manila_entry_footer(); ?>
	</footer><!-- .entry-footer -->

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
