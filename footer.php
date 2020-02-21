<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sample_Project
 */

?>

	</div>

	<footer id="footer" class="footer">
		<div class="footer__logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php
				$samp_logo_id = get_field( 'light_logo', 'option' );
				if ( ! empty( $samp_logo_id ) ) :
					$samp_logo = wp_get_attachment_image_src( $samp_logo_id, 'logo' );
					?>
					<img src="<?php echo esc_url( $samp_logo[0] ); ?>" alt="<?php bloginfo( 'name' ); ?> logo" />
					<?php
				else :
					bloginfo( 'name' );
				endif;
				?>
			</a>
		</div>

		<?php if ( have_rows( 'social_media_links', 'option' ) ) : ?>
			<div class="footer__social">
				<ul>

					<?php
					while ( have_rows( 'social_media_links', 'option' ) ) :
						the_row();
						$samp_social_logo_id = get_sub_field( 'logo' );
						$samp_social_logo    = wp_get_attachment_image( $samp_social_logo_id, 'social-logo' );
						?>
						<li>
							<a href="<?php the_sub_field( 'link' ); ?>" target="_blank" rel="noopener">
								<?php echo wp_kses( $samp_social_logo, 'post' ); ?>
							</a>
						</li>
					<?php endwhile; ?>

				</ul>
			</div>
		<?php endif; ?>


		<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
			<nav class="footer__nav nav">
				<?php
				wp_nav_menu(
					array(
						'container'      => false,
						'menu_id'        => 'footer-menu',
						'menu_class'     => 'nav__level',
						'theme_location' => 'footer-menu',
						'walker'         => new SAMP_Walker_Nav_Menu(),
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
