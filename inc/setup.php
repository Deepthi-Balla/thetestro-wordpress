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
			if ( ! empty( $product['slug'] ) && 'banking-finance' === $product['slug'] ) {
				$classes[] = 'testro-product-bf';
			}
			if ( ! empty( $product['slug'] ) && 'retail-ecommerce' === $product['slug'] ) {
				$classes[] = 'testro-product-re';
			}
			if ( ! empty( $product['slug'] ) && 'healthcare' === $product['slug'] ) {
				/* Healthcare reuses BF + RE compose chrome (Framer /solutions/healthcare). */
				$classes[] = 'testro-product-hc';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
			}
			if ( ! empty( $product['slug'] ) && 'travel-and-hospitality' === $product['slug'] ) {
				/* Travel reuses BF/RE/TE/TD compose chrome (Framer /solutions/travel-hospitality). */
				$classes[] = 'testro-product-th';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
				$classes[] = 'testro-product-te';
				$classes[] = 'testro-product-td';
			}
			if ( ! empty( $product['slug'] ) && 'insurance' === $product['slug'] ) {
				/* Insurance reuses BF + RE compose chrome (Framer /solutions/insurance). */
				$classes[] = 'testro-product-ins';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
			}
			if ( ! empty( $product['slug'] ) && 'regression-test-automation' === $product['slug'] ) {
				/* Regression Testing reuses BF + RE compose chrome (Framer /use-cases/regression-testing). */
				$classes[] = 'testro-product-rt';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
			}
			if ( ! empty( $product['slug'] ) && 'ai-automated-sanity-testing' === $product['slug'] ) {
				/* Sanity Testing reuses BF + RE + heal DevOps Flow (Framer /use-cases/sanity-testing). */
				$classes[] = 'testro-product-st';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
				$classes[] = 'testro-product-heal';
			}
			if ( ! empty( $product['slug'] ) && 'ai-powered-integration-testing' === $product['slug'] ) {
				/* Integration Testing reuses BF + RE + RA compose chrome (Framer /use-cases/integration-testing). */
				$classes[] = 'testro-product-it';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
				$classes[] = 'testro-product-ra';
			}
			if ( ! empty( $product['slug'] ) && 'automated-functional-testing' === $product['slug'] ) {
				/* Functional Testing reuses BF + RE + RA + TD compose chrome (Framer /use-cases/functional-testing). */
				$classes[] = 'testro-product-ft';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
				$classes[] = 'testro-product-ra';
				$classes[] = 'testro-product-td';
			}
			if ( ! empty( $product['slug'] ) && 'end-to-end-testing' === $product['slug'] ) {
				/* End-to-End Testing reuses BF + RE + RA compose chrome (Framer /use-cases/end-to-end-testing). */
				$classes[] = 'testro-product-e2e';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
				$classes[] = 'testro-product-ra';
			}
			if ( ! empty( $product['slug'] ) && 'use-cases' === $product['slug'] ) {
				/* See All Use Cases — Framer /use-cases/see-all---use-cases (rbPcCDcnW / r4F7rpthx). */
				$classes[] = 'testro-product-uc';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
				$classes[] = 'testro-product-ra';
			}
			if ( ! empty( $product['slug'] ) && 'microsoft-dynamics-365-test-automation' === $product['slug'] ) {
				/* Dynamics 365 — Framer Qc7jNmQghS7yjIB35091 /erp-applications/microsoft-dynamics-365 (E2GgrYpBR). */
				$classes[] = 'testro-product-dyn';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
				$classes[] = 'testro-product-ra';
			}
			if ( ! empty( $product['slug'] ) && 'salesforce-test-automation' === $product['slug'] ) {
				/* Salesforce Testing — Framer Qc7jNmQghS7yjIB35091 /erp-applications/salesforce-testing (cnSLMHQjc). */
				$classes[] = 'testro-product-sf';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
				$classes[] = 'testro-product-ra';
			}
			if ( ! empty( $product['slug'] ) && 'oracle-testing' === $product['slug'] ) {
				/* Oracle Testing — Framer Qc7jNmQghS7yjIB35091 /erp-applications/oracle-testing (eEA2Ns8Gi). */
				$classes[] = 'testro-product-or';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
				$classes[] = 'testro-product-ra';
			}
			if ( ! empty( $product['slug'] ) && 'sap-testing' === $product['slug'] ) {
				/* SAP Testing — Framer Qc7jNmQghS7yjIB35091 /erp-applications/sap-testing (ZCh9RtvWP). */
				$classes[] = 'testro-product-sap';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
				$classes[] = 'testro-product-ra';
			}
			if ( ! empty( $product['slug'] ) && 'workday-testing' === $product['slug'] ) {
				/* Workday Testing — Framer Qc7jNmQghS7yjIB35091 /erp-applications/workday-testing (wuJXMpcPy). */
				$classes[] = 'testro-product-wd';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
				$classes[] = 'testro-product-ra';
			}
			if ( ! empty( $product['slug'] ) && 'servicenow-testing' === $product['slug'] ) {
				/* ServiceNow Testing — Framer Qc7jNmQghS7yjIB35091 /erp-applications/servicenow-testing (yGOlup6NZ). */
				$classes[] = 'testro-product-sn';
				$classes[] = 'testro-product-bf';
				$classes[] = 'testro-product-re';
				$classes[] = 'testro-product-ra';
			}
		}
	}

	return $classes;
}
add_filter( 'body_class', 'testro_body_classes' );
