<?php
/**
 * Block Name: Number Columns
 *
 * This is the template that displays the number columns block.
 */
?>

<section class="number-columns">
	<div class="container">
		<div class="number-columns__intro">
			<h2><?php the_field( 'heading' ); ?></h2>
		</div>

		<?php
		if ( have_rows( 'columns' ) ) :
			$item_count = 0;

			while ( have_rows( 'columns' ) ) :
				the_row();
				$item_count++;
				?>

				<div class="number-columns__item">
					<span class="number-columns__count"><?php echo $item_count; ?></span>
					<?php the_sub_field( 'content' ); ?>
				</div>

			<?php
			endwhile;
		endif;
		?>
	</div>
</section>
