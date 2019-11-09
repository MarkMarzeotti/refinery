<?php
/**
 * Block Name: Icon List and Content
 *
 * This is the template that displays the icon list and content block.
 */

$button = get_field( 'button' );
$target = ! empty( $button['target'] ) ? 'target="' . $button['target'] . '"' : '';
?>

<section class="icon-list-content">
	<div class="container">
		<?php if ( have_rows( 'icon_list' ) ) : ?>

			<div class="icon-list-content__list">

				<?php
				while ( have_rows( 'icon_list' ) ) :
					the_row();

					$icon = get_sub_field( 'icon' );
					$alt  = ! empty( $icon['alt'] ) ? $icon['alt'] : get_sub_field( 'heading' );
					?>

					<div class="icon-list-content__item">
						<div class="icon-list-content__icon">

							<img src="<?php echo esc_url( $icon['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />

						</div>
						<div class="icon-list-content__item-content">

							<h3 class="h4"><?php the_sub_field( 'heading' ); ?></h3>
							<?php the_sub_field( 'content' ); ?>

						</div>
					</div>

				<?php endwhile; ?>

			</div>

		<?php endif; ?>

		<div class="icon-list-content__content">
			<?php the_field( 'content' ); ?>

			<div class="responsive-video">
				<iframe src="<?php the_field( 'video' ); ?>" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
			</div>

			<?php if ( ! empty( $button ) ) : ?>
				<a class="btn--arrow" href="<?php echo esc_url( $button['url'] ); ?>" <?php echo esc_attr( $target ); ?>><?php echo esc_html( $button['title'] ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>
