<?php
/**
 * Template part for displaying results in search pages
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
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
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

	<div class="entry-summary post__summary post__summary--search">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php
		/**
		 * Developers can hook into here.
		 */
		do_action( 'manila_after_post_content' );
	?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
	/**
	 * Developers can hook into here.
	 */
	do_action( 'manila_after_post_wrapper' );
?>
