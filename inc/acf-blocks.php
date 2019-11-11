<?php
/**
 * Functions used to define Gutenberg blocks built with ACF
 *
 * @package Refinery
 */

/**
 * Chooses the file that should be used to render the block.
 *
 * @param array $block An array of data assigned to the block.
 */
function trht_render_acf_blocks( $block ) {
	$slug = str_replace( 'acf/', '', $block['name'] );

	if ( file_exists( get_theme_file_path( '/template-parts/blocks/' . $slug . '.php' ) ) ) {
		include get_theme_file_path( '/template-parts/blocks/' . $slug . '.php' );
	}
}

/**
 * Defines the various ACF controlled blocks.
 */
function trht_define_acf_blocks() {
	if ( function_exists( 'acf_register_block' ) ) {

		acf_register_block(
			array(
				'name'              => 'backpage-hero',
				'title'             => __( 'Backpage Hero', 'refinery-test' ),
				'description'       => __( 'A hero block with content and image.', 'refinery-test' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'hero', 'page' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'centered-content',
				'title'             => __( 'Centered Content', 'refinery-test' ),
				'description'       => __( 'A block displaying a small content blurb.', 'refinery-test' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'center', 'content' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'content-accordion',
				'title'             => __( 'Content Accordion', 'refinery-test' ),
				'description'       => __( 'A block displaying content and an accordion.', 'refinery-test' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'accordion', 'content', 'dropdown' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'content-form',
				'title'             => __( 'Content Form', 'refinery-test' ),
				'description'       => __( 'A block displaying content and a form.', 'refinery-test' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'form', 'content' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'content-switch',
				'title'             => __( 'Content Switch', 'refinery-test' ),
				'description'       => __( 'A block displaying tabs to switch out content.', 'refinery-test' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'tabs', 'switch', 'content' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'cta',
				'title'             => __( 'Call to Action', 'refinery-test' ),
				'description'       => __( 'A block displaying an image, text and a button.', 'refinery-test' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'image', 'content', 'cta' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'hero',
				'title'             => __( 'Hero', 'refinery-test' ),
				'description'       => __( 'A hero block with content and image.', 'refinery-test' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'hero', 'home' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'icon-list-content',
				'title'             => __( 'Icon List and Content', 'refinery-test' ),
				'description'       => __( 'A block displaying an icon list and some content.', 'refinery-test' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'list', 'icon', 'content' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'image-content',
				'title'             => __( 'Image and Content', 'refinery-test' ),
				'description'       => __( 'A block displaying an image and some content.', 'refinery-test' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'image', 'content', 'image and content' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'number-bar',
				'title'             => __( 'Number Bar', 'refinery-test' ),
				'description'       => __( 'A block displaying a number value and text.', 'refinery-test' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'number', 'value', 'text' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'number-columns',
				'title'             => __( 'Number Columns', 'refinery-test' ),
				'description'       => __( 'A block displaying numbered columns of content.', 'refinery-test' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'columns', 'numbered', 'process' ),
			)
		);
	}
}
add_action( 'acf/init', 'trht_define_acf_blocks' );
