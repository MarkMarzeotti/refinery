<?php
/**
 * Block Name: Number Columns
 *
 * This is the template that displays the number columns block.
 */
?>

<section class="content-switch">
	<div class="container">
		<div class="content-switch__intro">
			<h2 class="h3"><?php the_field( 'heading' ); ?></h2>
		</div>

		<?php
		if ( have_rows( 'tabs' ) ) :
			$item_count = 0;
			?>

			<div class="content-switch__tabs" role="tablist" aria-label="<?php the_field( 'heading' ); ?>">

				<?php
				while ( have_rows( 'tabs' ) ) :
					the_row();
					$item_count++;
					$tab        = get_sub_field( 'tab_content' );
					$tab_id     = sanitize_title( $tab );
					$content_id = $tab_id . '-content';
					$selected   = $item_count === 1 ? 'true' : 'false';
					$tab_index  = $item_count !== 1 ? 'tabindex="-1"' : '';
					?>

					<button
						role="tab"
						aria-selected="<?php echo esc_attr( $selected ); ?>"
						aria-controls="<?php echo esc_attr( $content_id ); ?>"
						id="<?php echo esc_attr( $tab_id ); ?>"
						<?php echo esc_attr( $tab_index ); ?>
					>
						<?php the_sub_field( 'tab_content' ); ?>
					</button>

				<?php endwhile; ?>

			</div>

			<?php
			$item_count = 0;
			while ( have_rows( 'tabs' ) ) :
				the_row();
				$item_count++;
				$tab        = get_sub_field( 'tab_content' );
				$tab_id     = sanitize_title( $tab );
				$content_id = $tab_id . '-content';
				$hidden     = $item_count !== 1 ? 'hidden="hidden"' : '';
				?>

				<div
					class="content-switch__content"
					tabindex="0"
					role="tabpanel"
					id="<?php echo esc_attr( $content_id ); ?>"
					aria-labelledby="<?php echo esc_attr( $tab_id ); ?>"
					<?php echo esc_attr( $hidden ); ?>
				>
					<?php the_sub_field( 'switch_content' ); ?>
				</div>

			<?php endwhile; ?>

		<?php endif; ?>
	</div>
</section>
