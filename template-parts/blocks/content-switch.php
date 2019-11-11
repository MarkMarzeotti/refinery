<?php
/**
 * Block Name: Content Switch
 *
 * This is the template that displays the number columns block.
 *
 * @package Refinery
 */

?>

<section class="content-switch">
	<div class="container">
		<div class="content-switch__intro">
			<h2 class="h3"><?php the_field( 'heading' ); ?></h2>
		</div>

		<?php
		if ( have_rows( 'tabs' ) ) :
			$trht_item_count = 0;
			?>

			<div class="content-switch__tabs  js-tabs" role="tablist" aria-label="<?php the_field( 'heading' ); ?>">

				<?php
				while ( have_rows( 'tabs' ) ) :
					the_row();
					$trht_item_count++;
					$trht_tab        = get_sub_field( 'tab_content' );
					$trht_tab_id     = sanitize_title( $trht_tab );
					$trht_content_id = $trht_tab_id . '-content';
					$trht_selected   = 1 === $trht_item_count ? 'true' : 'false';
					?>

					<h3>
						<button
							id="<?php echo esc_attr( $trht_tab_id ); ?>"
							class="content-switch__trigger"
							role="tab"
							aria-selected="<?php echo esc_attr( $trht_selected ); ?>"
							aria-controls="<?php echo esc_attr( $trht_content_id ); ?>"
						>
							<?php the_sub_field( 'tab_content' ); ?>
						</button>
					</h3>

				<?php endwhile; ?>

			</div>

			<?php
			$trht_item_count = 0;
			while ( have_rows( 'tabs' ) ) :
				the_row();
				$trht_item_count++;
				$trht_tab        = get_sub_field( 'tab_content' );
				$trht_tab_id     = sanitize_title( $trht_tab );
				$trht_content_id = $trht_tab_id . '-content';
				$trht_hidden     = 1 !== $trht_item_count ? 'hidden="hidden"' : '';
				?>

				<div
					class="content-switch__panel"
					tabindex="0"
					role="tabpanel"
					id="<?php echo esc_attr( $trht_content_id ); ?>"
					aria-labelledby="<?php echo esc_attr( $trht_tab_id ); ?>"
					<?php echo esc_attr( $trht_hidden ); ?>
				>
					<?php the_sub_field( 'switch_content' ); ?>
				</div>

			<?php endwhile; ?>

		<?php endif; ?>
	</div>
</section>
