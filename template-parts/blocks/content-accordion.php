<?php
/**
 * Block Name: Content Accordion
 *
 * This is the template that displays the content accordion block.
 *
 * @package Refinery
 */

$trht_button = get_field( 'button' );
$trht_target = ! empty( $trht_button['target'] ) ? 'target="' . $trht_button['target'] . '"' : '';
?>

<section class="content-accordion">
	<div class="container">
		<div class="content-accordion__content">
			<?php the_field( 'content' ); ?>
			<a class="btn--arrow" href="<?php echo esc_url( $trht_button['url'] ); ?>" <?php echo esc_attr( $trht_target ); ?>><?php echo esc_html( $trht_button['title'] ); ?></a>
		</div>

		<?php
		if ( have_rows( 'accordion' ) ) :
			$trht_item_count = 0;
			?>

			<div id="accordionGroup" class="content-accordion__accordion  js-accordion">

				<?php
				while ( have_rows( 'accordion' ) ) :
					the_row();
					$trht_item_count++;
					$trht_accordion    = get_sub_field( 'heading' );
					$trht_accordion_id = sanitize_title( $trht_accordion );
					$trht_content_id   = $trht_accordion_id . '-content';
					?>

					<h3>
						<button
							id="<?php echo esc_attr( $trht_accordion_id ); ?>"
							class="content-accordion__trigger  js-accordion-trigger"
							aria-expanded="false"
							aria-controls="<?php echo esc_attr( $trht_content_id ); ?>"
						>
							<?php the_sub_field( 'heading' ); ?>
						</button>
					</h3>

					<div
						id="<?php echo esc_attr( $trht_content_id ); ?>"
						class="content-accordion__panel  js-accordion-panel"
						role="region"
						aria-labelledby="<?php echo esc_attr( $trht_accordion_id ); ?>"
						hidden
					>
						<?php the_sub_field( 'content' ); ?>
					</div>

				<?php endwhile; ?>

			</div>

		<?php endif; ?>
	</div>
</section>
