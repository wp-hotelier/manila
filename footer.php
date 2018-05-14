<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Manila
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="wrapper">
			<div class="footer-widgets">
				<?php
				$manila_footer_columns = manila_get_option( 'footer-layout', 4 );

				for ( $i = 1; $i <= $manila_footer_columns; $i++ ) : ?>
					<div class="footer-widget footer-widget--<?php echo esc_attr( $manila_footer_columns ); ?>-columns">
						<?php dynamic_sidebar( 'footer-' . $i ); ?>
					</div>
				<?php endfor; ?>
			</div><!-- .footer-widgets -->

			<?php if ( $manila_footer_copyright = manila_get_option( 'footer-copyright' ) ) : ?>

				<div class="site-info">
					<?php echo wp_kses_post( $manila_footer_copyright ); // This section accepts HTML code ?>
				</div><!-- .site-info -->

			<?php endif; ?>

		</div><!-- .wrapper -->
	</footer><!-- #colophon -->

	<?php if ( apply_filters( 'manila_show_back_to_top', true ) ) : ?>
		<a href="#page" id="back-to-top"><?php esc_html_e( 'Back to top', 'manila' ); ?></a>
	<?php endif; ?>

</div><!-- #page -->

<?php
	/**
	 * Developers can hook into here.
	 */
	do_action( 'manila_after_site_wrapper' );
?>

<?php wp_footer(); ?>

</body>
</html>
