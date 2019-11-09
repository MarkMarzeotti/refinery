<?php
/**
 * Block Name: CTA
 *
 * This is the template that displays the CTA block.
 */

$button = get_field( 'button' );
$target = ! empty( $button['target'] ) ? 'target="' . $button['target'] . '"' : '';

$image = get_field( 'image' );
$alt   = ! empty( $image['alt'] ) ? $image['alt'] : 'content image';
?>

<section class="cta">
	<div class="container">
		<div class="cta__image">
			<img src="<?php echo esc_url( $image['sizes']['content-image'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
		</div>
		<div class="cta__content">
			<p class="h2"><?php the_field( 'heading' ); ?></p>
			<a class="btn" href="<?php echo esc_url( $button['url'] ); ?>" <?php echo esc_attr( $target ); ?>><?php echo esc_html( $button['title'] ); ?></a>
		</div>
	</div>
</section>
