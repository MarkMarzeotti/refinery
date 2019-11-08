<?php
/**
 * Marzeotti Base functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Refinery
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function trht_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Marzeotti Base, use a find and replace
	 * to change 'refinery-test' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'refinery-test', get_template_directory() . '/languages' );

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
	// additional image sizes
	add_image_size( 'logo', 600, 120 ); // 600px max width, 120px max height
	add_image_size( 'social_logo', 120, 60 ); // 120px max width, 60px max height

	/*
	 * Register menu locations.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Menu', 'refinery-test' ),
			'button-menu'  => esc_html__( 'Button Menu', 'refinery-test' ),
			'footer-menu'  => esc_html__( 'Footer Menu', 'refinery-test' ),
		)
	);

	/**
	 * Add support for wide and full width blocks.
	 */
	add_theme_support( 'align-wide' );

	/**
	 * Add a custom color pallete
	 */
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Black', 'refinery-test' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
			array(
				'name'  => __( 'White', 'refinery-test' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => __( 'Gallery', 'refinery-test' ),
				'slug'  => 'gallery',
				'color' => '#eeeeee',
			),
		)
	);
}
add_action( 'after_setup_theme', 'trht_setup' );

/**
 * Enqueue scripts and styles.
 */
function trht_scripts() {
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Encode+Sans:400,600|Montserrat:400,700|Open+Sans:400,700', array(), '1' );
	wp_enqueue_style( 'trht-style', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'trht-script', get_stylesheet_directory_uri() . '/dist/js/app.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
	wp_localize_script(
		'trht-script',
		'trhtGlobal',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'trht_more_post_ajax_nonce' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'trht_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function trht_admin_scripts() {
	wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/dist/css/admin.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'admin-script', get_stylesheet_directory_uri() . '/dist/js/admin.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'admin_enqueue_scripts', 'trht_admin_scripts' );

/**
 * Remove WordPress base menu classes.
 *
 * @param array  $classes An array of classes for this menu item.
 * @param object $item    The post object for the menu item.
 */
function trht_discard_menu_classes( $classes, $item ) {
	return (array) get_post_meta( $item->ID, '_menu_item_classes', true );
}
add_filter( 'trht_nav_menu_css_class', 'trht_discard_menu_classes', 10, 2 );

/**
 * Set number of words to show in the excerpt.
 *
 * @param int $length Allowed length of the excerpt.
 */
function trht_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'trht_excerpt_length', 999 );

/**
 * Set characters to show after excerpt.
 *
 * @param string $more The text to display at the end of a generated excerpt.
 */
function trht_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'trht_excerpt_more' );

/**
 * Create ACF Options page.
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}

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
require get_template_directory() . '/inc/class-trht-walker-nav-menu.php';
