<?php
/**
 * Block Name: Hero
 *
 * This is the template that displays the hero block.
 *
 * @package Sample_Project
 */

$samp_button = get_field( 'button' );
$samp_target = ! empty( $samp_button['target'] ) ? 'target="' . $samp_button['target'] . '"' : '';

$samp_image = get_field( 'image' );
$samp_alt   = ! empty( $samp_image['alt'] ) ? $samp_image['alt'] : 'hero image';
?>

<section class="hero">
	<div class="container">
		<div class="hero__content">
			<?php the_field( 'content' ); ?>
			<a class="btn" href="<?php echo esc_url( $samp_button['url'] ); ?>" <?php echo esc_attr( $samp_target ); ?>><?php echo esc_html( $samp_button['title'] ); ?></a>
		</div>
	</div>
	<div class="hero__image">
		<img src="<?php echo esc_url( $samp_image['sizes']['hero-image'] ); ?>" alt="<?php echo esc_attr( $samp_alt ); ?>" />
	</div>
</section>
