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

if ( ! function_exists( 'manila_disable_hotelier_style' ) ) :

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

if ( ! function_exists( 'manila_rooms_archive_title' ) ) :
	/**
	 * Custom rooms archive title.
	 */
	function manila_rooms_archive_title() {
		$page_title = manila_get_option( 'room-archive-title', esc_html__( 'Rooms Archive', 'manila' ) );

		return $page_title;
	}
endif;
add_filter( 'hotelier_rooms_archive_page_title', 'manila_rooms_archive_title' );

/**
 * Change rooms archive description position.
 */
remove_action( 'hotelier_archive_description', 'hotelier_taxonomy_archive_description', 10 );
add_action( 'hotelier_after_page_title', 'hotelier_taxonomy_archive_description', 10 );

if ( ! function_exists( 'manila_rooms_archive_desription' ) ) :
	/**
	 * Show rooms archive description.
	 */
	function manila_rooms_archive_desription() {
		if ( is_room_archive() && ! is_search() ) {
			$description = manila_get_option( 'room-archive-description' );

			if ( $description ) {
				echo '<div class="page__description">' . $description . '</div>';
			}
		}
	}
endif;
add_action( 'hotelier_after_page_title', 'manila_rooms_archive_desription', 10 );

// hotelier_after_page_title

/**
 * Number of columns (rooms archive).
 */
function manila_rooms_archive_columns() {
	$columns = absint( manila_get_option( 'room-archive-columns', 3 ) );

	return $columns;
}
add_filter( 'loop_room_columns', 'manila_rooms_archive_columns' );

/**
 * Number of rooms per page (rooms archive).
 */
function manila_rooms_archive_per_page() {
	$columns = absint( manila_get_option( 'room-archive-per_page', 9 ) );

	return $columns;
}
add_filter( 'loop_room_per_page', 'manila_rooms_archive_per_page' );

/**
 * Hide room description from the room shortcodes/archive.
 */
if ( manila_get_option( 'room-archive-loop-description', false ) ) {
	remove_action( 'hotelier_archive_item_room', 'hotelier_template_archive_room_description', 20 );
}
