<?php
/**
 * Block Name: Hero
 *
 * This is the template that displays the hero block.
 *
 * @package Refinery
 */

$trht_button = get_field( 'button' );
$trht_target = ! empty( $trht_button['target'] ) ? 'target="' . $trht_button['target'] . '"' : '';

$trht_image = get_field( 'image' );
$trht_alt   = ! empty( $trht_image['alt'] ) ? $trht_image['alt'] : 'hero image';
?>

<section class="hero">
	<div class="container">
		<div class="hero__content">
			<?php the_field( 'content' ); ?>
			<a class="btn" href="<?php echo esc_url( $trht_button['url'] ); ?>" <?php echo esc_attr( $trht_target ); ?>><?php echo esc_html( $trht_button['title'] ); ?></a>
		</div>
	</div>
	<div class="hero__image">
		<img src="<?php echo esc_url( $trht_image['sizes']['hero-image'] ); ?>" alt="<?php echo esc_attr( $trht_alt ); ?>" />
	</div>
</section>
