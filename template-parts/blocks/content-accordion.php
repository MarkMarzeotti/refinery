<?php
/**
 * Block Name: Content Accordion
 *
 * This is the template that displays the content accordion block.
 *
 * @package Sample_Project
 */

$samp_button = get_field( 'button' );
$samp_target = ! empty( $samp_button['target'] ) ? 'target="' . $samp_button['target'] . '"' : '';
?>

<section class="content-accordion">
	<div class="container">
		<div class="content-accordion__content">
			<?php the_field( 'content' ); ?>
			<a class="btn--arrow" href="<?php echo esc_url( $samp_button['url'] ); ?>" <?php echo esc_attr( $samp_target ); ?>><?php echo esc_html( $samp_button['title'] ); ?></a>
		</div>

		<?php
		if ( have_rows( 'accordion' ) ) :
			$samp_item_count = 0;
			?>

			<div id="accordionGroup" class="content-accordion__accordion  js-accordion">

				<?php
				while ( have_rows( 'accordion' ) ) :
					the_row();
					$samp_item_count++;
					$samp_accordion    = get_sub_field( 'heading' );
					$samp_accordion_id = sanitize_title( $samp_accordion );
					$samp_content_id   = $samp_accordion_id . '-content';
					?>

					<h3>
						<button
							id="<?php echo esc_attr( $samp_accordion_id ); ?>"
							class="content-accordion__trigger  js-accordion-trigger"
							aria-expanded="false"
							aria-controls="<?php echo esc_attr( $samp_content_id ); ?>"
						>
							<?php the_sub_field( 'heading' ); ?>
						</button>
					</h3>

					<div
						id="<?php echo esc_attr( $samp_content_id ); ?>"
						class="content-accordion__panel  js-accordion-panel"
						role="region"
						aria-labelledby="<?php echo esc_attr( $samp_accordion_id ); ?>"
						hidden
					>
						<?php the_sub_field( 'content' ); ?>
					</div>

				<?php endwhile; ?>

			</div>

		<?php endif; ?>
	</div>
</section>
