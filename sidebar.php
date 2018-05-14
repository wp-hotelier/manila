<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Manila
 */

?>

<?php
	/**
	 * Developers can hook into here.
	 */
	do_action( 'manila_before_sidebar' );
?>

<?php if ( is_page_template( 'template-page-sidebar-left.php' ) || is_page_template( 'template-page-sidebar-left-full.php' ) || is_page_template( 'template-page-sidebar-right.php' ) || is_page_template( 'template-page-sidebar-right-full.php' ) ) : ?>

	<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_before_main_sidebar' );
		?>

		<aside id="secondary" <?php manila_site_sidebar_classes(); ?>>
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
		</aside><!-- #secondary -->

		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_after_main_sidebar' );
		?>
	<?php endif; ?>

<?php elseif ( manila_is_hotelier_active() && is_booking() ) : ?>

	<?php if ( manila_get_option( 'booking-layout', 'left-sidebar' ) != 'no-sidebar' && is_active_sidebar( 'booking-sidebar' ) ) : ?>
		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_before_booking_sidebar' );
		?>

		<aside id="secondary" <?php manila_site_sidebar_classes(); ?>>
			<?php dynamic_sidebar( 'booking-sidebar' ); ?>
		</aside><!-- #secondary -->

		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_after_booking_sidebar' );
		?>
	<?php endif; ?>

<?php elseif ( manila_is_hotelier_active() && is_listing() ) : ?>

	<?php if ( manila_get_option( 'listing-layout', 'left-sidebar' ) != 'no-sidebar' && is_active_sidebar( 'booking-sidebar' ) ) : ?>
		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_before_booking_sidebar' );
		?>

		<aside id="secondary" <?php manila_site_sidebar_classes(); ?>>
			<?php dynamic_sidebar( 'booking-sidebar' ); ?>
		</aside><!-- #secondary -->

		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_after_booking_sidebar' );
		?>
	<?php endif; ?>

<?php elseif ( manila_is_hotelier_active() && is_room() ) : ?>

	<?php if ( manila_get_option( 'room-layout', 'right-sidebar' ) != 'no-sidebar' && is_active_sidebar( 'room-sidebar' ) ) : ?>
		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_before_room_sidebar' );
		?>

		<aside id="secondary" <?php manila_site_sidebar_classes(); ?>>
			<?php dynamic_sidebar( 'room-sidebar' ); ?>
		</aside><!-- #secondary -->

		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_after_room_sidebar' );
		?>
	<?php endif; ?>

<?php elseif ( manila_is_hotelier_active() && ( is_room_archive() || is_room_category() ) ) : ?>

	<?php if ( manila_get_option( 'room-archive-layout', 'no-sidebar' ) != 'no-sidebar' && is_active_sidebar( 'room-archive-sidebar' ) ) : ?>
		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_before_room_archive_sidebar' );
		?>

		<aside id="secondary" <?php manila_site_sidebar_classes(); ?>>
			<?php dynamic_sidebar( 'room-archive-sidebar' ); ?>
		</aside><!-- #secondary -->

		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_after_room_archive_sidebar' );
		?>
	<?php endif; ?>

<?php else : ?>

	<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_before_main_sidebar' );
		?>

		<aside id="secondary" <?php manila_site_sidebar_classes(); ?>>
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
		</aside><!-- #secondary -->

		<?php
			/**
			 * Developers can hook into here.
			 */
			do_action( 'manila_after_main_sidebar' );
		?>
	<?php endif; ?>

<?php endif; ?>

<?php
	/**
	 * Developers can hook into here.
	 */
	do_action( 'manila_after_sidebar' );
?>
