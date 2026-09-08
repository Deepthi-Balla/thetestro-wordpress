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

		if ( function_exists( 'testro_get_product_page' ) ) {
			$product = testro_get_product_page();
			if ( ! empty( $product['slug'] ) && 'ai-test-automation' === $product['slug'] ) {
				$classes[] = 'testro-product-ai';
			}
			if ( ! empty( $product['slug'] ) && 'no-code-test-automation' === $product['slug'] ) {
				$classes[] = 'testro-product-nocode';
			}
			if ( ! empty( $product['slug'] ) && 'automated-web-application-testing' === $product['slug'] ) {
				$classes[] = 'testro-product-web';
			}
			if ( ! empty( $product['slug'] ) && 'automated-api-testing' === $product['slug'] ) {
				$classes[] = 'testro-product-api';
			}
			if ( ! empty( $product['slug'] ) && 'automated-cross-browser-testing-tool' === $product['slug'] ) {
				$classes[] = 'testro-product-xbrowser';
			}
			if ( ! empty( $product['slug'] ) && 'test-management-software' === $product['slug'] ) {
				$classes[] = 'testro-product-tm';
			}
			if ( ! empty( $product['slug'] ) && 'self-healing-test-automation-tool' === $product['slug'] ) {
				$classes[] = 'testro-product-heal';
			}
			if ( ! empty( $product['slug'] ) && 'test-development' === $product['slug'] ) {
				$classes[] = 'testro-product-td';
			}
			if ( ! empty( $product['slug'] ) && 'test-execution' === $product['slug'] ) {
				$classes[] = 'testro-product-te';
			}
			if ( ! empty( $product['slug'] ) && 'ci-cd-integration' === $product['slug'] ) {
				$classes[] = 'testro-product-cicd';
			}
			if ( ! empty( $product['slug'] ) && 'playwright-test-automation' === $product['slug'] ) {
				$classes[] = 'testro-product-pw';
			}
			if ( ! empty( $product['slug'] ) && 'reporting-analytics' === $product['slug'] ) {
				$classes[] = 'testro-product-ra';
			}
		}
	}

	return $classes;
}
add_filter( 'body_class', 'testro_body_classes' );
