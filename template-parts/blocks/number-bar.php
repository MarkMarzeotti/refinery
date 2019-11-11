<?php
/**
 * Block Name: Number Columns
 *
 * This is the template that displays the number columns block.
 *
 * @package Refinery
 */

?>

<section class="number-bar">
	<div class="container">

		<?php if ( have_rows( 'numbers' ) ) : ?>

			<div class="number-bar__bar">

				<?php
				while ( have_rows( 'numbers' ) ) :
					the_row();
					?>

					<div class="number-bar__item">
						<span class="number-bar__value"><?php the_sub_field( 'number' ); ?></span>
						<span class="number-bar__content"><?php the_sub_field( 'content' ); ?></span>
					</div>

				<?php endwhile; ?>

			</div>

		<?php endif; ?>

	</div>
</section>
