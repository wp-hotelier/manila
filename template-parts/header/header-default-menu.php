<?php
/**
 * Template part for displaying the default menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Manila
 */

$manila_show_language_switcher = manila_get_option( 'navigation-show-language-switcher', false );
$manila_show_book_button       = manila_get_option( 'navigation-show-book-button', true );
?>

<?php
	/**
	 * Developers can hook into here.
	 */
	do_action( 'manila_before_header_default_menu' );
?>

<header id="masthead" class="site-header site-header--default-menu lang-switcher-<?php echo $manila_show_language_switcher ? 'yes' : 'no';?> book-button-<?php echo $manila_show_book_button ? 'yes' : 'no';?>">
	<div class="wrapper">
		<div class="site-branding">
			<?php
			if ( $manila_show_language_switcher ) :
				manila_header_language_switcher();
			endif; ?>

			<div class="site-title-container">
				<?php
				if ( has_custom_logo() ) :
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title semantic"><?php bloginfo( 'name' ); ?></h1>
					<?php else : ?>
						<p class="site-title semantic"><?php bloginfo( 'name' ); ?></p>
					<?php
					endif;

					// Print custom logo
					manila_custom_logo();
				else :
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;
				endif;
				?>
			</div><!-- .site-title-container -->

			<?php
			if ( $manila_show_book_button ) :
				manila_header_book_button();
			endif;
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="site-navigation site-navigation--main">
			<button id="menu-toggle"><?php esc_html_e( 'Menu', 'manila' ); ?></button>

			<?php
			/* First check if a menu is assigned to the location */
			if ( has_nav_menu('primary-menu') ) :

				wp_nav_menu( array(
					'theme_location' => 'primary-menu',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'site-navigation__list',
					'container_id'   => 'primary-menu-container',
					'depth'          => 3
				) );

			else: ?>
				<?php /* translators: 1: menu editor link. */ ?>
				<p class="no-menu-info"><?php printf( wp_kses( __( 'Please <a href="%1$s">create a menu</a> and assign it to the "Navigation" location.', 'manila' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'nav-menus.php' ) ) ); ?></p>

			<?php endif; ?>
		</nav><!-- #site-navigation -->
	</div><!-- .wrapper -->
</header><!-- #masthead -->

<?php
	/**
	 * Developers can hook into here.
	 */
	do_action( 'manila_after_header_default_menu' );
?>
