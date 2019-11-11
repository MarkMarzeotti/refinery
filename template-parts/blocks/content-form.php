<?php
/**
 * Block Name: Centered Content
 *
 * This is the template that displays the centered content block.
 */

$image = get_field( 'image' );
$alt   = ! empty( $image['alt'] ) ? $image['alt'] : 'hero image';

$form  = get_field( 'form' );
?>

<section class="content-form">
	<div class="container">
		<div class="content-form__content-container">

			<div class="content-form__content">
				<?php the_field( 'content' ); ?>
			</div>
			<img src="<?php echo esc_url( $image['sizes']['content-image'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />

		</div>
		<div class="content-form__form">

			<?php
			$args = array(
				'display_description' => true,
				'submit_text' => 'Send',
			);
			advanced_form( $form->ID, $args );
			?>

		</div>
	</div>
</section>
