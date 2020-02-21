<?php
/**
 * Block Name: CTA
 *
 * This is the template that displays the CTA block.
 *
 * @package Sample_Project
 */

$samp_button = get_field( 'button' );
$samp_target = ! empty( $samp_button['target'] ) ? 'target="' . $samp_button['target'] . '"' : '';

$samp_image = get_field( 'image' );
$samp_alt   = ! empty( $samp_image['alt'] ) ? $samp_image['alt'] : 'content image';
?>

<section class="cta">
	<div class="container">
		<div class="cta__image">
			<img src="<?php echo esc_url( $samp_image['sizes']['content-image'] ); ?>" alt="<?php echo esc_attr( $samp_alt ); ?>" />
		</div>
		<div class="cta__content">
			<p class="h2"><?php the_field( 'heading' ); ?></p>
			<a class="btn" href="<?php echo esc_url( $samp_button['url'] ); ?>" <?php echo esc_attr( $samp_target ); ?>><?php echo esc_html( $samp_button['title'] ); ?></a>
		</div>
	</div>
</section>
