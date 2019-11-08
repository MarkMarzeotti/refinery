<?php
/**
 * Block Name: Image and Content
 *
 * This is the template that displays the image and content block.
 */

$button = get_field( 'button' );
$target = ! empty( $button['target'] ) ? 'target="' . $button['target'] . '"' : '';

$image = get_field( 'image' );
$alt   = ! empty( $image['alt'] ) ? $image['alt'] : 'content image';
?>

<section class="image-content">
	<div class="container">
		<div class="image-content__image">
			<img src="<?php echo esc_url( $image['sizes']['content-image'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
		</div>
		<div class="image-content__content">
			<?php the_field( 'content' ); ?>
			<a class="btn--arrow" href="<?php echo esc_url( $button['url'] ); ?>" <?php echo esc_attr( $target ); ?>><?php echo esc_html( $button['title'] ); ?></a>
		</div>
	</div>
</section>
