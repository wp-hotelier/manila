<?php
/**
 * Manila Theme Customizer Styles
 *
 * @package   Manila
 * @author    Easy WP Hotelier
 * @copyright Copyright (c) 2018, Easy WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'Manila_Customizer_Styles' ) ) :

/**
 * Manila_Customizer_Styles Class
 */
class Manila_Customizer_Styles {

	/**
	 * The single instance of the class
	 */
	private static $_instance = null;

	/**
	 * Insures that only one instance of the class exists in memory at any one time.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Get things going
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'customizer_fonts' ) );
	}

	/**
	 * Add Customzer font styles.
	 */
	public function customizer_fonts() {
		$primary_font      = sanitize_text_field( manila_get_option( 'font-main-custom' ) ? manila_get_option( 'font-main-custom' ) : manila_get_option( 'font-main', 'Playfair Display' ) );
		$secondary_font    = sanitize_text_field( manila_get_option( 'font-secondary-custom' ) ? manila_get_option( 'font-secondary-custom' ) : manila_get_option( 'font-secondary', 'Open Sans' ) );
		$pf_regular_weight = absint( manila_get_option( 'font-main-regular-weight', '400' ) );
		$pf_bold_weight    = absint( manila_get_option( 'font-main-bold-weight', '700' ) );
		$sf_regular_weight = absint( manila_get_option( 'font-secondary-regular-weight', '400' ) );
		$sf_medium_weight  = absint( manila_get_option( 'font-secondary-regular-weight', '600' ) );
		$sf_bold_weight    = absint( manila_get_option( 'font-secondary-regular-weight', '700' ) );

		// Primary font
		$css_primary_font = '
			body,
			button,
			input,
			select,
			optgroup,
			textarea,
			#arrival_time_field label,
			.widget-booking .widget-booking__day {
				font-family: "%1$s", serif;
			}
		';
		wp_add_inline_style( 'manila-style', sprintf( $css_primary_font, $primary_font ) );

		// Primary font (regular weight)
		$css_pf_regular_weight = '
			body,
			button,
			input,
			select,
			optgroup,
			textarea {
				font-weight: %1$s;
			}
		';
		wp_add_inline_style( 'manila-style', sprintf( $css_pf_regular_weight, $pf_regular_weight ) );

		// Primary font (bold weight)
		$css_pf_bold_weight = '
			b,
			strong,
			h1, h2, h3, h4, h5, h6,
			dt,
			th,
			.page-links__label,
			.screen-reader-text:focus,
			.site-title,
			.post__meta a,
			.post__footer .cat-links a,
			.post__footer .tags-links a,
			.post__footer .comments-link a,
			.comment-awaiting-moderation,
			.comment-author,
			.comment-edit-link,
			.widget_recent_comments .comment-author-link,
			.widget_rss ul .rsswidget,
			.widget_rss cite,
			.widget_calendar tbody a,
			#arrival_time_field label,
			.room__price .amount,
			.rate__price .amount,
			.widget-rooms__price .amount,
			.room__non-cancellable-info,
			.rate__non-cancellable-info,
			.room__not-available-info,
			.reservation-table__room-link,
			.reservation-table__room-non-cancellable,
			.room__min-max-stay,
			.room__max-guests-recommendation,
			.rate__conditions-title--single,
			.selected-nights,
			.room__only-x-left,
			.table--price-breakdown .amount,
			.widget-rooms__name,
			.widget-booking .widget-booking__room-link {
				font-weight: %1$s;
			}

			@media (min-width: 62em) {
				.site-header--off-canvas-menu #menu-toggle {
					font-weight: %1$s;
				}
			}
		';
		wp_add_inline_style( 'manila-style', sprintf( $css_pf_bold_weight, $pf_bold_weight ) );

		// Secondary font
		$css_secondary_font = '
			.button,
			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.page-links__item,
			.pagination__link,
			label,
			.lang-switcher,
			.post-edit-link,
			.more-link,
			.comment-reply-link,
			.widget__title,
			.widget_calendar caption,
			.widget_calendar tfoot a,
			.widget_calendar thead,
			.hotelier_datepicker__label,
			.datepicker__month-button,
			.datepicker__week-name,
			.reservation-table__room-rate,
			.price-breakdown__day--heading,
			.price-breakdown__cost--heading,
			.widget-booking .widget-booking__change-cart-link,
			.widget-booking .widget-booking__dates,
			.widget-booking .widget-booking__room-rate,
			.room__deposit,
			.rate__deposit,
			.datepicker__month-name,
			.room-available-rates__link,
			.room__details h3,
			.room__rates-title,
			.related-rooms-title,
			.room__more-link,
			.rate__name--listing,
			.section-header__title,
			.view-price-breakdown {
				font-family: "%1$s", sans-serif;
			}
		';
		wp_add_inline_style( 'manila-style', sprintf( $css_secondary_font, $secondary_font ) );

		// Secondary font (regular weight)
		$css_sf_regular_weight = '
			.button,
			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.page-links__item,
			.pagination__link,
			.room-available-rates__link {
				font-weight: %1$s;
			}
		';
		wp_add_inline_style( 'manila-style', sprintf( $css_sf_regular_weight, $sf_regular_weight ) );

		// Secondary font (medium weight)
		$css_sf_medium_weight = '
			.lang-switcher__current,
			.lang-switcher__link,
			.more-link,
			.room__deposit,
			.rate__deposit,
			.room__more-link,
			.view-price-breakdown {
				font-weight: %1$s;
			}
		';
		wp_add_inline_style( 'manila-style', sprintf( $css_sf_medium_weight, $sf_medium_weight ) );

		// Secondary font (bold weight)
		$css_sf_bold_weight = '
			label,
			.widget__title,
			.datepicker__month-name,
			.room__details h3,
			.room__rates-title,
			.related-rooms-title,
			.rate__name--listing,
			.section-header__title,
			.widget-booking .widget-booking__date-label {
				font-weight: %1$s;
			}
		';
		wp_add_inline_style( 'manila-style', sprintf( $css_sf_bold_weight, $sf_bold_weight ) );
	}
}

endif;

Manila_Customizer_Styles::instance();
