<?php
/**
 * Block Name: Content Switch
 *
 * This is the template that displays the number columns block.
 *
 * @package Sample_Project
 */

?>

<section class="content-switch">
	<div class="container">
		<div class="content-switch__intro">
			<h2 class="h3"><?php the_field( 'heading' ); ?></h2>
		</div>

		<?php
		if ( have_rows( 'tabs' ) ) :
			$samp_item_count = 0;
			?>

			<div class="content-switch__tabs  js-tabs" role="tablist" aria-label="<?php the_field( 'heading' ); ?>">

				<?php
				while ( have_rows( 'tabs' ) ) :
					the_row();
					$samp_item_count++;
					$samp_tab        = get_sub_field( 'tab_content' );
					$samp_tab_id     = sanitize_title( $samp_tab );
					$samp_content_id = $samp_tab_id . '-content';
					$samp_selected   = 1 === $samp_item_count ? 'true' : 'false';
					?>

					<h3>
						<button
							id="<?php echo esc_attr( $samp_tab_id ); ?>"
							class="content-switch__trigger"
							role="tab"
							aria-selected="<?php echo esc_attr( $samp_selected ); ?>"
							aria-controls="<?php echo esc_attr( $samp_content_id ); ?>"
						>
							<?php the_sub_field( 'tab_content' ); ?>
						</button>
					</h3>

				<?php endwhile; ?>

			</div>

			<?php
			$samp_item_count = 0;
			while ( have_rows( 'tabs' ) ) :
				the_row();
				$samp_item_count++;
				$samp_tab        = get_sub_field( 'tab_content' );
				$samp_tab_id     = sanitize_title( $samp_tab );
				$samp_content_id = $samp_tab_id . '-content';
				$samp_hidden     = 1 !== $samp_item_count ? 'hidden="hidden"' : '';
				?>

				<div
					class="content-switch__panel"
					role="tabpanel"
					id="<?php echo esc_attr( $samp_content_id ); ?>"
					aria-labelledby="<?php echo esc_attr( $samp_tab_id ); ?>"
					<?php echo esc_attr( $samp_hidden ); ?>
				>
					<?php the_sub_field( 'switch_content' ); ?>
				</div>

			<?php endwhile; ?>

		<?php endif; ?>
	</div>
</section>
