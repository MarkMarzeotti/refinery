<?php
/**
 * Block Name: Centered Content
 *
 * This is the template that displays the centered content block.
 *
 * @package Sample_Project
 */

$samp_image = get_field( 'image' );
$samp_alt   = ! empty( $samp_image['alt'] ) ? $samp_image['alt'] : 'hero image';

$samp_form = get_field( 'form' );
?>

<section class="content-form">
	<div class="container">
		<div class="content-form__content-container">

			<div class="content-form__content">
				<?php the_field( 'content' ); ?>
			</div>
			<img src="<?php echo esc_url( $samp_image['sizes']['content-image'] ); ?>" alt="<?php echo esc_attr( $samp_alt ); ?>" />

		</div>
		<div class="content-form__form">

			<?php
			$samp_args = array(
				'display_description' => true,
				'submit_text'         => 'Send',
			);
			advanced_form( $samp_form->ID, $samp_args );
			?>

		</div>
	</div>
</section>
