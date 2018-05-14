<?php
/**
 * Easy WP Hotelier related functions.
 *
 * @package Manila
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Return early if Easy WP Hotelier is not active
if ( ! manila_is_hotelier_active() ) {
	return;
}

if ( ! function_exists( '_disable_hotelier_style' ) ) :

	/**
	 * Disable default Hotelier CSS style
	 */
	function manila_disable_hotelier_style() {
		return false;
	}

endif;
add_filter( 'hotelier_enqueue_styles', 'manila_disable_hotelier_style' );

// Remove default wrappers
remove_action( 'hotelier_before_main_content', 'hotelier_output_content_wrapper', 10 );
remove_action( 'hotelier_after_main_content', 'hotelier_output_content_wrapper_end', 10 );

if ( ! function_exists( 'manila_hotelier_output_content_wrapper' ) ) :

	/**
	 * Output the start of the page wrapper.
	 */
	function manila_hotelier_output_content_wrapper() {
		?>

		<main id="main" <?php manila_site_main_classes(); ?>>

		<?php
	}

endif;
add_action( 'hotelier_before_main_content', 'manila_hotelier_output_content_wrapper', 10 );

if ( ! function_exists( 'manila_hotelier_output_content_wrapper_end' ) ) :

	/**
	 * Output the end of the page wrapper.
	 */
	function manila_hotelier_output_content_wrapper_end() {
		?>

		</main><!-- #main -->

		<?php
	}

endif;
add_action( 'hotelier_after_main_content', 'manila_hotelier_output_content_wrapper_end', 10 );

if ( ! function_exists( 'manila_hotelier_show_additional_details' ) ) :

	/**
	 * Show room additional details.
	 */
	function manila_hotelier_show_additional_details() {
		global $room;
		?>

		<?php if ( $additional_details = $room->get_additional_details() ) : ?>

		<div class="room__additional_details room__additional_details--single">

			<h3 class="room__additional_details-title room__additional_details-title--single"><?php esc_html_e( 'Room additional details', 'manila' ); ?></h3>

			<p class="room__additional_details-content room__additional_details-content--single"><?php echo esc_html( $additional_details ); ?></p>

		</div>

		<?php endif;
	}

endif;
add_action( 'hotelier_single_room_details', 'manila_hotelier_show_additional_details', 70 );
