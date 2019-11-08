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
				'name'              => 'hero',
				'title'             => __( 'Hero' ),
				'description'       => __( 'A hero block with content and image.' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'hero', 'home' ),
			)
		);

		acf_register_block(
			array(
				'name'              => 'image-content',
				'title'             => __( 'Image and Content' ),
				'description'       => __( 'A block displaying an image and some content.' ),
				'render_callback'   => 'trht_render_acf_blocks',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'image', 'content', 'image and content' ),
			)
		);
	}
}
add_action( 'acf/init', 'trht_define_acf_blocks' );
