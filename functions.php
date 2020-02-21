<?php
/**
 * Marzeotti Base functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sample_Project
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function samp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Marzeotti Base, use a find and replace
	 * to change 'sample-project' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sample-project', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable the title tag controlled by WordPress.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	// additional image sizes.
	add_image_size( 'logo', 600, 120 ); // 600px max width, 120px max height
	add_image_size( 'social-logo', 120, 60 ); // 120px max width, 60px max height
	add_image_size( 'hero-image', 820, 660, true ); // 820px width, 660px height, cropped
	add_image_size( 'content-image', 470, 380 ); // 470px max width, 380px max height

	/*
	 * Register menu locations.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Menu', 'sample-project' ),
			'button-menu'  => esc_html__( 'Button Menu', 'sample-project' ),
			'footer-menu'  => esc_html__( 'Footer Menu', 'sample-project' ),
		)
	);

	/**
	 * Add a custom color pallete
	 */
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Black', 'sample-project' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
			array(
				'name'  => __( 'White', 'sample-project' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => __( 'Gallery', 'sample-project' ),
				'slug'  => 'gallery',
				'color' => '#eeeeee',
			),
		)
	);
}
add_action( 'after_setup_theme', 'samp_setup' );

/**
 * Enqueue scripts and styles.
 */
function samp_scripts() {
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Encode+Sans:400,600|Montserrat:400,700|Open+Sans:400,700', array(), '1' );
	wp_enqueue_style( 'samp-style', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'samp-script', get_stylesheet_directory_uri() . '/dist/js/app.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
	wp_localize_script(
		'samp-script',
		'sampGlobal',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'samp_more_post_ajax_nonce' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'samp_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function samp_admin_scripts() {
	wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/dist/css/admin.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'admin-script', get_stylesheet_directory_uri() . '/dist/js/admin.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'admin_enqueue_scripts', 'samp_admin_scripts' );

/**
 * Remove WordPress base menu classes.
 *
 * @param array  $classes An array of classes for this menu item.
 * @param object $item    The post object for the menu item.
 */
function samp_discard_menu_classes( $classes, $item ) {
	return (array) get_post_meta( $item->ID, '_menu_item_classes', true );
}
add_filter( 'samp_nav_menu_css_class', 'samp_discard_menu_classes', 10, 2 );

/**
 * Set number of words to show in the excerpt.
 *
 * @param int $length Allowed length of the excerpt.
 */
function samp_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'samp_excerpt_length', 999 );

/**
 * Set characters to show after excerpt.
 *
 * @param string $more The text to display at the end of a generated excerpt.
 */
function samp_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'samp_excerpt_more' );

/**
 * Create ACF Options page.
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}

/**
 * Dequeue ACF stylesheets on front end.
 */
function samp_dequeue_styles() {
	if ( is_admin() ) {
		return;
	}

	wp_deregister_style( 'af-form-style' );
	wp_deregister_style( 'acf-global' );
	wp_deregister_style( 'acf-input' );
	wp_deregister_style( 'acf-pro-input' );
}
add_action( 'wp_print_styles', 'samp_dequeue_styles', 100 );

/**
 * Dequeue color picker stylesheets on front end.
 */
function samp_dequeue_color_picker() {
	if ( is_admin() ) {
		return;
	}

	wp_deregister_style( 'wp-color-picker' );
}
add_action( 'acf/input/admin_enqueue_scripts', 'samp_dequeue_color_picker', 100 );

/**
 * Dequeue ACF dependencies on front end.
 */
function samp_update_acf_settings() {
	if ( is_admin() ) {
		return;
	}

	acf_update_setting( 'enqueue_select2', false );
	acf_update_setting( 'enqueue_datepicker', false );
	acf_update_setting( 'enqueue_datetimepicker', false );
}
add_action( 'acf/init', 'samp_update_acf_settings' );

/**
 * Remove jQuery Migrate.
 *
 * @param object $scripts Enqueued scripts and their dependencies.
 */
function samp_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];

		if ( $script->deps ) {
			$script->deps = array_diff(
				$script->deps,
				array(
					'jquery-migrate',
				)
			);
		}
	}
}
add_action( 'wp_default_scripts', 'samp_remove_jquery_migrate' );

/**
 * Set select placeholder text to label text.
 *
 * @param array $field An array of values pertaining to this field.
 */
function samp_fix_select_placeholder( $field ) {
	$asterisk             = $field['required'] ? ' *' : '';
	$field['placeholder'] = $field['label'] . $asterisk;
	return $field;
}
add_filter( 'acf/prepare_field/type=select', 'samp_fix_select_placeholder' );

/**
 * Only allow certain blocks that have been styled.
 *
 * @param array $allowed_block_types Currently allowed blocks.
 * @param array $post                The post object.
 */
function samp_allowed_block_types( $allowed_block_types, $post ) {
	return array(
		'acf/backpage-hero',
		'acf/centered-content',
		'acf/content-accordion',
		'acf/content-form',
		'acf/content-switch',
		'acf/cta',
		'acf/hero',
		'acf/icon-list-content',
		'acf/image-content',
		'acf/number-bar',
		'acf/number-columns',
	);
}
add_filter( 'allowed_block_types', 'samp_allowed_block_types', 10, 2);

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * A custom walker class to modify the navigation markup.
 */
require get_template_directory() . '/inc/class-samp-walker-nav-menu.php';

/**
 * Advanced Custom Fields Blocks.
 */
require get_template_directory() . '/inc/acf-blocks.php';
