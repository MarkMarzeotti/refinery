<?php
/**
 * Block Name: Hero
 *
 * This is the template that displays the hero block.
 */

$button = get_field( 'button' );
$target = ! empty( $button['target'] ) ? 'target="' . $button['target'] . '"' : '';

$image = get_field( 'image' );
$alt   = ! empty( $image['alt'] ) ? $image['alt'] : 'hero image';
?>

<section class="hero">
	<div class="container">
		<div class="hero__content">
			<?php the_field( 'content' ); ?>
			<a class="btn" href="<?php echo esc_url( $button['url'] ); ?>" <?php echo esc_attr( $target ); ?>><?php echo esc_html( $button['title'] ); ?></a>
		</div>
	</div>
	<div class="hero__image">
		<img src="<?php echo esc_url( $image['sizes']['hero-image'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
	</div>
</section>
