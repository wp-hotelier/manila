<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Manila
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! function_exists( 'manila_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function manila_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'manila' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'manila_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function manila_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'manila' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'manila_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function manila_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'manila' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'manila' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'manila' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'manila' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'manila' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

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
	}
endif;

if ( ! function_exists( 'manila_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function manila_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail post__thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail post__thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;


if ( ! function_exists( 'manila_menu_item_classes' ) ) :
	/**
	 * Add custom BEM classes to each menu item of the primary menu
	 */
	function manila_menu_item_classes( $classes, $item, $args, $depth ) {
		if ( $args->theme_location == 'primary-menu' ) {
			$identifier = 'site';
			$classes[]  = $identifier . '-navigation__item';

			// Add custom class if it is a child item
			if ( $depth > 0 ) {
				$classes[] = $identifier . '-navigation__item--child';
			// Different class for first-level items
			} elseif ( $depth == 0 ) {
				$classes[] = $identifier . '-navigation__item--first-level';
			}

			// Add custom class if it has child items
			if ( in_array( 'menu-item-has-children', $classes ) ) {
				$classes[] = $identifier . '-navigation__item--has-children';

				// Another class for first-level items
				if ( $depth > 0 ) {
					$classes[] = $identifier . '-navigation__item--parent';
				}
			}
		}

		return $classes;
	}
endif;
add_filter( 'nav_menu_css_class', 'manila_menu_item_classes', 10, 4 );

if ( ! function_exists( 'manila_menu_link_classes' ) ) :
	/**
	 * Add custom BEM classes to each menu item link of the primary menu
	 */
	function manila_menu_link_classes( $atts, $item, $args, $depth ) {
		if ( $args->theme_location == 'primary-menu' ) {
			$identifier      = 'site';
			$atts[ 'class' ] = $identifier . '-navigation__link';

			// Add custom class if it is a child item
			if ( $depth > 0 ) {
				$atts[ 'class' ] .= ' ' . $identifier . '-navigation__link--child';
			// Different class for first-level items
			} elseif ( $depth == 0 ) {
				$atts[ 'class' ] .= ' ' . $identifier . '-navigation__link--first-level';
			}
		}

	    return $atts;
	}
endif;
add_filter( 'nav_menu_link_attributes', 'manila_menu_link_classes', 10, 4 );

if ( ! function_exists( 'manila_header_language_switcher' ) ) :
/**
 * Prints langauge switcher.
 */
function manila_header_language_switcher() {
	$html = '';

	// First check if WPML is installed and active
	if ( function_exists( 'icl_get_languages' ) ) {
		$languages = icl_get_languages('skip_missing=0&orderby=name');

		if ( ! empty( $languages ) ) {
			$html .= '<ul id="header-language-switcher" class="lang-switcher">';

			foreach ( $languages as $language ) {
				if ( $language[ 'active' ] ) {
					$html .= '<li class="lang-switcher__item"><span class="lang-switcher__current">' . esc_html( $language[ 'language_code' ] ) . '</span>';
				}
			}

			foreach ( $languages as $language ) {
				if ( ! $language[ 'active' ] ) {
					$html .= '<li class="lang-switcher__item"><a class="lang-switcher__link" href="' . esc_url( $language[ 'url' ] ) . '">' . esc_html( $language[ 'language_code' ] ) . '</a></li>';
				}
			}

			$html .= '</ul>';
		}
	}

	$allowed_html = manila_language_list_allowed_html();

	echo wp_kses( apply_filters( 'manila_language_switcher_filter' , $html ), $allowed_html );
}
endif;

if ( ! function_exists( 'manila_header_book_button' ) ) :
/**
 * Prints the book button in the header.
 */
function manila_header_book_button() {
	// Return early if Easy WP Hotelier is not active
	if ( ! manila_is_hotelier_active() ) {
		return;
	}

	$button_text = apply_filters( 'manila_header_book_button_text', esc_html__( 'Book now', 'manila' ) );
	?>

	<div class="header-book-button-container">
		<a href="<?php echo esc_url( HTL()->cart->get_room_list_form_url() ); ?>" id="header-book-button" class="button button--header-book-button"><?php echo esc_html( $button_text ); ?></a>
	</div>

	<?php
}
endif;

if ( ! function_exists( 'manila_custom_logo' ) ) :
/**
 * Prints custom logo if available.
 *
 * The WordPress custom logo feature doesn't support retina displays.
 * So this function uses an "ugly" workaround, scaling down the logo.
 */
function manila_custom_logo() {
	$logo_id = get_theme_mod( 'custom_logo' );
	$logo    = wp_get_attachment_image_src( $logo_id , 'full' );
	$width   = $logo[ 1 ] / 2;
	$height  = $logo[ 2 ] / 2;
	?>

	<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img id="site-logo-image" src="<?php echo esc_url( $logo[ 0 ] ); ?>" width="<?php echo intval( $width ); ?>" height="<?php echo intval( $height ); ?>" alt="<?php bloginfo('name'); ?>"></a>

	<?php
}
endif;

if ( ! function_exists( 'manila_pagination' ) ) :
/**
 * Pagination.
 *
 * The WordPress `paginate_links()` function doesn't offer filters for
 * the markup. So the following function uses a `brutal` str_replace to
 * change the link classes and provide BEM support.
 *
 */
function manila_pagination() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	?>

	<nav class="pagination">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Posts pagination', 'manila' ); ?></h2>

		<?php
		$big = 999999999; // need an unlikely integer

		$pages = paginate_links( apply_filters( 'manila_pagination_args', array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'add_args'  => '',
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => '&larr;',
			'next_text' => '&rarr;',
			'type'      => 'array',
			'end_size'  => 3,
			'mid_size'  => 3
		) ) );
		?>

		<ul class="pagination__list">
			<?php foreach ( $pages as $page ) :
				// Add BEM classes but maintain default WP classes for backward compatibility
				$page = str_replace( 'page-numbers', 'page-numbers pagination__link', $page );
				$page = str_replace( 'current', 'current pagination__link--current', $page );
				$page = str_replace( 'next', 'next pagination__link--next', $page );
				$page = str_replace( 'dots', 'dots pagination__link--dots', $page );
				?>
				<li class="pagination__item"><?php echo $page; // WPCS: XSS OK. ?></li>
			<?php endforeach; ?>
		</ul><!-- .pagination__list -->
	</nav><!-- .pagination -->
<?php
}
endif;
