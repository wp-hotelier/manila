<?php
/**
 * Template part for displaying the home page slider (available on the homepage only)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Manila
 */

// Return early if we are not on the front page
if ( ! ( ! is_home() && is_front_page() ) ) {
	return;
}

$manila_home_slides                 = manila_get_option( 'homepage-slider' );
$manila_home_slider_has_slides      = is_array( $manila_home_slides ) && ! empty( $manila_home_slides ) ? true : false;
$manila_home_slider_title           = manila_get_option( 'homepage-slider-text' );
$manila_home_slider_show_datepicker = manila_get_option( 'homepage-slider-show-datepicker', true );

if ( ! $manila_home_slider_has_slides ) {
	return;
}

?>

<?php
	/**
	 * Developers can hook into here.
	 */
	do_action( 'manila_before_home_slider' );
?>

<div class="homepage-slider loading <?php echo $manila_home_slider_show_datepicker ? 'homepage-slider--has-datepicker' : ''; ?>">
	<div class="flexslider flexslider--homepage" data-speed="<?php echo esc_attr( apply_filters( 'manila_slideshow_homepage_speed', 7000 ) ); ?>">
		<ul class="slides">
			<?php foreach ( $manila_home_slides as $image_id ) : ?>

				<li class="homepage-slider__item">
					<?php
					add_filter( 'wp_calculate_image_srcset', 'manila_disable_srcset' );

					echo wp_get_attachment_image( $image_id, apply_filters( 'manila_home_slider_image_size', 'manila_home_slider_image_size' ) );

					remove_filter( 'wp_calculate_image_srcset', 'manila_disable_srcset' );
					?>
				</li>

			<?php endforeach; ?>
		</ul>

		<div class="preloader"></div>

		<?php if ( $manila_home_slider_title ) : ?>
			<div class="homepage-slider__text"><?php echo wp_kses_post( $manila_home_slider_title ); ?></div>
		<?php endif; ?>
	</div><!-- .flexslider -->

	<?php if ( $manila_home_slider_show_datepicker && manila_is_hotelier_active() ) : ?>
		<div class="datepicker-homepage-wrapper">
			<?php echo do_shortcode( '[hotelier_datepicker]' ); ?>
		</div>
	<?php endif; ?>
</div>

<?php
	/**
	 * Developers can hook into here.
	 */
	do_action( 'manila_after_home_slider' );
?>
