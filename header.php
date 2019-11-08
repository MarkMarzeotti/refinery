<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Refinery
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'refinery-test' ); ?></a>

	<header id="masthead" class="header">
		<div class="header__logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php
				$trht_logo_id = get_field( 'dark_logo', 'option' );
				if ( ! empty( $trht_logo_id ) ) :
					$trht_logo = wp_get_attachment_image_src( $trht_logo_id, 'logo' );
					?>
					<img src="<?php echo esc_url( $trht_logo[ 0 ] ); ?>" alt="<?php bloginfo( 'name' ); ?> logo" />
					<?php
				else :
					bloginfo( 'name' );
				endif; ?>
			</a>
		</div>

		<?php if ( has_nav_menu( 'primary-menu' ) || has_nav_menu( 'button-menu' ) ) : ?>
			<nav id="site-navigation" class="header__nav nav">
				<button id="menu-button" class="nav__button" aria-controls="primary-menu" aria-expanded="false">
					<span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'refinery-test' ); ?></span>
					<span class="hamburger">
						<span class="hamburger__top"></span>
						<span class="hamburger__middle"></span>
						<span class="hamburger__bottom"></span>
					</span>
				</button>

				<div class="nav__container">
					<?php
					if ( has_nav_menu( 'primary-menu' ) ) :
						wp_nav_menu(
							array(
								'container'      => false,
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'nav__level',
								'theme_location' => 'primary-menu',
								'walker'         => new Trht_Walker_Nav_Menu(),
							)
						);
					endif;

					if ( has_nav_menu( 'button-menu' ) ) :
						wp_nav_menu(
							array(
								'container'      => false,
								'menu_id'        => 'button-menu',
								'menu_class'     => 'nav__level button-menu',
								'theme_location' => 'button-menu',
								'walker'         => new Trht_Walker_Nav_Menu(),
								'depth'          => 1,
							)
						);
					endif;
					?>
				</div>
			</nav>
		<?php endif; ?>
	</header>

	<div id="content" class="content">
