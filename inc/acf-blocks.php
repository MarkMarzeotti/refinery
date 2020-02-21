<?php
/**
 * Functions used to define Gutenberg blocks built with ACF
 *
 * @package Sample_Project
 */

/**
 * Chooses the file that should be used to render the block.
 *
 * @param array $block An array of data assigned to the block.
 */
function samp_render_acf_blocks( $block ) {
	$slug = str_replace( 'acf/', '', $block['name'] );

	if ( file_exists( get_theme_file_path( '/template-parts/blocks/' . $slug . '.php' ) ) ) {
		include get_theme_file_path( '/template-parts/blocks/' . $slug . '.php' );
	}
}

/**
 * Defines the various ACF controlled blocks.
 */
function samp_define_acf_blocks() {
	if ( function_exists( 'acf_register_block' ) ) {

		acf_register_block(
			array(
				'name'              => 'backpage-hero',
				'title'             => __( 'Backpage Hero', 'sample-project' ),
				'description'       => __( 'A hero block with content and image.', 'sample-project' ),
				'render_callback'   => 'samp_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'hero', 'page' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'centered-content',
				'title'             => __( 'Centered Content', 'sample-project' ),
				'description'       => __( 'A block displaying a small content blurb.', 'sample-project' ),
				'render_callback'   => 'samp_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'center', 'content' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'content-accordion',
				'title'             => __( 'Content Accordion', 'sample-project' ),
				'description'       => __( 'A block displaying content and an accordion.', 'sample-project' ),
				'render_callback'   => 'samp_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'accordion', 'content', 'dropdown' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'content-form',
				'title'             => __( 'Content Form', 'sample-project' ),
				'description'       => __( 'A block displaying content and a form.', 'sample-project' ),
				'render_callback'   => 'samp_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'form', 'content' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'content-switch',
				'title'             => __( 'Content Switch', 'sample-project' ),
				'description'       => __( 'A block displaying tabs to switch out content.', 'sample-project' ),
				'render_callback'   => 'samp_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'tabs', 'switch', 'content' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'cta',
				'title'             => __( 'Call to Action', 'sample-project' ),
				'description'       => __( 'A block displaying an image, text and a button.', 'sample-project' ),
				'render_callback'   => 'samp_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'image', 'content', 'cta' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'hero',
				'title'             => __( 'Hero', 'sample-project' ),
				'description'       => __( 'A hero block with content and image.', 'sample-project' ),
				'render_callback'   => 'samp_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'hero', 'home' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'icon-list-content',
				'title'             => __( 'Icon List and Content', 'sample-project' ),
				'description'       => __( 'A block displaying an icon list and some content.', 'sample-project' ),
				'render_callback'   => 'samp_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'list', 'icon', 'content' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'image-content',
				'title'             => __( 'Image and Content', 'sample-project' ),
				'description'       => __( 'A block displaying an image and some content.', 'sample-project' ),
				'render_callback'   => 'samp_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'image', 'content', 'image and content' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'number-bar',
				'title'             => __( 'Number Bar', 'sample-project' ),
				'description'       => __( 'A block displaying a number value and text.', 'sample-project' ),
				'render_callback'   => 'samp_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'number', 'value', 'text' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'number-columns',
				'title'             => __( 'Number Columns', 'sample-project' ),
				'description'       => __( 'A block displaying numbered columns of content.', 'sample-project' ),
				'render_callback'   => 'samp_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'columns', 'numbered', 'process' ),
			)
		);
	}
}
add_action( 'acf/init', 'samp_define_acf_blocks' );
