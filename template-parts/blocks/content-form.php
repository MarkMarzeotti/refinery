<?php
/**
 * Block Name: Centered Content
 *
 * This is the template that displays the centered content block.
 *
 * @package Refinery
 */

$trht_image = get_field( 'image' );
$trht_alt   = ! empty( $trht_image['alt'] ) ? $trht_image['alt'] : 'hero image';

$trht_form = get_field( 'form' );
?>

<section class="content-form">
	<div class="container">
		<div class="content-form__content-container">

			<div class="content-form__content">
				<?php the_field( 'content' ); ?>
			</div>
			<img src="<?php echo esc_url( $trht_image['sizes']['content-image'] ); ?>" alt="<?php echo esc_attr( $trht_alt ); ?>" />

		</div>
		<div class="content-form__form">

			<?php
			$trht_args = array(
				'display_description' => true,
				'submit_text'         => 'Send',
			);
			advanced_form( $trht_form->ID, $trht_args );
			?>

		</div>
	</div>
</section>
