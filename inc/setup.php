<?php
/**
 * Theme setup.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function testro_setup() {
	load_theme_textdomain( 'testro', TESTRO_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'testro' ),
		)
	);

	add_image_size( 'testro-client', 160, 80, false );
	add_image_size( 'testro-avatar', 96, 96, true );
	add_image_size( 'testro-service', 640, 420, true );
}
add_action( 'after_setup_theme', 'testro_setup' );

/**
 * Set the content width in pixels.
 */
function testro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'testro_content_width', 1200 );
}
add_action( 'after_setup_theme', 'testro_content_width', 0 );

/**
 * Mark registered product landing pages for scoped layout tweaks.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function testro_body_classes( $classes ) {
	if ( function_exists( 'testro_is_product_page' ) && testro_is_product_page() ) {
		$classes[] = 'testro-product-page';
	}

	return $classes;
}
add_filter( 'body_class', 'testro_body_classes' );
