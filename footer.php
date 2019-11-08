<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Refinery
 */

?>

	</div>

	<footer id="footer" class="footer">
		<div class="footer__logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php
				$trht_logo_id = get_field( 'light_logo', 'option' );
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

		<div class="footer__social">
		</div>

		<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
			<nav class="footer__nav nav">
				<?php
				wp_nav_menu(
					array(
						'container'      => false,
						'menu_id'        => 'footer-menu',
						'menu_class'     => 'nav__level',
						'theme_location' => 'footer-menu',
						'walker'         => new Trht_Walker_Nav_Menu(),
						'depth'          => 1,
					)
				);
				?>
			</nav>
		<?php endif; ?>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
