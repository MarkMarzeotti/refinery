<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Refinery
 */

?>

<article id="post-<?php the_ID(); ?>" class="post__item">
	<div class="post__content">
		<?php the_content(); ?>
	</div>
</article>
