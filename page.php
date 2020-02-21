<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sample_Project
 */

get_header();
?>

	<main id="main" class="content__page">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile;
		?>

		<?php
		get_template_part( 'modules/hero' );

		get_template_part( 'modules/image-content' );
		?>

	</main>

<?php
get_footer();
