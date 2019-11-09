<?php
/**
 * Block Name: Content Accordion
 *
 * This is the template that displays the content accordion block.
 */

$button = get_field( 'button' );
$target = ! empty( $button['target'] ) ? 'target="' . $button['target'] . '"' : '';
?>

<section class="content-accordion">
	<div class="container">
		<div class="content-accordion__content">
			<?php the_field( 'content' ); ?>
			<a class="btn--arrow" href="<?php echo esc_url( $button['url'] ); ?>" <?php echo esc_attr( $target ); ?>><?php echo esc_html( $button['title'] ); ?></a>
		</div>

		<?php
		if ( have_rows( 'accordion' ) ) :
			$item_count = 0;
			?>

			<div id="accordionGroup" class="content-accordion__accordion  js-accordion">

				<?php
				while ( have_rows( 'accordion' ) ) :
					the_row();
					$item_count++;
					$accordion    = get_sub_field( 'heading' );
					$accordion_id = sanitize_title( $accordion );
					$content_id   = $accordion_id . '-content';
					?>

					<h3>
						<button
							id="<?php echo esc_attr( $accordion_id ); ?>"
							class="content-accordion__trigger  js-accordion-trigger"
							aria-expanded="false"
							aria-controls="<?php echo esc_attr( $content_id ); ?>"
						>
							<?php the_sub_field( 'heading' ); ?>
						</button>
					</h3>

					<div
						id="<?php echo esc_attr( $content_id ); ?>"
						class="content-accordion__panel  js-accordion-panel"
						role="region"
						aria-labelledby="<?php echo esc_attr( $accordion_id ); ?>"
						hidden
					>
						<?php the_sub_field( 'content' ); ?>
					</div>

				<?php endwhile; ?>

			</div>

		<?php endif; ?>
	</div>
</section>
