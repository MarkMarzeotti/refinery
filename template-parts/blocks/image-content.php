<?php
/**
 * Block Name: Image and Content
 *
 * This is the template that displays the image and content block.
 *
 * @package Refinery
 */

$trht_button = get_field( 'button' );
$trht_target = ! empty( $trht_button['target'] ) ? 'target="' . $trht_button['target'] . '"' : '';

$trht_image = get_field( 'image' );
$trht_alt   = ! empty( $trht_image['alt'] ) ? $trht_image['alt'] : 'content image';
?>

<section class="image-content">
	<div class="container">
		<div class="image-content__image">
			<img src="<?php echo esc_url( $trht_image['sizes']['content-image'] ); ?>" alt="<?php echo esc_attr( $trht_alt ); ?>" />
		</div>
		<div class="image-content__content">
			<?php the_field( 'content' ); ?>
			<a class="btn--arrow" href="<?php echo esc_url( $trht_button['url'] ); ?>" <?php echo esc_attr( $trht_target ); ?>><?php echo esc_html( $trht_button['title'] ); ?></a>
		</div>
	</div>
</section>
